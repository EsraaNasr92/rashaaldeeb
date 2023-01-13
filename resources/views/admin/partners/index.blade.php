@extends('layouts.app')

@section('content')


                <!-- END: Top Bar -->
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Partner Layout
                    </h2>
                    @if(session('status'))
                        <div class="alert alert-info" >
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <a class="btn btn-primary shadow-md mr-2" href="{{ route('partners.create') }}">Add New Partner</a>
                    </div>
                </div>
                <div class="intro-y grid grid-cols-12 gap-6 mt-5">
                    <!-- BEGIN: project Layout -->
                    @foreach($model as $partner)
                    <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
                        <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 px-5 py-4">
                            <div class="w-10 h-10 flex-none image-fit">
                                <img alt="" class="rounded-full" src="{{ asset ('dist/images/profile-6.jpg') }}">
                            </div>
                            <div class="ml-3 mr-auto">
                                <a href="" class="font-medium">By: Keanu Reeves</a> 
                            </div>
                            <div class="dropdown ml-3">
                                <a href="javascript:;" class="dropdown-toggle w-5 h-5 text-slate-500" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-4 h-4"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="{{ route('partners.edit', ['partner' => $partner->id] ) }}" class="dropdown-item"> <i data-lucide="edit-2" class="w-4 h-4 mr-2"></i> Edit Partner </a>
                                        </li>
                                        <li>
                                            <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> 
                                            <form action="{{ route('partners.destroy',$partner->id) }}" method="POST" >
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="" onclick="return confirm('Sure Want Delete?')">Delete</button>
                                            </form>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="h-40 2xl:h-56 image-fit">
                            @if($partner->image != null)
                                <img alt="" class="rounded-md" src="{{ asset('uploads/partners/' . $partner->image) }}">
                            @else
                                <img class="rounded-md" src="{{ asset ('dist/images/preview-1.jpg') }}">   
                            @endif
                            </div>
                            <a href="{{ route('partners.edit', ['partner' => $partner->id] ) }}" class="block font-medium text-base mt-5">{{ $partner -> title}}</a> 
                            
                            {{-- <div class="text-slate-600 dark:text-slate-500 mt-2">{{ $post -> excerpt }}</div>  --}}
                        </div>
                        <div class="flex items-center px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400">
                            <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full border border-slate-300 dark:border-darkmode-400 dark:bg-darkmode-300 dark:text-slate-300 text-slate-500 mr-2 tooltip" title="Bookmark"> <i data-lucide="bookmark" class="w-3 h-3"></i> </a>
                            <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full text-primary bg-primary/10 dark:bg-darkmode-300 dark:text-slate-300 ml-auto tooltip" title="Share"> <i data-lucide="share-2" class="w-3 h-3"></i> </a>                        </div>
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
   <a class="btn btn-primary" href="{{ route('partners.create') }}" >Create new partner</a>

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
                            <th>Options</th>
                        </tr>
                    </thead>

                    @foreach($model as $partner)
                    <tr>
                        <td> {{ $partner -> title}}</td>
                        <td> {{ $partner -> slug}}</td>
                        <td> {{ $partner -> content}}</td>
                        <td> 
                            <a href="{{ route('partners.edit', ['partner' => $partner->id] ) }}">Edit</a> | 
                            <form action="{{ route('partners.destroy',$partner->id) }}" method="POST" >
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
</div>-->
@endsection
