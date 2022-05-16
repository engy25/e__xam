<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>E-Exam</title>
    <!--start Admin Base-->
    <link rel="stylesheet" href="{{asset('css/AdminBase.css')}}" />
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css')}}">
    <!--end admin base-->

    <link href="{{asset('https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css')}}" rel="stylesheet" id="{{asset('bootstrap-css')}}">

    <style type="{{asset('text/css')}}">
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


        .right_area button{
            width:80px;
        }

        .content-card{
            height:590px;
            width:580px;
            background-color:#005450;
            margin:auto;
            border-top-right-radius:20px;
            border-bottom-left-radius:20px;
           
        }

        .content-card-header{
            height:120px;                     
            border-bottom:solid #F0F0F0 1px;
            padding:10px;
        }


        .content-card-header h1{
            text-align:center;
            position:relative;
            top:10px;
            color:white;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
        }

        .content-parts label{
            display:block;
            font-size: 20px;
            color:#fff;
            margin-bottom:10px;
            margin-left:30px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }


        .content-parts input{
            width:90%;
            padding: 10px;
            margin-left:30px;
            background-color: white;
            border-radius: 5px;
            border: 1px solid #75a3a3;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .content-parts{
            margin-bottom:35px;
        }

        .content-card-center{
            margin-top:30px;
        }

        .content-card-footer button{
            position:relative;
            top:10px;
            left:197px;
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
            <a href="{{route('login')}}" class="logout_btn">Logout</a>
            <button class="ChangePassword_btn">Back</button>

        </div>

    </header>
    <!--header area end-->  
    <!--end Admin base-->

    <!--content start-->
    
        <br><br><br><br><br>
        <div class="container">

            <div class="content-card">
                <div class="content-card-header">
                    <h1>Change Password</h1>
                </div>

                <div class="content-card-center">
                    
                    <div class="content-parts">
                        <label>Current Password</label>
                        <input type="text" />
                    </div>

                    <div class="content-parts">
                        <label>New Password</label>
                        <input type="text" />
                    </div>

                    <div class="content-parts">
                        <label>Confirm Password</label>
                        <input type="text" />
                    </div>

                </div>

                <div class="content-card-footer">
                    <button>Update</button>
                </div>
            </div>

        </div>
        <br><br><br>
    
    <!--content end-->

    <!--JS code start-->
    <script src="{{ asset('js/AdminBase.js') }}"></script>
    <!--JS code end-->
</body>
</html>