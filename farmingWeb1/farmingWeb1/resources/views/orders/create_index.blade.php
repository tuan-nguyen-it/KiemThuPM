@extends('layouts.site')
@section('title', 'Orders')
@section('main')


<form action="{{route('order_store', ['id' => Auth::user()->id])}}" method="get" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="form-group">
                    <label for=""> Name </label>
                    <input type="text" class="form-control" value="{{Auth::user()->name}}" name="name" require placeholder="input name">
                    @error('name')
                    <small class="help-block">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""> Note </label>
                    <textarea name="note" class="form-control" placeholder="input note"></textarea>
                    @error('note')
                    <small class="help-block">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for=""> Email </label>
                    <input type="text" class="form-control" value="{{Auth::user()->email}}" name="email" require placeholder="input email">
                    @error('description')
                    <small class="help-block">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""> Phone </label>
                    <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}" require placeholder="input phone">
                    @error('description')
                    <small class="help-block">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="input address" value="{{Auth::user()->address}}" require>
                    @error('price')
                    <small class="help-block">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">SAVE DATA</button>
    </div>
        
</form>

@stop