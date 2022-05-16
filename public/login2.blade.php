
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>SignUp</title>
    <style>
        body{
            /*background-color:#E8E8E8 rgb(48, 60, 90) rgb(24, 32, 52) #255757 #005450 #F0F0F0 #606060 #d6d6c2 #b3cccc #94b8b8 #75a3a3;*/
            /*background-color:#b3cccc;*/
            background-image:url(images/background.jpg);
        }

        .container{
            height:710px;
            width:680px;
            background-color:#005450;
            margin:auto;
            margin-top:auto;
            border-radius:20px;

        }

        .form-header{
            height:130px;
            background-color:#005450;
            border-top-right-radius:20px;
            border-bottom:solid #b3cccc 1px;
        }

        .form-center{
            padding:30px;
        }

        .form-footer{
            background-color:#005450;
            height:40px;
            margin-top:10px;
            border-bottom-left-radius:20px;
            border-top:solid #b3cccc 1px;
        }

        h1{
            text-align:center;
            position:relative;
            top:40px;
            color:white;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
        }

        .form-txt1{
            width:40%;
            padding:10px;
            border:solid lightgray 1px;
            margin-top:5px;
            margin-bottom:20px;
        }

        .form-txt2{
            width:40%;
            padding:10px;
            border:solid lightgray 1px;
            position:relative;
            left:77px;
            margin-top:5px;
            margin-bottom:20px;
        }

        .form-select{
            width:100%;
            padding:10px;
            background-color:white;
            border:solid lightgray 1px;
            margin-top:5px;
            margin-bottom:20px;
        }

        .form-labels{
            margin-top:40px;
            margin-bottom:5px;
            color:white;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-btn{
            position:relative;
            top:10px;
            left:220px;
            width:180px;
            padding:10px;
            background-color:white;
            color:#005450;
            border-bottom-left-radius:20px;
            border-top-right-radius:20px;
            border:solid lightgray 1px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size:15px;
            font-weight:bold;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="form-header">
        <h1>SignUp</h1>
    </div>

    <div class="form-center">
        <div class="form-group">
            <label for="roles" class="form-labels">Role</label>
            <select id="roles" class="form-select">
                <option value="" selected disabled>Select Role</option>
                <option value="Professor" onclick="Function1()">Professor</option>
                <option value="Student" onclick="Function2()">Student</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-labels">UserName</label>
            <label class="form-labels" style="position:relative;left:272px;">Password</label>
            <br />
            <input type="text" class="form-txt1" placeholder="Enter UserName" />
            <input type="password" class="form-txt2" placeholder="Enter Password" />
        </div>

        <div class="form-group">
            <label class="form-labels">First Name</label>
            <label class="form-labels" style="position:relative;left:271px;">Last Name</label>
            <br />
            <input type="text" class="form-txt1" placeholder="Enter First Name" />
            <input type="text" class="form-txt2" placeholder="Enter Last Name" />
        </div>

        <div class="form-group">
            <label class="form-labels">Mobile</label>
            <label class="form-labels" style="position:relative;left:297px;">Profile Picture</label>
            <br />
            <input type="text" class="form-txt1" placeholder="Enter Mobile" />
            <input type="file" class="form-txt2" value="Choose File" style="background-color:white;"/>
        </div>

        <div id="level-department">
            <div class="form-group">
                <label class="form-labels">Level</label>
                <label class="form-labels" style="position:relative;left:310px;">Department</label>
                <br />
                <input type="text" class="form-txt1" placeholder="Enter Level" />
                <input type="text" class="form-txt2" placeholder="Enter Department" />
            </div>
        </div>

        <div class="form-group">
            <button class="login-btn">SignUp</button>
        </div>
    </div>

    <div class="form-footer">

    </div>

    <script>
        function Function1() {
            var x = document.getElementById("level-department");
            x.style.display = "none";
        }

        function Function2() {
            var x = document.getElementById("level-department");
            if (x.style.display === "none") {
                x.style.display = "block";
            }
        }

    </script>

</div>
</body>
</html>