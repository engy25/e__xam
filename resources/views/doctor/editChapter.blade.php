@extends('layouts/doctor.app2')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}"></script>
<link href="{{ asset('http://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css') }}">
<link href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/css/editDepartment.css') }}"/>


    <div class="content">
        <br><br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    @if ( Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if ( Session::get('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <form action="{{url('doctor/update/chapters/'.$chapters -> id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit & Update Subject
                                    <a href="{{ url('doctor/chapters') }}" class="btn btn-danger float-end" style="float: right; background-color:#005450;border:#005450 1px solid;">BACK</a>
                                </h4>
                            </div>
                            <div class="card-body">
                    
                                <div class="form-group mb-3">
                                    <label for="chapter_name">Chapter Name</label>

                                    <input id="chapter_name" type="text" name="chapter_name"
                                           value="{{$chapters->chapter_name}}" autofocus
                                           placeholder="Enter Chapter Description" class="form-control">

                                    @error('chapter_name')
                                    <small class="form-text text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>


                                <div class="form-group mb-3">
                                    <label for="chapter_name">Describe Chapter </label>

                                    <input id="describe_chapter" type="text" name="describe_chapter"
                                           value="{{$chapters->describe_chapter}}" autofocus
                                           placeholder="Enter Chapter Description" class="form-control">

                                    @error('describe_chapter')
                                    <small class="form-text text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="roles">Subject</label>
                                    <select id="subjects" class="form-control" name="subject_id">
                                        <option value="" selected disabled>Select Subject</option>
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}">{{$subject->subject_name}} </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary" style="background-color:#005450;border:#005450 1px solid;">Update Chapter</button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
