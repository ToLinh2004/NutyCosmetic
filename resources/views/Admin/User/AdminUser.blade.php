@extends('layouts.masterLayoutAdmin')
@section('titles')
    User
@endsection
@section('card')
<div>
    @section('title')
        <h1 class="text-center title">
            USERS
        </h1>
    @endsection
    @if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <div class="tableUser mt-5">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Phone</th>
                    <th style="width:15%" scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($userList))
                    @foreach ($userList as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->user_name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->address }}</td>
                            <td><img src="{{asset($item->image)}}" style="width:100px;" alt="avatar"></td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{route('admin.user.edit', ['id' => $item->id])}}" class="btn btn-warning btn-sm mx-3">Edit</a>
                                <a onclick="return confirm('Are you sure you want to delete?')" href="{{ route('admin.user.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection