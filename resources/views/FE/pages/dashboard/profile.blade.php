@extends('layouts.master')
@section('title')
Profile
@endsection

@section('content')
</style>
<div class="container">
    <div class="text-center">
        <h3>Account Information</h3>
    </div>
    <div class="row">
        <div
            class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user_name }}</h3>

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3" width="100px" align="center"> 
                            <img alt="User Pic"
                                src="{{ asset($image) }}"
                                class="img-circle img-responsive w-50" > 
                            </div>
                        <div class=" col-md-9 col-lg-9 ">
                            <button type="button" class="btn btn-primary w-25" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Update information
                            </button>
                            {{-- {{ route('llogout_session')}} --}}
                            

                            <a href="{{ route('dashboard.order')}}" class="btn btn-primary" style="width:100px;">Order</a>

                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>Email:</td>
                                        @if (!isset($email) || empty($email))
                                        <td>No information</td>
                                    @else
                                        <td>{{ $email }}</td>
                                    @endif
                                    </tr>
                                    <tr>
                                        <td>Phone number:</td>
                                        @if (!isset($phone) || empty($phone))
                                            <td>No information</td>
                                        @else
                                            <td>{{ $phone }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        @if (!isset($address) || empty($address))
                                            <td>No information</td>
                                        @else
                                            <td>{{ $address }}</td>
                                        @endif
                                    </tr>
                                   
                                </tbody>
                            </table>

                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    @php
                                    $id = $userId;
                                @endphp
                                <form action="{{ route('profile.update', ['id' => $id]) }}" method="post" id="contact-form" class="form-horizontal">
                                    @csrf
                                    <div class="modal-content"
                                        style="border: unset;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                        <div class="modal-header" style="border-bottom:unset;">

                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <h3 class="modal-title mb-2" id="exampleModalLabel">
                                                    Update information</h3>
                                            </div>
                                           
                                                <div class="contact-form-group"
                                                    style="grid-template-columns: unset;grid-gap: unset;">
                                                    <div class="form-field m-1">
                                                        <label for="email">Email (*)</label>
                                                        <input type="email" id="email"
                                                            name="email" class="form-control"
                                                            value="{{ $email }}"
                                                            placeholder="Please enter your email."
                                                            required oninput="sanitizeInput(this)">
                                                    </div>
                                                    <div class="form-field m-1">
                                                        <label for="user_name">First and last name (*)</label>
                                                        <input type="user_name" id="user_name"
                                                            name="user_name"
                                                            class="form-control w-100"
                                                            value="{{ $user_name }}"
                                                            placeholder="Please enter your name and address."
                                                            required oninput="sanitizeInput(this)">
                                                    </div>

                                                    <div class="form-field m-1">
                                                        <label for="phone">Phone number
                                                            (*)</label>
                                                        <input type="phone" id="phone"
                                                            name="phone"
                                                            class="form-control w-100"
                                                            value="{{ $phone }}"
                                                            placeholder="Please enter your phone."
                                                            required oninput="sanitizeInput(this)">
                                                    </div>

                                                    <div class="form-field m-1">
                                                        <label for="phone">Address</Address>
                                                            (*)</label>
                                                        <input type="address" id="address"
                                                            name="address"
                                                            class="form-control w-100"
                                                            value="{{ $address }}"
                                                            placeholder="Please enter your address."
                                                            required oninput="sanitizeInput(this)">
                                                    </div>
                                                 
                                                </div>
                                        </div>
                                        <div class="modal-footer" style="border-top:unset;">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>

                                    </div>
                                </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
