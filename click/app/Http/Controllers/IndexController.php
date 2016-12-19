<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() 
    {
    	$allClick = Redis:get(" click : like ");

        return view('index',['click' => $allClick]);
    }

    public function getAllData()
    {
    	$data = Request::post();

    	if($data['count']) {
    		$key = 'click : like';
    		$allKey = Redis:get($key);
    		Redis:set($key,$allKey++);
    	}
    }
}

