@extends('layouts.app')

@section('content')


                <!-- END: Top Bar -->
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Blog Layout
                    </h2>
                    @if(session('status'))
                        <div class="alert alert-info" >
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <a class="btn btn-primary shadow-md mr-2" href="{{ route('blog.create') }}">Add New Post</a>
                        <div class="dropdown ml-auto sm:ml-0">
                            <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                                <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                            </button>
                            <div class="dropdown-menu w-40">
                                <ul class="dropdown-content">
                                    <li>
                                        <a href="" class="dropdown-item"> <i data-lucide="share-2" class="w-4 h-4 mr-2"></i> Share Post </a>
                                    </li>
                                    <li>
                                        <a href="" class="dropdown-item"> <i data-lucide="download" class="w-4 h-4 mr-2"></i> Download Post </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="intro-y grid grid-cols-12 gap-6 mt-5">
                    <!-- BEGIN: Blog Layout -->
                    @foreach($model as $post)
                    <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
                        <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 px-5 py-4">
                            <div class="w-10 h-10 flex-none image-fit">
                                <img alt="" class="rounded-full" src="{{ asset ('dist/images/profile-6.jpg') }}">
                            </div>
                            <div class="ml-3 mr-auto">
                                <div class="flex text-slate-500 truncate text-xs mt-0.5"> 
                                    <a class="text-primary inline-block truncate" href="">{{ $post->category ? $post->category->name : 'Uncategorized' }}</a> 
                                    <span class="mx-1">•</span> {{ $post->published_at ?  $post->published_at : 'Set time please'}} </div>
                            </div>
                            <div class="dropdown ml-3">
                                <a href="javascript:;" class="dropdown-toggle w-5 h-5 text-slate-500" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-4 h-4"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="{{ route('blog.edit', ['blog' => $post->id] ) }}" class="dropdown-item"> <i data-lucide="edit-2" class="w-4 h-4 mr-2"></i> Edit Post </a>
                                        </li>
                                        <li>
                                            <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> 
                                                <form action="{{ route('blog.destroy',$post->id) }}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" onclick="return confirm('Sure Want Delete?')">Delete</button>
                                                </form>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="h-40 2xl:h-56 image-fit">
                            @if($post->image != null)
                                <img alt="" class="rounded-md" src="{{ asset('uploads/posts/' . $post->image) }}">
                            @else
                                <img class="rounded-md" src="{{ asset ('dist/images/preview-1.jpg') }}">   
                            @endif
                            </div>
                            <a href="{{ route('blog.edit', ['blog' => $post->id] ) }}" class="block font-medium text-base mt-5">{{ $post -> title}}</a> 
                            <div class="text-slate-600 dark:text-slate-500 mt-2">{{ $post -> excerpt }}</div>
                        </div>
                    </div>
                    @endforeach
                    <!-- END: Blog Layout -->
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
   <a class="btn btn-primary" href="{{ route('blog.create') }}" >Create new post</a>

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
                            <th>Category</th>
                            <th>Slug</th>
                            <th>Published</th>
                            <th>Options</th>
                        </tr>
                    </thead>

                    @foreach($model as $post)
                    <tr>
                        <td> {{ $post -> title}}</td>
                        <td><p class="text-muted">{{ $post->category ? $post->category->name : 'Uncategorized' }}</p></td>
                        <td> {{ $post -> slug}}</td>
                        <td> {{ $post -> published_at }}</td>
                        <td> 
                            <a href="{{ route('blog.edit', ['blog' => $post->id] ) }}">Edit</a> | 
                            <form action="{{ route('blog.destroy',$post->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                       
                    @endforeach

                </table>
            </table>

            {{ $model->links('pagination::bootstrap-4') }}
        </div>

        
    </div>
</div>-->
@endsection
