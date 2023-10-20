@if (in_array('contract_date', $activeWidgets) && in_array('contracts', user_modules()))
    @php
        $currentDay = \Carbon\Carbon::parse(now(company()->timezone)->toDateTimeString())
            ->startOfDay()
            ->setTimezone('UTC');
    @endphp
    <div class="col-sm-12 mt-3">
        @if (in_array('admin', user_roles()))
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Contract Date</h5>
                    <table>
                        @forelse ($contracts as $contract)
                            @php
                                $contractDate = Carbon\carbon::parse($contract->contract_end_date);
                                $diffInDays = $contractDate->copy()->diffForHumans($currentDay);
                            @endphp
                            <tr>
                                <td class="pl-20">
                                    <x-employee :user="$contract->user" />
                                </td>

                                <td class="pr-20 text-right">
                                    @if ($contractDate->setTimezone(company()->timezone)->isToday())
                                        <span class="badge badge-light text-light p-2">@lang('app.today')</span>
                                    @elseif($contractDate->diffInDays($currentDay) <= 7)
                                        <span class="badge badge-light text-warning p-2">{{ $diffInDays }}</span>
                                    @else
                                        <span class="badge badge-light p-2">{{ $diffInDays }}</span>
                                    @endif

                                    <br>
                                    @if ($contractDate->setTimezone(company()->timezone)->isToday())
                                        <span class="text-success f-12">@lang('messages.contractMessage')
                                            {{ $contractDate->translatedFormat($company->date_format) }}</span>
                                    @elseif($contractDate->diffInDays($currentDay) <= 7)
                                        <span class="text-warning f-12">@lang('messages.contractMessage')
                                            {{ $contractDate->translatedFormat($company->date_format) }}</span>
                                    @else
                                        <span class="f-12">@lang('messages.contractMessage')
                                            {{ $contractDate->translatedFormat($company->date_format) }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <span class="shadow-none border-0">
                                <x-cards.no-record icon="objects-horizontal-center" :message="__('messages.noRecordFound')" />
                            </span>
                        @endforelse
                    </table>
                </div>
            </div>
        @else
            @if ($contract)
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Contract Date</h5>
                        <table>
                            <tr>
                                @php
                                    $contractDate = Carbon\carbon::parse($contract->contract_end_date);
                                    $diffInDays = $contractDate->copy()->diffForHumans($currentDay);
                                @endphp
                                <td class="pl-20">
                                    <span
                                        @class([
                                            'f-12',
                                            'text-success' => $contractDate->setTimezone(company()->timezone)->isToday(),
                                            'text-warning' => $contractDate->diffInDays($currentDay) <= 7,
                                        ])>{{ $contractDate->translatedFormat($company->date_format) }}</span>
                                </td>

                                <td class="pr-20 text-right">
                                    @if ($contractDate->setTimezone(company()->timezone)->isToday())
                                        <span class="badge badge-light text-light p-2">@lang('app.today')</span>
                                    @elseif($contractDate->diffInDays($currentDay) <= 7)
                                        <span class="badge badge-light text-warning p-2">{{ $diffInDays }}</span>
                                    @else
                                        <span class="badge badge-light p-2">{{ $diffInDays }}</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endif
        @endif
    </div>
@endif
