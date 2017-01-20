<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
//use Predis;

class IndexController extends Controller
{
    public function index() 
    {
    	$allClick = Redis::get("click");

        return view('index',['click' => $allClick]);
    }

    /*public function getAllData()
    {
    	$data = Request::post();

    	if($data['count']) {
    		$key = 'click';
    		$allKey = Redis::get($key);
    		Redis::set($key,$allKey + 1);
    	}
    }*/

    public function isLike()
    {
        $click = Redis::get("click");
        if($click) {
            Redis::set("click",0);
            return ['status' => 0,'msg' => '取消点赞','count' => 0];
        } else {
            Redis::set("click",1);
            return ['status' => 1,'msg' => '点赞成功','count' => 1];
//            return json_encode(['status' => 1,'msg' => '点赞成功']);
        }
    }
}

