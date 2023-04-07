<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 测试连接MySQL数据库
     * @param Request $request
     * @return void
     */
    public function testMysql(Request $request){
        echo "測試mysql";
        $data =DB::table('users')->get()->toArray();
        var_dump($data);
    }

    /**
     * 测试redis数据库
     * @param Request $request
     * @return void
     */
    public function testRedis(Request $request){
        echo "測試redis";
        Redis::set('key','val-asdfa');
        $a = Redis::get('key');
        echo $a;
    }

    /**
     * 测试jwt的生产
     * @param Request $request
     * @return void
     */
    public function testJwt(Request $request)
    {

        $user = User::where('id',1)->first();
        //获取token
        $token =  JWTAuth::fromUser($user);
        // JWTFactory::setTTL(80);// 设置TOKEN缓存时间
        echo  $token;

        //设置token
        JWTAuth::setToken($token);
        echo "<br>";

        $userinfo = app('auth')->user();
        var_dump($userinfo);

        //刷新token
        $token1=JWTAuth::refresh();
        echo "<br>";
        echo $token1;
        //注销token
        JWTAuth::invalidate(JWTAuth::getToken()); // 即把当前token加入黑名单

    }




    //
}
