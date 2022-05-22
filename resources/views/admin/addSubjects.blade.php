@extends('layouts/admin.app')
@section('content')
    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">

            <div class="content-header">
                <div class="content-header-labels">
                    <label for="Level">Level</label>
                    <label>Department</label>
                    <label>Subject</label>
                </div>
                


                <div class="content-header-select">
                    <select id="level_id">
                  
                        <option value="level_id" selected disabled>Select Level</option>
                        @foreach($levels as $level)
                        <option value="{{$level->level_id}}">{{$level->level_name}}</option>
                        @endforeach
                        
                    </select>

                    <select id="subject_id">
                    
                        <option value="subject_id" selected disabled>Select Department</option>
                        @foreach($departments as $department)
                        <option value="{{$department->department_id}}">{{$department->department_name}}
                        @endforeach
                    </select>
                    
                    <input type="text" class="content-header-select" />
                </div>

                <div class="content-header-btn">
                    <button>Add</button>
                </div>
            </div>

            <div class="panel panel-primary" style="border-color:#75a3a3;">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">Report</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Department</th>

                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tr>
                   
                        <td>3</td>
                        <td>Se</td>

                        <td><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button></td>
                    </tr>
                </table>
            </div>
        </div>


        <br><br><br>
    </div>
    <!--content end-->
   

@endsection