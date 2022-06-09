@extends('layouts/doctor.app2')
@section('content')

<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="{{ asset('bootstrap-css') }}">
<link rel="stylesheet" href="{{ asset('css/css/Teacher-addChapters.css') }}"/>

    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">

            <div class="content-header">
                <form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('docSavedChapters') }}">
                    @csrf

                    <div class="content-header-labels">
                        <label for="chapters">Chapter Name</label>
                        <label for="Describe Chapter" style="margin-left: -28px;">Describe Chapter</label>
                        <label for="subjects" style="margin-left: -56px">Subject</label>
                    </div>


                    <div class="content-header-select">
                    <input id="chapters" type="text" name="chapter_name" class="content-header-select" autofocus
                           placeholder="Enter Chapter name" value="{{ old('chapter_name') }}">
                    <span class="text-danger">@error('chapter_name'){{ $message }}@enderror</span>

                    <input id="describe_chapter" type="text" name="describe_chapter" class="content-header-select"
                           autofocus
                           placeholder="Describe the chapter" value="{{ old('describe_chapter') }}">
                    @error('describe_chapter')
                    <small class="form-text text-danger">
                        {{$message}}

                    </small>
                    @enderror


                   
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
                        <button type="submit">Add</button>
                    </div>
                </form>
            </div>

            <div class="panel panel-primary" style="border-color:#75a3a3;">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">Report</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <tr>

                        <th>Chapters</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($chapters as $chapter)
                        <tr>


                            <td id="{{$chapter->id}}">
                                <p class="fw-normal mb-1">{{$chapter->chapter_name}}</p>

                            </td>

                            <td>

                                <a href="{{url('doctor/edit/chapters/'.$chapter -> id)}}" class="btn btn-primary btn-xs" style="font-weight:bolder;"><span>Edit</span></a>
                            </td>
                            <td>

                                <a href="{{route('docChaptertdelete',$chapter->id)}}" class="btn btn-danger btn-xs" style="height:20px;"><span class="glyphicon glyphicon-remove"></span></a>

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