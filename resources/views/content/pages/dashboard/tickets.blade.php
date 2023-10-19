<div class="card mt-4">
    <h5 class="card-header">Tickets</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>@lang('modules.module.tickets')#</th>
                    <th>@lang('modules.tickets.ticketSubject')</th>
                    <th>@lang('app.status')</th>
                    <th class="text-right pr-20">@lang('modules.tickets.requestedOn')</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($tickets as $ticket)
                    <tr>
                        <td class="pl-20">
                            <a href="{{ route('tickets.show', [$ticket->ticket_number]) }}"
                                class="text-darkest-grey">#{{ $ticket->id }}</a>
                        </td>
                        <td>
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h5 class="f-12 mb-1 text-darkest-grey">
                                        <a
                                            href="{{ route('tickets.show', [$ticket->ticket_number]) }}">{{ $ticket->subject }}</a>
                                    </h5>
                                </div>
                            </div>
                        </td>
                        <td class="pr-20">
                            @if ($ticket->status == 'open')
                                <i class="fa fa-circle mr-1 text-red"></i>
                            @else
                                <i class="fa fa-circle mr-1 text-yellow"></i>
                            @endif
                            {{ $ticket->status }}
                        </td>
                        <td class="pr-20" align="right">
                            <span>{{ $ticket->updated_at->translatedFormat(company()->date_format) }}</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="shadow-none">
                            <div class="align-items-center d-flex flex-column">
                                <i class="bx bx-data"></i>
                                <div class="f-15 mt-4">
                                    - @lang('messages.noRecordFound') -
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
