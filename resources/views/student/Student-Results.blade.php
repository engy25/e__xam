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

        h6 {
            text-align: center;
        }

        .row {
            margin: 100px;
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

            <div class="panel panel-primary" style="border-color:#75a3a3;">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">Report</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                        <tr>
                            <th>Exam Name</th>
                            <th>Total Mark</th>
                            <th>Mark Obtain</th>
                            <th>Result</th>

                            <th>Questions</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>DataBase</td>
                        <td>20</td>
                        <td>19</td>
                        <td>passed</td>

                        <td><a class="btn btn-primary btn-xs" href="Student-ViewQuestions.html" style="font-weight:bolder;"><span>View</span></a></td>
                    </tr>
                </table>
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