@extends('layouts/doctor.app')
@section('content')
        <!DOCTYPE html>
<link rel="stylesheet" href="{{ asset('css/css/doctorAssignExam.css') }}"/>

<!--content start-->
<div class="content">
    <br><br><br><br><br>
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

    <br><br><br>
</div>
<!--content end-->

@endsection