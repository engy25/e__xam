<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}"></script>
<link href="{{ asset('http://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css') }}">
<link href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}" rel="stylesheet">

@extends('layouts/admin.app')
<link rel="stylesheet" href="{{ asset('css/css/editDepartment.css') }}"/>
@section('content')

<div class="content">
    <br><br><br><br><br>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit & Update Department
                        <a href="{{ url('admin/departments') }}" class="btn btn-danger float-end" style="float: right; background-color:#005450;border:#005450 1px solid;">BACK</a>
                    </h4>
                </div>

                <div class="card-body">

                    <div class="row">  
                    <form action="{{url('admin/update/'.$departments -> id)}}" method="POST">
                        
                        
                                @csrf
                                @method('PUT')
                    </div>

                        <div class="form-group mb-3">
                            <label for="id">Department Name</label>
                            
                            <input id="department_name" type="text" name="department_name" value="{{$departments->department_name}}"  autofocus placeholder="Enter Department name"  class="form-control">

                            @error('department_name')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        </div>

                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary" style="margin-left: 20px; background-color:#005450;border:#005450 1px solid;">Update Department</button>
                </div>
        </div>
                       

                    </form>
        </div>
    </div>
</div>
<br><br><br>
</div>


@endsection

    