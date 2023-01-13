<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(){
       
        $banner = Banner::paginate(1);                    
        return view('banner.index')->with('banner', $banner);
    }
}
