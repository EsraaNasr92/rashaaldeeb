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
                    id="title" name="title" value="{{ $model->title }}" placeholder="Banner title"/>
            </div>

            <div class="form-group">
                <input 
                    type="text" class="intro-x login__input form-control py-3 px-4 blockl mt-4" 
                    id="subtitle" name="subtitle" value="{{ $model->subtitle }}" placeholder="Banner subtitle"/>
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

        <div class="col-span-12 2xl:col-span-3">
            <div class="form-group">
                <label for="image">Upload image</label>
                <input type="file" placeholder="Image" name="image" id="image" class="mt-4">
                @if($model->image != null)
                    <img height="360" width=250 src="{{ asset('uploads/' . $model->image) }}">
                @else
                    <img style="visibility:hidden"  id="prview" src=" {{ asset('uploads/' . $model->image) }} "  width=360 height=250 />     
                @endif
                
            </div>
        </div>
</div>


<div class="form-group mt-5">
    <input type="submit" class="btn py-3 btn-primary w-full md:w-52" value="Submit" /> 
    <a 
        class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52" 
        href="{{route ('banner.index')}}"> Cancel </a>
</div>