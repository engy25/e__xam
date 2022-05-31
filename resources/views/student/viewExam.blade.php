@extends('layouts/student.app')
@section('content')


<div class="content">
        <br><br><br><br><br>

        <div class="container">


            <div class="jumbotron my-4" style="background-color:#F0F0F0;margin-top:-20px;">
                <form class="form">
                    <h1 style="text-align: center;color:#484848;"></h1>
                    @foreach($questions as $question)


                    <h3 class="text-info" >{{$question->question_title}}</h3><h4 style="text-align: right;color:#484848;">[Marks 5]</h4>

                    <div class="form-check mx-4">
                        <input class="form-check-input" type="radio" name="option" id="option1" value="Option1">
                        <label class="form-check-label" for="option1">
                            option1
                        </label>
                    </div>

                    <div class="form-check mx-4">
                        <input class="form-check-input" type="radio" name="option" id="option2" value="Option2">
                        <label class="form-check-label" for="option2">
                            option2
                        </label>
                    </div>

                    <div class="form-check mx-4">
                        <input class="form-check-input" type="radio" name="option" id="option3" value="Option3">
                        <label class="form-check-label" for="option3">
                            option3
                        </label>
                    </div>

                    <div class="form-check mx-4">
                        <input class="form-check-input" type="radio" name="option" id="option4" value="Option4">
                        <label class="form-check-label" for="option4">
                            option4
                        </label>
                    </div>
@endforeach
                </form>
            </div>

        </div>

        <br><br><br>
    </div>
@endsection