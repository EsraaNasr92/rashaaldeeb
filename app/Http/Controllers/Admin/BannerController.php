<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

use App\Http\Requests\StoreBannerRequest;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
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
        $banner = Banner::all();
        return view('admin.banner.index', ['model' => $banner]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create')->with('model', new Banner());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        $banner = new Banner  
        ($request->only(['title', 'subtitle', 'btn_title', 'btn_url']));

        $path = $request->file('image');
        $image = $path->getClientOriginalName();
        $path->move(public_path('uploads'), $image);
        $banner->image = $image;   
        $banner->save();

        return redirect()->route('banner.index')     
        ->with('status', 'The banner has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit')->with('model', $banner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $banner->fill($request->only(['title', 'subtitle',
        'btn_title', 'btn_url']))->save();

        if ($request->hasFile('image'))
        {
            $path = 'uploads/'.$banner->image;
            if (File::exists($path))
            {
                File::delete($path);
            }
    
            $path = $request->file('image');
            $image = $path->getClientOriginalName();
            $path->move(public_path('uploads/'), $image);
            $banner->image = $image;  
            $banner->save();
        }

        return redirect()->route('banner.index')
        ->with('status', 'The banner was updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('banner.index')
        ->with('status', 'The banner was deleted.'); 
    }
}
