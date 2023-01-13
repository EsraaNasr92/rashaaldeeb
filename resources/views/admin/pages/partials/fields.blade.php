{!! csrf_field() !!}

@if(!$errors->isEmpty())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif


    <div class="form-group">
        <input type="text" class="intro-x form-control py-3 px-4 blockl mt-4" id="title"
                name="title" value="{{ $model->title }}" placeholder="Page title"/>
    </div>

    <div class="form-group">
        <input type="text" class="intro-x form-control py-3 px-4 blockl mt-4" id="slug"
                name="slug" value="{{ $model->slug }}" placeholder="Page slug will generate automatic"/> 
    </div>

    <div class="form-group mt-5">
        <textarea class="ckeditor intro-x form-control py-3 px-4 blockl mt-5" name="content" id="content" >{{ $model->content }}</textarea>
    </div>

    <div class="form-group mt-5">
        <input type="submit" class="btn py-3 btn-primary w-full md:w-52" value="Submit" /> 
        <a 
        class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52" 
        href="{{route ('pages.index')}}"> Cancel </a>
    </div>

