@extends('layouts.reg')

@section('section')

{{-- <div class="container">
    <div class="row justify-content-center">
        < class="col-md-8 col-sm-8" id="section-form"> --}}

        {{-- <style>
            /* Basic reset and styling */  
body {  
    font-family: Arial, sans-serif;  
    background-color: #f4f4f4;  
    margin: 0;  
    padding: 0;  
    display: flex;  
    justify-content: center;  
    align-items: center;  
    height: 100vh;  
}  

.login-form {  
    background-color: white;  
    padding: 20px;  
    border-radius: 8px;  
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);  
    width: 90%; /* Make the form responsive */  
    max-width: 400px; /* Set a maximum width */  
}  

.login-header {  
    font-size: 24px;  
    margin-bottom: 20px;  
    text-align: center;  
}  

.name, .email, .phone, .pass, .pass_con {  
    margin-bottom: 15px;  
}  

label {  
    font-weight: bold;  
    display: block;  
    margin-bottom: 5px;  
}  

.form-control {  
    width: 100%;  
    padding: 10px;  
    border: 1px solid #ccc;  
    border-radius: 4px;  
    box-sizing: border-box;  
}  

.form-control.is-invalid {  
    border-color: red;  
}  

.invalid-feedback {  
    color: red;  
    font-size: 12px;  
}  

.reg-btn {  
    text-align: center;  
}  

.btn {  
    background-color: #007bff;  
    color: white;  
    padding: 10px 15px;  
    border: none;  
    border-radius: 4px;  
    cursor: pointer;  
    width: 100%;  
}  

.btn:hover {  
    background-color: #0056b3;  
}  

/* Responsive design for smaller screens */  
@media (max-width: 600px) {  
    .login-header {  
        font-size: 20px; /* Smaller font size on small screens */  
    }  

    .form-control {  
        padding: 8px;  
    }  

    .btn {  
        padding: 8px; /* Adjust button padding */  
    }  
}  
        </style> --}}

            <div class="login-form">
                <div class="" id="section-form">
                <div class="login-header">{{ __('Register') }}</div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="name">
                            <label for="name" class="">{{ __('Name') }}</label>

                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="email">
                            <label for="email" class="">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="phone">
                            <label for="phone" class="">{{ __('Phone Address') }}</label>

                            <div class="">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="pass">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="pass_con">
                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="">
                            <div class="reg-btn">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('login') }}">Already have an account</a>
                </div>
        {{-- </div>
    </div>
</div> --}}
@endsection
