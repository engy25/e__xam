﻿@extends('layouts/student.app')
@section('content')
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


                    </tr>
                    </thead>
                    <tr>
                       @foreach($online_exams as $online_exam)

                        <td>{{$online_exam->onlineExam_name}}</td>
                        <td>{{$online_exam->onlineExam_marks}}</td>
                        <td></td>
                        <td></td>
                        @endforeach
                    </tr>
                </table>
            </div>

        </div>

        <br><br><br>
    </div>
    <!--content end-->
@endsection
