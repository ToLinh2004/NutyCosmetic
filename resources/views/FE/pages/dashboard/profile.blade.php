@extends('layouts.master')
@section('title')
Profile
@endsection

@section('content')
<style>
    .user-row {
        margin-bottom: 14px;
    }

    .table-user-information>tbody>tr {
        border-top: 1px solid #ccc;
    }

    .table-user-information>tbody>tr:first-child {
        border-top: 0;
    }

    .table-user-information>tbody>tr>td {
        border-top: 0;
    }

    .panel {
        margin-top: 20px;
    }
</style>
<div class="container">
    <div class="text-center">
        <h3>Thông tin tài khoản</h3>
    </div>
    <div class="row">
        <div
            class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $profiles->user_name }}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3" width="200px" align="center"> 
                            <img alt="User Pic"
                                src="{{ asset($profiles->image_url) }}"
                                class="img-circle img-responsive w-100"> </div>
                        <div class=" col-md-9 col-lg-9 ">
                            <button type="button" class="btn btn-primary w-25" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Cập nhật thông tin
                            </button>
                            <a href="{{ route('login.userout')}}" class="btn">Đăng xuất</a>
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>Email:</td>
                                        @if (!isset($profiles->email) || empty($profiles->email))
                                            <td>Không có thông tin</td>
                                        @else
                                            <td>{{ $profiles->email }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại:</td>
                                        @if (!isset($profiles->phone) || empty($profiles->phone))
                                            <td>Không có thông tin</td>
                                        @else
                                            <td>{{ $profiles->phone }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ:</td>
                                        @if (!isset($profiles->address) || empty($profiles->address))
                                            <td>Không có thông tin</td>
                                        @else
                                            <td>{{ $profiles->address }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Ngày tạo:</td>
                                        <td>{{ $profiles->created_at->format('H:i d/m/Y') }}</td>
                                    </tr>
                                   
                                </tbody>
                            </table>

                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content"
                                        style="border: unset;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                        <div class="modal-header" style="border-bottom:unset;">

                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <h3 class="modal-title mb-2" id="exampleModalLabel">
                                                    Cập
                                                    nhật
                                                    thông tin</h3>
                                            </div>

                                            <form active="" method="post" id="contact-form"
                                                class="form-horizontal">
                                                @csrf
                                                <div class="contact-form-group"
                                                    style="grid-template-columns: unset;grid-gap: unset;">
                                                    <div class="form-field m-1">
                                                        <label for="email">Email (*)</label>
                                                        <input type="email" id="email"
                                                            name="email" class="form-control"
                                                            value="{{ @$profiles->email }}"
                                                            placeholder="Vui lòng nhập email của bạn."
                                                            required oninput="sanitizeInput(this)">
                                                    </div>
                                                    <div class="form-field m-1">
                                                        <label for="name">Họ và Tên (*)</label>
                                                        <input type="name" id="name"
                                                            name="name"
                                                            class="form-control w-100"
                                                            value="{{ @$profiles->name }}"
                                                            placeholder="Vui lòng nhập địa chỉ name của bạn."
                                                            required oninput="sanitizeInput(this)">
                                                    </div>

                                                    <div class="form-field m-1">
                                                        <label for="phone">Số điện thoại
                                                            (*)</label>
                                                        <input type="phone" id="phone"
                                                            name="phone"
                                                            class="form-control w-100"
                                                            value="{{ @$profiles->phone }}"
                                                            placeholder="Vui lòng nhập số điện của bạn."
                                                            required oninput="sanitizeInput(this)">
                                                    </div>

                                                    <div class="form-field m-1">
                                                        <label for="phone">Địa chỉ
                                                            (*)</label>
                                                        <input type="address" id="address"
                                                            name="address"
                                                            class="form-control w-100"
                                                            value="{{ @$profiles->address }}"
                                                            placeholder="Vui lòng nhập địa chỉ của bạn."
                                                            required oninput="sanitizeInput(this)">
                                                    </div>
                                                 
                                                </div>
                                        </div>
                                        <div class="modal-footer" style="border-top:unset;">
                                            <button type="button" class="btn btn-primary">Lưu</button>
                                        </div>
                                    </div>
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
