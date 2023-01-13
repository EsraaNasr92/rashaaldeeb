@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-8">
            <h1>Create service</h1>

            <form action="{{ route('services.store') }}" method="post" enctype="multipart/form-data">
                @include('admin.services.partials.fields')
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('admin.services.partials.scripts')
@endsection
