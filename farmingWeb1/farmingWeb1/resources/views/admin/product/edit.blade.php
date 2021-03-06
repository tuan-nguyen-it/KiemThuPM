@extends('layouts.admin')
@section('title', 'Edit Product')
@section('main')

<form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for=""> Name </label>
                <input type="text" class="form-control" value = "{{$product->name}}" name="name" placeholder="input name">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Description </label>
                <textarea name="description" class="form-control" value = "{{$product->description}}" placeholder="input description"></textarea>
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
                    <option value="{{$cats->id}}"> {{$cats->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="text" class="form-control" value = "{{$product->price}}" name="price" placeholder="input price">
                @error('price')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Sale price </label>
                <input type="text" class="form-control" name="sale_price" value = "{{$product->sale_price}}" placeholder="input sale_price">
                @error('price')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Image </label>
                <input type="file" class="form-control" name="file_upload"  placeholder="input image">
                @error('ima')
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
                    <input type="number" class="form-control"  value = "{{$product->prioty}}" name="prioty">
                    @error('prioty')
                    <small class="help-block">{{$message}}</small>
                    @enderror
                </div>
            </div>

        </div>
    </div>
    <button type="submit" class="btn btn-primary me-1 mb-1" onClick="return confirm('B???n x??c nh???n mu???n c???p nh???t ?')">C???p Nh???t</button>
            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
</form>

@stop