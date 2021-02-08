@extends('layouts.master')

@section('content')

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Application</div>
        <div class="tx-center mg-b-60">Login to Continue</div>

        <div class="form-group">
          <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your Email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @if (Route::has('password.request'))
                <a class="tx-info tx-12 d-block mg-t-10" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
        <button type="submit" class="btn btn-info btn-block">Sign In</button>
        <a href="{{route('GithubLogin')}}" class="btn btn-outline-dark btn-block"><i class="fa fa-github"></i> Sign in with Github</a>
        <a href="{{route('GoogleLogin')}}" class="btn btn-outline-danger btn-block"><i class="fa fa-google"></i> Sign in with Google</a>

        <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ route('register') }}" class="tx-info">Sign Up</a></div>
      </div>
</form>
@endsection
