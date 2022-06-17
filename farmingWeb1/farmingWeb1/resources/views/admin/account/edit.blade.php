@extends('layouts.admin')
@section('title', 'Edit category')
@section('main')


<form action="{{route('account.update', $id->id)}}" method="POST" role="form">
    @csrf @method('PUT')
    <legend>Đăng Ký</legend>
    <div class="row">
        <div class="col-md-9">

            <div class="form-group">
                <label for="">User Name</label>
                <input type="text" class="form-control" value="{{$id->name}}" name="name" placeholder="Input User" require>
            </div>

            <div class="form-group">
                <label for="">Address</label>
                <input type="text" class="form-control" value="{{$id->address}}" name="address" placeholder="Input Address" require>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="text" class="form-control" value="{{$id->password}}" name="password" placeholder="Input Password" require>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for=""> Gender </label>
                <div class="radio">
                    <label>
                        <input type="radio" name="gender" value="1" checked> Nam
                    </label>
                    <label>
                        <input type="radio" name="gender" value="0">Nữ
                        </lable>
                </div>
            </div>
            <div class="form-group">
                <label for=""> Role </label>
                <div class="radio">
                    <label>
                        <input type="radio" name="role" value="1" checked> 1
                    </label>
                    <label>
                        <input type="radio" name="role" value="0"> 0
                        </lable>
                </div>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" value="{{$id->email}}" name="email" placeholder="Input Email" require>
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" class="form-control" value="{{$id->phone}}" name="phone" placeholder="Input Phone" require>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary me-1 mb-1" onClick="return confirm('Bạn xác nhận muốn cập nhật tài khoản ?')">Cập Nhật</button>
    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
</form>
</form>

@stop