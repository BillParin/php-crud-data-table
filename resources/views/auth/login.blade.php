@extends('layouts.app')

@section('content')
<style>
    .container{
        /* background-color: red; */
        font-family: monospace;
        color:#000000;text-shadow: 1px 1px 1px rgb(223, 222, 222)
    }
    .label{
        font-weight: bold;
        float: left;
    }
    .card{
        top: 10px;
        border: 1px solid rgb(116, 115, 115);
        outline-style: solid;
        outline-color: #a5a3a1;
        width: 350px;
        right: 40px;
    }
    .login-box{
        margin-left: 450px;
    }
</style>
<div class="container">
    <div class="row">
      <div class="col-12">
      </div>
      <div class="card-title">
        <div class="login-box">
          <!-- /.login-logo -->
          <div class="card">
            <div class="card-header text-center">
                <a class="nav-link" href="{{ route('login') }}">
                    <img class="" src="{{ asset('adminlte/dist/img/app-logo.png') }}" alt="AdminLTELogo" height="100" width="auto">
                </a>
                <h2 >CATALOG ITSM <i class="right fa fa-book"></i></h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <p class="login-box-msg">Sign in to start your session</p>
                    <div class="input-group col-5">
                        <label class="label" >User Domain:</label>
                    </div>
                    <div class="input-group mb-3 col-12">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="off" autofocus>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-users"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group col-4">
                        <label class="label">Password:</label>
                    </div>
                    <div class="input-group mb-3 col-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                    </div>
                    <div class="row col-12">
                        <div class="col-6">
                          <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                {{ __('Remember Me') }}
                            </label>
                          </div>
                        </div>
                        <!-- /.col -->
                        {{-- <div class="col-7">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div> --}}
                        <!-- /.col -->
                    </div>
                    <div class="social-auth-links text-center mt-2 mb-3">
                        <button id="btnlogin" type="submit" class="btn btn-block btn-primary">
                        <i class="fas fa-arrow-circle-right"></i> {{ __('Login') }}
                        </button>

                        {{-- <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                        </a> --}}
                    </div>
                    {{-- <p class="mb-0">
                        <a href="" class="text-right"><B>Login with LDAP</B></a>
                    </p> --}}
                </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </div>
@endsection
