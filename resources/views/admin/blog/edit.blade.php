@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-8">
        <h2 class="text-lg font-medium mr-auto">Edit Post</h2>
            <form action="{{ route('blog.update', ['blog' => $model->id]) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}

                @include('admin.blog.partials.fields')
            </form>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    @include('admin.blog.partials.scripts')
@endsection