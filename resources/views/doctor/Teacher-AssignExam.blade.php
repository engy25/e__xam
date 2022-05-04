<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>E-Exam</title>
    <!--start Admin Base-->
    <link rel="stylesheet" href="css/AdminBase.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <!--end admin base-->

    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <style type="text/css">
        body {
            background-color: #F0F0F0;
        }

        a:link {
            text-decoration: none;
        }

        .container label{
            display:block;
            font-size: 25px;
            margin-bottom: 10px;
            color:#484848;
        }

        .container select{
            width: 370px;
            padding: 15px;
            background-color: white;
            border-radius: 5px;
            border: 1px solid #75a3a3;
            margin-right: 125px;
            font-size:16px;
        }

        .container button{
            padding: 15px;
            width: 130px;
            margin-top:0px;
            background-color: #005450;
            color: white;
            border: 1px solid #75a3a3;
            border-radius: 5px;
            font-weight: bold;
            font-size:16px;
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
            <a href="signin.html" class="logout_btn">Logout</a>
            <a href="ChangePassword.html" class="ChangePassword_btn">Change Password</a>
        </div>

    </header>
    <!--header area end-->
    <!--sidebar start-->
    <div class="sidebar">
        <center>
            <img src="images/admin.png" class="profile_image">
            <h4>Teacher</h4>
        </center>

        <a href="Teacher-Dashboard.html" class="sidebar-items"><i class="fas fa-tachometer-alt"></i>     Dashboard</a>
        <label onclick="Function1()" class="sidebar-items"><i class="fas fa-question-circle"></i>     Exams</label>
        <ul id="ul-1">
            <li> <a href="Teacher-AddExam.html" class="list-items">- Add Exam</a></li>
            <li> <a href="Teacher-ViewExams.html" class="list-items">- View Exams</a></li>
            <li> <a href="Teacher-AddQuestions.html" class="list-items">- Add Questions</a></li>
            <li> <a href="Teacher-AssignExam.html" class="list-items">- Assign Exam</a></li>
        </ul>
        <a href="Teacher-Results.html" class="sidebar-items"><i class="fas fa-sort-numeric-up"></i><span>     Results</span></a>
    </div>
    <!--sidebar end-->
    <!--end Admin base-->
    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">
            <label for="ExamName">Exam Name</label>

            <select id="ExamName">
                <option value="" selected disabled>Select Exam Name</option>
                <option value="DataBase">DataBase</option>
            </select>

            <button>Assign</button>
        </div>


        <br><br><br>
    </div>
    <!--content end-->
    <!--JS code start-->
    <script src="js/AdminBase.js"></script>
    <!--JS code end-->
</body>
</html>