<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    }
    public function testRedis(Request $request){
        echo "測試mysql";
    }

    //
}
