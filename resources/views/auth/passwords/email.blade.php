@extends('layouts.app')



@extends('layouts.app')

<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="{{asset('dist/images/logo.svg')}}">
                    <span class="text-white text-lg ml-3"> Webmaco </span> 
                </a>
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{asset('dist/images/illustration.svg')}}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        A few more clicks to 
                        <br>
                        sign in to your account.
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Manage your website in one place</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                       Reset your password
                    </h2>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage your website in one place</div>
                        <div class="intro-x mt-8"> 
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <input 
                                    id="email" type="email" placeholder="Email"
                                    class="intro-x login__input form-control py-3 px-4 blockl @error('email') is-invalid @enderror" 
                                    name="email" value="{{ old('email') }}" 
                                    required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                        <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-40 xl:mr-3 align-top">
                                            {{ __('Send Password Reset Link') }}
                                        </button>

                                    </div>
                            </form>
                        </div>   
                    </div>  
                </div>   
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
</body>

