<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Slider::get();
        return view('admin.slider.index', compact('images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads'), $input['image']);

        Slider::create($input);
    	return back()
    		->with('status','Image Uploaded successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::find($id)->delete();
    	return back()
    		->with('status','Image removed successfully.');	
    }
}
