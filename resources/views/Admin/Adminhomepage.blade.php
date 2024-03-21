@extends('layouts.masterLayoutAdmin')

@section('card')
    <div class="label mt-4 p-4">
        <div class="row justify-content-center">
            <div class="col-5 ">
                <div class="rectangle rounded bg-primary text-white border border-primary">
                    <strong style="font-size: 18px">
                        <p>Users</p>
                    </strong>
                    <h3>Total: </h3>
                </div>
            </div>
            <div class="col-5">
                <div class="rectangle rounded bg-info text-white border border-info">
                    <strong style="font-size: 18px">
                        <p>Products</p>
                    </strong>
                    <h3>Total: </h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-5">
                <div class="rectangle rounded bg-success text-white border border-success">
                    <strong style="font-size: 18px">
                        <p>Orders</p>
                    </strong>
                    <h3>Total: </h3>
                </div>
            </div>
            <div class="col-5">
                <div class="rectangle rounded bg-info.bg-gradient text-white border border-success-subtle">
                    <strong style="font-size: 18px">
                        <p>Type Of Products</p>
                    </strong>
                    <h3>Total: </h3>
                </div>
            </div>
        </div>
    </div>
@endsection
