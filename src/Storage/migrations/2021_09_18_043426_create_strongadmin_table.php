<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use OpenStrong\StrongAdmin\Models\AdminUser;
use OpenStrong\StrongAdmin\Models\AdminRole;
use OpenStrong\StrongAdmin\Models\AdminMenu;
use OpenStrong\StrongAdmin\Models\AdminLog;

class CreateStrongadminTable extends Migration
{

    /**
     * The database connection.
     * @var type
     */
    protected $connection;

    /**
     * The database schema.
     *
     * @var \Illuminate\Database\Schema\Builder
     */
    protected $schema;

    /**
     * Create a new migration instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->connection = $this->getConnection();
        $this->schema = Schema::connection($this->connection);
    }

    /**
     * Get the migration connection name.
     *
     * @return string|null
     */
    public function getConnection()
    {
        return config('strongadmin.storage.database.connection');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('strongadmin_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->bigIncrements('id')->comment('管理员id');
            $table->string('user_name', 50)->default('')->comment('登录名')->unique();
            $table->string('password', 100)->comment('登录密码');
            $table->string('remember_token', 100)->nullable()->comment('记住登录');
            $table->string('name', 100)->default('')->comment('姓名');
            $table->string('email', 255)->default('')->comment('邮箱');
            $table->string('phone', 255)->default('')->comment('手机号');
            $table->string('avatar', 255)->default('')->comment('头像');
            $table->string('introduction', 255)->default('')->comment('介绍');
            $table->unsignedInteger('status')->default(1)->comment('状态 1 启用, 2 禁用');
            $table->string('last_ip', 255)->default('')->comment('最近一次登录ip');
            $table->dateTime('last_at')->nullable()->comment('最近一次登录时间');
            $table->timestamps();
        });

