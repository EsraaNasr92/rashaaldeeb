@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-8">
        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Edit page</h2>

            <form action="{{ route('pages.update', ['page' => $model->id]) }}" method="post">
                {{ method_field('PUT') }}

                @include('admin.pages.partials.fields')
            </form>
        </div>
    </div>
</div>
@endsection
