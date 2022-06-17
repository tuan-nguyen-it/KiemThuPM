@extends('layouts.admin')
@section('title', 'Account')
@section('main')
<form action="" class="form-inline" >
    <div class="form-group">
        <input class="form-control" name="key" placeholder="Search">
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-search"></i>
    </button>
</form>
<hr>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Password</th>
            <th>Role</th>
            <th class ="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $acc)
        <tr>    
            <td>{{$acc->id}}</td>
            <td>{{$acc->name}}</td>
            <td>{{$acc->password}}</td>
            <td>{{$acc->role}}
            </td>
            <td class ="text-right">
                    <a href="{{route('account.edit', $acc->id)}}" class="btn btn-sm btn-success">
                    <i class ="fas fa-edit"></i></a>
                    <a href="{{route('account.destroy', $acc->id)}}" class="btn btn-sm btn-danger btndelete" >
                    <i class ="fas fa-trash"></i>
                    </a>

             </td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
<form action="" method="POST" id="form-delete">   
    @csrf 
    @method('DELETE')
</form>
<div class="">
    {{$data->appends(request()->all())->links()}}
</div>
@stop

@section('js')
<script>
    $('.btndelete').click(function(ev){
        ev.preventDefault();
        var _href = $(this).attr('href');
        $('form#form-delete').attr('action', _href);
        if(confirm('Ban Co Muon Xoa Khong')){
            $('form#form-delete').submit();
        }
    })
</script>
@stop