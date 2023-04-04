<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

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

    public function testMysql(Request $request){
        echo "測試mysql";
        DB::table('table')->get();

    }


    public function testRedis(Request $request){
        echo "測試redis";
        Redis::set('key','val-asdfa');
        $a = Redis::get('key');
        echo $a;
    }

    //
}
