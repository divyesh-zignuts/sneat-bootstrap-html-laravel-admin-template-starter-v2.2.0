<div class="card">
    <h5 class="card-header">My Task</h5>
    <div class="table-responsive text-nowrap">
        <table class="table task_table">
            <thead>
                <tr>
                    <th>@lang('app.task')#</th>
                    <th>@lang('app.task')</th>
                    <th>@lang('app.status')</th>
                    <th class="text-right pr-20">@lang('app.dueDate')</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($pendingTasks as $task)
                    <tr>
                        <td>
                            <a href="{{ route('tasks.show', [$task->id]) }}"
                                class="openRightModal f-12 mb-1 text-darkest-grey">#{{ $task->task_short_code }}</a>

                        </td>
                        <td>
                            <div class="media ">
                                <div class="media-body">
                                    <p><a
                                            href="{{ route('tasks.show', [$task->id]) }}"
                                            class="openRightModal">{{ $task->heading }}</a>
                                    </p>
                                    <p class="mb-0">
                                        @foreach ($task->labels as $label)
                                            <span class="badge bg-label-primary text-capitalize"
                                                style="background-color: {{ $label->label_color }}">{{ $label->label_name }}</span>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="pr-20">
                            <i class="fa fa-circle mr-1 text-yellow"
                                style="color: {{ $task->boardColumn->label_color }}"></i>
                            {{ $task->boardColumn->column_name }}
                        </td>
                        <td class="pr-20">
                            @if (is_null($task->due_date))
                                --
                            @elseif ($task->due_date->endOfDay()->isPast())
                                <span
                                    class="text-danger">{{ $task->due_date->translatedFormat(company()->date_format) }}</span>
                            @elseif ($task->due_date->setTimezone(company()->timezone)->isToday())
                                <span class="text-success">{{ __('app.today') }}</span>
                            @else
                                <span>{{ $task->due_date->translatedFormat(company()->date_format) }}</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td  class="shadow-none border-0">
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
