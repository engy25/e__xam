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
                    <h4>Edit & Update Subjects of Doctor
                        <a href="{{ url('admin/subjectDoctor') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
            <div class="row">
                
                    <form action="{{url('admin/update/subjectDoctor/'.$subjects -> subject_id)}}" method="POST">
                        @csrf
                        @method('PUT')
</div>

                        <div class="form-group mb-3">
                            <label for="subject_name">Doctor Name</label>
                            
                            <input id="subject_name" type="text" name="subject_name" value="{{$subjects->subject_name}}"  autofocus placeholder="Enter Subject name"  class="form-control">
                        </div>


                        <div class="form-group" >
                                    <label for="subjects">Subject Name</label>
                                    <select  id="subjects" class="form-control" name="subject_id">
                                        <option value="" selected disabled>Select subjects</option>
										@foreach($subjects as $subject)
                                        <option value="{{$subject->subject_id}}" >{{$subject->subject_name}} </option>
										@endforeach
                                    </select>
                                </div>

                                <div class="form-group" >
                                    <label for="users">Teacher Name</label>
                                    <select  id="users" class="form-control" name="id">
                                        <option value="" selected disabled>Select subjects</option>
										@foreach($users as $user)
                                        <option value="{{$user->id}}" >{{$user->email}} </option>
										@endforeach
                                    </select>
                                </div>

								


                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update subjects of doctor</button>
                        </div>

                    </form>
</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

    