@extends('layouts.admin')
@section('title', 'banners')
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
            <th>Image</th>
            <th>link</th>
            <th>Status</th>
            <th>Update Time </th>
            <th class ="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $banner)
        <tr>    
            <td>{{$banner->id}}</td>
            <td>{{$banner->name}}</td>


            <td><img src="{{url('public/Uploads')}}/{{$banner->image}}" width="60"></td>
            <td>{{$banner->link}}</td>
            <td>
                @if($banner->status == 0)
                    <span class = "badge badge-danger"> Private</span>
                @else
                <span class = "badge badge-success">Publish</span>
                @endif
            </td>
            <td>{{$banner->created_at->format('m-d-Y')}}</td>
            <td class ="text-right">
                    <a href="{{route('banner.edit', $banner->id)}}" class="btn btn-sm btn-success">
                    <i class ="fas fa-edit"></i></a>
                    <a href="{{route('banner.destroy', $banner->id)}}" class="btn btn-sm btn-danger btndelete" >
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