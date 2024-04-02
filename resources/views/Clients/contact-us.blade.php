@extends('layouts.masterLayoutClient')
@section('content')
    <div class="container mt-2">
        <h1 class="text-center">Contact us</h1>
        <div class="row">
            <div class="col col-md-6">
                <img src="{{ asset('images/contact-us.jpg') }}" style="width:500px">
            </div>
            <div class="col col-md-6">
                <form method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email..."
                            value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger" style="font-size:15px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Full name</label>
                        <input type="text" class="form-control" id="title" name="fullname" placeholder="Name"
                            value="{{ old('fullname') }}">
                        @error('fullname')
                            <span class="text-danger" style="font-size:15px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Phone</label>
                        <input type="text" class="form-control" id="title" name="phone" placeholder="Phone..."
                            value="{{ old('phone') }}">
                        @error('phone')
                            <span class="text-danger" style="font-size:15px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group" style="padding-bottom:15px">
                        <label for="message">Message</label>
                        <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="text-danger" style="font-size:15px">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit" style="width:150px;">Send message</button>
                </form>
                @if (session()->has('msg'))
                    <div class="alert alert-success">{{ session('msg') }}</div>
                @endif
            </div>
        </div>
        <div class="row mt-2">
            <div class="col col-md-12">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.7235485722294!2d105.78061631523369!3d10.039656175103817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a062a768a8090b%3A0x4756d383949cafbb!2zMTMwIFjDtCBWaeG6v3QgTmdo4buHIFTEqW5oLCBBbiBI4buZaSwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1556697525436!5m2!1svi!2s"
                    width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
@endsection
