@extends('layouts.admin')
@section('title', 'Edit blog')
@section('main')

<form action="{{route('blog.update', $blog->id)}}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for=""> Name </label>
                <input type="text" class="form-control" value = "{{$blog->name}}" name="name" placeholder="input name" require>
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Description </label>
                <textarea name="description" class="form-control" require value = "{{$blog->description}}" placeholder="input description"></textarea>
                @error('description')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Sumary</label>
                <input type="text" class="form-control" value = "{{$blog->sumary}}" require name="price" placeholder="input sumary">
                @error('price')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Image </label>
                <input type="file" class="form-control" name="file_upload"  placeholder="input image">
                @error('image')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Status </label>
                <div class="radio">
                    <label>
                        <input type="radio" name="status" value="1" checked> Public
                    </label>
                    <label>
                        <input type="radio" name="status" value="0">Private
                    </lable>
                </div>
            </div>

        </div>
    </div>
    <button type="submit" class="btn btn-primary me-1 mb-1" onClick="return confirm('Bạn xác nhận muốn cập nhật ?')">Cập Nhật</button>
            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
</form>

@stop