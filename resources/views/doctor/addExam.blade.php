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
                    <input type="text" name="onlineExam_name" class="content-header-select"/>
                    @error('onlineExam_name')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                    <input type="text" name="total_questions" class="content-header-select"/>
                    @error('total_questions')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                    <input type="text" name="onlineExam_marks" class="content-header-select"/>
                    @error('onlineExam_marks')
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
                    <input type="text" name="onlineExam_duration" class="content-header-select"/>
                    @error('onlineExam_duration')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                    <input type="text" name="onlineExam_pass" class="content-header-select"/>
                    @error('onlineExam_pass')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                    <input type="date" name="onlineExam_datetime" class="content-header-select"/>
                    @error('onlineExam_datetime')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                </div>

                <div class="row-labels">
                    <label>Subject</label>
                </div>


                <select name="subject_id" id="Subject">
                    <option value="" selected disabled>Select Subject</option>
                    @foreach($professor_subjects as $subject)
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