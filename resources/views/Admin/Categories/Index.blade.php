@extends('layouts.masterLayoutAdmin')
@section('titles')
    Category
@endsection
@section('card')
    <div>
    @section('title')
        <h1 class="text-center title">CATEGORYS</h1>
    @endsection
    <div class="buttonAddCategory">
        <a href="{{ route('admin.category.add') }}">
            <button type="submit" class="btn btn-success mx-3">
                Add Categries
                <i class="fa fa-plus"></i>
            </button>   
        </a>
    </div>
    <div class="tableCategory mt-5">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($categoriesList))
                    @foreach ($categoriesList as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->category }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('admin.category.edit', ['id' => $item->id])}}" class="btn btn-warning btn-sm mx-3">Edit</a>
                                    <a onclick="return confirm('Are you sure you want to delete?')" href="{{ route('admin.category.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection