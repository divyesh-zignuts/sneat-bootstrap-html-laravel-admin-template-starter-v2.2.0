@extends('layouts/layoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/fullcalendar/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/card-analytics.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-calendar.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/fullcalendar/fullcalendar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-ecommerce-dashboard.js') }}"></script>

    <script src="{{ asset('assets/js/app-calendar-events.js') }}"></script>
    <script src="{{ asset('assets/js/app-calendar.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fa fa-gift"></i> New update available<span class="alert alert-success">5.0.3</span>
                        </div>
                        <div>
                            <a href="#" class='btn btn-primary rounded f-14 p-2 '>
                                <i class="fa fa-arrow-right mr-1"> Update Now</i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- WELOCOME NAME START -->
        <div class="d-flex justify-content-between pb-2">
            <div>
                <h3 class="heading-h3 mb-0 f-21 font-weight-bold">@lang('app.welcome') Divyesh</h3>
            </div>
            <!-- WELOCOME NAME END -->

            <!-- CLOCK IN CLOCK OUT START -->
            <div class="ml-auto d-flex clock-in-out mb-3 mb-lg-0 mb-md-0 m mt-4 mt-lg-0 mt-md-0 justify-content-between">
                <p class="mb-0 text-lg-right text-md-right f-18 font-weight-bold text-dark-grey d-grid align-items-center">
                    <input type="hidden" id="current-latitude" name="current_latitude">
                    <input type="hidden" id="current-longitude" name="current_longitude">
                    <span id="dashboard-clock">03:55 pm</span><span class="f-10 font-weight-normal">Wednesday</span>
                </p>
                <div>
                    <span class="f-11 font-weight-normal mr-4">
                        @lang('app.clockInAt') -
                        10:00 AM
                    </span>
                    <button type="button" class="btn btn-danger">
                        <span class="tf-icons bx bx-pie-chart-alt me-1"></span>@lang('modules.attendance.clock_in')
                    </button>
                </div>
                </p>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 mb-4">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-8">
                        <div class="card-body">
                            <h6 class="card-title mb-1 text-nowrap">Divyesh</h6>
                            <small class="d-block mb-3 text-nowrap">Employee Id: 1</small>
                            <h5 class="card-title text-primary mb-1"></h5>
                            <small class="d-block mb-4 pb-1 text-muted"></small>
                            <small class="d-block mb-3 text-nowrap">Open Tasks:</small>
                            <h3><a href="javascript:">0</a></h3>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card-body">
                            <small class="d-block mb-3 text-nowrap">Projects:</small>
                            <h3><a href="javascript:">0</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- task & project-->

        <div class="col-lg-8 mb-4">
            <div class="card h-100">
                <div class="card-body row g-4">
                    <div class="col-md-6 pe-md-4 card-separator">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <h5 class="mb-0">Task</h5>
                            <small></small>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="mt-auto">
                                <h2 class="mb-2 text-primary text-nowrap fw-medium">0</h2>
                                <small>Pending</small>
                            </div>
                            <div class="mt-auto">
                                <h2 class="mb-2 text-danger text-nowrap fw-medium">0</h2>
                                <small>Overdue</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ps-md-4">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <h5 class="mb-0">Projects</h5>
                            <small></small>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="mt-auto">
                                <h2 class="mb-2 text-primary text-nowrap fw-medium">0</h2>
                                <small>In Progress</small>
                            </div>
                            <div class="mt-auto">
                                <h2 class="mb-2 text-danger text-nowrap fw-medium">0</h2>
                                <small>Overdue</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ task & project-->
        <div class="col-12 col-lg-6">
            @include('content.pages.dashboard.shift-schedule')

            @include('content.pages.dashboard.birthdays')

            @include('content.pages.dashboard.employee-appreciations')

            @include('content.pages.dashboard.leave')

            @include('content.pages.dashboard.wfh')

            @include('content.pages.dashboard.joinings-anniversary')

            @include('content.pages.dashboard.notice-period')

            @include('content.pages.dashboard.probation-date')

            @include('content.pages.dashboard.internship-date')

            @include('content.pages.dashboard.contract-date')


        </div>
        <div class="col-12 col-lg-6">
            @include('content.pages.dashboard.my-task')

            @include('content.pages.dashboard.tickets')

            @include('components.app-calendar')

            @include('content.pages.dashboard.notices')
        </div>
    </div>
@endsection
