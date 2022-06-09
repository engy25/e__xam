@extends('layouts/doctor.app2')
@section('content')
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{ asset('css/css/Teacher-ViewExams.css') }}"/>

<div class="content">
        <br><br><br><br><br>

        <div class="container">

            <div class="content-header">
                <div class="content-header-labels">
                <form method="POST" class="my-login-validation" autocomplete="off"  action="{{ route('subjectAddExQu') }}">
                @csrf
                </div>


                <div class="panel panel-primary" style="border-color:#75a3a3;">
                    <div class="panel-heading" style="background-color:#005450;">
                        <h6 class="panel-title">Report</h6>
                    </div>
          
                    <table class="table table-hover" id="dev-table">
                          <tr>
                            <th>Subject</th>
                            <th> Question MCQ</th>
                            <th> Question True $ False</th>
                            
                          </tr>
                      
                          @foreach($professor_subjects as $subject)
                          <tr>
                          
                            <td id="{{$subject->id}}">
                              <p class="fw-normal mb-1">{{$subject->subject_name}}</p>
                            
                            </td>
                            <td>
                            <a href="{{url('doctor/subjectAddQues',['id'=>$subject->id])}}" class="btn btn-primary btn-xs" style="font-weight:bolder;"><span>Add</span></a>
                            <a href="{{url('doctor/viewQuestion',['id'=>$subject->id])}}" class="btn btn-primary btn-xs" style="font-weight:bolder;"><span>View</span></a>

                                </td>

                            <td>
                            
                            <a href="{{url('doctor/subjectAddQuTF/'.$subject -> id)}}" class="btn btn-primary btn-xs" style="font-weight:bolder;"><span>Add</span></a>
                            <a href="{{url('doctor/viewQuestionTF',['id'=>$subject->id])}}" style="font-weight:bolder;"><span>View</span></a>
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