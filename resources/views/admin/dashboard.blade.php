<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href="http://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

@extends('layouts/admin.app')
<link rel="stylesheet" href="{{ asset('css/css/Admin-Dashboard.css') }}"/>
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

    