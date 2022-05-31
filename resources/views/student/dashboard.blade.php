@extends('layouts/student.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/css/Teacher-ViewQuestions.css') }}"/>

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
                    <h6 class="panel-title">Exams</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                    <tr>
                        <th>Subjects</th>
                        <th>Exam_name</th>
                        
                        <th>Exam</th>
                       
                       


                    </tr>
                    </thead>
                    @foreach($online_exams as $online_exam)

                        <tr>
                            <td>{{$online_exam->subject->subject_name}}</td>
                            <td>{{$online_exam->onlineExam_name}}</td>
                            
                            <td><a href="{{url('student/viewExam',['id'=>$online_exam->id])}}" class="btn btn-primary" href="" >Start</a>
    
   

                        
                            </td>

                        </tr>
                        <br><br>

                    @endforeach
                </table>
            </div>
        </div>

        <br><br><br>
    </div>
    <!--content end-->

@endsection
