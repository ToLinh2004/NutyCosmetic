@extends('layouts.masterLayoutAdmin')
@section('titles')
    Banner
@endsection
@section('card')
<div>
    @section('title')
        <h1 class="text-center title">
            BANNERS
        </h1>
    @endsection
    @if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <a href="{{ route('admin.banners.add') }}">
        <div class="buttonAddBanner">
            <button type="submit" class="btn btn-success mx-3">
                Add Banner
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </a>
    <div class="tableUser mt-5">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Banner Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($banners))
                    @foreach ($banners as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->name }}</td>
                            <td><img src="{{asset($item->image)}}" style="width:100px;" alt="avatar"></td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{route('admin.banners.edit', ['id' => $item->id])}}" class="btn btn-warning btn-sm mx-3">Edit</a>
                                <a onclick="return confirm('Are you sure you want to delete?')" href="{{ route('admin.banners.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        
    </div>
</div>
@endsection