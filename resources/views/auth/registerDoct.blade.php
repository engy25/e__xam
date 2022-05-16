<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Register page For Doctors</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
				
					<div class="cardx fat mt-4">
						<div class="card-body">
							<h4 class="card-title">Register For Doctor</h4>
							<form method="POST" class="my-login-validation" autocomplete="off" enctype="multipart/form-data" action="{{ route('registerDoc') }}">

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
                                    <label  for="levels">Level</label>
                                    <select  id="levels" class="form-control" name="level">
                                        <option value="" selected disabled>Select levels</option>
										@foreach($levels as $level)
                                        <option value="{{$level->level_id}}" >{{$level->level_name}} </option>
										@endforeach
                                    </select>
                                </div>

								<div class="form-group" >
                                    <label for="roles">Department</label>
                                    <select id="departments" class="form-control" name="department">
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


								

								
                                

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password"  data-eye placeholder="Enter password">
									<span class="text-danger">@error('password'){{ $message }}@enderror</span>
								</div>
                                <div class="form-group">
									<label for="password-confirm">Confirm Password</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required data-eye placeholder="Enter confirm password">
									<span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>
                                    
								</div>

                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input id="first_name" type="text" class="form-control" name="first_name" autofocus placeholder="Enter first name" value="{{ old('first_name') }}">
                                    <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input id="last_name" type="text" class="form-control" name="last_name" autofocus placeholder="Enter last name" value="{{ old('last_name') }}">
                                    <span class="last_name-danger">@error('name'){{ $message }}@enderror</span>
                                </div>

								<div class="form-group">
                                    <label for="last_name">Mobile</label>
                                    <input id="mobile" type="text" class="form-control" name="mobile" autofocus placeholder="Enter mobile" value="{{ old('mobile') }}">
                                    <span class="mobile-danger">@error('mobile'){{ $message }}@enderror</span>
                                </div>

								
								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input">
										<label for="agree" class="custom-control-label">I agree to the <a href="#">Terms and Conditions</a></label>
										<div class="invalid-feedback">
											You must agree with our Terms and Conditions
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
								<div class="mt-4 text-center">
									Do You  want to  make an account for student? <a href="{{route('register')}}">Register</a>
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

    <script >

			function roleChange(){
				if(document.getElementById('roles').value==3){
					document.getElementById('levels').style.display = 'block';
					document.getElementById('departments').style.display = 'block';
				}else {
					document.getElementById('levels').style.display = 'none';
					document.getElementById('departments').style.display = 'none';
				}
			}
           

    </script>

</body>
</html>