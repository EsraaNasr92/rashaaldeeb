@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Edit middle</h2>

            <form action="{{ route('middle.update', ['middle' => $model->id]) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}

                @include('admin.middle.partials.fields')
            </form>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    @include('admin.middle.partials.scripts')
@endsection