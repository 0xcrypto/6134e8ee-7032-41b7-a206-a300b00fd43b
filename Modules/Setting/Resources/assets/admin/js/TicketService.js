export default class {
    constructor() {
        this.ticketServiceCount = 0;

        this.addTicketServices(FleetCart.data['ticket-service']);

        if (this.ticketServiceCount === 0) {
            this.addTicketService();
        }

        this.addTicketServicesErrors(FleetCart.errors['ticket-service']);

        this.eventListeners();
        this.sortable();
    }

    addTicketServices(ticketServices) {
        for (let ticketService of ticketServices) {
            this.addTicketService(ticketService);
        }
    }

    addTicketService(ticketService = {}) {
        let template = _.template($('#ticket-service-template').html());

        let html = template({ ticketServiceId: this.ticketServiceCount++, ticketService });

        $('#ticket-service').append(html);

        window.admin.tooltip();
        window.admin.selectize();
    }

    addTicketServicesErrors(errors) { 
        for (let id in errors) {
            let parent = $(`#${id}`).parent();

            parent.addClass('has-error');
            parent.append(`<span class="help-block">${errors[key][0]}</span>`);
        }
    }

    deleteTicketService(e) {
        $(e.currentTarget).closest('tr').remove();
    }

    eventListeners() {
        $('#add-new-ticket-service').on('click', () => this.addTicketService());
        $('#ticket-service').on('click', '.delete-row', this.deleteTicketService);
    }

    sortable() {
        Sortable.create(document.getElementById('ticket-service'), {
            handle: '.drag-icon',
            animation: 150,
        });
    }
}
