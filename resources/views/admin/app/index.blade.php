@extends('layouts.app')

@section('content')

<!-- BEGIN: Website settings -->
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Website settings
   </h2>
</div>
 <!-- END: Website settings -->

<!-- BEGIN: Website settings layout -->
<div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
    <!-- BEGIN: Website settings change password -->
    <div class="intro-y col-span-12 lg:col-span-8">
        <div class="intro-y col-span-12 lg:col-span-8">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('app.store') }}">
            {{ csrf_field() }}

            <div class="form-group">
            
                <div class="col-md-6">
                    <input 
                        
                        placeholder="Site name" 
                        id="site_name" 
                        type="text" 
                        class="intro-x form-control py-3 px-4 blockl mt-4" 
                        name="site_name" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6">
                    <input 
                        placeholder="Site email" 
                        id="email" 
                        type="text" 
                        class="intro-x form-control py-3 px-4 blockl mt-4" 
                        name="email" required>                
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6">
                    <input 
                        placeholder="Site phone" 
                        id="phone" 
                        type="tel" 
                        class="intro-x form-control py-3 px-4 blockl mt-4" 
                        name="phone" required>                
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6">
                    <input 
                        placeholder="Copyright" 
                        id="copyright" 
                        type="text" 
                        class="intro-x form-control py-3 px-4 blockl mt-4" 
                        name="copyright" required>                
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6">
                    <input 
                        placeholder="Copyright by link" 
                        id="copyrightby" 
                        type="tel" 
                        class="intro-x form-control py-3 px-4 blockl mt-4" 
                        name="copyrightby" required>                
                </div>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-4">
                    Save Settings
                </button>
            </div>
        </form>
    </div>
    <!-- END: profile settings layout -->

    <!-- BEGIN: profile settings change image -->
    <div class="col-span-12 lg:col-span-4">
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <h2>Upload Logo and favicon</h2>
        </div>   
        <div class="intro-y col-span-12 lg:col-span-8">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
        </div>

        <form action="{{ route('app.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                <div class="mt-5">
                    <div class="mt-3">
                        <label class="form-label">Upload Logo</label>
                        <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                            <div class="flex flex-wrap px-4">
                            {{-- 
                                @if($settings->image != null)
                                    <img height="100" width=100 src="{{ asset('uploads/users/' .$settings->image) }}">
                                @else
                                    <img style="visibility:hidden"  id="prview" src=" {{ asset('uploads/users/' .$settings->image) }} "  width=100 height=100 />     
                                @endif
                            --}}
                            </div>
                             <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                 <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span class="text-primary mr-1">Upload a file</span> or drag and drop 
                                <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" name="image" id="image">
                            </div>

                            <input type="submit" value="Upload">
                        </div>
                    </div>
                </div>
            </div><!-- END: change logo -->

            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                <div class="mt-5">
                    <div class="mt-3">
                        <label class="form-label">Upload favicon</label>
                        <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                            <div class="flex flex-wrap px-4">
                            {{-- 
                                @if($settings->image != null)
                                    <img height="100" width=100 src="{{ asset('uploads/users/' .$settings->image) }}">
                                @else
                                    <img style="visibility:hidden"  id="prview" src=" {{ asset('uploads/users/' .$settings->image) }} "  width=100 height=100 />     
                                @endif
                            --}}
                            </div>
                             <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                 <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span class="text-primary mr-1">Upload a file</span> or drag and drop 
                                <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" name="favicon" id="favicon">
                            </div>

                            <input type="submit" value="Upload">
                        </div>
                    </div>
                </div>
            </div><!-- END: change favicon -->

        </form>
    </div>
    <!-- END: Website settings change image -->
    
</div>
 <!-- END: Website settings layout -->

@endsection

@section('scripts')
    @include('admin.app.partials.scripts')
@endsection
