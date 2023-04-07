<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class AfterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //主要操作 是处理日志信息 记录请求数据以及 请求头信息

        $method = $request->isMethod('POST');
        if($method){
            $uid = app('auth')->user()->id??'';
            Log::info('Request ', ['uid'=>$uid,'url' => $request->decodedPath(),'param' => $request->all()]);
        }

        return $next($request);
    }
}
