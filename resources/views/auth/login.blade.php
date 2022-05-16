﻿<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>E-Exam</title>
    <link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>

<body>
<div class="container">
    <div class="form-header">
        <h1>Login</h1>
    </div>

    <div class="form-center">
        <form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('login') }}">
            @csrf


            <div class="form-group">
                <label for="email" class="form-labels">E-Mail Address</label>
                <input id="email" type="email" class="form-txt" name="email" value="" required autofocus placeholder="Enter email">
                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
            </div>

            <div class="form-group">
                <label for="password" class="form-labels">Password</label>
                <input id="password" type="password" class="form-txt" name="password" required data-eye placeholder="Enter password">
                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                <a href="{{route('password.request')}}" class="a">
                    Forgot Password?
                </a>
            </div>

            <div class="form-group">
                <button type="submit" class="login-btn">Login</button>
            </div>


        </form>
    </div>
    <div class="form-footer">
        <a href="{{route('register')}}">Sign Up</a>
    </div>
</div>


</body>
</html>
