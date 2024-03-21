@extends('layouts.masterLayoutAdmin')
@section('card')
    <div>
    @section('title')
        <h1 class="text-center title">
            USERS
        </h1>
    @endsection
    
    <div class="buttonAddUser">
        <button type="submit" class="btn btn-success mx-3">
            Add User
            <i class="fa fa-plus"></i>
        </button>
    </div>
    <div class="tableUser mt-5">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Image</th>
                    <th style="width:15%" scope="col">Email</th>
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
                            <td>{{ $item->address }}</td>
                            <td><img src="{{ $item->image_url }}" style="width:100px;" alt="avatar"></td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <a href="" class="btn btn-warning btn-sm mx-3">Edit</a>
                                <a onclick="return confirm('Ban co muon xoa khong')" href=""
                                    class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
