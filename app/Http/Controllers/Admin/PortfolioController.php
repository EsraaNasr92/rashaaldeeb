<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Categoryp;

use Illuminate\Http\Request;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;

use Auth;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->isAdminOrEditor()){
            $portfolio = Portfolio::paginate(5);
        }else{
            $portfolio = Auth::user()->paginate(5);
        }
        
        return view('admin.portfolio.index', ['model' => $portfolio]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categoryp::with('children')->whereNull('parent_id')->get();
        return view('admin.portfolio.create')->with('model' , new Portfolio())->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortfolioRequest $request)
    {
        $portfolios = Auth::user()->portfolios()->save(new Portfolio  
        ($request->only(['title', 'slug', 'content', 'image', 'categoryp_id'])
        ));

        $path = $request->file('image');
        $image = $path->getClientOriginalName();
        $path->move(public_path('uploads/portfolio'), $image);
        $portfolios->image = $image;   
        $portfolios->save();

        return redirect()->route('portfolio.index')     
        ->with('status', 'The project has been created');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        $categories = Categoryp::with('children')->whereNull('parent_id')->get();
        return view('admin.portfolio.edit')->with('model', $portfolio)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        if(Auth::user()->cannot('update', $portfolio)){
            return redirect()->route('portfolio.index')
            ->with('status', 'you do not have permission to edit that partner.');       
         }


        $portfolio->fill($request->only(['title', 'slug',
         'content', 'categoryp_id']))->save();

         if ($request->hasFile('image'))
         {
             $path = 'uploads/portfolio/'.$portfolio->image;
             if (File::exists($path))
             {
                 File::delete($path);
             }
     
             $path = $request->file('image');
             $image = $path->getClientOriginalName();
             $path->move(public_path('uploads/portfolio'), $image);
             $portfolio->image = $image;            
         }

         $portfolio->save();
         
         return redirect()->route('portfolio.index')
         ->with('status', 'The project was updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        if(Auth::user()->cannot('delete', $portfolio)){
            return redirect()->route('portfolio.index')
            ->with('status', 'you do not have permission to delete that post.');       
         }

         $portfolio->delete();

         return redirect()->route('portfolio.index')
         ->with('status', 'The project was deleted.'); 
    }
}
