@extends('layouts/doctor.app')
@section('content')


    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">
            <div class="row">

                <div class="col-md-4 col-xl-4">
                    <div class="card bg-c-blue order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Total Students </h6>
                            <h2 class="text-right"><i class="fas fa-user-graduate f-left"></i><span>{{$countStudent}}</span></h2>

                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-xl-4">
                    <div class="card bg-c-green order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Total Exams </h6>
                            <h2 class="text-right">
                                <i class="fas fa-chalkboard-teacher f-left"></i><span>{{$countExam}}</span></h2>

                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-4">
                    <div class="card bg-c-yellow order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Total Questions</h6>
                            <h2 class="text-right"><i class="fas fa-book f-left"></i><span>{{$countQuestion}}</span></h2>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <br><br><br>
    </div>
    <!--content end-->

@endsection