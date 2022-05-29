﻿@extends('layouts/doctor.app2')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/css/Teacher-AddQuestions.css') }}"/>

    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">
        
       
        <form method="post" action="{{url('doctor/addtQuestionTF/'.$subjects -> id)}}">
                @csrf
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @if ( Session::get('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                @endif

                <div class="content-parts">
                    <label>Question</label>
                    <textarea style="height:150px;" name="questionTitle"></textarea>
                    @error('questionTitle')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                </div>

                <div class="content-parts">
                    <label>Mark</label>
                    <input type="text" name="questionMark">
                    @error('questionMark')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                </div>

                <div class="content-parts" name="category_id">
                    <label>Category</label>
                    <select name="category_id">
                        <option value="" selected disabled>Select Category</option>
                        @foreach($categorie as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}
                        @endforeach
                        @error('category_id')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </select>
                </div>

                <div class="content-parts">
                    <label>True</label>
                    <input type="text" name="questionOptionTrue">
                    @error('questionOptionTrue')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                </div>

                <div class="content-parts">
                    <label>False</label>
                    <input type="text" name="questionOptionFalse">
                    @error('questionOptionFalse')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                </div>


 

                <div class="content-parts">
                    <label for="Answer">Answer</label>
                    <select id="Answer" name="questionAnswer">
                        <option value="" selected disabled>Select Answer</option>
                        <option value="T">True</option>
                        <option value="F">False </option>
                       
                        @error('questionAnswer')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </select>
                </div>

                <select name="chapter_id" id="Chapters">
                    <option value="" selected disabled>Select Chapters</option>
                    @foreach($chapters as $chapter)
                        <option value="{{$chapter->id}}">{{$chapter->chapter_name}}</option>
                    @endforeach
                    @error('chapter_id')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror
                </select>
                

                <div class="content-btn">
                    <button type="submit">Add</button>
                </div>
            </form>

        </div>


        <br><br><br>
    </div>

    @endsection
    