@extends('layouts/admin.app')
@section('content')
    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">

            <div class="content-header">
                <div class="content-header-labels">
                    <label for="Level">Level</label>
                    <label>Department</label>
                    <label>Subject</label>
                </div>

                <div class="content-header-select">
                    <select id="Level">
                        <option value="" selected disabled>Select Level</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>

                    <select id="Department">
                        <option value="" selected disabled>Select Department</option>
                        <option value="">SE</option>
                    </select>

                    <input type="text" class="content-header-select" />
                </div>

                <div class="content-header-btn">
                    <button>Add</button>
                </div>
            </div>

            <div class="panel panel-primary" style="border-color:#75a3a3;">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">Report</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Department</th>

                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>3</td>
                        <td>Se</td>

                        <td><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button></td>
                    </tr>
                </table>
            </div>
        </div>


        <br><br><br>
    </div>
    <!--content end-->
    <!--JS code start-->
    <script src="js/AdminBase.js"></script>
    <!--JS code end-->
</body>
</html>

@endsection