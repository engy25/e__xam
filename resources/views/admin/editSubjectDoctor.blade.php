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

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Edit & Update Subjects of Doctor
                        <a href="{{ url('admin/subjectDoctor') }}" class="btn btn-danger float-end" style="float: right; background-color:#005450;border:#005450 1px solid;">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
            <div class="row">
                
                    <form action="{{url('admin/update/subjectDoctor/'.$subjects -> subject_id)))}}" method="POST">
                        @csrf
                        @method('PUT')
</div>

                        <div class="form-group mb-3">
                            <label for="subject_name">Doctor Name</label>
                            
                            <input id="subject_name" type="text" name="subject_name" value="{{$subjects->subject_name}}"  autofocus placeholder="Enter Doctor name"  class="form-control">
                        </div>


                        <div class="form-group" >
                                    <label for="subjects">Subject Name</label>
                                    <select  id="subjects" class="form-control" name="subject_id">
                                        <option value="" selected disabled>Select Subject</option>
										@foreach($subjects as $subject)
                                        <option value="{{$subject->subject_id}}" >{{$subject->subject_name}} </option>
										@endforeach
                                    </select>
                                </div>

                                <div class="form-group" >
                                    <label for="users">Teacher Name</label>
                                    <select  id="users" class="form-control" name="email">
                                        <option value="" selected disabled>Select Subject</option>
										@foreach($users as $user)
                                        <option value="{{$user->id}}" >{{$user->email}} </option>
										@endforeach
                                    </select>
                                </div>

								


                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary"  style="background-color:#005450;border:#005450 1px solid;">Update subjects of doctor</button>
                        </div>

                    
</div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
</div>

@endsection

    