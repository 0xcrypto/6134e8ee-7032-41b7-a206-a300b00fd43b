export default class {
    constructor() {
        this.ticketPriorityCount = 0;

        this.addTicketPriorities(FleetCart.data['ticket-priorities']);

        if (this.ticketPriorityCount === 0) {
            this.addTicketPriority();
        }

        this.addTicketPrioritiesErrors(FleetCart.errors['ticket-priorities']);

        this.eventListeners();
        this.sortable();
    }

    addTicketPriorities(ticketPriorities) {
        for (let ticketPriority of ticketPriorities) {
            this.addTicketPriority(ticketPriority);
        }
    }

    addTicketPriority(ticketPriority = {}) {
        let template = _.template($('#ticket-priority-template').html());

        let html = template({ ticketPriorityId: this.ticketPriorityCount++, ticketPriority });

        $('#ticket-priorities').append(html);

        window.admin.tooltip();
        window.admin.selectize();
    }

    addTicketPrioritiesErrors(errors) { 
        for (let id in errors) {
            let parent = $(`#${id}`).parent();

            parent.addClass('has-error');
            parent.append(`<span class="help-block">${errors[id][0]}</span>`);
        }
    }

    deleteTicketPriority(e) {
        $(e.currentTarget).closest('tr').remove();
    }

    eventListeners() {
        $('#add-new-ticket-priority').on('click', () => this.addTicketPriority());
        $('#ticket-priorities').on('click', '.delete-row', this.deleteTicketPriority);
    }

    sortable() {
        Sortable.create(document.getElementById('ticket-priorities'), {
            handle: '.drag-icon',
            animation: 150,
        });
    }
}
