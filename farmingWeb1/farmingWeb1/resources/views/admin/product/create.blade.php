@extends('layouts.admin')
@section('title', 'Add Product')
@section('main')


<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for=""> Name </label>
                <input type="text" class="form-control" name="name" placeholder="input name">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Description </label>
                <textarea name="description" class="form-control" placeholder="input description"></textarea>
                @error('description')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for=""> Category </label>
                
                <select name="category_id" class="form-control">
                    <option value="">--SELECT ONE--</option>
                    @foreach($cat as $cats)
                        @if($cats->status == 1)
                        <option value="{{$cats->id}}"> {{$cats->name}}</option>
                        @endif
                    @endforeach
                </select>
                
                @error('price')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="text" class="form-control" name="price" placeholder="input price">
                @error('price')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Sale price </label>
                <input type="text" class="form-control" name="sale_price" placeholder="input sale_price">
                @error('sale_price')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Image </label>
                <input type="file" class="form-control" name="file_upload" placeholder="input image">
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
                    <label for=""> Số Lượng </label>
                    <input type="number" class="form-control" name="soluong">
                    @error('soluong')
                    <small class="help-block">{{$message}}</small>
                    @enderror
                </div>
            </div>

        </div>
    </div>
    <button type="submit" class="btn btn-primary me-1 mb-1" onClick="return confirm('Bạn xác nhận muốn thêm mới sản phẩm ?')">Thêm mới</button>
    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
</form>

@stop