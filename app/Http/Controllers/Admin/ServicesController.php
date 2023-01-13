<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;

use Illuminate\Http\Request;
use App\Http\Requests\StoreServicesRequest;
use App\Http\Requests\UpdateServicesRequest;

use Illuminate\Support\Facades\File;

use Auth;

class ServicesController extends Controller
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
            $service = Services::paginate(5);
        }else{
            $services = Auth::user()->paginate(5);
        }
        
        return view('admin.services.index', ['model' => $service]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create')->with('model' , new Services());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServicesRequest $request)
    {
        $services = Auth::user()->services()->save(new Services  
        ($request->only(['title', 'slug', 'content', 'image'])
        ));

        $path = $request->file('image');
        $image = $path->getClientOriginalName();
        $path->move(public_path('uploads/services'), $image);
        $services->image = $image;   
        $services->save();

        return redirect()->route('services.index')     
        ->with('status', 'The service has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $service)
    {
        return view('admin.services.edit')->with('model', $service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Services $service)
    {
        if(Auth::user()->cannot('update', $service)){
            return redirect()->route('services.index')
            ->with('status', 'you do not have permission to edit that service.');       
         }


        $service->fill($request->only(['title', 'slug',
         'content']))->save();

         if ($request->hasFile('image'))
         {
             $path = 'uploads/services/'.$service->image;
             if (File::exists($path))
             {
                 File::delete($path);
             }
     
             $path = $request->file('image');
             $image = $path->getClientOriginalName();
             $path->move(public_path('uploads/services'), $image);
             $service->image = $image;  
             $service->save();
         }

         return redirect()->route('services.index')
         ->with('status', 'The service was updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $service)
    {
        if(Auth::user()->cannot('delete', $service)){
            return redirect()->route('services.index')
            ->with('status', 'you do not have permission to delete that post.');       
         }

         $service->delete();

         return redirect()->route('services.index')
         ->with('status', 'The service was deleted.'); 
    }
}
