<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
   
</head>
<body>
    <style>
        .error-message{
            color: red;
        font-size: 1rem;
        
        }
    </style>
    <form action="{{route('login.user')}}" method="post">
        @csrf
        <label for="">Email</label>
        <input type="email" name="email">
        @if ($errors->has('email'))
            <code class="error-message">{{ $errors->first('email') }}</code>
        @endif
        <label for="">Password</label>
        <input type="password" name="password">
        @if ($errors->has('password'))
            <code class="error-message">{{ $errors->first('password') }}</code>
        @endif
        <button type="submit">Login</button>
    </form>

    <a href="{{route('register.user')}}">Đăng ký</a>

    
</body>
</html>