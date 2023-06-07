@extends('layouts.app')

@section('content')

<main class="main-section">
    <section class="login--content">
                <div class="logins--section">
                    <div class="login-img">
                        <img src="images/login.png">
                    </div>
                
                        <div class="login-form">
                               
                            @if(Session::has('success'))
                                <div class="register-success" >
                                    {{Session::get('success')}}
                                </div>
                            @endif
                            <div class="login-heading">
                                <h1>{{ __('Register your salon') }}</h1>
                            </div>
                          

                
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        
                        <div class="form--section">
									<div class="input--left">
									    
										<input type="text" id="first_name"  class="form-control @error('first_name') is-invalid @enderror" name="first_name"  value="{{ old('first_name') }}" placeholder="First Name">
										
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
										
										
										<input type="Username" id="Username" class="form-control @error('Username') is-invalid @enderror" name="Username" value="{{ old('Username') }}" required autocomplete="email" placeholder="Username">
										
										@error('Username')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
										
										
										
										
									</div>
									<div class="input--right">
									
										<input type="text" id="last_name" name="last_name"  class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Last Name">
										
											@error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
										
										
										<input type="number" id="phone" name="phone"  class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number">
										
											@error('phone')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
									</div>
								</div>
								
					    <div>
                        
                            <input type="saloon_name" id="saloon_name" class="form-control @error('saloon_name') is-invalid @enderror" name="saloon_name"  placeholder="Salon Name"  value="{{ old('saloon_name') }}" required autocomplete="saloon_name">
                            
                            @error('saloon_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            </div>

                            
                              <div>
                        
                            <input type="text" id="refered_by" class="form-control @error('refered_by') is-invalid @enderror" name="refered_by"  placeholder="Referred by other salon?"  value="{{ old('refered_by') }}" required autocomplete="refered_by">
                            
                            @error('refered_by')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            </div>
								
                        <div>
                        
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="Email Address"  value="{{ old('email') }}" required autocomplete="email" >
                        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                        </div>
                        
                        
                       
        
							

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
