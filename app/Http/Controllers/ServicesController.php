<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{
    public function index(){
        $service = Services::with('user')->paginate(5);                    
        return view('services.index')->with('service', $service);
    }


    public function view($slug){
        $service = Services::with('user')
                 ->where([
                     ['slug', '=', $slug],
                     ])
                 ->firstOrFail(); 
        return view('services.view',compact('service'));
         
    }
}
