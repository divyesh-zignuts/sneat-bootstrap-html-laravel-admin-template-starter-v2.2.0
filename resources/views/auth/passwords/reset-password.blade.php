@php
    $customizerHidden = 'customizer-hide';
    $loginPage = true;
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Reset Password Basic - Pages')

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
    <script src="{{ asset('assets/js/pages-auth.js') }}"></script>
    <script>
        $('#submit-login').click(function(e) {
            e.preventDefault();
            const url = "{{ route('submit-reset-password') }}";
            $.ajax({
                method: "POST",
                url: url,
                data: $('#forgot-password-form').serialize(),
                success: function(response) {
                    $('#success-msg').removeClass('d-none');
                    $('#success-msg').html('Password change successfully');
                    $('.group').remove();
                    $('#forgot-password-form')[0].reset();
                    setTimeout(() => {
                        window.location.href = "{{ route('login') }}"
                    }, 3000);
                },
                error: function(response) {
                  toastr.error(response.responseJSON.message,"Error");
                }
            });
        });
    </script>
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">

                <!-- Reset Password -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">@include('_partials.macros', [
                                    'width' => 25,
                                    'withbg' => 'var(--bs-primary)',
                                ])</span>
                                <span
                                    class="app-brand-text demo text-body fw-bold">{{ config('variables.templateName') }}</span>
                            </a>
                        </div>
                        <form id="forgot-password-form">
                            @csrf
                            <!-- /Logo -->
                            <div class="form-group">
                                <input type="hidden" name="email" value="{{ $request->email }}">
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            </div>
                            <h4 class="mb-2">Reset Password 🔒</h4>
                            <div class="alert alert-success m-t-10 d-none" id="success-msg"></div>
                            <div class="group">

                                <div class="mb-3 form-password-toggle">
                                    <label class="form-label" for="password">New Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password_confirmation" class="form-control"
                                            name="password_confirmation"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary d-grid w-100 mb-3" id="submit-login">
                                Set new password
                            </button>
                            <div class="text-center">
                                <a href="{{ url('auth/login-basic') }}">
                                    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                    Back to login
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Reset Password -->
            </div>
        </div>
    </div>
@endsection
