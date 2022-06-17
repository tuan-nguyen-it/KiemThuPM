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
            <th>Order ID</th>
            <th>Product ID</th>
            <th>Quantity</th>
            <th>Price</th>
            <th class ="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $order_detail)
        <tr>    
            <td>{{$order_detail->order_id}}</td>
            <td>{{$order_detail->product_id}}</td>
            <td>{{$order_detail->quantity}}</td>
            <td>{{$order_detail->price}}</td>
            <td class ="text-right">
                    <a href="{{route('remove_detail', ['order_id' => $order_detail->order_id, 'product_id' => $order_detail->product_id])}}" class="btn btn-sm btn-danger btndelete" >
                    <i class ="fas fa-trash"></i>
                    </a>
             </td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
<form action="" method="delete" id="form-delete">   
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