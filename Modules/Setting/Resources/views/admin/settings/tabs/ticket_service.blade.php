<div id="ticket-service-wrapper">
    <div class="table-responsive">
        <table class="options table table-bordered">
            <thead class="hidden-xs">
                <tr>
                    <th></th>
                    <th>{{ trans('setting::ticket_services.attributes.name') }}</th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="ticket-service">
                {{-- Ticket Services will be added here dynamically using JS --}}
            </tbody>
        </table>
    </div>

    <button type="button" class="btn btn-default" id="add-new-ticket-service">
        {{ trans('setting::ticket_services.form.add_ticket_service') }}
    </button>
</div>

@include('setting::admin.settings.tabs.templates.ticket_service')

@push('globals')
    <script>
        FleetCart.data['ticket-service'] = @json($ticketServices);
        FleetCart.errors['ticket-service'] = @json($errors->get('ticketServices.*'), JSON_FORCE_OBJECT);
    </script>
@endpush
