@extends('layouts/doctor.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/css/doctorAddQuestions.css') }}"/>

    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">
            @foreach($questions as $question)
                <form method="post" action="{{route('doctorUpdateQuestion',['id'=>$question->id])}}">
                    @csrf
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                        @if ( Session::get('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                    @endif


                    <div class="content-parts">
                        <label>Question</label>
                        <input value="{{$question->question_title}}" style="height:150px;" name="questionTitle"></input>
                        @error('questionTitle')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>

                    <div class="content-parts">
                        <label>Mark</label>
                        <input type="text" value="{{$question->mark}}" name="questionMark">
                        @error('questionMark')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>

                    <div class="content-parts">
                        <label>Category</label>
                        <select name="questionCategory">
                            <option value="" selected disabled>Select Category</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            @error('questionCategory')
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </select>
                    </div>


                    <div class="content-parts">

                        <label>Option 1</label>
                        <input type="text" name="questionOptionOne" value="{{$question->option_one}}">
                        @error('questionOptionOne')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>

                    <div class="content-parts">
                        <label>Option 2</label>
                        <input type="text" name="questionOptionTwo" value="{{$question->option_two}}">
                        @error('questionOptionTwo')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>

                    <div class="content-parts">
                        <label>Option 3</label>
                        <input type="text" name="questionOptionThree" value="{{$question->option_three}}">
                        @error('questionOptionThree')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>

                    <div class="content-parts">
                        <label>Option 4</label>
                        <input type="text" name="questionOptionFour" value="{{$question->option_four}}">
                        @error('questionOptionFour')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>

                    <div class="content-parts">
                        <label for="Answer">Answer</label>
                        <select id="Answer" name="questionAnswer">
                            <option value="" selected disabled>Select Answer</option>
                            <option value="A">Option 1</option>
                            <option value="B">Option 2</option>
                            <option value="C">Option 3</option>
                            <option value="D">Option 4</option>
                            @error('questionAnswer')
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </select>
                    </div>

                    <div class="content-btn">
                        <button>Edit</button>
                    </div>
                </form>
            @endforeach
        </div>


        <br><br><br>
    </div>

@endsection