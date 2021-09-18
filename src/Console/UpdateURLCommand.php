<?php

namespace OpenStrong\StrongAdmin\Console;

use Illuminate\Console\Command;
use OpenStrong\StrongAdmin\Models\AdminMenu;

class UpdateURLCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'strongadmin:updateURL {--prefix= : 要被替换的路径前缀名称}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '修正菜单路由 url 路径为配置文件 config/strongadmin.php 里的 `path`，参数 `--prefix=` 要被替换的路径前缀名称';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $path_prefix = config('strongadmin.path', 'strongadmin');
        $_prefix = trim($this->option('prefix'));
        if (!$_prefix)
        {
            $_prefix = false;
        }
        AdminMenu::query()
                ->whereNotNull('route_url')->where('route_url', '<>', '')
                ->chunk(100, function ($rows)use ($path_prefix, $_prefix) {
                    foreach ($rows as $row)
                    {
                        if (preg_match("#^{$path_prefix}#", $row->route_url))
                        {
                            $this->line("{$row->route_url}");
                        } else
                        {
                            $old_route_url = $row->route_url;
                            if ($_prefix)
                            {
                                $new_route_url = preg_replace("#^{$_prefix}#", $path_prefix, $row->route_url);
                            } else
                            {
                                $new_route_url = $path_prefix . '/' . $row->route_url;
                            }
                            $row->route_url = $new_route_url;
                            $row->save();
                            $this->info("{$old_route_url} => {$new_route_url}");
                        }
                    }
                });
    }

}
