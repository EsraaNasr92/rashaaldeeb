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

<div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="form-group">
                <input 
                    type="text" class="intro-x login__input form-control py-3 px-4 blockl mt-4" 
                    id="title" name="title" value="{{ $model->title }}" placeholder="About title"/>
            </div>

            <div class="form-group mt-4">
                <label for="text_left">Left text</label>
                <textarea 
                    type="text" class="ckeditor form-control" 
                    id="text_left" name="text_left" value="{{ $model->text_left }}" 
                    placeholder="Right Text" >{{ $model->text_left }}</textarea>
            </div>

            <div class="form-group mt-4">
                <label for="left_text">Right text</label>
                <textarea 
                    type="text" class="ckeditor form-control mt-4" 
                    id="text_right" name="text_right" value="{{ $model->text_right }}" 
                    placeholder="Right Text" >{{ $model->text_right }}</textarea>
            </div>

            <div class="form-group">
                <input 
                    type="text" class="intro-x login__input form-control py-3 px-4 blockl mt-4" 
                    id="btn_title" name="btn_title" value="{{ $model->btn_title }}" placeholder="Button title"/> 
            </div>

            <div class="form-group">
                <input 
                    type="text" class="intro-x login__input form-control py-3 px-4 blockl mt-4" 
                    id="btn_url" name="btn_url" value="{{ $model->btn_url }}" placeholder="Button link"/> 
            </div>

        </div>

</div>


<div class="form-group mt-5">
    <input type="submit" class="btn py-3 btn-primary w-full md:w-52" value="Submit" /> 
    <a 
        class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52" 
        href="{{route ('about.index')}}"> Cancel </a>
</div>