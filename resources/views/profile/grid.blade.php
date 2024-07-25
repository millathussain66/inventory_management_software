@extends('layouts.master')
@section('content')
    <style>
        .error {
            color: red;
            font-size: 0.875em;
            margin-top: 0.25em;
        }
 
    </style>

    <div class="page-header">
        <div class="page-title">
            <h4>Profile</h4>
            <h6>User Profile</h6>
        </div>
    </div>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="profile-set">
                    <div class="profile-head">
                    </div>
                    <div class="profile-top">
                        <div class="profile-content">
                            {{-- <div class="profile-contentimg"> --}}

                                {{-- <img src="{{ asset('public/assets/img/customer/customer5.jpg') }}" alt="img"
                                    id="blah"> --}}

                                    <img id="blah" src="{{ Avatar::create(session('user_name'))->toBase64(); }}">


                          


                            {{-- </div> --}}
                            <div class="profile-contentname">

                                @if (empty(session('first_name')) && empty(session('last_name')))
                                    <h2>{{ session('user_name') }}</h2>
                                @else
                                    <h2>{{ session('first_name') }} {{ session('last_name') }} ( {{ session('user_name') }} )</h2>
                                @endif





                                <h4>Updates Your Photo and Personal Details.</h4>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="input-blocks">
                            <label class="form-label">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control"
                                value="{{ $info->first_name ?? '' }}">
                            @if ($errors->has('first_name'))
                                <div class="error">{{ $errors->first('first_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="input-blocks">
                            <label class="form-label">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control"
                                value="{{ $info->last_name ?? '' }}">
                            @if ($errors->has('last_name'))
                                <div class="error">{{ $errors->first('last_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="input-blocks">
                            <label>Email</label>
                            <input type="email" id="email" name="email" class="form-control" readonly disabled
                                value="{{ $info->email ?? '' }}">
                            @if ($errors->has('email'))
                                <div class="error">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="input-blocks">
                            <label class="form-label">Phone</label>
                            <input type="number" class="form-control" id="phone" name="phone"
                                value="{{ $info->phone ?? '' }}">
                            @if ($errors->has('phone'))
                                <div class="error">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="input-blocks">
                            <label class="form-label">User Name</label>
                            <input type="text" id="user_name" name="user_name" class="form-control" readonly disabled
                                value="{{ $info->user_name ?? '' }}">
                            @if ($errors->has('user_name'))
                                <div class="error">{{ $errors->first('user_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="input-blocks">
                            <label class="form-label">Password</label>
                            <div class="pass-group">
                                <input type="password" id="password" name="password" class="pass-input form-control"
                                    value="{{ $decryptedPassword }}">
                                <span class="fas toggle-password fa-eye-slash"></span>
                                @if ($errors->has('password'))
                                    <div class="error">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
