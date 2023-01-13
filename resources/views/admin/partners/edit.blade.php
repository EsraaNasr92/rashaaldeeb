@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-8">
            <h1>Edit partners</h1>

            <form action="{{ route('partners.update', ['partner' => $model->id]) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}

                @include('admin.partners.partials.fields')
            </form>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    @include('admin.partners.partials.scripts')
@endsection