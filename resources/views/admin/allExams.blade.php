<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

@extends('layouts/admin.app')
<link rel="stylesheet" href="{{ asset('css/css/Admin-AllExams.css') }}"/>
@section('content')
    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">
            <div class="panel panel-primary" style="border-color:#75a3a3;">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">All Exams</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                        <tr>
                            <th>Exam Name</th>
                            <th>Created By</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Mark</th>

                
                        </tr>
                    </thead>
                    @foreach($online_exams as $online_exam)
                    <tr>
                  
                        <td id="{{$online_exam->id}}">{{$online_exam->onlineExam_name}}</td>
                        <td id="{{$online_exam->id}}">{{$online_exam->onlineExam_createBy}}</td>
                        <td id="{{$online_exam->id}}">{{$online_exam->onlineExam_name}}</td>
                        <td id="{{$online_exam->id}}">{{$online_exam->onlineExam_datetime}}</td>
                        <td id="{{$online_exam->id}}">{{$online_exam->onlineExam_marks}}</td>

        
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <br><br><br>
    </div>
    <!--content end-->
    @endsection