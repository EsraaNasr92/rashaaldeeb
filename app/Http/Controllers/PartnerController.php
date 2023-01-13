<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Partners;

class PartnerController extends Controller
{
    public function index(){
       
        $partner = Partners::with('user')->paginate(5);                    
        return view('partner.index')->with('partner', $partner);
    }

    public function view($slug){
        $partner = Partners::with('user')
                 ->where([
                     ['slug', '=', $slug],
                     ])
                 ->firstOrFail(); 
        return view('partner.view',compact('partner'));
         
    }
}
