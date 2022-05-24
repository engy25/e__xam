@extends('layouts/doctor.app2')
@section('content')
        <!DOCTYPE html>

<!--content start-->
<div class="content">
    <br><br><br><br><br>

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


    <br><br><br>
</div>
<!--content end-->

@endsection