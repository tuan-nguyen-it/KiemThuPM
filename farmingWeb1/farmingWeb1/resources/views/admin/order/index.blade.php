@extends('layouts.admin')
@section('title', 'Orders')
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
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Note</th>
            <th>Update Time </th> 
            <th>Status</th>
            <th class = "text-right">Check</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $order)
        <tr>    
            <td>{{$order->id}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->phone}}</td>
            <td>{{$order->address}}</td>
            <td>{{$order->note}}</td>
            <td>{{$order->created_at->format('m-d-Y')}}</td>
            <td>
                @if($order->status == 0)
                    <span class = "badge badge-danger"> Private</span>
                @else
                <span class = "badge badge-success">Publish</span>
                @endif
            </td>
            <td><input type = "checkbox" ></td>
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