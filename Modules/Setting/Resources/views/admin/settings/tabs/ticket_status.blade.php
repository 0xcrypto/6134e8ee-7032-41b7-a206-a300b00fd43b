<div id="ticket-status-wrapper">
    <div class="table-responsive">
        <table class="options table table-bordered">
            <thead class="hidden-xs">
                <tr>
                    <th></th>
                    <th>{{ trans('setting::ticket_statuses.attributes.name') }}</th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="ticket-statuses">
                {{-- Ticket Statuses will be added here dynamically using JS --}}
            </tbody>
        </table>
    </div>

    <button type="button" class="btn btn-default" id="add-new-ticket-status">
        {{ trans('setting::ticket_statuses.form.add_ticket_status') }}
    </button>
</div>

@include('setting::admin.settings.tabs.templates.ticket_status')

@push('globals')
    <script>
        FleetCart.data['ticket-statuses'] = @json($ticketStatuses);
        FleetCart.errors['ticket-statuses'] = @json($errors->get('ticketStatuses.*'), JSON_FORCE_OBJECT);
    </script>
@endpush
