@extends('layouts/student.app')
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
                    <th>Subjects</th>
                    <th>Questions MCQ</th>
                    <th>Questions T&F</th>
                    
                   
                   
                </tr>
                </thead>
            @foreach($subjects as $subject)
                <tr>
                    <td style="display:none;"> </td>
                    <td value="{{$subject->subject_name}}">{{$subject->subject_name}}</td>
                    <td><a class="btn btn-primary" href="{{route('stviewQuestionMcq',$subject->id)}}"> View </a></td>
                    <td><a class="btn btn-primary" href="{{route('stuViewQuestioTf',$subject->id)}}"> View </a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <br><br><br>
</div>
<!--content end-->

@endsection