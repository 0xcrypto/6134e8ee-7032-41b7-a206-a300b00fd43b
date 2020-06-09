<div id="task-priority-wrapper">
    <div class="table-responsive">
        <table class="options table table-bordered">
            <thead class="hidden-xs">
                <tr>
                    <th></th>
                    <th>{{ trans('setting::task_priorities.attributes.name') }}</th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="task-priorities">
                {{-- Task Priorities will be added here dynamically using JS --}}
            </tbody>
        </table>
    </div>

    <button type="button" class="btn btn-default" id="add-new-task-priority">
        {{ trans('setting::task_priorities.form.add_task_priority') }}
    </button>
</div>

@include('setting::admin.settings.tabs.templates.task_priority')

@push('globals')
    <script>
        FleetCart.data['task-priorities'] = @json($taskPriorities);
        FleetCart.errors['task-priorities'] = @json($errors->get('taskPriorities.*'), JSON_FORCE_OBJECT);
    </script>
@endpush
