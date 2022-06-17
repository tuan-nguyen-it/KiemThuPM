@extends('layouts.admin')
@section('title', 'Product')
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
            <th>Số Lượng</th>
            <th>Price / Sale</th>
            <th>Status</th>
            <th>Create Date</th>
            <th>Image</th>
            <th class ="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $product)
        <tr>    
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->soluong}}</td>
            <td>{{$product->price}}<span class = "badge badge-success">{{$product->sale_price}}</span>
            </td>
            <td>
                @if($product->status == 0)
                    <span class = "badge badge-danger"> Private</span>
                @else
                <span class = "badge badge-success">Publish</span>
                @endif
            </td>
            <td>{{$product->created_at->format('m-d-Y')}}</td>
            <td>
                <img src="{{url('public/Uploads')}}/{{$product->image}}" width="60">
            </td>
            <td class ="text-right">
                    <a href="{{route('product.edit', $product->id)}}" class="btn btn-sm btn-success">
                    <i class ="fas fa-edit"></i></a>
                    <a href="{{route('product.destroy', $product->id)}}" class="btn btn-sm btn-danger btndelete" >
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