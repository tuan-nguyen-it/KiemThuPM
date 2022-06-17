@extends('layouts.admin')
@section('title', 'Add category')
@section('main')


<form action="{{route('category.update', $id->id)}}" method="POST" role="form">
    @csrf @method('PUT')
    <div class="form-group">
        <label for=""> Name </label>
        <input type="text" class="form-control" name="name" value="{{$id->name}}" placeholder="Input Name" require>
        @error('name')
        <small class="help-block">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        <lable for="">Status</lable>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="1" checked>Public
            </label>
            <lable>
                <input type="radio" name="status" value="0">Private
            </lable>
        </div>
        <div class="form-group">
            <label for="">Prioty</label>
            <input type="number" name="prioty" class="form-control" value="{{$id->prioty}}" require>
            @error('prioty')
            <small class="help-block">{{$message}}</small>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary me-1 mb-1" onClick="return confirm('Bạn xác nhận muốn cập nhật ?')">Cập Nhật</button>
    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
</form>

@stop