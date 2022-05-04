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

        .form-check-label{
            color:#484848;
            margin-left:5px;
        }

        .left_area label,p{
            float: left;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            margin-top:-25px;         
        }

        .left_area label{
            margin-left:280px;
        }
    </style>
</head>
<body>
    <!--start admin base-->
    <!--header area start-->
    <header>
        <div class="left_area">
            <h3>E-Exam</h3>
            <label>Result: &nbsp;</label><p>10</p>
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


            <div class="jumbotron my-4" style="background-color:#F0F0F0;margin-top:-20px;">
                <form class="form">
                    <h1 style="text-align: center;color:#484848;">DataBase</h1>


                    <h3 class="text-info">How Are You ?</h3><h4 style="text-align: right;color:#484848;">[Marks 5]</h4>

                    <div class="form-check mx-4">
                        <input class="form-check-input" type="radio" name="option" id="option1" value="Option1">
                        <label class="form-check-label" for="option1">
                            option1
                        </label>
                    </div>

                    <div class="form-check mx-4">
                        <input class="form-check-input" type="radio" name="option" id="option2" value="Option2">
                        <label class="form-check-label" for="option2">
                            option2
                        </label>
                    </div>

                    <div class="form-check mx-4">
                        <input class="form-check-input" type="radio" name="option" id="option3" value="Option3">
                        <label class="form-check-label" for="option3">
                            option3
                        </label>
                    </div>

                    <div class="form-check mx-4">
                        <input class="form-check-input" type="radio" name="option" id="option4" value="Option4">
                        <label class="form-check-label" for="option4">
                            option4
                        </label>
                    </div>

                </form>
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