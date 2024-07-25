<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Login - Pos applicaiton</title>
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
                <div class="container">
                    <div class="login-content user-login">
                        <div class="login-logo">
                            <img src="{{ asset('public/assets/img/logo.png') }}" alt="img">
                            <a href="{{ url('login') }}" class="login-logo logo-white">
                                <img src="{{ asset('public/assets/img/logo-white.png') }}" alt>
                            </a>
                        </div>
                        <form action="{{ route('user.login') }}" method="POST">
                            @csrf
                            <div class="login-userset">
                                <div class="login-userheading">
                                    <h3>Sign In</h3>
                                    <h4>Access the Dreamspos panel using your email and passcode.</h4>

                                    @if (session('exist_login'))
                                        <div class="error">{{ session('exist_login') }}</div>
                                    @endif


                                </div>

                                <div class="form-login">
                                    <label class="form-label">User Name / Email Address</label>
                                    <div class="form-addons">
                                        <input type="text" value="{{ old('user_name') }}" class="form-control" id="user_name" name="user_name">
                                        <img src="{{ asset('public/assets/img/icons/mail.svg') }}" alt="img">
                                    </div>
                                    @if ($errors->has('user_name'))
                                     <div class="error">{{ $errors->first('user_name') }}</div>
                                    @endif
                                    @if (session('user_name'))
                                        <div class="error">{{ session('user_name') }}</div>
                                    @endif


                            

                                </div>
                                <div class="form-login">
                                    <label>Password</label>
                                    <div class="pass-group">
                                        <input type="password" value="{{ old('password') }}" class="pass-input" id="password" name="password">
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                    @if ($errors->has('password'))
                                    <div class="error">{{ $errors->first('password') }}</div>
                                    @endif
                                    @if (session('password'))
                                        <div class="error">{{ session('password') }}</div>
                                    @endif

                                </div>
                                <div class="form-login authentication-check">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="custom-control custom-checkbox">
                                                <label class="checkboxs ps-4 mb-0 pb-0 line-height-1">
                                                    <input type="checkbox">
                                                    <span class="checkmarks"></span>Remember me
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a class="forgot-link" href="forgot-password-3.html">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-login">
                                    <button class="btn btn-login" type="submit">Sign In</button>
                                </div>
                                <div class="signinform">
                                    <h4>New on our platform?<a href="{{ url('register') }}" class="hover-a"> Create an account</a></h4>
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
                        <p>Copyright &copy; 2023 DreamsPOS. All rights reserved</p>
                    </div>
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