<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>E-Exam</title>
    <!--start Admin Base-->
    <link rel="stylesheet" href="{{ asset('css/AdminBase.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <!--end admin base-->
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
            
            <a href="{{ route('changePasswordAdmins') }}" class="ChangePassword_btn">Change Password</a>
        </div>
        
    </header>
    <!--header area end-->

    <!--sidebar start-->
    <div class="sidebar">
        <center>
            <img src="{{ asset('images/admin2.jpg') }}" class="profile_image">
            <h4>Admin</h4>
        </center>
             
        <a  href="{{route('adminDashboard')}}"  class="sidebar-items"><i class="fas fa-tachometer-alt"></i>     Dashboard</a> 
            
        <label onclick="Function1()" class="sidebar-items"><i class="fas fa-chalkboard-teacher"></i>     Doctors</label>
        <ul id="ul-1">
            <li> <a href="{{route('adminPendingTeacher')}}" class="list-items">- Pending Doctors</a></li>
            <li> <a href="{{route('AddDoctor')}}" class="list-items">- Add New Doctor</a></li>
            <li> <a href="{{route('adminTotalTeacher')}}" class="list-items">- Total Doctors</a></li>
            <li> <a href="{{route('DoctorSubject')}}" class="list-items">- Add Subject For Doctors</a></li>
        </ul>

        <label onclick="Function2()" class="sidebar-items"><i class="fas fa-user-graduate"></i>     Student</label>
        <ul id="ul-2">
        <li> <a href="{{route('AddStudent')}}" class="list-items">- Add New Student</a></li>
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