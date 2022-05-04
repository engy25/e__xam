@extends('layouts/admin.app')
@section('content')
    <!--header area end-->
    <!--sidebar start-->
    <div class="sidebar">
        <center>
            <img src="images/admin.png" class="profile_image">
            <h4>Admin</h4>
        </center>

        <a href="Admin-Dashboard.html" class="sidebar-items"><i class="fas fa-tachometer-alt"></i>     Dashboard</a>
        <label onclick="Function1()" class="sidebar-items"><i class="fas fa-chalkboard-teacher"></i>     Teacher</label>
        <ul id="ul-1">
            <li> <a href="Admin-PendingTeacher.html" class="list-items">- Pending Teachers</a></li>
            <li> <a href="Admin-TeacherSubjects.html" class="list-items">- Teacher Subjects</a></li>
            <li> <a href="Admin-TotalTeacher.html" class="list-items">- Total Teachers</a></li>
        </ul>

        <label onclick="Function2()" class="sidebar-items"><i class="fas fa-user-graduate"></i>     Student</label>
        <ul id="ul-2">
            <li> <a href="Admin-TotalStudents.html" class="list-items">- Total Students</a></li>
        </ul>

        <label onclick="Function3()" class="sidebar-items"><i class="fas fa-book"></i>     Collage</label>
        <ul id="ul-3">
            <li> <a href="Admin-AddDepartments.html" class="list-items">- Add Department</a></li>
            <li> <a href="Admin-AddSubjects.html" class="list-items">- Add Subject</a></li>
        </ul>

        <a href="Admin-AllExams.html" class="sidebar-items"><i class="fas fa-question-circle"></i>     Exams</a>
    </div>
    <!--sidebar end-->
    <!--end Admin base-->
    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">
            <div class="panel panel-primary" style="border-color:#75a3a3;">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">All Results</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Mark</th>
                            <th>Result</th>

                            <th>Profile</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>YomnaMohamed5</td>
                        <td>20</td>
                        <td>Passed</td>

                        <td><a class="btn btn-primary btn-xs" href="Admin-StudentProfile.html" style="font-weight:bolder;"><span>Visit</span></a></td>
                    </tr>
                </table>
            </div>
        </div>

        <br><br><br>
    </div>
    <!--content end-->
    @endsection