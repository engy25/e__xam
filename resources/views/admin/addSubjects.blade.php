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
</div>

                
                <div class="form-group">
                    <label for="levels" style="margin-right:227px;">Level</label>
                    <label for="department_id" style="margin-right:166px;">Department</label>
                    <label for="subject_id">Subject</label>
                </div>


                
                

                <div class="content-header-select">
                    <select id="levels" name="level_id">
                        <option value="" selected disabled>Select Level</option>
                        @foreach($levels as $level)
                        <option value="{{$level->level_id}}">{{$level->level_name}}</option>
                        @endforeach
                    </select>
                
                  

                    <select id="departments" name="department_id">
                    
                        <option value="" selected disabled>Select Department</option>
                        @foreach($departments as $department)
                        <option value="{{$department->department_id}}">{{$department->department_name}}
                        @endforeach
                    </select>
                    
                    <input id="subjects"  type="text" name="subject_name" class="content-header-select"  autofocus placeholder="Enter Subject name" value="{{ old('subject_name') }}">
                                    <span class="text-danger">@error('subject_name'){{ $message }}@enderror</span>




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

      <td>
      <a href="{{url('admin/edit/subject/'.$subject -> subject_id)}}" class="btn btn-primary">Edit</a>
      </td>
      <td>
      
      <a href="{{route('adminsubjectdelete',$subject->subject_id)}}" class="btn btn-danger"> delete</a>
  
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