export default class {
    constructor() {
        this.leadStatusCount = 0;

        this.addLeadStatuses(FleetCart.data['lead-statuses']);

        if (this.leadStatusCount === 0) {
            this.addLeadStatus();
        }

        this.addLeadStatusesErrors(FleetCart.errors['lead-statuses']);

        this.eventListeners();
        this.sortable();
    }

    addLeadStatuses(leadStatuses) {
        for (let leadStatus of leadStatuses) {
            this.addLeadStatus(leadStatus);
        }
    }

    addLeadStatus(leadStatus = {}) {
        let template = _.template($('#lead-status-template').html());

        let html = template({ leadStatusId: this.leadStatusCount++, leadStatus });

        $('#lead-statuses').append(html);

        window.admin.tooltip();
        window.admin.selectize();
    }

    addLeadStatusesErrors(errors) { 
        for (let id in errors) {
            let parent = $(`#${id}`).parent();

            parent.addClass('has-error');
            parent.append(`<span class="help-block">${errors[id][0]}</span>`);
        }
    }

    deleteLeadStatus(e) {
        $(e.currentTarget).closest('tr').remove();
    }

    eventListeners() {
        $('#add-new-lead-status').on('click', () => this.addLeadStatus());
        $('#lead-statuses').on('click', '.delete-row', this.deleteLeadStatus);
    }

    sortable() {
        Sortable.create(document.getElementById('lead-statuses'), {
            handle: '.drag-icon',
            animation: 150,
        });
    }
}
