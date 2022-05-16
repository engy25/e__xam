@extends('layouts/admin.app')
@section('content')
<div class="content">
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Edit & Update Subject
                        <a href="{{ url('admin/subjects') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
            <div class="row">
                
                    <form action="{{url('admin/update/subject/'.$subjects -> subject_id)}}" method="POST">
                        @csrf
                        @method('PUT')
</div>

                        <div class="form-group mb-3">
                            <label for="subject_name">Subject Name</label>
                            
                            <input id="subject_name" type="text" name="subject_name" value="{{$subjects->subject_name}}"  autofocus placeholder="Enter Subject name"  class="form-control">
                        </div>


                        <div class="form-group" >
                                    <label for="levels">Level</label>
                                    <select  id="levels" class="form-control" name="level_id">
                                        <option value="" selected disabled>Select levels</option>
										@foreach($levels as $level)
                                        <option value="{{$level->level_id}}" >{{$level->level_name}} </option>
										@endforeach
                                    </select>
                                </div>

								<div class="form-group" >
                                    <label for="roles">Department</label>
                                    <select id="departments" class="form-control" name="department_id">
                                        <option value="" selected disabled>Select departments</option>
										@foreach($departments as $department)
                                        <option value="{{$department->department_id}}" >{{$department->department_name}} </option>
										@endforeach
                                    </select>
                                </div>


                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Student</button>
                        </div>

                    </form>
</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

    