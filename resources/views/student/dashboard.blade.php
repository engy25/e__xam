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


    <style>
        body {
            background-color: #F0F0F0;
        }

        a:link {
            text-decoration: none;
        }

        .content-card{
            height:420px;
            width:480px;
            background-color:#005450;
            margin:auto;
            margin-top:auto;
            border-top-right-radius:20px;
            border-bottom-left-radius:20px;
        }

        .content-card-header{
            height:100px;                     
            border-bottom:solid #F0F0F0 1px;
        }


        .content-card-header h1{
            text-align:center;
            position:relative;
            top:30px;
            color:white;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
        }

        .content-card-center{
            text-align:center;
            line-height:50px;
            margin-top:30px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .content-card-center label{
            font-size: 20px;
            color: #fff;
        }

        .content-card-center p{
            font-size: 18px;
            display:inline;
            color:#d6d6c2;
        }

        .content-card-footer a{
            display:inline-block;
            text-align:center;
            position:relative;
            top:25px;
            left:155px;
            width:180px;
            padding:10px;
            background-color:white;
            color:#005450;
            border-bottom-left-radius:20px;
            border-top-right-radius:20px;
            border:solid lightgray 1px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size:16px;
            font-weight:bold;
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
            <h4>Student</h4>
        </center>

        <a href="Student-Dashboard.html" class="sidebar-items"><i class="fas fa-tachometer-alt"></i>     Dashboard</a>
        <a href="Student-Results.html" class="sidebar-items"><i class="fas fa-sort-numeric-up"></i><span>     Results</span></a>
    </div>
    <!--sidebar end-->
    <!--end Admin base-->
    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">

            <div class="content-card">
                <div class="content-card-header">
                    <h1>DataBase</h1>
                </div>
                
                <div class="content-card-center">
                    <label>Question: </label>
                    <p>10</p>
                    <br />
                    <label>Mark: </label>
                    <p>20</p>
                    <br />
                    <label>Time: </label>
                    <p>20</p> <p>Minutes</p>
                </div>
                
                <div class="content-card-footer">
                    <a href="Student-StartExam.html">Start >></a>
                </div>               
            </div>


        </div>

        <br><br><br>
    </div>
    <!--content end-->
    <!--JS code start-->
    <script src="js/AdminBase.js"></script>
    <!--JS code end-->
</body>
</html>