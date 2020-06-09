<div id="task-status-wrapper">
    <div class="table-responsive">
        <table class="options table table-bordered">
            <thead class="hidden-xs">
                <tr>
                    <th></th>
                    <th>{{ trans('setting::task_statuses.attributes.name') }}</th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="task-statuses">
                {{-- Task Statuses will be added here dynamically using JS --}}
            </tbody>
        </table>
    </div>

    <button type="button" class="btn btn-default" id="add-new-task-status">
        {{ trans('setting::task_statuses.form.add_task_status') }}
    </button>
</div>

@include('setting::admin.settings.tabs.templates.task_status')

@push('globals')
    <script>
        FleetCart.data['task-statuses'] = @json($taskStatuses);
        FleetCart.errors['task-statuses'] = @json($errors->get('taskStatuses.*'), JSON_FORCE_OBJECT);
    </script>
@endpush
