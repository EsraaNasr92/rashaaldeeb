@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
        
            <div class="col-md-8">
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Create new page</h2>

                <form action="{{ route('pages.store') }}" method="post">
                    @include('admin.pages.partials.fields')
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.pages.partials.scripts')
@endsection
