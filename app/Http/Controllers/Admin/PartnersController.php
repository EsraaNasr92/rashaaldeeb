<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Partners;
use Illuminate\Http\Request;

use Auth;
use App\Http\Requests\StorePartnersRequest;
use App\Http\Requests\UpdatePartnersRequest;

use Illuminate\Support\Facades\File;

class PartnersController extends Controller
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
            $partners = Partners::paginate(5);
        }else{
            $partners = Auth::user()->paginate(5);
        }
        
        return view('admin.partners.index', ['model' => $partners]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partners.create')->with('model' , new Partners());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartnersRequest $request)
    {
        $partners = Auth::user()->partners()->save(new Partners  
        ($request->only(['title', 'slug', 'content', 'image'])
        ));

        $path = $request->file('image');
        $image = $path->getClientOriginalName();
        $path->move(public_path('uploads/partners'), $image);
        $partners->image = $image;   
        $partners->save();

        return redirect()->route('partners.index')     
        ->with('status', 'The partner has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function edit(Partners $partner)
    {

        return view('admin.partners.edit')->with('model', $partner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePartnersRequest $request, Partners $partner)
    {
        if(Auth::user()->cannot('update', $partner)){
            return redirect()->route('partners.index')
            ->with('status', 'you do not have permission to edit that partner.');       
         }


        $partner->fill($request->only(['title', 'slug',
         'content']))->save();

         if ($request->hasFile('image'))
         {
             $path = 'uploads/partners/'.$partner->image;
             if (File::exists($path))
             {
                 File::delete($path);
             }
     
             $path = $request->file('image');
             $image = $path->getClientOriginalName();
             $path->move(public_path('uploads/partners'), $image);
             $partner->image = $image;            
         }

         $partner->save();
         
         return redirect()->route('partners.index')
         ->with('status', 'The partner was updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partners $partner)
    {
        if(Auth::user()->cannot('delete', $partner)){
            return redirect()->route('partners.index')
            ->with('status', 'you do not have permission to delete that post.');       
         }

         $partner->delete();

         return redirect()->route('partners.index')
         ->with('status', 'The partner was deleted.'); 
    }
}
