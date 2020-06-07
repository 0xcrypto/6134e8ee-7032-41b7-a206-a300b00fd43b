<div id="ticket-priority-wrapper">
    <div class="table-responsive">
        <table class="options table table-bordered">
            <thead class="hidden-xs">
                <tr>
                    <th></th>
                    <th>{{ trans('setting::ticket_priorities.attributes.name') }}</th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="ticket-priorities">
                {{-- Ticket Priorities will be added here dynamically using JS --}}
            </tbody>
        </table>
    </div>

    <button type="button" class="btn btn-default" id="add-new-ticket-priority">
        {{ trans('setting::ticket_priorities.form.add_ticket_priority') }}
    </button>
</div>

@include('setting::admin.settings.tabs.templates.ticket_priority')

@push('globals')
    <script>
        FleetCart.data['ticket-priorities'] = @json($ticketPriorities);
        FleetCart.errors['ticket-priorities'] = @json($errors->get('ticketPriorities.*'), JSON_FORCE_OBJECT);
    </script>
@endpush
