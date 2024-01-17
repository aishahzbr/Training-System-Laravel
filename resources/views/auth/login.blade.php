@extends('layouts.logintemplate')

@section('content')
<!-- <div class="container"> -->
    <!-- <div class="row justify-content-center"> -->
        <!-- <div class="col-md-8"> -->
            <!-- <div class="card"> -->
                <!-- <div class="card-header">{{ __('Login') }}</div> -->

                <!-- <div class="card-body"> -->
                    <form method="POST" action="{{ route('login') }}" class="user">
                        @csrf

                        <div class="form-group">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->

                            <div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-user" name="email" value="{{ old('email') }}" required autocomplete="email" @if(Cookie::has('email')) value="{{Cookie::get('email')}}" @endif placeholder="Enter Email Address..." autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> -->
                            <!-- <div class="col-md-6"> -->
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror form-control-user" name="password" required autocomplete="current-password" @if(Cookie::has('adminpwd')) value="{{Cookie::get('adminpwd')}}" @endif placeholder="Password">
                                
                                <div class="custom-control custom-checkbox small ml-2 mt-3">
                                    <input type="checkbox" class="custom-control-input" id="togglePassword">
                                    <label class="custom-control-label" for="togglePassword">Show Password</label>
                                </div>
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- </div> -->
                        </div>

                        <!-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" @if(Cookie::has('email')) checked @endif {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="row mb-0"> -->
                            <!-- <div class="col-md-8 offset-md-4"> -->
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Login') }}
                                </button>

                                <hr>
                                 <a href="{{ url('auth/google') }}" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Login with Google
                                </a>


                                <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            <!-- </div> -->
                        <!-- </div> -->
                    </form>
                <!-- </div> -->
            <!-- </div> -->
        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->

<!-- Add jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#togglePassword').on('change', function () {
            var passwordInput = $('#password');
            var passwordFieldType = passwordInput.attr('type');
            
            // Toggle password visibility
            passwordInput.attr('type', passwordFieldType === 'password' ? 'text' : 'password');
        });
    });
</script>


@endsection
