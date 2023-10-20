@php
    $configData = Helper::appClasses();
    $customizerHidden = 'customizer-hide';
    $loginPage = true;
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Forgot Password Cover - Pages')

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
    <script src="{{ asset('assets/js/ui-toasts.js') }}"></script>

    <script src="{{ asset('assets/js/pages-auth.js') }}"></script>
    <script>
        $('#submit-login').click(function(e) {
            e.preventDefault();
            const url = "{{ route('send-reset-link') }}";
            $.ajax({
                method: "POST",
                url: url,
                data: $('#forgot-password-form').serialize(),
                success: function(response) {
                    $('#success-msg').removeClass('d-none');
                    $('#success-msg').html('Mail send successfully');
                    $('.group').remove();
                    // toastr.success("Mail send successfully","success");
                    $('#forgot-password-form')[0].reset();
                },
                error: function(response) {
                    toastr.error(response.responseJSON.message, "Error");
                }
            });
        });
    </script>
@endsection

@section('content')
    <div class="authentication-wrapper authentication-cover">
        <div class="authentication-inner row m-0">

            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
                <div class="w-100 d-flex justify-content-center">
                    <img src="{{ asset('assets/img/illustrations/girl-unlock-password-' . $configData['style'] . '.png') }}"
                        class="img-fluid" alt="Login image" width="600"
                        data-app-dark-img="illustrations/girl-unlock-password-dark.png"
                        data-app-light-img="illustrations/girl-unlock-password-light.png">
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Forgot Password -->
            <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <!-- Logo -->
                    <div class="app-brand mb-5">
                        <a href="{{ url('/') }}" class="app-brand-link gap-2">
                            <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">@include('_partials.macros', [
                                    'width' => 25,
                                    'withbg' => 'var(--bs-primary)',
                                ])</span>
                                <span
                                    class="app-brand-text demo text-body fw-bold">{{ config('variables.templateName') }}</span>
                            </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Forgot Password? 🔒</h4>
                    <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
                    <form id="forgot-password-form">
                        @csrf
                        <div class="alert alert-success m-t-10 d-none" id="success-msg"></div>

                        <div class="group">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" autofocus>
                            </div>
                            <button class="btn btn-primary d-grid w-100" id="submit-login">Send Reset Link</button>
                        </div>
                    </form>
                    <div class="text-center">
                        <a href="{{ url('/login') }}" class="d-flex align-items-center justify-content-center">
                            <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                            Back to login
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Forgot Password -->
        </div>
    </div>
@endsection
