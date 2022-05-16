@extends('layouts/doctor.app')
@section('content')

    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">
            <div class="panel panel-primary" style="border-color:#75a3a3;">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">Finished Exams</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                    <tr>
                        <th>Exam Name</th>
                        <th>Total Mark</th>

                        <th>Results</th>
                    </tr>
                    </thead>
                    <tr>
                        <td>Data Base</td>
                        <td>20</td>

                        <td><a class="btn btn-primary btn-xs" href="{{route('doctorViewResults')}}"
                               style="font-weight:bolder;"><span>View</span></a></td>
                    </tr>
                </table>
            </div>
        </div>

        <br><br><br>
    </div>
    <!--content end-->

@endsection