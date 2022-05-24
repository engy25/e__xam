@extends('layouts/student.app')
@section('content')
    <div class="content">
        <br><br><br><br><br>
        @foreach($online_exams as $online_exam)

            <div class="container">

                <div class="content-card">
                    <div class="content-card-header">
                        <h1>{{$online_exam->onlineExam_name}}</h1>
                    </div>

                    <div class="content-card-center">
                        <label>Question: </label>
                        <p>{{$online_exam->total_questions}}</p>
                        <br />
                        <label>Mark: </label>
                        <p>{{$online_exam->onlineExam_marks}}</p>
                        <br />
                        <label>Time: </label>
                        <p>{{$online_exam->onlineExam_duration}}</p> <p>Minutes</p>
                    </div>

                    <div class="content-card-footer">
                        <a href="{{ route('startExamStudent',['id'=>$online_exam->id]) }}">Start >></a>
                    </div>
                </div>
                @endforeach


            </div>

            <br><br><br>
    </div>
    <!--content end-->
@endsection
