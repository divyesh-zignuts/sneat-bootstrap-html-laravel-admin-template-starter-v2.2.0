@php
    $configData = Helper::appClasses();
    $customizerHidden = 'customizer-hide';
    $loginPage = true;
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Login Cover - Pages')

@section('vendor-style')
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />
@endsection

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
@endsection

@section('page-script')
    {{-- <script src="{{ asset('assets/js/pages-auth.js') }}"></script> --}}
@endsection

@section('content')
    <div class="authentication-wrapper authentication-cover">
        <div class="authentication-inner row m-0">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
                <div class="w-100 d-flex justify-content-center">
                    <img src="{{ asset('assets/img/illustrations/boy-with-rocket-' . $configData['style'] . '.png') }}"
                        class="img-fluid" alt="Login image" width="700"
                        data-app-dark-img="illustrations/boy-with-rocket-dark.png"
                        data-app-light-img="illustrations/boy-with-rocket-light.png">
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <!-- Logo -->
                    <div class="app-brand mb-5">
                        <a href="{{ url('/') }}" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo"><img class="text-center"
                                    src="{{ asset('img/worksuite-logo.png') }}" style="max-height: 40px"
                                    alt="Home" /></span>
                            <span class="app-brand-text demo text-body fw-bold">Worksuite</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Welcome! 👋</h4>
                    <p class="mb-4">Please sign-in to your account and start the adventure</p>

                    <form id="login-form" action="{{ route('login') }}" class="ajax-form" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group text-left">
                            <label for="email" class="form-label">@lang('auth.email')</label>
                            <input tabindex="1" type="email" name="email"
                                class="form-control height-50 f-15 light_text @error('email') is-invalid @enderror"
                                autofocus value="{{ request()->old('email') }}" placeholder="@lang('auth.email')"
                                id="email">
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="my-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                                <a href="{{ url('forgot-password') }}">
                                    <small>@lang('app.forgotPassword')</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" name="password" id="password" placeholder="@lang('placeholders.password')"
                                    tabindex="3"
                                    class="form-control height-50 f-15 light_text @error('password') is-invalid @enderror">
                                @if ($errors->has('password'))
                                    <span class="input-group-text cursor-pointer"><i
                                            class="bx bx-hide"></i>{{ $errors->first('password') }}</span>
                                @endif
                            </div>


                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me">
                                <label class="form-check-label" for="remember-me">
                                    Stay logged in
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit" id="submit-login">Sign
                                in</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
    </div>
@endsection
