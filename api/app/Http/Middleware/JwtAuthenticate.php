<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;



class JwtAuthenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //jwt 的认证过期 用户操作处理的部分
        try {
            /**
             *TODO 获取用户信息的方法可封装起来
             *对应的放回参数可根据个人习惯进行自定义
             */
            $token = JWTAuth::getToken();
            if ($token) JWTAuth::setToken($token);

            if (!auth()->user()){
                return response()->json([
                    'code' => 400004,
                    'msg' => '无此用户'
                ], 400);
            }

        } catch (TokenExpiredException $e) {

            return response()->json([
                'code' => 400001,
                'msg' => 'token 过期'
            ], 400);

        } catch (TokenInvalidException $e) {

            return response()->json([
                'code' => 400003,
                'msg' => 'token 失效'
            ], 400);

        } catch (JWTException $e) {

            return response()->json([
                'code' => 400002,
                'msg' => 'token 参数错误'
            ], 400);
        }

        return $next($request);
    }
}
