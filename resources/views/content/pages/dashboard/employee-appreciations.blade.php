@if (in_array('appreciation', $activeWidgets) &&
        isset($sidebarUserPermissions['view_appreciation']) &&
        $sidebarUserPermissions['view_appreciation'] != 5 &&
        in_array('employees', user_modules()))

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Employee Appreciations</h5>
            <table class="table">
                <tbody>
                    @forelse ($appreciations as $appreciation)
                        <tr>
                            <td>
                                <x-employee :user="$appreciation->awardTo" />
                            </td>
                            <td class="text-right pr-20">
                                <div class="d-flex align-items-center justify-content-end gap-3" data-toggle="tooltip" data-original-title="">
                                    @if (isset($appreciation->award))
                                        <div class="ml-1 f-12 mr-3">
                                            <span
                                                class="font-weight-semibold">{{ $appreciation->award->title }}</span>
                                            {{ $appreciation->award_date->translatedFormat($company->date_format) }}
                                        </div>
                                    @endif
                                    <x-award-icon :award="$appreciation->award" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="shadow-none border-0">
                                <x-cards.no-record icon="award" :message="__('messages.noRecordFound')" />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endif
