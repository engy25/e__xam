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
                    <h4>Edit & Update Level
                        <a href="{{ url('admin/levels') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
            <div class="row">
            
                    <form action="{{url('admin/update/level/'.$levels -> level_id)}}" method="POST">
                        @csrf
                        @method('PUT')
</div>

                        <div class="form-group mb-3">
                            <label for="level_id">Level Name</label>
                            
                            <input id="level_name" type="text" name="level_name" value="{{$levels->level_name}}"  autofocus placeholder="Enter Level name"  class="form-control">
                        </div>



                    


                       

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Levels</button>
                        </div>

                    </form>
</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

    