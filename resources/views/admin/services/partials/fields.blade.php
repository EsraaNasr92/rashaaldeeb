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
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title"
            name="title" value="{{ $model->title }}" />
</div>

<div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" class="form-control" id="slug"
            name="slug" value="{{ $model->slug }}" />
</div>

<div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" name="content" id="content" >{{ $model->content }}</textarea>
</div>


<div class="form-group">
    <label for="image">Image</label>
    <input type="file" placeholder="Image" name="image" id="image">
    @if($model->image != null)
        <img height="100" width=100 src="{{ asset('uploads/services/' . $model->image) }}">
    @else
        <img style="visibility:hidden"  id="prview" src=" {{ asset('uploads/services/' . $model->image) }} "  width=100 height=100 />     
    @endif
    
</div>

<div class="form-group">
    <input type="submit" class="btn btn-default" value="submit" /> 
</div>