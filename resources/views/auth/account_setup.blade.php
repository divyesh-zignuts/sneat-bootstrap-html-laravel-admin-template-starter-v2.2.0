{{-- <x-auth>
    <form id="login-form" action="{{ route('setup_account') }}" class="ajax-form" method="POST">
        @include('sections.password-autocomplete-hide')

        {{ csrf_field() }}
        <input type="hidden" name="sendMail" value="no">

        <h3 class="text-capitalize mb-3 f-w-500">@lang('app.accountSetup')</h3>
        <h6 class="mb-4 heading-h6 text-lightest">@lang('modules.accountSettings.accountSetupInfo')
        </h6>

        <div class="form-group text-left">
            <label for="company_name"
                   class="f-w-500">@lang('modules.accountSettings.companyName')</label>
            <input type="text" name="company_name" class="form-control height-50 f-15 light_text"
                   autofocus placeholder="@lang('placeholders.company')" id="company_name">
        </div>

        <div class="form-group text-left">
            <label for="full_name" class="f-w-500">@lang('modules.employees.fullName')</label>
            <input type="text" name="full_name" class="form-control height-50 f-15 light_text"
                   autofocus placeholder="@lang('placeholders.name')" id="full_name">
        </div>

        <div class="form-group text-left">
            <label for="email" class="f-w-500">@lang('app.email')</label>
            <input type="text" name="email" class="form-control height-50 f-15 light_text" autofocus
                   placeholder="@lang('placeholders.email')" id="email">
        </div>

        <div class="form-group text-left">
            <label for="password" class="f-w-500">@lang('app.password')</label>
            <div class='input-group'>
                <input type="password" name="password"
                       class="form-control height-50 f-15 light_text" placeholder="@lang('placeholders.password')"
                       id="password">

                <div class="input-group-append">
                    <button type="button" data-toggle="tooltip"
                            data-original-title="@lang('app.viewPassword')"
                            class="btn btn-outline-secondary border-grey toggle-password"><i
                            class="fa fa-eye"></i></button>
                </div>
            </div>
        </div>

        <button type="button" id="submit-login"
                class="btn-primary f-w-500 rounded w-100 height-50 f-18">
            @lang('app.saveLogin') <i class="fa fa-arrow-right pl-1"></i>
        </button>
    </form>

    <x-slot name="scripts">

        <script>

            $('#submit-login').click(function() {

                var url = "{{ route('setup_account') }}";
                $.easyAjax({
                    url: url,
                    container: '#login-form',
                    disableButton: true,
                    buttonSelector: "#submit-login",
                    type: "POST",
                    data: $('#login-form').serialize(),
                    success: function(response) {
                        if (response.status == 'success') {
                            var redirectUrl = "{{ route('checklist') }}";
                            window.location.href = redirectUrl;
                        }
                    }
                })
            });
        </script>
    </x-slot>

</x-auth> --}}


@php
$customizerHidden = 'customizer-hide';
$loginPage = true;
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Login Page')

@section('vendor-style')
<!-- Vendor -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-auth.js')}}"></script>
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
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo"><img class="text-center" src="{{ asset('img/worksuite-logo.png') }}" style="max-height: 40px" alt="Home"/></span>
              <span class="app-brand-text demo text-body fw-bold">Worksuite</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Account Setup</h4>
          <p class="mb-4">Setup your admin account. This can be changed later.</p>

          <form id="formAuthentication"  action="{{ route('setup_account') }}" class="ajax-form mb-3" method="POST">
            <div class="mb-3">
              <label for="company_name" class="form-label">Company Name</label>
              <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter your company name" autofocus>
            </div>
            <div class="mb-3">
              <label for="full_name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter your full name" autofocus>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus>
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <button id="submit-login" class="btn btn-primary d-grid w-100" type="submit">Save & Login</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>

<script>

  $('#submit-login').click(function() {

      var url = "{{ route('setup_account') }}";
      $.easyAjax({
          url: url,
          container: '#login-form',
          disableButton: true,
          buttonSelector: "#submit-login",
          type: "POST",
          data: $('#login-form').serialize(),
          success: function(response) {
              if (response.status == 'success') {
                  var redirectUrl = "{{ route('checklist') }}";
                  window.location.href = redirectUrl;
              }
          }
      })
  });
</script>
@endsection
