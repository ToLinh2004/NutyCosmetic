@extends('layouts.masterLayoutAdmin')
@section('titles')
    Contact
@endsection
@section('card')
    <div>
    @section('title')
        <h1 class="text-center title">Contact</h1>
    @endsection
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="tableProduct mt-5">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col" style="width:15%">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Message</th>
                    <th scope="col" colspan="2">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($contacts))
                    {{ $i = 1 }}
                    @foreach ($contacts as $item)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $item->fullname }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->message }}</td>
                            <td>
                                <form action="{{ route('admin.updateStatus', $item->id) }}" method="post"
                                    class="mb-3">
                                    @csrf
                                    @method('PUT')
                                    <select class="form-control" name='status' required>
                                        <option value="Not Contacted">Status</option>
                                        <option value="Contacted" {{ request()->status == 'Contacted' ? 'selected' : '' }}>Contact</option>
                                        <option value="Not Contact" {{ request()->status == 'Not Contact' ? 'selected' : '' }}>Not  Contact</option>
                                    </select>
                            </td>
                            <td style="padding-top:15px">
                                @if($item->status =='Contacted')
                                    <span class="text-success">{{ $item->status }}</span>
                                @else
                                <span class="text-danger" style="padding-top:20px">{{ $item->status }}</span>
                                @endif
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-block">Save</button>
                            </td>
                            </form>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
