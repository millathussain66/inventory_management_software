<!DOCTYPE html>
<html lang="en">
    {{ session('registration_success') }}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Register - Pos applicaiton</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    <style>
        .error {
            color: red;
            font-size: 0.875em;
            margin-top: 0.25em;
        }
    </style>
</head>

<body class="account-page">
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper login-new">
                <div class="login-content user-login">
                    <div class="login-logo">
                        <img src="{{ asset('public/assets/img/logo.png') }}" alt="img">
                        <a href="{{ url('register') }}" class="login-logo logo-white">
                            <img src="{{ asset('public/assets/img/logo-white.png') }}" alt>
                        </a>
                    </div>
                    <form action="{{ route('user.register') }}" method="POST">
                        @csrf
                        <div class="login-userset">
                            <div class="login-userheading">
                                <h3>Register</h3>
                                <h4>Create New Dreamspos Account</h4>
                            </div>
                            <div class="form-login">
                                <label>User Name</label>
                                <div class="form-addons">
                                    <input type="text" id="user_name" name="user_name" value="{{ old('user_name') }}" class="form-control">
                                    <img src="{{ asset('public/assets/img/icons/user-icon.svg') }}" alt="img">
                                </div>
                                @if ($errors->has('user_name'))
                                <div class="error">{{ $errors->first('user_name') }}</div>
                                @endif

                            </div>
                            <div class="form-login">
                                <label>Email Address</label>
                                <div class="form-addons">
                                    <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control">
                                    <img src="{{ asset('public/assets/img/icons/mail.svg') }}" alt="img">
                                </div>
                                @if ($errors->has('email'))
                                <div class="error">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" id="password" name="password"  value="{{ old('password') }}" class="pass-input">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                                @if ($errors->has('password'))
                                <div class="error">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="form-login">
                                <label>Confirm Passworrd</label>
                                <div class="pass-group">
                                    <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}"class="pass-inputs">
                                    <span class="fas toggle-passwords fa-eye-slash"></span>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                <div class="error">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                            </div>
                            <div class="form-login authentication-check">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="custom-control custom-checkbox justify-content-start">
                                            <div class="custom-control custom-checkbox">
                                                <label class="checkboxs ps-4 mb-0 pb-0 line-height-1">
                                                    <input type="checkbox" id="terms" name="terms" {{ old('terms') ? 'checked' : '' }}>
                                                    <span class="checkmarks"></span>I agree to the <a href="#" class="hover-a">Terms & Privacy</a>
                                                </label>
                                            </div>
                                        </div>
                                        @if ($errors->has('terms'))
                                            <div class="error">{{ $errors->first('terms') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-login">
                                <button type="submit" class="btn btn-login">Sign Up</button>
                            </div>
                            <div class="signinform">
                                <h4>Already have an account ? <a href="{{ url('login') }}" class="hover-a">Sign
                                        InInstead</a></h4>
                            </div>
                            <div class="form-setlogin or-text">
                                <h4>OR</h4>
                            </div>
                            <div class="form-sociallink">
                                <ul class="d-flex">
                                    <li>
                                        <a href="javascript:void(0);" class="facebook-logo">

                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">

                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="apple-logo">

                                        </a>
                                    </li>
                                </ul>
                            </div>


                        </div>
                    </form>
                </div>
                <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                    <p>Copyright &copy; 2023 DreamsPOS. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="customizer-links" id="setdata">
        <ul class="sticky-sidebar">
            <li class="sidebar-icons">
                <a href="#" class="navigation-add" data-bs-toggle="tooltip" data-bs-placement="left"
                    data-bs-original-title="Theme">
                    <i data-feather="settings" class="feather-five"></i>
                </a>
            </li>
        </ul>
    </div>
    <script src="{{ asset('public/assets/js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/assets/js/feather.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/assets/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/assets/js/theme-script.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/assets/js/script.js') }}" type="text/javascript"></script>
</body>

</html>