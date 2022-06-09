@extends('layouts/student.app')
@section('content')

<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="css/Teacher-ViewquestionDetail.css"/>

<div class="content" id="c">
        <br><br><br><br><br>

        <div class="container">

            <div class="form">
                <div class="form-header">
                    <h3>Question Details</h3>
                </div>

                <div class="form-center">

                    <div class="form-group">
                        <label class="form-labels">Question: </label>
                        <label name ="question_title" class="form-txt"> {{$questions->question_title}} </label>
                    </div>

                    <div class="form-group">
                        <label class="form-labels">Mark</label>
                        <label  name ="mark"class="form-txt"> {{$questions->mark}} </label>
                    </div>

                    <div class="form-group">
                        <label class="form-labels">Category</label>
                        <label name ="category_id" class="form-txt"> {{$questions->category->category_name}}  </label>
                    </div>

                    <div class="form-group">
                        <label class="form-labels">Option 1</label>
                        <label class="form-txt"> {{$questions->op_true}}</label>
                    </div>

                    <div class="form-group">
                        <label class="form-labels">Option 2</label>
                        <label class="form-txt"> {{$questions->op_false}} </label>
                    </div>


                    <div class="form-group">
                        <label class="form-labels">Answer</label>
                        <label class="form-txt"> {{$questions->answer_option}}  </label>
                    </div>

                   

                    <div class="form-group">
                        <label class="form-labels">Subject</label>
                        <label name="subject_id" class="form-txt"> {{$questions->subject->subject_name}} </label>
                    </div>

                </div>
            </div>

        </div>

        <br><br><br>
    </div>
    @endsection