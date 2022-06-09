<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

@extends('layouts/admin.app')
<link rel="stylesheet" href="{{ asset('css/css/Admin-AddDepartments.css') }}"/>
@section('content')
<div class="content">
        <br><br><br><br><br>

        <div class="container">

            <div class="content-header">
                <div class="content-header-labels">
                <form method="POST" class="my-login-validation" autocomplete="off"  action="{{ route('adminLevels') }}">
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

                <label for="level_name" style="margin-bottom: -3px">Levels</label>
                </div>

              

                <div class="content-header-select">			
                        <input id="level_name" type="text" name="level_name"  placeholder="Enter level Name" value="{{ old('level_name') }}">
                        @error('level_name')
                        <span class="form-text text-danger">
                            {{$message}}
                        </span>
                        @enderror
								</div>

                <div class="content-header-btn">
                    <button type ="submit">Add</button>
                </div>
            </div>

                <div class="panel panel-primary" style="border-color:#75a3a3;">
                    <div class="panel-heading" style="background-color:#005450;">
                        <h6 class="panel-title">Report</h6>
                    </div>
                    <table class="table table-hover" id="dev-table">
                        <thead>
                          <tr>
                            <th>level</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        
                          @foreach($levels as $level)
                          <tr>
                          
                            <td id="{{$level->id}}">
                              {{$level->level_name}}
                            </td>

                            <td>
                            <a href="{{url('admin/edit/level/'.$level -> id)}}" class="btn btn-primary btn-xs" style="font-weight:bolder;"><span>Edit</span></a>
                            </td>

                            <td>     
                            <a href="{{route('adminleveldelete',$level->id)}}" class="btn btn-danger btn-xs" style="height:20px;"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>


                            
                          </tr>
                          @endforeach
                        
                      
                      </table>

</div>

 
@endsection