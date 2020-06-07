export default class {
    constructor() {
        this.ticketStatusCount = 0;

        this.addTicketStatuses(FleetCart.data['ticket-statuses']);

        if (this.ticketStatusCount === 0) {
            this.addTicketStatus();
        }

        this.addTicketStatusesErrors(FleetCart.errors['ticket-statuses']);

        this.eventListeners();
        this.sortable();
    }

    addTicketStatuses(ticketStatuses) {
        for (let ticketStatus of ticketStatuses) {
            this.addTicketStatus(ticketStatus);
        }
    }

    addTicketStatus(ticketStatus = {}) {
        let template = _.template($('#ticket-status-template').html());

        let html = template({ ticketStatusId: this.ticketStatusCount++, ticketStatus });

        $('#ticket-statuses').append(html);

        window.admin.tooltip();
        window.admin.selectize();
    }

    addTicketStatusesErrors(errors) { 
        for (let id in errors) {
            let parent = $(`#${id}`).parent();

            parent.addClass('has-error');
            parent.append(`<span class="help-block">${errors[key][0]}</span>`);
        }
    }

    deleteTicketStatus(e) {
        $(e.currentTarget).closest('tr').remove();
    }

    eventListeners() {
        $('#add-new-ticket-status').on('click', () => this.addTicketStatus());
        $('#ticket-statuses').on('click', '.delete-row', this.deleteTicketStatus);
    }

    sortable() {
        Sortable.create(document.getElementById('ticket-statuses'), {
            handle: '.drag-icon',
            animation: 150,
        });
    }
}
