﻿@extends('layouts/admin.app')
@section('content')

    <!--content start-->
    <div class="content">
        <br><br><br><br><br>
       <div class="container">
        <h4>
                        <a href="{{ url('admin/departments') }}" class="btn btn-danger float-end">BACK</a>
</h4>
</div>
        <div class="container">
            <div class="row">
            
                  
            
            <form method="POST" action="{{ url('admin/departments') }}" >
            @csrf
            {{-- <input name="_token" value="{{csrf_token()}}"> --}}


            <div class="form-group">    
              <label for="department_name">Department you want to change</label>
              <input type="text" class="form-control" name="department_name"/>
              <span class="text-danger">@error('department_name'){{ $message }}@enderror</span>
          </div>

          
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
            </div>
        </div>
        
        <br><br><br>
    </div>
    <!--content end-->

@endsection

    