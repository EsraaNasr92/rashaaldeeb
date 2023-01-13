@extends('layouts.app')

@section('content')


                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Gallery
                    </h2>
                </div>
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <form action="{{ url('admin/slider') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        @if(!$errors->isEmpty())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row">
                            <div class="mt-3">
                                <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                    <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                        <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span class="text-primary mr-1">Upload a file</span> or drag and drop 
                                        <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" name="image" id="image">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <br/>
                                <button type="submit" class="btn btn-primary shadow-md mr-2">Upload</button>
                            </div>
                        </div>
                    </form> <!-- End upload form -->
                </div>



                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    @if(session('status'))
                        <div class="alert alert-info" >
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="intro-y grid grid-cols-12 gap-6 mt-5">
                    <!-- BEGIN: project Layout -->
                    @if($images->count())
                        @foreach($images as $image)
                            <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
                                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 px-5 py-4">
                                    <div class="dropdown ml-3">
                                        <a href="javascript:;" class="dropdown-toggle w-5 h-5 text-slate-500" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-4 h-4"></i> </a>
                                        <div class="dropdown-menu w-40">
                                            <ul class="dropdown-content">
                                                <li>
                                                
                                                    <form action="{{ route('slider.destroy',$image->id) }}" method="POST" >
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="" onclick="return confirm('Sure Want Delete?')">Delete</button>
                                                    </form>
                                                    
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <div class="h-40 2xl:h-56 image-fit">
                                        <img alt="" class="rounded-md" src="{{ asset('uploads/' . $image->image) }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
@endsection