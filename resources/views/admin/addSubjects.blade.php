@extends('layouts/admin.app')
@section('content')
    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">

            <div class="content-header">
                <div class="content-header-labels">
                <form method="POST" class="my-login-validation" autocomplete="off"  action="{{ route('adminSubjects') }}">
                @csrf


                
                    <label for="TeacherName">Doctor Name</label>
                    <label for="levels" style="margin-right:227px;">Level</label>
                    <label for="departments" style="margin-right:166px;">Department</label>
                    <label for="subjects">Subject</label>
                   
                </div>
                

                <div class="content-header-select">
                <select id="DoctorName">
                        <option value="" selected disabled>Select Teacher Name</option>
                        <option value="">AmrAboHany12</option>
                    </select>
                    <select id="levels" name="level">
                        <option value="" selected disabled>Select Level</option>
                        @foreach($levels as $level)
                        <option value="{{$level->level_id}}">{{$level->level_name}}</option>
                        @endforeach
                    </select>

                  

                    <select id="subjects" name="subject">
                    
                        <option value="" selected disabled>Select Department</option>
                        @foreach($departments as $department)
                        <option value="{{$department->department_id}}">{{$department->department_name}}
                        @endforeach
                    </select>
                    
                    <input id="subject_name"  type="text" name="subject_name" class="content-header-select"  autofocus placeholder="Enter Subject name" value="{{ old('subject_name') }}">
                                    <span class="text-danger">@error('subject_name'){{ $message }}@enderror</span>




                                </div>
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
                   
                   
                    <td id="{{$subject->subject_id}}">
        <p class="fw-normal mb-1">{{$subject->subject_name}}</p>
       
      </td>
      <td><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button></td>
      <td><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>


        <br><br><br>
    </div>
    <!--content end-->
   

@endsection