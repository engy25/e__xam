
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Register page</title>
    <link rel="stylesheet" type="text/css" href="css/my-register.css">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
				
					<div class="cardx fat mt-4">
						<div class="card-body">
							<h4 class="card-title">Register </h4>
							<form method="POST" class="my-login-validation" autocomplete="off" enctype="multipart/form-data" action="{{ route('register') }}">

								@if ( Session::get('success'))
									 <div class="alert alert-success">
										 {{ Session::get('success') }}
									 </div>
								@endif
								@if ( Session::get('error'))
									 <div class="alert alert-danger">
										 {{ Session::get('error') }}
									 </div>
								@endif
                                @csrf
								<div class="form-group" >
                                    <label  for="role">Role</label>
                                    <select onChange="roleChange();" id="roles" class="form-control" name="role">
                                        <option value="" selected disabled>Select roles</option>
										@foreach($roles as $role)
                                        <option value="{{$role->role_id}}" >{{$role->role_name}} </option>
										@endforeach
                                    </select>
                                </div>
							

								

								<div  id="levels"  style="display:none" class="form-group" >
                                    <label  for="levels">Level</label>
                                    <select  class="form-control" name="level">
                                        <option value="" selected disabled>Select levels</option>
										@foreach($levels as $level)
                                        <option value="{{$level->level_id}}" >{{$level->level_name}} </option>
										@endforeach
                                    </select>
                                </div>

								<div  id="departments"  style="display:none" class="form-group" >
                                    <label  for="roles">Department</label>
                                    <select   class="form-control" name="department">
                                        <option value="" selected disabled>Select departments</option>
										@foreach($departments as $department)
                                        <option value="{{$department->department_id}}" >{{$department->department_name}} </option>
										@endforeach
                                    </select>
                                </div>

                              

								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email"  placeholder="Enter email" value="{{ old('email') }}">
									<span class="text-danger">@error('email'){{ $message }}@enderror</span>
								</div>


<div class="container">
    <div class="form-header">
        <h1>Sign Up</h1>
    </div>
    <div class="form-center">
        <form method="POST" class="my-login-validation" autocomplete="off" enctype="multipart/form-data"
              action="{{ route('register') }}">

            @if ( Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if ( Session::get('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            @csrf
            <div class="form-group">
                <label for="first_name" class="form-labels">First Name</label>
                <label class="form-labels" style="position:relative;left:271px;">Last Name</label>
                <br/>
                <input id="first_name" name="first_name" autofocus type="text" class="form-txt1"
                       placeholder="Enter First Name" value="{{ old('first_name') }}"/>
                <input type="text" class="form-txt2" placeholder="Enter Last Name"/>
                <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
            </div>

            <div class="form-group">
                <label for="mobile" class="form-labels">Mobile</label>
                <label for="email" class="form-labels" style="position:relative;left:300px;">E-Mail Address</label>
                <br/>
                <input id="mobile" type="text" class="form-txt1" name="mobile" autofocus
                       placeholder="Enter mobile" value="{{ old('mobile') }}">
                <span class="mobile-danger">@error('mobile'){{ $message }}@enderror</span>

                <input id="email" type="email" class="form-txt2" name="email"
                       placeholder="Enter email" value="{{ old('email') }}">
                <span class="text-danger">@error('email'){{ $message }}@enderror</span>

            </div>
            <div class="form-group">
                <label for="password" class="form-labels">Password</label>
                <label for="password-confirm" class="form-labels" style="position:relative;left:280px;">Confirm
                    Password</label>
                <br/>
                <input id="password" type="password" class="form-txt1" name="password" data-eye
                       placeholder="Enter password">
                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                <input id="password-confirm" type="password" class="form-txt2"
                       name="password_confirmation" required data-eye
                       placeholder="Enter confirm password">
                <span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>

            </div>

            <div class="form-group">
                <label for="photo" class="form-labels">Photo</label>
                <label for="roles" class="form-labels" style="position:relative;left:304px;">Role</label>
                <br/>
                <input id="photo" type="file" class="form-txt1" name="photo" style="background-color:white;"
                       value="{{ old('photo') }}">
                <select onchange="roleChange();" id="roles" class="form-select1" name="role"
                        style="position:relative;left:76px;">
                    <option value="" selected disabled>Select Role</option>
                    @foreach($roles as $role)
                        <option value="{{$role->role_id}}">{{$role->role_name}} </option>
                    @endforeach
                </select>
                <span class="photo-danger">@error('photo'){{ $message }}@enderror</span>
            </div>


            <div class="form-group">
                <label for="levels" class="form-labels" id="levelsLabel" style="display:none">Level</label>
                <label for="roles"  id="departmentsLabel" style="display:none;position:relative;left:312px;" class="form-labels">Department</label>
                <br/>
                <select id="levels" class="form-select1" name="level" style="display:none">
                    <option value="" selected disabled>Select levels</option>
                    @foreach($levels as $level)
                        <option value="{{$level->level_id}}">{{$level->level_name}} </option>
                    @endforeach
                </select>
                <select id="departments" class="form-select2" name="department" style="display:none">
                    <option value="" selected disabled>Select departments</option>
                    @foreach($departments as $department)
                        <option value="{{$department->department_id}}">{{$department->department_name}} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <div class="custom-checkbox custom-control">
                    <input type="checkbox" name="agree" id="agree" class="custom-control-input">
                    <label for="agree" class="form-labels">I agree to the <a href="#" class="form-labels">Terms and
                            Conditions</a> .You must agree with our Terms and Conditions</label>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="login-btn">
                    Register
                </button>
            </div>
        </form>
        <div class="form-footer form-labels">
            Already have an account? <a href="{{route('login')}}" class="form-labels">Login</a>
        </div>

    </div>
</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Register
									</button>
								</div>
								<div class="mt-4 text-center">
									Already have an account? <a href="{{route('login')}}">Login</a>
								</div>
								
							</form>
						</div>
					</div>
			
				</div>
			</div>
		</div>
	</section>

<script src="jquery-3.4.1.min.js"></script>
<script src="bootstrap/js/popper.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="js/my-login.js"></script>

<script>

    function roleChange() {
        if (document.getElementById('roles').value == 3) {
            document.getElementById('levels').style.display = 'block';
            document.getElementById('levelsLabel').style.display = 'block';
            document.getElementById('departments').style.display = 'block';
            document.getElementById('departmentsLabel').style.display = 'block';
        } else {
            document.getElementById('levels').style.display = 'none';
            document.getElementById('levelsLabel').style.display = 'none';
            document.getElementById('departments').style.display = 'none';
            document.getElementById('departmentsLabel').style.display = 'none';
        }
    }


</script>

</body>
</html>