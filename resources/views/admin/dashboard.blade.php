@extends('layouts/admin.app')
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>E-Exam</title>
    <!--start Admin Base-->
    <link rel="stylesheet" href="{{ asset('css/AdminBase.css') }}"/>
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css') }}">
    <!--end admin base-->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}"></script>
    <link href="{{ asset('http://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css') }}">
    <link href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}" rel="stylesheet">

      <style type="{{ asset('text/css') }}">
      body{
        background-color:#F0F0F0;
      }

      a:link {
        text-decoration: none;
      }
  
      .order-card {
        color: rgb(255, 255, 255);
      }
  
      .bg-c-blue {
        background: #04868f;
      }
  
      .bg-c-green {
        background:#4C51BF;
      }
      </style>

</head>
    </body>
@section('content')

    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">
            <div class="row">

                <div class="col-md-4 col-xl-4">
                    <div class="card bg-c-blue order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Total Students </h6>

                            <h2 class="text-right"><i class="fas fa-user-graduate f-left"></i><span>{{$countStudent}}</span></h2>

                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-4">
                <div class="card bg-c-green order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Total Doctors </h6>
                        <h2 class="text-right"><i class="fas fa-chalkboard-teacher f-left"></i><span>{{$countDoctor}}</span></h2>

                    </div>
                </div>
            </div>
                
                <div class="col-md-4 col-xl-4">
                    <div class="card bg-c-yellow order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Total Courses</h6>
                            <h2 class="text-right"><i class="fas fa-book f-left"></i><span>20</span></h2>

                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-4">
                    <div class="card bg-c-pink order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Total Exams</h6>
                            <h2 class="text-right"><i class="fas fa-question-circle f-left"></i><span>{{$countExam}}</span></h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <br><br><br>
    </div>
    <!--content end-->

@endsection

    