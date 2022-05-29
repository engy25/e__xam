<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>E-Exam</title>
    <!--start admin base-->
    <link rel="stylesheet" href="{{ asset('css/AdminBase.css') }}" />
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css') }}">
    <!--end admin base-->

    <link href="{{ asset('https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css') }}" rel="stylesheet" id="{{ asset('bootstrap-css') }}">
    <script src="{{ asset('https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('https://code.jquery.com/jquery-1.11.1.min.js') }}"></script>

    <style>
        body{
            background-color:#F0F0F0;
        }

        a:link {
            text-decoration: none;
        }

        h6 {
            text-align: center;
        }

        .row {
            margin: 100px;
        }

        .teacher-picture {
            width: 210px;
            height: 210px;
            margin-bottom: 50px;
            border: 1px solid #d6d6c2;
        }

        .content-header label {
            font-size: 18px;
            color: #005450;
        }

        .content-header p {
            font-size: 15px;
            display:inline;
            color:#484848;
        }

        .content-header-rightside{
            float:left;
            margin-left:40px;
            margin-top:10px;
        }
        .content-header-leftside{
            float:left;
        }

    </style>

</head>
<body>
    <!--start admin base-->
    <!--header area start-->
    <header>
        <div class="left_area">
        <div class="right_area">
        <a href="{{ route('login') }}" class="logout_btn">Logout</a>
            <a href="{{ route('changePasswordAdmins') }}" class="ChangePassword_btn">Change Password</a>
        </div>
        </header>
        <div class="sidebar">
        <center>
       
       <a href="{{ asset('css/AdminBase.css') }}" width="100px" class="profile_image">
</a>
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
            <li> <a href="{{route('adminChapters')}}" class="list-items">- Add Chapters</a></li>
            
        </ul>

        <a href="{{route('adminAllExams')}}" class="sidebar-items"><i class="fas fa-question-circle"></i>     Exams</a>       
    </div>  
    <!--sidebar end-->
    <!--end Admin base-->
    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">

            <div class="content-header">
                <div class="content-header-leftside">
                    <img src="{{ asset('images/admin.png') }}" class="teacher-picture">
                </div>
               
                <div class="content-header-rightside">
                    <label>First Name: </label>
                    <p>{{$userStudents->first_name}}</p>
                <br />
                    <label>Last Name: </label>
                    <p>{{$userStudents->last_name}}</p>
                <br />
                    <label>Email: </label>
                    <p>{{$userStudents->email}}</p>
                <br />
                    <label>Mobile: </label>
                    <p>{{$userStudents->mobile}}</p>
                <br />
                    <label>Level: </label>
                    <p >{{$userStudents->level->level_name}}</p>
                <br />
                    <label>Department: </label>
                    <p>{{$userStudents->department->department_name}}</p>
                </div>
              
            </div>


            <div class="panel panel-primary" style="border-color:#75a3a3;clear:both">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">Teacher Subjects</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                       
                        <tr>
                            <th>Exam Name</th>
                            <th>Subject</th>
                            <th>Total Mark</th>
                            <th>Exam Date</th>

                        </tr>
                    </thead>
                    <tr>
                        <td>Construction</td>
                        <td>Software Construction</td>
                        <td>30</td>
                        <td>24/5/2022</td>
                    </tr>
                </table>

            </div>
        </div>

        <br><br><br>
    </div>
    <!--content end-->
    <!--JS code start-->
    <script src="{{ asset('js/AdminBase.js') }}"></script>
    <!--JS code end-->
</body>
</html>