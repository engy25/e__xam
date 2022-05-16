<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <title>E-Exam</title>
    <!--start Admin Base-->
    <link rel="stylesheet" href="{{ asset('css/AdminBase.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <!--end admin base-->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <style type="text/css">
        body {
            background-color: #F0F0F0;

        }

        a:link {
            text-decoration: none;
        }

        .order-card {
            color: rgb(255, 255, 255);
        }

        .bg-c-blue {
            background: #04868f;
        }

        .bg-c-green {
            background: #4C51BF;
        }

        .bg-c-yellow {
            background: #F56565;
        }

        .bg-c-pink {
            background: #663a30;
        }

        .card {
            -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            border: 1px solid #E8E8E8;
            margin-bottom: 50px;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .card .card-block {
            padding: 25px;
        }

        .order-card i {
            font-size: 26px;
        }

        .f-left {
            float: left;
        }

        .f-right {
            float: right;
        }
    </style>

</head>
<body>

<!--start admin base-->
<!--header area start-->
<header>
    <div class="left_area">
        <h3>E-Exam</h3>
    </div>
    <div class="right_area">

        <form  action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <a href="{{ route('logout') }}" class="logout_btn">Logout</a>

        <a href="{{ route('doctorChangePassword') }}" class="ChangePassword_btn">Change Password</a>
    </div>

</header>
<!--header area end-->

<!--sidebar start-->
<div class="sidebar">
    <center>
        <img src="images/admin.png" class="profile_image">
        <h4>{{auth()->user()->first_name}}</h4>
    </center>

    <a href="{{route('doctorDashboard')}}" class="sidebar-items"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <label onclick="Function1()" class="sidebar-items"><i class="fas fa-question-circle"></i> Exams</label>
    <ul id="ul-1">
        <li><a href="{{route('doctorAddExam')}}" class="list-items">- Add Exam</a></li>
        <li><a href="{{route('doctorViewExam')}}" class="list-items">- View Exams</a></li>
        <li><a href="{{route('doctorAddQuestion')}}" class="list-items">- Add Questions</a></li>
<!--  route('doctorAssignExam')      <li><a href="" class="list-items">- Assign Exam</a></li>-->
    </ul>
    <a href="{{route('doctorResults')}}" class="sidebar-items"><i class="fas fa-sort-numeric-up"></i><span>     Results</span></a>
</div>
<!--sidebar end-->
<!--end Admin base-->


@yield('content')



<!--JS code start-->

<script src="{{ asset('js/AdminBase.js') }}"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<!--JS code end-->
</body>
</html>