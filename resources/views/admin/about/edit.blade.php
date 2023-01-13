@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Edit about</h2>

            <form action="{{ route('about.update', ['about' => $model->id]) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}

                @include('admin.about.partials.fields')
            </form>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    @include('admin.about.partials.scripts')
@endsection