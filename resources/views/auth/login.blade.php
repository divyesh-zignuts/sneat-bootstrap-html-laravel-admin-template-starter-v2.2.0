@php
    $customizerHidden = 'customizer-hide';
    $loginPage = true;
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Login Page')

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
        $(document).ready(function() {
            // $("form#login-form").submit(function() {
            //   const button = $('form#login-form').find('#submit-login');
            //     // const text =
            //     //     '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> {{ __('app.loading') }}';
            //     // button.prop("disabled", true);
            //     // button.html(text);
            // });

            function handleFormSubmit(e) {
                e.preventDefault();
            }
            // $('#submit-next').click(function(event) {
            //     event.preventDefault();
            //     document.addEventListener('click', handleFormSubmit, false);

            //     const url = "{{ route('check_email') }}";
            //     $.easyAjax({
            //         url: url,
            //         container: '#login-form',
            //         disableButton: true,
            //         buttonSelector: "#submit-next",
            //         type: "POST",
            //         data: $('#login-form').serialize(),
            //         success: function(response) {
            //             if (response.status === 'success') {
            //                 $('#submit-next, #signup-client-next').remove();
            //                 $('#password-section').removeClass('d-none');
            //                 $("#password").focus();
            //                 document.removeEventListener('click', handleFormSubmit);
            //             }
            //         }
            //     })
            // });

            // @if (session('message'))
            //     Swal.fire({
            //         icon: 'error',
            //         text: '{{ session('message') }}',
            //         showConfirmButton: true,
            //         customClass: {
            //             confirmButton: 'btn btn-primary',
            //         },
            //         showClass: {
            //             popup: 'swal2-noanimation',
            //             backdrop: 'swal2-noanimation'
            //         },
            //     })
            // @endif

        });
    </script>
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
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
