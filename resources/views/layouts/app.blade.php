<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AdminPanel') }}</title>

    <!-- BEGIN: CSS Assets -->
        <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
    <!-- END: CSS Assets -->

    <!-- BEGIN: Script links -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sortable/0.9.13/jquery-sortable.js"></script>
    <!-- END: Script links -->

</head>
<body class="py-5">
        @guest
        @else
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    {{ config('app.name', 'Webmaco') }}
                </a>
                <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <div class="scrollable">
                <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
                <ul class="scrollable__content py-2">
                    <li>
                        <a href="javascript:;.html" class="menu menu--active">
                            <div class="menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="menu__title"> Dashboard <i data-lucide="chevron-down" class="menu__sub-icon transform rotate-180"></i> </div>
                        </a>
                    </li>
                    @can('manageUsers', App\Models\User::class)
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"> <i data-lucide="users"></i> </div>
                            <div class="menu__title"> Users <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-users-layout-1.html" class="menu">
                                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="menu__title"> List </div>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{ route ('menu.index') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="box"></i> </div>
                            <div class="menu__title">  Menu <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                        </a>
                    </li>
                    @endcan
                    <li class="menu__devider my-6"></li>
                    <li>
                        <a href="{{ route('banner.index') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="box"></i> </div>
                            <div class="menu__title">  Main Banner <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route ('gallery.index') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="file-text"></i> </div>
                            <div class="menu__title">logos</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"> <i data-lucide="users"></i> </div>
                            <div class="menu__title"> Pages <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('pages.index') }}" class="menu">
                                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="menu__title"> List </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pages.create') }}" class="menu">
                                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="menu__title"> New page </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"> <i data-lucide="users"></i> </div>
                            <div class="menu__title"> Blog <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('blog.index') }}" class="menu">
                                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="menu__title"> List </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('blog.create') }}" class="menu">
                                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="menu__title"> New post </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('category.index') }}" class="menu">
                                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="menu__title"> Categories list </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"> <i data-lucide="edit"></i> </div>
                            <div class="menu__title">
                            Portfolio 
                                <div class="menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('portfolio.index') }}" class="menu">
                                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="menu__title"> List </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('portfolio.create') }}" class="menu">
                                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="menu__title"> New project </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pcategory.index') }}" class="menu">
                                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="menu__title"> Categories list </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route ('gallery.index') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="file-text"></i> </div>
                            <div class="menu__title"> logos </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about.index') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> About section </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('middle.index') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Middle </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('slider.index') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Slider </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END: Mobile Menu -->
        <div class="flex mt-[4.7rem] md:mt-0">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <a href="" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="logo" class="w-6" src="{{asset('dist/images/logo.svg') }}">
                    <span class="hidden xl:block text-white text-lg ml-3"> Webmaco </span> 
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
                    <li>
                        <a href="/admin" class="side-menu {{ (request()->is('admin')) ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                Dashboard 
                            </div>
                        </a>
                    </li>
                    @can('manageUsers', App\Models\User::class)
                    <li>
                        <a href="javascript:;" class="side-menu {{ (request()->is('admin/users')) ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                            <div class="side-menu__title">
                                Users 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{route('users.index') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> List </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route ('menu.index') }}" class="side-menu {{ (request()->is('admin/menu')) ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                            <div class="side-menu__title"> Menu </div>
                        </a>
                    </li>
                    @endcan

                    <li class="side-nav__devider my-6"></li>
                    <li>
                        <a href="{{ route('banner.index') }}" class="side-menu {{ (request()->is('admin/banner')) ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                            <div class="side-menu__title"> Main Banner </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="side-menu {{ (request()->is('admin/pages')) ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-lucide="layout"></i> </div>
                            <div class="side-menu__title">
                                Pages 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('pages.index') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Lists </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pages.create') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> New page </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="side-menu {{ (request()->is('admin/blog')) ? 'side-menu--active' : '' }}"">
                            <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                                <div class="side-menu__title">
                                    Blog 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('blog.index') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Lists </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('blog.create') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> New post </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('category.index') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Categories list </div>
                                </a>
                            </li>
                            <li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="side-menu {{ (request()->is('admin/portfolio')) ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-lucide="edit"></i> </div>
                            <div class="side-menu__title">
                            Portfolio 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('portfolio.index') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> List </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('portfolio.create') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> New project </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pcategory.index') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Categories list </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route ('gallery.index') }}" class="side-menu {{ (request()->is('admin/gallery')) ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                            <div class="side-menu__title"> logos </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about.index') }}" class="side-menu {{ (request()->is('admin/about')) ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="side-menu__title">
                                About section 
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('middle.index') }}" class="side-menu {{ (request()->is('admin/middle')) ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="side-menu__title">
                                Middle section 
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('slider.index') }}" class="side-menu {{ (request()->is('admin/slider')) ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="side-menu__title">
                                About Slider
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Application</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                        @if(Auth::user()->image)
                            <img class="image rounded-circle" src="{{asset('/uploads/users/'.Auth::user()->image)}}" alt="profile_image">
                        @else{
                            <img alt="profile_image" class="rounded-full" src="{{ asset ('dist/images/profile-7.jpg') }}">
                        }
                        @endif
                        </div>
                        <div class="dropdown-menu w-56">
                            <ul class="dropdown-content bg-primary text-white">
                                <li class="p-2">
                                    <div class="font-medium"> {{ Auth::user()->name }}</div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider border-white/[0.08]">
                                </li>
                                <li>
                                    <a href="{{route ('changePasswordPost')}}" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                </li>
                                <li>
                                    <a href="{{route ('changePasswordPost')}}" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Change Password </a>
                                </li>
                                
                                <li>
                                    <hr class="dropdown-divider border-white/[0.08]">
                                </li>
                                <li>
                                    <a class="dropdown-item hover:bg-white/5" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> 
                                            {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                         @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                @endguest
                <!-- END: Top Bar -->
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 2xl:col-span-12">
                        <div class="col-span-12 2xl:col-span-12">
                            <!-- BEGIN: Dashboard content -->
                            <div class="col-span-12 lg:col-span-6 mt-8">   
                                    @yield('content')
                            </div>
                            <!-- END: Dashboard content -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Content -->
        </div>
        
        @yield('scripts')

        <!-- Scripts -->
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.ckeditor').ckeditor();
            });
        </script>
        <!-- Scripts -->
        <script src="{{ asset('dist/js/app.js') }}"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    </body>
</body>
</html>

