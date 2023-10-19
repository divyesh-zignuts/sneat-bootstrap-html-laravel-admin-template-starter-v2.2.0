@if (in_array('work_from_home', $activeWidgets) &&
        $sidebarUserPermissions['view_attendance'] != 5 &&
        $sidebarUserPermissions['view_attendance'] != 'none' &&
        in_array('attendance', user_modules()))
    <!-- ON WORK FROM HOME START -->
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">On Work From Home Today</h5>
            @forelse ($workFromHome as $totalWorkFromHome)
                <div class="col-md-6 mb-2">
                    <x-employee :user="$totalWorkFromHome->user" />
                </div>
            @empty
                <p class="shadow-none">
                    <x-cards.no-record icon="home" :message="__('messages.noRecordFound')" />
                </p>
            @endforelse
        </div>
    </div>
    <!-- ON WORK FROM HOME  END -->
@endif
