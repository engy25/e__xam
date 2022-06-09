@extends('layouts/student.app')
@section('content')

<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{ asset('css/css/ChangePassword.css') }}"/>


<div class="content">
    <br><br><br><br><br>
<div class="container">
    
            <div class="content-card">
                <div class="content-card-header">
                <h1>Change password</h1>
                </div>

                <div class="panel-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('changePasswordPost') }}">
                        {{ csrf_field() }}

                        <div class="content-parts{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password">Current Password</label>                         
                            <input id="current-password" type="password" name="current-password" required>

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="content-parts{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password">New Password</label>           
                            <input id="new-password" type="password" name="new-password" required>

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif              
                        </div>

                        <div class="content-parts">
                            <label for="new-password-confirm">Confirm New Password</label>
                            <input id="new-password-confirm" type="password" name="new-password_confirmation" required>
                        </div>

                        <div class="content-card-footer">       
                                <button type="submit">
                                    Change Password
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        
    </div>
</div>
<br><br><br>
</div>
@endsection