        $this->schema->create('strongadmin_role', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->bigIncrements('id')->comment('角色id');
            $table->string('name', 50)->default('')->comment('名称')->unique();
            $table->string('desc', 255)->default('')->comment('角色描述');
            $table->text('permissions')->nullable()->comment('拥有的权限');
            $table->timestamps();
        });

        $this->schema->create('strongadmin_user_role', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->integer('admin_user_id');
            $table->integer('admin_role_id');
        });

        $this->schema->create('strongadmin_menu', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->bigIncrements('id')->comment('菜单id');
            $table->unsignedInteger('level')->default(1)->comment('等级 1 一级菜单, 2 二级菜单, 3 三级菜单');
            $table->unsignedInteger('parent_id')->default(0)->comment('上级菜单');
            $table->string('name', 100)->comment('菜单名称');
            $table->string('route_url', 100)->nullable()->comment('菜单跳转地址');
            $table->unsignedInteger('status')->default(1)->comment('状态 1开启,2禁用');
            $table->integer('sort')->default(100)->comment('排序');
            $table->timestamps();
            $table->integer('delete_allow')->default(1)->comment('是否允许删除：1 允许，2 不允许');
        });

        $this->schema->create('strongadmin_log', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->bigIncrements('id');
            $table->string('route_url', 100)->default('')->comment('路由');
            $table->string('desc', 255)->default('')->comment('操作描述');
            $table->text('log_original')->nullable()->comment('字段变更前内容');
            $table->text('log_dirty')->nullable()->comment('字段变更后内容');
            $table->unsignedInteger('admin_user_id')->default(0)->comment('操作用户');
            $table->timestamps();
        });

        /**
         * 数据填充 ========================================================================================================================
         */
        // strongadmin_user
        $user_name = config('strongadmin.storage.super_admin.user_name', 'admin');
        $password = bcrypt('123456');
        AdminUser::insert([
            [
                'id' => 1,
                'user_name' => $user_name,
                'password' => $password,
                'status' => 1,
            ],
            [
                'id' => 2,
                'user_name' => 'demo',
                'password' => $password,
                'status' => 1,
            ],
        ]);
        //strongadmin_role
        AdminRole::insert([
            [
                'id' => 1,
                'name' => '管理员',
                'desc' => '超级管理员，不可删除',
            ],
            [
                'id' => 2,
                'name' => 'demo',
                'desc' => '仅作为演示',
            ],
        ]);
        //strongadmin_user_role
        \DB::connection($this->connection)->table('strongadmin_user_role')->insert([
            [
                'admin_user_id' => 1,
                'admin_role_id' => 1,
            ],
            [
                'admin_user_id' => 2,
                'admin_role_id' => 2,
            ],
        ]);
        //strongstrongadmin_menu
        $table_prefix = config("database.connections.{$this->connection}.prefix");
        \DB::connection($this->connection)->unprepared("
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (1, 1, 0, '权限管理', NULL, 1, 2001, '2021-01-06 03:37:40', '2021-05-21 20:10:57', 2);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (2, 2, 1, '菜单管理', 'strongadmin/adminMenu/index', 1, 200, '2021-01-06 03:38:18', '2021-09-18 03:06:27', 2);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (3, 3, 2, '列表查看', 'strongadmin/adminMenu/index', 1, 200, '2021-01-06 04:50:41', '2021-09-18 03:06:27', 2);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (4, 3, 2, '添加', 'strongadmin/adminMenu/create', 1, 200, '2021-01-06 04:51:07', '2021-09-18 03:06:27', 2);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (5, 3, 2, '更新', 'strongadmin/adminMenu/update', 1, 200, '2021-01-06 04:51:24', '2021-09-18 03:06:27', 2);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (6, 3, 2, '删除', 'strongadmin/adminMenu/destroy', 1, 200, '2021-01-06 04:51:52', '2021-09-18 03:06:27', 2);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (14, 2, 1, '账号管理', 'strongadmin/adminUser/index', 1, 200, '2021-01-06 05:21:14', '2021-09-18 03:06:27', 1);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (15, 3, 14, '查看', 'strongadmin/adminUser/index', 1, 200, '2021-01-06 05:22:05', '2021-09-18 03:06:27', 1);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (16, 3, 14, '更新', 'strongadmin/adminUser/update', 1, 200, '2021-01-06 05:22:45', '2021-09-18 03:06:27', 1);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (17, 3, 14, '删除', 'strongadmin/adminUser/destroy', 1, 200, '2021-01-06 07:08:39', '2021-09-18 03:06:27', 1);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (18, 2, 1, '角色管理', 'strongadmin/adminRole/index', 1, 200, '2021-01-06 07:09:58', '2021-09-18 03:06:27', 1);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (19, 3, 18, '查看', 'strongadmin/adminRole/index', 1, 200, '2021-01-06 07:10:18', '2021-09-18 03:06:27', 1);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (20, 3, 18, '添加', 'strongadmin/adminRole/create', 1, 200, '2021-01-06 07:10:30', '2021-09-18 03:06:27', 1);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (21, 3, 18, '更新', 'strongadmin/adminRole/update', 1, 200, '2021-01-06 07:10:48', '2021-09-18 03:06:27', 1);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (22, 3, 18, '删除', 'strongadmin/adminRole/destroy', 1, 200, '2021-01-06 07:11:02', '2021-09-18 03:06:27', 1);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (23, 2, 1, '操作日志', 'strongadmin/adminLog/index', 1, 200, '2021-01-07 13:40:48', '2021-09-18 03:06:27', 2);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (24, 3, 23, '删除', 'strongadmin/adminLog/destroy', 1, 200, '2021-01-07 13:41:44', '2021-09-18 03:06:27', 2);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (25, 3, 23, '查看', 'strongadmin/adminLog/index', 1, 200, '2021-01-08 02:27:07', '2021-09-18 03:06:27', 2);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (26, 3, 18, '分配权限', 'strongadmin/adminRole/assignPermissions', 1, 200, '2021-01-08 13:08:33', '2021-09-18 03:06:27', 1);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (36, 1, 0, '主页', NULL, 1, 99999, '2021-01-08 14:59:46', '2021-01-09 13:58:51', 2);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (37, 2, 36, '面板', 'strongadmin/index/panel', 1, 200, '2021-01-08 16:38:33', '2021-09-18 03:06:27', 2);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (38, 3, 14, '创建', 'strongadmin/adminUser/create', 1, 200, '2021-01-13 15:25:40', '2021-09-18 03:06:27', 1);
INSERT INTO `{$table_prefix}strongadmin_menu` VALUES (41, 2, 1, 'Telescope', 'strongadmin/telescope/requests', 1, 200, '2021-01-19 17:19:57', '2021-09-18 03:06:27', 1);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->dropIfExists('strongadmin_user');
        $this->schema->dropIfExists('strongadmin_role');
        $this->schema->dropIfExists('strongadmin_user_role');
        $this->schema->dropIfExists('strongadmin_menu');
        $this->schema->dropIfExists('strongadmin_log');
    }

}
