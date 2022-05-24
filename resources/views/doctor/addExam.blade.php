@extends('layouts/doctor.app2')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/css/Teacher-AddExam.css') }}"/>
    <!--content start-->
    <div class="content">
        <br><br><br><br><br>


        <div class="container">

            <form method="post" action="{{route('doctorInsertExam')}}">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if ( Session::get('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                @csrf
                <div class="row-labels">
                    <label>Exam Name</label>
                    <label>Total Questions</label>
                    <label>Total Marks</label>
                </div>

                <div class="row-inputs">
                    <input type="text" name="examName" class="content-header-select"/>
                    @error('examName')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                    <input type="text" name="questionCount" class="content-header-select"/>
                    @error('questionCount')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                    <input type="text" name="totalMarks" class="content-header-select"/>
                    @error('totalMarks')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror

                </div>

                <div class="row-labels">
                    <label>Total Time (Minutes)</label>
                    <label>Pass Mark</label>
                    <label>Exam Date</label>
                </div>

                <div class="row-inputs">
                    <input type="text" name="totalTime" class="content-header-select"/>
                    @error('totalTime')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                    <input type="text" name="passMark" class="content-header-select"/>
                    @error('passMark')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                    <input type="date" name="examDate" class="content-header-select"/>
                    @error('examDate')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                </div>

                <div class="row-labels">
                    <label>Subject</label>
                </div>


                <select name="examSubject" id="Subject">
                    <option value="" selected disabled>Select Subject</option>
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                    @endforeach
                </select>
                @error('examSubject')
                <small class="form-text text-danger">
                    {{$message}}
                </small>
                @enderror
                    <br><br><br>
                <div class="container-btn">
                    <button>Submit</button>
                </div>
            </form>
        </div>



    </div>
    <!--content end-->

@endsection