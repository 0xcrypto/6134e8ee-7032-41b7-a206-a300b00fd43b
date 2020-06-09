<div id="lead-status-wrapper">
    <div class="table-responsive">
        <table class="options table table-bordered">
            <thead class="hidden-xs">
                <tr>
                    <th></th>
                    <th>{{ trans('setting::lead_statuses.attributes.name') }}</th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="lead-statuses">
                {{-- Task Statuses will be added here dynamically using JS --}}
            </tbody>
        </table>
    </div>

    <button type="button" class="btn btn-default" id="add-new-lead-status">
        {{ trans('setting::lead_statuses.form.add_lead_status') }}
    </button>
</div>

@include('setting::admin.settings.tabs.templates.lead_status')

@push('globals')
    <script>
        FleetCart.data['lead-statuses'] = @json($leadStatuses);
        FleetCart.errors['lead-statuses'] = @json($errors->get('leadStatuses.*'), JSON_FORCE_OBJECT);
    </script>
@endpush
