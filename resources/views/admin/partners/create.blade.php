@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-8">
            <h1>Create new partner</h1>

            <form action="{{ route('partners.store') }}" method="post" enctype="multipart/form-data">
                @include('admin.partners.partials.fields')
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('admin.partners.partials.scripts')
@endsection
