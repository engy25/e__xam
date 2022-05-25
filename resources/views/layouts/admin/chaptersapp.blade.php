

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

            <h4>{{auth()->user()->first_name}}</h4>
        </center>

        <a href="{{route('adminDashboard')}}" class="sidebar-items"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <label onclick="Function1()" class="sidebar-items"><i class="fas fa-question-circle"></i> Exams</label>
        <ul id="ul-1">
            <li><a href="{{route('doctorAddExam')}}" class="list-items">- Add Exam</a></li>
            <li><a href="{{route('doctorViewExam')}}" class="list-items">- View Exams</a></li>
            <li><a href="{{route('doctorAddQuestion')}}" class="list-items">- Add Questions</a></li>
            <!--  route('doctorAssignExam')      <li><a href="" class="list-items">- Assign Exam</a></li>-->
        </ul>
        <a href="{{route('doctorResults')}}" class="sidebar-items"><i
                    class="fas fa-sort-numeric-up"></i><span>     Results</span></a>
        <a href="{{route('adminChapters')}}" class="sidebar-items"><i
                    class="fas fa-book"></i><span>     Chapters</span></a>

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