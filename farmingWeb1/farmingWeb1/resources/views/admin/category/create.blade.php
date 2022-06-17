@extends('layouts.admin')
@section('title', 'Add category')
@section('main')


<form action="{{route('category.store')}}" method="POST" role="form">
    @csrf
    <div class="md-col-9">
        <div class="form-group">
            <label for=""> Name </label>
            <input type="text" class="form-control" name="name" placeholder="Input Name" require>
            @error('name')
            <small class="help-block">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for=""> Status </label>
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
                <input type="number" class="form-control" name="prioty" require>
                @error('prioty')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary me-1 mb-1" onClick="return confirm('Bạn xác nhận muốn thêm mới  ?')">Thêm mới</button>
    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
</form>

@stop