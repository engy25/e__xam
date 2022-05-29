@extends('layouts/doctor.app2')
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
    </style>

</head>
<body>
@section('content')
<div class="content">
        <br><br><br><br><br>

        <div class="container">

            <div class="content-header">
                <div class="content-header-labels">
<form   id="formElement"  >
        @csrf


                    </div>
    <div class="form-group mb-3">
            <label>Chapter</label>
            <select style="color: #323a56" class="form-control" required name="chapter">
            <option class="dropdown-item" disabled selected ></option>
                @foreach($chapters as $chapter)    
                    <option class="dropdown-item" value="{{$chapter->id}}" > {{$chapter->chapter_name}}</option>
                @endforeach
            </select>
    </div>



    

    <div class="form-group mb-3">
            <label>Category</label>
            <select style="color: #323a56" required class="form-control" name="category">
            <option class="dropdown-item" disabled selected ></option>
                    @foreach($categorie as $category)
                    <option class="dropdown-item" value="{{$category->id}}" >{{$category->category_name}}</option>
                    @endforeach
            </select>
    </div>





    <div class="form-group mb-3">
        <label>Number of questions</label>
        <input required="required" type="number" name = "num_of_question " class="form-control" style="font-size:18px; height:30px;" placeholder="Enter a whole number of the MCQ Question"/>
    </div>

    
        
    <button type="submit" class="button-33">Submit</button>
    </form>
    
    </div>


<br><br><br>
</div>
   @endsection