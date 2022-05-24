@extends('layouts/doctor.app2')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/css/Teacher-ViewExams.css') }}"/>

<!--content start-->
<div class="content">
    <br><br><br><br><br>

    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="panel panel-primary" style="border-color:#75a3a3;">
            <div class="panel-heading" style="background-color:#005450;">
                <h6 class="panel-title">Created Exams</h6>
            </div>
            <table class="table table-hover" id="dev-table">
                <thead>
                <tr>
                    <th>Exam Name</th>
                    <th>Total Time (Minutes)</th>
                    <th>Total Questions</th>
                    <th>Total Mark</th>
                    <th>Pass Mark</th>
                    <th>Exam Date</th>

                    <th>Delete</th>
                    <th>Questions</th>
                </tr>
                </thead>
                @foreach($exams as $exam)
                <tr>
                    <td style="display:none;">{{$exam->id}}</td>
                    <td>{{$exam->onlineExam_name}}</td>
                    <td>{{$exam->onlineExam_duration}}</td>
                    <td>{{$exam->total_questions}}</td>
                    <td>{{$exam->onlineExam_marks}}</td>
                    <td>{{$exam->onlineExam_pass}}</td>
                    <td>{{$exam->onlineExam_datetime}}</td>

                    <td>
                        <a href="{{route('doctorDeleteExam',['id'=>$exam->id])}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
                    </td>
                    <td><a class="btn btn-primary btn-xs" href="{{route('doctorViewQuestions',['id'=>$exam->id])}}" style="font-weight:bolder;"><span>View</span></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <br><br><br>
</div>
<!--content end-->

@endsection