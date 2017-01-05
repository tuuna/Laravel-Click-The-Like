<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
//use Predis;

class IndexController extends Controller
{
    public function index() 
    {
    	$allClick = Redis::get(" click : like ");

        return view('index',['click' => $allClick]);
    }

    public function getAllData()
    {
    	$data = Request::post();

    	if($data['count']) {
    		$key = 'click : like';
    		$allKey = Redis::get($key);
    		Redis::set($key,$allKey + 1);
    	}
    }

    public function isLike()
    {
        $click = Redis::get(" click : like ");
        if($click) {
            return json_encode(['status' => 0,'msg' => '已经点过赞']);
        } else {
            return json_encode(['status' => 1,'msg' => '点赞成功']);
        }
    }
}

