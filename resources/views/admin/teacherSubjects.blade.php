
@extends('layouts/admin.app')
@section('content')
   
    <!--end Admin base-->
    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">
        <form method="POST" action="{{ route('adminTeacherSubjects') }}">
        @csrf
            <div class="content-header">
                <div class="content-header-labels">
                    <label for="TeacherName">Teacher Name</label>
                    <label for="Level" style="margin-right:227px;">Level</label>
                    <label for="Department" style="margin-right:166px;">Department</label>
                    <label for="Subject">Subject</label>
                </div>

                <div class="content-header-select">
                    <select id="userDoctors">
                        <option value="" selected disabled>Select Teacher Name</option>

                        @foreach($professors as $professor)
                                        <option value="{{$professor->role_id}}" >{{$professor->first_name}} </option>
										@endforeach
                       
                    </select>

                    <select id="levels">
                        <option value="" selected disabled>Select Level</option>
                        @foreach($levels as $level)
                                        <option value="{{$level->level_id}}" >{{$level->level_name}} </option>
										@endforeach
                    </select>

                    <select id="departments">
                        <option value="" selected disabled>Select Department</option>
                        @foreach($dapartments as $department)
                                        <option value="{{$department->department_id}}" >{{$department->department_name}} </option>
										@endforeach
                    </select>

                    <select id="subjects">
                        <option value="" selected disabled>Select Subject</option>
                        @foreach($subjects as $subject)
                                        <option value="{{$subject->subject_id}}" >{{$subject->subject_name}} </option>
										@endforeach
                    </select>

                   
                </div>
                <br> 

                <div class="content-header-btn">
                    <button>Clear</button>
                    <button  type="submit" >Add</button>
                    
                </div>
<br>
            </div>



            <div class="panel panel-primary" style="border-color:#75a3a3;clear:both;">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">Report</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                        <tr>
                            <th>Teacher Name</th>
                            <th>Level</th>
                            <th>Department</th>
                            <th>Subject</th>

                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tr>
                       @foreach($professors as $professor))
                        <td value="{{$professor->professor_id}}" >{{$professor->first_name}}</td>
                       
        
                        <td value="{{$professor->id}}">{{$professor->level_name}}</td>
                     
                        <td value="{{$professor->id}}">{{$professor->department_name}}</td>
                        @endforeach
                        @foreach($subjects as $subject)
                        <td>{{$subject->subject_name}}</td>
                        @endforeach
                     
                       
                        <td><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button></td>
                    </tr>
                </table>
            </div>
        </div>

        <br><br><br>
    </div>
    <!--content end-->
    @endsection