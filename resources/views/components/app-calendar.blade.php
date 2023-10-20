@if (in_array('my_calender', $activeWidgets) &&
        (in_array('tasks', user_modules()) ||
            in_array('events', user_modules()) ||
            in_array('holidays', user_modules()) ||
            in_array('tickets', user_modules()) ||
            in_array('leaves', user_modules())))
    <div class="card app-calendar-wrapper mt-4">
        <div class="row g-0">
            <!-- Calendar Sidebar -->
            <div class="col app-calendar-sidebar" id="app-calendar-sidebar">
                <div class="p-4">
                    <!-- inline calendar (flatpicker) -->
                    <!-- Filter -->
                    <div class="mb-4">
                        <small class="text-small text-muted text-uppercase align-middle">Filter</small>
                    </div>

                    <div class="app-calendar-events-filter" id="cal-drop">
                        @if (in_array('tasks', user_modules()))
                            <div class="form-check form-check-danger mb-2">
                                <input class="form-check-input input-filter" type="checkbox" name="calendar[]"
                                    id="customCheck1" data-value="personal"
                                    @if (in_array('task', $event_filter)) checked @endif>
                                <label class="form-check-label" for="customCheck1">@lang('app.menu.tasks')</label>
                            </div>
                        @endif
                        {{-- <div class="form-check mb-2">
                        <input class="form-check-input input-filter" type="checkbox" id="select-business"
                            data-value="business" checked>
                        <label class="form-check-label" for="select-business">Business</label>
                    </div>
                    <div class="form-check form-check-warning mb-2">
                        <input class="form-check-input input-filter" type="checkbox" id="select-family"
                            data-value="family" checked>
                        <label class="form-check-label" for="select-family">Family</label>
                    </div>
                    <div class="form-check form-check-success mb-2">
                        <input class="form-check-input input-filter" type="checkbox" id="select-holiday"
                            data-value="holiday" checked>
                        <label class="form-check-label" for="select-holiday">Holiday</label>
                    </div>
                    <div class="form-check form-check-info">
                        <input class="form-check-input input-filter" type="checkbox" id="select-etc" data-value="etc"
                            checked>
                        <label class="form-check-label" for="select-etc">ETC</label>
                    </div> --}}
                    </div>
                </div>
            </div>
            <!-- /Calendar Sidebar -->

            <!-- Calendar & Modal -->
            <div class="col app-calendar-content">
                <div class="card shadow-none border-0">
                    <div class="card-body pb-0">
                        <!-- FullCalendar -->
                        <div id="calendar"></div>
                    </div>
                </div>
                <div class="app-overlay"></div>
                <!-- FullCalendar Offcanvas -->
                <div class="offcanvas offcanvas-end event-sidebar" tabindex="-1" id="addEventSidebar"
                    aria-labelledby="addEventSidebarLabel">
                    <div class="offcanvas-header border-bottom">
                        <h5 class="offcanvas-title mb-2" id="addEventSidebarLabel">Add Event</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
            <!-- /Calendar & Modal -->
        </div>
    </div>
@endif
