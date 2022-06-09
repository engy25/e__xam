<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

@extends('layouts/admin.app')
<link rel="stylesheet" href="{{ asset('css/css/Admin-AddSubjects.css') }}"/>
@section('content')
    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">

            <div class="content-header">
                <div class="content-header-labels">
                <form method="POST" class="my-login-validation" autocomplete="off"  action="{{ route('adminSubjects') }}">
                @csrf
                <label for="levels" style="margin-bottom: -3px">Level</label>
                <label for="departments" style="margin-bottom: -3px">Department</label>
                <label for="subjects" style="margin-bottom: -3px">Subject</label>
            </div>
         

                <div class="content-header-select">
                    <select id="levelss" name="level_id">
                        <option value="" selected disabled>Select Level</option>
                        @foreach($levelss as $level)
                        <option value="{{$level->id}}">{{$level->level_name}}</option>
                        @endforeach
                    </select>       

                    <select id="departments" name="department_id">         
                        <option value="" selected disabled>Select Department</option>
                        @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->department_name}}
                        @endforeach
                    </select>
                    
                    <input id="subjects"  type="text" name="subject_name" class="content-header-select"  autofocus placeholder="Enter Subject name" value="{{ old('subject_name') }}">
                    <span class="text-danger" style="margin-left: -80px;">@error('subject_name'){{ $message }}@enderror</span>
                </div>
                

                <div class="content-header-btn">
                    <button  type="submit" >Add</button>
                </div>
            </div>

            <div class="panel panel-primary" style="border-color:#75a3a3;">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">Report</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                        <tr>         
                            <th>Department</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    @foreach($subjects as $subject)

                    <tr> 

                    <td id="{{$subject->id}}">
                    {{$subject->subject_name}}    
                    </td>

                    <td>
                    <a href="{{url('admin/edit/subject/'.$subject -> id)}}" class="btn btn-primary btn-xs" style="font-weight:bolder;"><span>Edit</span></a>
                    </td>

                    <td>                
                    <a href="{{route('adminsubjectdelete',$subject->id)}}" class="btn btn-danger btn-xs" style="height:20px;"><span class="glyphicon glyphicon-remove"></span></a>               
                    </td>

                    </tr>
                    @endforeach
                    </table>
            </div>
        </div>


        <br><br><br>
    </div>
    <!--content end-->
   

@endsection