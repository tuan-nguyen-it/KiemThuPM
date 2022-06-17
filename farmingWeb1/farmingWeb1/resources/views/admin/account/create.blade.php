@extends('layouts.admin')
@section('title', 'Add account')
@section('main')


<div class="container">
        <form action="{{route('account.store')}}" method="POST" role="form">
            @csrf
            <legend>Đăng Ký</legend>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="">User Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Input User" require>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Input Address" require>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Input Password" require>
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="text" class="form-control" placeholder="Confirm Password" require>
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
                                <input type="radio" name="role" value="0"> 2
                            </lable>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Input Email" require>
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Input Phone" require>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary me-1 mb-1" onClick="return confirm('Bạn xác nhận muốn đăng ký tài khoản ?')">Đăng Ký</button>
            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
        </form>
    </div>
@stop