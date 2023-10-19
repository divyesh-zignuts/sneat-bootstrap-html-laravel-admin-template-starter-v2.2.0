@if (in_array('work_anniversary', $activeWidgets) && in_array('employees', user_modules()))
    <!-- EMP DASHBOARD ANNIVERSARY START -->
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Today's Joinings & Work Anniversary </h5>
            <table>
                <tbody>
                    @forelse ($upcomingAnniversaries as $upcomingAnniversary)
                        <tr>
                            <td class="pl-20">
                                <x-employee :user="$upcomingAnniversary->user" />
                            </td>
                            <td class="pr-20" align="right">
                                @php
                                    // calculate total worked days
                                    $currentDay = \Carbon\Carbon::parse(now(company()->timezone)->toDateTimeString())
                                        ->startOfDay()
                                        ->setTimezone('UTC');
                                    $joiningDay = $upcomingAnniversary->joining_date;
                                    $totalWorkDays = $joiningDay->copy()->diff($currentDay);
                                @endphp
                                @if ($joiningDay->setTimezone(company()->timezone)->isToday())
                                    <span class="badge badge-secondary p-2">@lang('modules.dashboard.joinedToday')</span>
                                @else
                                    <span
                                        class="badge badge-secondary p-2">{{ $totalWorkDays->format(__('app.completed') . ' ' . ' %y ' . __('app.year')) }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="shadow-none">
                                <x-cards.no-record icon="cake" :message="__('messages.noRecordFound')" />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- EMP DASHBOARD ANNIVERSARY END -->
@endif
