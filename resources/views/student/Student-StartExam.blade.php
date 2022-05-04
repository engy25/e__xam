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

        .right_area label{
            float: right;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            margin-top:-25px;
        }

        .right_area{
            margin-right:40px;
        }

        .submitbtn{
            padding: 3px;
            width: 150px;
            margin-top:20px;
            background-color: #005450;
            color: white;
            border: 1px solid #75a3a3;
            border-radius: 5px;
            font-weight: bold;
        }

        .form-check-label{
            color:#484848;
            margin-left:5px;
        }

        .card{
            background-color:#fff;
            border-top-right-radius:20px;
            border-bottom-left-radius:20px;
            box-shadow:2px 2px 2px 2px;
            padding:50px;
            position:absolute;
            top:-100%; 
            left:40%;         
            text-align:center;
            width:600px;
            transition:all .5s;
            opacity:0;
        }

        .card img{
            width:100px;
            height:100px;
            border-radius:50px;
            margin-top:-90px;
        }

        .card h1{
            font-size:22px;
            font-weight:bold;
            margin-bottom:5px;
            color:#005450;
        }

        .card button{
            width:50%;
            border-radius:50px;
            border:0;
            padding:15px;
            margin-top:20px;
            background-color:#005450;
            color:#fff;
            cursor:pointer;
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
            <label>
                Time Remaining:&nbsp;
                <span id="m"></span>
                <span>:</span>
                <span id="s"></span>            
            </label>
        </div>

    </header>
    <!--header area end-->
    <!--sidebar start-->
    <div class="sidebar">
        <center>
            <img src="images/admin.png" class="profile_image">
            <h4>Student</h4>
        </center>

    </div>
    <!--sidebar end-->
    <!--end Admin base-->
    <!--content start-->
    <div class="content" id="c">
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

                    <input class="submitbtn" type="submit" value="Submit">
                </form>
            </div>
        </div>
      
        <br><br><br>
    </div>
    <!--content end-->


    <!--PopUp box Start-->
    <div class="card open" id="pupup">
        <img src="images/mark.png" />
        <h1>Time Over!</h1>
        <button onclick="hide_pupup()">Ok</button>
    </div>
    <!--PopUp box End-->


    <!--JS code start-->
    <script src="js/AdminBase.js"></script>
    <script>
        var s = 5;
        var m = 0;

        var time = setInterval(function() { timer() }, 1000);

        function timer() {
            s--;
            if (s == -1) {
                m--;
                s = 59;

                if (m == -1) {
                    m = 0;
                    s = 0;

                    clearInterval(time);
                    //alert("Time Over !");
                    show_pupup();
                }
            }

            document.getElementById("m").innerHTML = m;
            document.getElementById("s").innerHTML = s;
        }

        function show_pupup() {
            
            var x = document.getElementById("c");
            x.style.visibility = "hidden";

            var y = document.getElementById("pupup");
            y.style.opacity = "1";
            y.style.top = "30%";
            
            document.getElementById("pupup").classList.add('card');
            
        }
       
        function hide_pupup() {
            document.getElementById("pupup").classList.remove('card');
            window.open("Student-ExamResult.html","_self");
        }

    </script>
    <!--JS code end-->
</body>
</html>