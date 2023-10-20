@if (in_array('leave', $activeWidgets) &&
        $sidebarUserPermissions['view_leave'] != 5 &&
        $sidebarUserPermissions['view_leave'] != 'none' &&
        in_array('employees', user_modules()))
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">On Leave Today</h5>
            {{-- <i class='bx bxs-plane-take-off'></i><span> no data found</span> --}}

            <table class="table">
                <tbody>
                    @forelse ($leave as $totalLeave)
                        <tr>
                            <td class="pl-20">
                                <x-employee :user="$totalLeave->user" />
                            </td>
                            <td class="pr-20">
                                @if ($totalLeave->duration == 'single' || $totalLeave->duration == 'multiple')
                                    <span class="badge badge-secondary p-2">@lang('modules.dashboard.fullDay')</span>
                                @elseif ($totalLeave->duration == 'half day' && $totalLeave->half_day_type == 'first_half')
                                    <span class="badge badge-secondary p-2">@lang('modules.leaves.firstHalf')</span>
                                @else
                                    <span class="badge badge-secondary p-2">@lang('modules.leaves.secondHalf')</span>
                                @endif
                            </td>
                            <td class="pr-20" align="right">
                                <span class="badge badge-success p-2"
                                    style="background-color:{{ $totalLeave->type->color }}">{{ $totalLeave->type->type_name }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="shadow-none border-0">
                                <x-cards.no-record icon="bx bxs-plane-take-off" :message="__('messages.noRecordFound')" />
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endif
