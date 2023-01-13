<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index(){
       
        $portfolio = Portfolio::with('user')->paginate(5);                    
        return view('portfolio.index')->with('portfolio', $portfolio);
    }

    public function view($slug){
        $portfolio = Portfolio::with('user')
                 ->where([
                     ['slug', '=', $slug],
                     ])
                 ->firstOrFail(); 
        return view('portfolio.view',compact('portfolio'));
         
    }
}
