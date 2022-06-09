@extends('layouts/doctor.app2')
@section('content')
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{ asset('css/css/Teacher-ViewResults.css') }}"/>

    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">
            <div class="panel panel-primary" style="border-color:#75a3a3;">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">Finished Exams</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                       
                    <tr>
                        <th>Exam Name</th>
                        <th>Student Name</th>
                        <th>Mark</th>

                        <th>Result</th>
                    </tr>
                    </thead>
                   @foreach($results as $result)
                    <tr>
                    <td value="{{$result->id}}"> {{$result->online_exam->onlineExam_name}}</td>
                    <td value="{{$result->id}}"> {{$result->user->first_name}}</td>
                    <td value="{{$result->id}}"> {{$result->result}}</td>
                    <td value="{{$result->id}}"> {{$result->online_exam->onlineExam_marks}}</td>
                    @endforeach

                    </tr>
                </table>
            </div>
        </div>

        <br><br><br>
    </div>
    <!--content end-->

@endsection