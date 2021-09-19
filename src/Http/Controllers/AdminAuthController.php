<?php

namespace OpenStrong\StrongAdmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use OpenStrong\StrongAdmin\Models\AdminRole;
use OpenStrong\StrongAdmin\Foundation\Auth\ThrottlesLogins;

class AdminAuthController extends BaseController
{

    use ThrottlesLogins;

    public $maxAttempts; //允许尝试登录最大次数
    public $decayMinutes; //登录错误超过 maxAttempts 次, 禁止登录 decayMinutes 分钟

    public function __construct()
    {
        //允许尝试登录最大次数
        $this->maxAttempts = config('strongadmin.storage.throttles_logins.maxAttempts', 5);
        //登录错误超过 maxAttempts 次, 禁止登录 decayMinutes 分钟
        $this->decayMinutes = config('strongadmin.storage.throttles_logins.decayMinutes', 10);
    }

    public function login(Request $request)
    {
        if ($request->isMethod('get'))
        {
            return $this->view('login');
        }
        $rules = [
            'username' => ['required', 'string', Rule::exists('strongadmin_user', 'user_name')->where('status', 1)],
            'password' => ['required', 'string'],
        ];
        if (!\App::environment(['local', 'testing']))
        {
            $rules = array_merge($rules, ['captcha' => 'required|captcha']);
        }
        $messages = [
            'captcha' => ':attribute 不正确。',
        ];
        $customAttributes = [
            'captcha' => '验证码',
        ];
        $data = [
            'username' => $request->post('username'),
            'password' => $request->post('password'),
            'captcha' => $request->post('captcha'),
        ];
        $validator = Validator::make($data, $rules, $messages, $customAttributes);
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

        if (!Auth::guard(config('strongadmin.guard'))->attempt(['user_name' => $request->username, 'password' => $request->password], 1))
        {
            $this->incrementLoginAttempts($request);
            return ['code' => 4001, 'message' => '登录密码错误', 'log' => "登录密码错误：{$request->username}"];
        }

        $admin_user = Auth::guard(config('strongadmin.guard'))->user();

        $admin_user->last_ip = $request->ip();
        $admin_user->last_at = now();
        $admin_user->save();
        $this->clearLoginAttempts($request);
        return ['code' => 200, 'message' => '登录成功.', 'log' => "登录成功:{$admin_user->user_name}", 'toUrl' => route('strongadmin.home')];
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
