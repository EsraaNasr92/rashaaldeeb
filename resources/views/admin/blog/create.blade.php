@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-8">
            <h2 class="text-lg font-medium mr-auto">Add new post</h2>
            <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                @include('admin.blog.partials.fields')
            </form>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    @include('admin.blog.partials.scripts')
@endsection
