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
                    <th>subject_name</th>
                    <th>chapter_number</th>
                    <th>Number of Question</th>
                    <th>category_name</th>
                   
                   
                   
                </tr>
                </thead>
                @foreach($examStructure as $exam)
                <tr>
                   
                    <td>{{$exam->online_exam->onlineExam_name}}</td>
                    <td>{{$exam->subject->subject_name}}</td>
                    <td>{{$exam->chapter_number}}</td>
                    <td>{{$exam->num_of_question}}</td>
                    <td>{{$exam->category->category_name}}</td>
                   
                    
                   
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <br><br><br>
</div>
<!--content end-->

@endsection