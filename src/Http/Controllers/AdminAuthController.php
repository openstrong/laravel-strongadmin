<?php

namespace OpenStrong\StrongAdmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use OpenStrong\StrongAdmin\Models\AdminRole;
use OpenStrong\StrongAdmin\Foundation\Auth\ThrottlesLogins;
use OpenStrong\StrongAdmin\Models\AdminUser;

class AdminAuthController extends BaseController
{

    use ThrottlesLogins;

    public $maxAttempts; //允许尝试登录最大次数
    public $decayMinutes; //登录错误超过 maxAttempts 次, 禁止登录 decayMinutes 分钟

    public function __construct()
    {
        $this->maxAttempts = config('strongadmin.storage.throttles_logins.maxAttempts', 5);
        $this->decayMinutes = config('strongadmin.storage.throttles_logins.decayMinutes', 10);
    }

    public function login(Request $request)
    {
        if (!$request->expectsJson())
        {
            return $this->view('login');
        }
        $rules = [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
        if (!\App::environment(['local', 'testing']))
        {
            if ($this->isApi)
            {
                $rules = array_merge($rules, [
                    'captcha_key' => ['required'],
                    'captcha' => 'required|captcha_api:' . request('captcha_key'),
                ]);
            } else
            {
                $rules = array_merge($rules, ['captcha' => 'required|captcha']);
            }
        }
        $messages = [
            'captcha.*' => ':attribute 不正确。',
        ];
        $customAttributes = [
            'captcha' => '验证码',
        ];
        $validator = Validator::make($request->post(), $rules, $messages, $customAttributes);
        if ($validator->fails())
        {
            return ['code' => 3001, 'message' => $validator->errors()->first(), 'data' => $validator->errors()];
        }
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
                $this->hasTooManyLoginAttempts($request))
        {
            $this->fireLockoutEvent($request);
            return ['code' => 4001, 'message' => "登录失败次数过多,请{$this->decayMinutes}分钟后重试", 'log' => "登录失败次数过多：{$request->username}"];
        }

        $admin_user = AdminUser::where('user_name', $request->username)->first();
        if (!$admin_user)
        {
            return ['code' => 4002, 'message' => '登录失败', 'log' => "登录失败（账号不存在）：{$request->username}"];
        }
        if ($admin_user->status !== 1)
        {
            return ['code' => 4003, 'message' => '登录失败', 'log' => "登录失败（账号禁用）：{$request->username}"];
        }
        if (!Hash::check($request->password, $admin_user->password))
        {
            $this->incrementLoginAttempts($request); //累加登录失败次数
            return ['code' => 4004, 'message' => '登录失败', 'log' => "登录密码错误：{$request->username}"];
        }

        if ($this->isApi)
        {
            $admin_user->api_token = $admin_user->generateApiToken();
            $admin_user->api_token_at = now()->addSeconds(config('strongadmin.apiToken.ttl', 7 * 24 * 3600));
            $admin_user->api_token_refresh_at = now()->addSeconds(config('strongadmin.apiToken.refresh_ttl', 1 * 24 * 3600));
        } else
        {
            Auth::guard(config('strongadmin.guard'))->login($admin_user);
        }
        $admin_user->last_ip = $request->ip();
        $admin_user->last_at = now();
        $admin_user->save();
        $this->clearLoginAttempts($request);
        return ['code' => 200, 'message' => '登录成功.', 'data' => ['token' => $admin_user->api_token], 'log' => "登录成功:{$admin_user->user_name}", 'toUrl' => route('strongadmin.home')];
    }

    public function logout()
    {
        $admin_user = Auth::guard(config('strongadmin.guard'))->user();
        Auth::guard(config('strongadmin.guard'))->logout();
        Auth::logoutOtherDevices($admin_user->password ?? null); //让其它设备上的 Session 失效
        return redirect(route('strongadmin.login'));
    }

    public function userinfo()
    {
        $admin_user = Auth::guard(config('strongadmin.guard'))->user();
        $admin_user->roles = [AdminRole::find($admin_user->role_id)->name];
        return ['code' => 200, 'message' => 'success', 'data' => $admin_user];
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
                    $this->username() => [trans('auth.failed')],
        ]);
    }

}
