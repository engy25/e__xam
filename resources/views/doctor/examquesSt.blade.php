@extends('layouts/doctor.app2')
@section('content')

<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="{{ asset('bootstrap-css') }}">
<link rel="stylesheet" href="{{ asset('css/css/Teacher-AddQuestions.css') }}"/>

<div class="content">
        <br><br><br><br><br>

        <div class="container">
                   
<form method="POST"  id="formElement" autocomplete="off" action="{{ route('storeExamStruc.Sub',['idE'=>$Online_exam->id,'idS'=>$subjects->id]) }}" >
        @csrf

        
    <div class="content-parts">
            <label>Chapter</label>
            <select required name="chapter">
            <option disabled selected ></option>
                @foreach($chapters as $chapter)    
                    <option value="{{$chapter->id}}" > {{$chapter->chapter_name}}</option>
                @endforeach
            </select>
    </div>  

    <div class="content-parts">
            <label>Category</label>
            <select required name="category">
            <option disabled selected ></option>
                    @foreach($categorie as $category)
                    <option value="{{$category->id}}" >{{$category->category_name}}</option>
                    @endforeach
            </select>
    </div>
 
    <div class="content-parts">
        <label>Type</label>
        <select name="type">
        <option disabled selected ></option>                
        <option value=1 >MCQ</option>
        <option value=2 >TRUE FALSE</option>  
        </select>               
</div>


    
    <div class="content-parts">
        <label>Number of questions</label>
        <input required="required" type="number" name="num_of_question" placeholder="Enter a whole number of the MCQ Question"/>
    </div>
    
    <div class="content-btn">
        <button type="submit">Submit</button>
    </div> 
    
    </form>
    
    </div>


<br><br><br>
</div>
   @endsection