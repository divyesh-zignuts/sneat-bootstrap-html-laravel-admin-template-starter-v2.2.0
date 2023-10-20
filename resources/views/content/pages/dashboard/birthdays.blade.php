@if (in_array('birthday', $activeWidgets) && in_array('employees', user_modules()))
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Birthdays</h5>
            <table class="table">
                <tbody>
                    @forelse ($upcomingBirthdays as $upcomingBirthday)
                        <tr>
                            <td>
                                <x-employee :user="$upcomingBirthday->user" />
                            </td>
                            <td>
                                <span class="badge badge-light p-2">
                                    <i class="fa fa-birthday-cake"></i>
                                    {{ $upcomingBirthday->date_of_birth->translatedFormat('d M') }}
                                </span>
                            </td>
                            <td class="pr-20 border-0">
                                @php
                                    $currentYear = now(company()->timezone)->year;
                                    $year = $upcomingBirthday->date_of_birth->timezone(company()->timezone)->year(date('Y'));
                                    $dateBirth = $upcomingBirthday->date_of_birth->format($currentYear . '-m-d');
                                    $dateBirth = \Carbon\Carbon::parse($dateBirth);

                                    $diffInDays = $year->copy()->diffForHumans(now()->timezone(company()->timezone), [
                                        'syntax' => \Carbon\CarbonInterface::DIFF_RELATIVE_AUTO,
                                        'options' => \Carbon\Carbon::JUST_NOW | \Carbon\Carbon::ONE_DAY_WORDS | \Carbon\Carbon::TWO_DAY_WORDS,
                                    ]);

                                @endphp

                                @if ($dateBirth->isToday())
                                    <span class="badge badge-light text-success p-2"><i class="fa fa-smile"></i>
                                        @lang('app.today')</span>
                                @else
                                    <span class="badge badge-light p-2">{{ $diffInDays }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="shadow-none border-0">
                              <x-cards.no-record icon="cake" :message="__('messages.noRecordFound')"/>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endif
