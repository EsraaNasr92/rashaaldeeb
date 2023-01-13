@extends('layouts.app')

@section('content')

<!-- BEGIN: profile settings -->
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Profile settings
   </h2>
</div>
 <!-- END: profile settings -->

<!-- BEGIN: profile settings layout -->
<div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
    <!-- BEGIN: profile settings change password -->
    <div class="intro-y col-span-12 lg:col-span-8">
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <h2>Change password</h2>
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
        <form class="form-horizontal" method="POST" action="{{ route('changePasswordPost') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
            
                <div class="col-md-6">
                    <input placeholder="Current Password" id="current-password" type="password" class="intro-x form-control py-3 px-4 blockl mt-4" name="current-password" required>

                    @if ($errors->has('current-password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('current-password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                <div class="col-md-6">
                    <input placeholder="New Password" id="new-password" type="password" class="intro-x form-control py-3 px-4 blockl mt-4" name="new-password" required>

                    @if ($errors->has('new-password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('new-password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6">
                    <input placeholder="Confirm New Password" id="new-password-confirm" type="password" class="intro-x form-control py-3 px-4 blockl mt-4" name="new-password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-4">
                    Change Password
                </button>
            </div>
        </form>
    </div>
    <!-- END: profile settings layout -->

    <!-- BEGIN: profile settings change image -->
    <div class="col-span-12 lg:col-span-4">
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <h2>Upload Image or change it</h2>
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

        <form action="{{route('changePasswordGet')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                <div class="mt-5">
                    <div class="mt-3">
                        <label class="form-label">Upload Image</label>
                        <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                            <div class="flex flex-wrap px-4">

                                @if(Auth::user()->image != null)
                                    <img height="100" width=100 src="{{ asset('uploads/users/' .Auth::user()->image) }}">
                                @else
                                    <img style="visibility:hidden"  id="prview" src=" {{ asset('uploads/users/' .Auth::user()->image) }} "  width=100 height=100 />     
                                @endif

                            </div>
                             <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                 <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span class="text-primary mr-1">Upload a file</span> or drag and drop 
                                <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" name="image" id="image">
                            </div>

                            <input type="submit" value="Upload" class="btn btn-primary mt-4">
                        </div>
                    </div>
                </div>
            </div>


            <!--<input type="file" name="image">
            <input type="submit" value="Upload">-->

        </form>
    </div>
    <!-- END: profile settings change image -->
    
</div>
 <!-- END: profile settings layout -->

<!--
<div class="container">
    <div class="row">

        <div class="col-md-10 offset-2">
            <div class="panel panel-default">
                <h2>Change password</h2>

                <div class="panel-body">
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
                    <form class="form-horizontal" method="POST" action="{{ route('changePasswordPost') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">Current Password</label>

                            <div class="col-md-6">
                                <input id="current-password" type="password" class="form-control" name="current-password" required>

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">New Password</label>

                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection

@section('scripts')
    @include('admin.settings.partials.scripts')
@endsection