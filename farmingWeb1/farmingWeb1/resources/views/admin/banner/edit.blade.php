@extends('layouts.admin')
@section('title', 'Add banner')
@section('main')


<form action="{{route('banner.update', $banner->id)}}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for=""> Name </label>
                <input type="text" class="form-control" name="name" value ="{{$banner->name}}" placeholder="input name" require>
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Description </label>
                <textarea name="description"  value ="{{$banner->description}}" class="form-control" placeholder="input description"></textarea>
                @error('description')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for=""> Image </label>
                <input type="file" class="form-control" name="file_upload" placeholder="input image">
                @error('image')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Link </label>
                <input type="text" class="form-control" value ="{{$banner->link}}"  name="link" placeholder="input image">
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
                <div class="form-group">
                    <label for=""> Prioty </label>
                    <input type="number" value ="{{$banner->prioty}}" class="form-control" name="prioty" require>
                    @error('prioty')
                    <small class="help-block">{{$message}}</small>
                    @enderror
                </div>
            </div>

        </div>
    </div>
    <button type="submit" class="btn btn-primary me-1 mb-1" onClick="return confirm('Bạn xác nhận muốn cập nhật ?')">Cập Nhật</button>
    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
</form>

@stop