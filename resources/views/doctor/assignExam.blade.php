<<<<<<< HEAD
﻿@extends('layouts/doctor.app')
@section('content')
        <!DOCTYPE html>
<link rel="stylesheet" href="{{ asset('css/css/doctorAssignExam.css') }}"/>
=======
﻿@extends('layouts/doctor.app2')
@section('content')
        <!DOCTYPE html>
>>>>>>> doctor

<!--content start-->
<div class="content">
    <br><br><br><br><br>
<<<<<<< HEAD
    <form method="get">
        @csrf
        <div class="container">
            <label for="ExamName">Exam Name</label>
            <select id="ExamName" name="examNames">
                <option value="" selected disabled>Select Exam Name</option>
                @foreach($exams as $exam)
                    <option value="{{$exam->id}}">{{$exam->onlineExam_name}}</option>
                @endforeach
            </select>
            <a href="{{route('doctorAssignQuestion',['id'=>$exam->id])}}" class="content-btn">Assign</a>
        </div>
    </form>
=======

    <div class="container">
        <label for="ExamName">Exam Name</label>

        <select id="ExamName">
            <option value="" selected disabled>Select Exam Name</option>
            @foreach($exams as $exam)
                <option value="DataBase">{{$exam->onlineExam_name}}</option>
            @endforeach
        </select>

        <a href="{{route('doctorSendExam')}}" class="btn btn-primaryassignExam.blade.php">Assign</a>
    </div>

>>>>>>> doctor

    <br><br><br>
</div>
<!--content end-->

@endsection