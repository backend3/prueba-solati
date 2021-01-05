@extends('layouts.app')

@section('content')

<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
  <a href="{{url('/')}}">
    <img src="/dist/img/logo-solati.png" alt="" class="img-responsive">
    </a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Registro de Uuario</p>

    <form action="{{route('register')}}" method="post">
    @csrf
      <div class="form-group has-feedback">
        <input type="text" placeholder="Full name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>


        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group has-feedback">
        <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group has-feedback">
        <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group has-feedback">
        <input type="password" placeholder="Retype password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registro</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <br>
    <a href="{{route('login')}}" class="text-center">Iniciar Sesión</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->



@endsection
