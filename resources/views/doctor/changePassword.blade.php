﻿<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <title>E-Exam</title>
    <!--start Admin Base-->
    <link rel="stylesheet" href="{{ asset('css/change_password.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <!--end admin base-->

    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"
          id="bootstrap-css">

</head>
<body>

<!--start admin base-->
<!--header area start-->
<!--header area start-->
<header>
    <div class="left_area">
        <h3>E-Exam</h3>
    </div>
    <div class="right_area">

        <a href="{{ route('logout') }}" class="logout_btn">Logout</a>
        <a href="{{route('doctorDashboard')}}" class="ChangePassword_btn">Back</a>
    </div>

</header>
<!--header area end-->
<!--end Admin base-->

<!--content start-->

<br><br><br><br><br>
<div class="container">

    <div class="content-card">
        <div class="content-card-header">
            <h1>Change Password</h1>
        </div>
        @foreach($users as $user)
            <form method="get" action="{{route('doctorChangePassword',['id'=>$user->id])}}">
                @csrf
                <div class="content-card-center">

                    <div class="content-parts">
                        <label>Current Password</label>
                        <input type="text" name="doctorCurrentPassword">
                    </div>

                    <div class="content-parts">
                        <label>New Password</label>
                        <input type="text" name="doctorNewPassword">
                    </div>

                    <div class="content-parts">
                        <label>Confirm Password</label>
                        <input type="text" name="doctorConfirmNewPassword">
                    </div>

                </div>

                <div class="content-card-footer">
                    <button>Update</button>
                </div>
            </form>
        @endforeach
    </div>

</div>
<br><br><br>

<!--content end-->

<!--JS code start-->
<script src="js/AdminBase.js"></script>
<!--JS code end-->
</body>
</html>