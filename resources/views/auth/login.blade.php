@extends('layouts.app')

@section('content')
<main class="main-section">
    <section class="login--content">
                <div class="logins--section">
                    <div class="login-img">
                        <img src="images/login.png">
                    </div>
                
                        <div class="login-form">
                            <div class="login-heading">
                                <h1>{{ __('Log in') }}</h1>
                            </div>
                         
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <input  class="form-control @error('email') is-invalid @enderror" name="email" type="email" id="email"  placeholder="Email Address"  value="{{ old('email') }}" required>

                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                                <input type="password" id="password"  placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group">
                                    <div class="checkbox-content">

                                        <input type="checkbox" id="remember" name="remember"{{ old('remember') ? 'checked' : '' }}>

                                        <label for="html">{{ __('Remember Me') }}?</label>
                                    </div>
                                  
                                    <div class="forgot">
                                        <a href="{{ route('password.request') }}"><h3>Forgot Password?</h3></a> 
                                    </div>
                                </div>
                                <div class="submit-button">
                                    <input type="submit" value="Submit">
                                </div>
                            
                              </form> 
                        </div>
                    </div>
               
            </div>
        </section>

    </main>
    
@endsection
