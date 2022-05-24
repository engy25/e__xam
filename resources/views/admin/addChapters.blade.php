@extends('layouts/admin.app')
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>E-Exam</title>
    <!--start admin base-->
    <link rel="stylesheet" href="{{ asset('css/AdminBase.css') }}" />
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css') }}">
    <!--end admin base-->

    <link href="{{ asset('https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css') }}" rel="stylesheet" id="{{ asset('bootstrap-css') }}">
    <script src="{{ asset('https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('https://code.jquery.com/jquery-1.11.1.min.js') }}"></script>

    <style>
    body{
            background-color:#F0F0F0;
        }
        a:link {
            text-decoration: none;
        }
        h6 {
            text-align: center;
        }
        .row {
            margin: 100px;
        }
        .content-header-labels {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .content-header-select {
            margin-bottom: 20px;
        }
        .content-header-btn {
            margin-bottom: 150px;
        }
        .content-header-labels label {
            margin-right: 250px;
            color:#484848;
        }
        .content-header-select select, input {
            width: 200px;
            padding: 5px;
            background-color: white;
            border-radius: 5px;
            border: 1px solid #75a3a3;
            margin-right: 105px;
        }
        .content-header-btn button {
            float: right;
            padding: 10px;
            width: 110px;
            margin-right: 30px;
            background-color: #005450;
            color: white;
            border: 1px solid #75a3a3;
            border-radius: 5px;
            font-weight: bold;
        }
        .content-header-select input {
            margin-left: 56px;
        }
    </style>

</head>
<body>
@section('content')
    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">

            <div class="content-header">
                <div class="content-header-labels">
                <form method="POST" class="my-login-validation" autocomplete="off"  action="{{ route('adminChapters') }}">
                @csrf
</div>

                <div class="form-group">
                <label for="chapters" style="margin-right:227px;">Chapter Name</label>
                    <label for="Describe Chapter" style="margin-right:166px;">Describe Chapter</label>
                    <label for="subjects">Subject</label>
                </div>
                  

                <input id="chapters"  type="text" name="chapter_name" class="content-header-select"  autofocus placeholder="Enter Chapter name" value="{{ old('chapter_name') }}">
                                    <span class="text-danger">@error('chapter_name'){{ $message }}@enderror</span>

                                    <input id="describe_chapter"  type="text" name="describe_chapter" class="content-header-select"  autofocus placeholder="Describe the chapter" value="{{ old('describe_chapter') }}">
                                    @error('describe_chapter')
                        <small class="form-text text-danger">
                            {{$message}}

                        </small>
                        @enderror

                    
            <div>
            <select id="subjects" name="subject_id">
                    
                    <option value="" selected disabled>Select subjects</option>
                    @foreach($subjects as $subject)
                    <option value="{{$subject->id}}">{{$subject->subject_name}}
                    @endforeach
                    @error('subject_name')
                        <small class="form-text text-danger">
                            {{$message}}

                        </small>
                        @enderror
                </select>
                
                
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
                            
                            <th>Chapters</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    @foreach($chapters as $chapter)
                    <tr>
                   
                   
                    <td id="{{$chapter->id}}">
        <p class="fw-normal mb-1">{{$chapter->chapter_name}}</p>
       
      </td>

      <td>
      
      <a href="{{url('admin/edit/chapters/'.$chapter -> id)}}" class="btn btn-primary">Edit</a>
      </td>
      <td>
      
      <a href="{{route('adminChaptertdelete',$chapter->id)}}" class="btn btn-danger"> delete</a>
  
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