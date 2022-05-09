<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>E-Exam</title>
    <!--start Admin Base-->
    <link rel="stylesheet" href="{{ asset('css/AdminBase.css') }}"/>
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css') }}">
    <!--end admin base-->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}"></script>
    <link href="{{ asset('http://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css') }}">
    <link href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}" rel="stylesheet">

      <style type="{{ asset('text/css') }}">
      body{
        background-color:#F0F0F0;
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
        background:#4C51BF;
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
        
            <a href="{{ route('login') }}" class="logout_btn">Logout</a>
            
            <a href="{{ route('changePasswordAdmin') }}" class="ChangePassword_btn">Change Password</a>
        </div>
        
    </header>
    <!--header area end-->

    <!--sidebar start-->
    <div class="sidebar">
        <center>
        @foreach($Admin as $admin)
        <img src="images/users/{{ $admin->photo }}" width="100px" class="profile_image">
        @endforeach
            <h4>Admin</h4>
        </center>
       
       
        <a  href="{{route('adminDashboard')}}"  class="sidebar-items"><i class="fas fa-tachometer-alt"></i>     Dashboard</a> 
            
        <label onclick="Function1()" class="sidebar-items"><i class="fas fa-chalkboard-teacher"></i>     Teacher</label>
        <ul id="ul-1">
            <li> <a href="{{route('adminPendingTeacher')}}" class="list-items">- Pending Teachers</a></li>
            <li> <a href="{{route('adminTeacherSubjects')}}" class="list-items">- Teacher Subjects</a></li>
            <li> <a href="{{route('adminTotalTeacher')}}" class="list-items">- Total Teachers</a></li>
        </ul>

        <label onclick="Function2()" class="sidebar-items"><i class="fas fa-user-graduate"></i>     Student</label>
        <ul id="ul-2">
            <li> <a href="{{route('adminTotalStudents')}}" class="list-items">- Total Students</a></li>
        </ul>
        
        <label onclick="Function3()" class="sidebar-items"><i class="fas fa-book"></i>     Collage</label>
        <ul id="ul-3">
            <li> <a href="{{route('adminDepartments')}}" class="list-items">- Add Department</a></li>
            <li> <a href="{{route('adminLevels')}}" class="list-items">- Add Levels</a></li>
            <li> <a href="{{route('adminSubjects')}}" class="list-items">- Add Subject</a></li>
        </ul>

        <a href="{{route('adminAllExams')}}" class="sidebar-items"><i class="fas fa-question-circle"></i>     Exams</a>       
    </div>  
    <!--sidebar end-->
    <!--end Admin base-->


    @yield('content')


    
<!--JS code start-->
    
<script src="{{ asset('js/AdminBase.js') }}"></script>
    <script src="{{ asset('http://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js') }}"></script>
    <!--JS code end-->
</body>
</html>