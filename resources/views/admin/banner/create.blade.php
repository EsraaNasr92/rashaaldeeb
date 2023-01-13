@extends('layouts.app')

@section('content')   
    <div class="col-md-8">
        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Create banner</h2>

        <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
            @include('admin.banner.partials.fields')
        </form>
    </div>
@endsection

@section('scripts')
    @include('admin.banner.partials.scripts')
@endsection
