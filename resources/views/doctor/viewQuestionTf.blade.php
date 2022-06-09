@extends('layouts/doctor.app2')
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
                    <h6 class="panel-title">Questions</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                    <tr>
                        <th>Question</th>
                        <th>Mark</th>
                        
                        <th>True</th>
                        <th>False</th>
                        <th>Answer</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>


                    </tr>
                    </thead>
                    @foreach($questions as $question)

                        <tr>
                            <td>{{$question->question_title}}</td>
                            <td>{{$question->mark}}</td>
                            <td>{{$question->op_true}}</td>
                            <td>{{$question->op_false}}</td>
                            
                            <td>{{$question->answer_option}}</td> 
                            <td><a  class="btn btn-primary btn-xs" href="{{ route('viewQuestionTf.Sub.chapt.cat',['idQ'=>$question -> id,'idS'=>$question -> subject_id,'idCh'=>$question -> id,'idC'=>$question -> subject_id]) }}" style="font-weight:bolder;"><span>View</span></a>
                            <td><a  class="btn btn-primary btn-xs" href="{{ route('editQuestionTf.Sub',['idQ'=>$question -> id,'idS'=>$question -> subject_id]) }}" style="font-weight:bolder;"><span>Edit</span></a>
                            <td><a href="{{route('destroyQuesTF',$question->id)}}" class="btn btn-danger btn-xs" style="height:20px;"><span class="glyphicon glyphicon-remove"></span></a><td>
   

                        
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