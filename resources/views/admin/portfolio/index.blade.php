@extends('layouts.app')

@section('content')

                <!-- END: Top Bar -->
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Project or portfolio Layout
                    </h2>

                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <a class="btn btn-primary shadow-md mr-2" href="{{ route('portfolio.create') }}">Add New Project</a>
                    </div>
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
                    @foreach($model as $portfolio)
                    <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
                        <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 px-5 py-4">
                            <div class="w-10 h-10 flex-none image-fit">
                                <img alt="" class="rounded-full" src="{{ asset ('dist/images/profile-6.jpg') }}">
                            </div>
                            <div class="ml-3 mr-auto">

                                <div class="flex text-slate-500 truncate text-xs mt-0.5"> 
                                    <a class="text-primary inline-block truncate" href="">{{ $portfolio->categoryp ? $portfolio->categoryp->name : 'Uncategorized' }}</a> 
                                </div>
                            </div>
                            <div class="dropdown ml-3">
                                <a href="javascript:;" class="dropdown-toggle w-5 h-5 text-slate-500" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-4 h-4"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="{{ route('portfolio.edit', ['portfolio' => $portfolio->id] ) }}" class="dropdown-item"> <i data-lucide="edit-2" class="w-4 h-4 mr-2"></i> Edit Post </a>
                                        </li>
                                        <li>
                                            <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> 
                                            <form action="{{ route('portfolio.destroy',$portfolio->id) }}" method="POST" >
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</button>
                                            </form>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="h-40 2xl:h-56 image-fit">
                            @if($portfolio->image != null)
                                <img alt="" class="rounded-md" src="{{ asset('uploads/portfolio/' . $portfolio->image) }}">
                            @else
                                <img class="rounded-md" src="{{ asset ('dist/images/preview-1.jpg') }}">   
                            @endif
                            </div>
                            <a href="{{ route('portfolio.edit', ['portfolio' => $portfolio->id] ) }}" class="block font-medium text-base mt-5">{{ $portfolio -> title}}</a> 
                            
                            {{-- <div class="text-slate-600 dark:text-slate-500 mt-2">{{ $post -> excerpt }}</div>  --}}
                        </div>
                    </div>
                    @endforeach
                    <!-- END: project Layout -->
                    <!-- BEGIN: Pagination -->
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                        <nav class="w-full sm:w-auto sm:mr-auto">
                            {{ $model->links('pagination::bootstrap-4') }}
                        </nav>
                        <select class="w-20 form-select box mt-3 sm:mt-0">
                            <option>10</option>
                            <option>25</option>
                            <option>35</option>
                            <option>50</option>
                        </select>
                    </div>
                    <!-- END: Pagination -->
                </div>

<!--
<div class="container">
   <a class="btn btn-primary" href="{{ route('portfolio.create') }}" >Create new project</a>

    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('status'))
                <div class="alert alert-info" >
                    {{ session('status') }}
                </div>
            @endif
            <table class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>slug</th>
                            <th>content</th>
                            <th>Category</th>
                            <th>Options</th>
                        </tr>
                    </thead>

                    @foreach($model as $portfolio)
                    <tr>
                        <td> {{ $portfolio -> title}}</td>
                        <td> {{ $portfolio -> slug}}</td>
                        <td> {{ $portfolio -> content}}</td>
                        <td><td><p class="text-muted">{{ $portfolio->categoryp ? $portfolio->categoryp->name : 'Uncategorized' }}</p></td></td>
                        <td> 
                            <a href="{{ route('portfolio.edit', ['portfolio' => $portfolio->id] ) }}">Edit</a> | 
                            <form action="{{ route('portfolio.destroy',$portfolio->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</button>
                            </form>
                    </tr>
                       
                    @endforeach

                </table>
            </table>

            {{ $model->links('pagination::bootstrap-4') }}
        </div>

    </div>
</div> -->
@endsection
