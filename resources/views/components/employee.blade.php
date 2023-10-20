@php
    $active = false;

    if (isset($user->session)) {
        $lastSeen = \Carbon\Carbon::createFromTimestamp($user->session->last_activity)->timezone(company() ? company()->timezone : $user->company->timezone);

        $lastSeenDifference = now()->diffInSeconds($lastSeen);
        if ($lastSeenDifference > 0 && $lastSeenDifference <= 90) {
            $active = true;
        }
    }
@endphp

<div class="d-flex justify-content-start align-items-center user-name">

    @if (!is_null($user))
        <a href="{{ isset($disabledLink) ? 'javascript:;' : route('employees.show', [$user->id]) }}"
            class="position-relative {{ isset($disabledLink) ? 'disabled-link' : '' }}">
            @if ($active)
                <span class="text-light-green position-absolute f-8 user-online" title="@lang('modules.client.online')"><i
                        class="fa fa-circle"></i></span>
            @endif
            <div class="avatar-wrapper">
                <div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-dark"><img
                            src="{{ $user->image_url }}" class="mr-2 taskEmployeeImg rounded-circle"
                            alt="{{ $user->name }}" title="{{ $user->userBadge() }}"></span></div>
            </div>
        </a>


        <div class="d-flex flex-column"><span class="emp_name text-truncate">
                <a href="{{ isset($disabledLink) ? 'javascript:;' : route('employees.show', [$user->id]) }}"
                    class="text-darkest-grey {{ isset($disabledLink) ? 'disabled-link' : '' }}">{!! $user->userBadge() !!}</a>
            </span><small class="emp_post text-truncate text-muted">
                {{ !is_null($user->employeeDetail) && !is_null($user->employeeDetail->designation) ? $user->employeeDetail->designation->name : ' ' }}
            </small>
        </div>
    @else
        --
    @endif
</div>


