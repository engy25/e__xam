@extends('layouts/doctor.app2')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/css/doctorAddExam.css') }}"/>
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
                </div>
                <div  class="row-inputs">
                    <input type="text" name="questionCount" class="content-header-select"/>
                    @error('questionCount')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="row-inputs">
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
                    <label>Level</label>
                    <label>Department</label>
                    <label>Subject</label>
                </div>

                <div class="row-inputs">
                    <select name="examLevel" id="Level">
                        <option value="" selected disabled>Select Level</option>
                        @foreach($levels as $level)
                            <option value="{{$level->level_id}}">{{$level->level_name}}</option>
                        @endforeach
                    </select>
                    @error('examLevel')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror

                    <select name="examDepartment" id="Department">
                        <option value="" selected disabled>Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{$department->department_id}}">{{$department->department_name}}</option>
                        @endforeach
                    </select>
                    @error('examDepartment')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror

                    <select name="examSubject" id="Subject">
                        <option value="" selected disabled>Select Subject</option>
                        @foreach($subjects as $subject)
                            <option value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                        @endforeach
                    </select>
                    @error('examSubject')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                </div>

                <div class="container-btn">
                    <button>Submit</button>
                </div>


            </form>

        </div>

        <br><br><br>
    </div>
    <!--content end-->

@endsection