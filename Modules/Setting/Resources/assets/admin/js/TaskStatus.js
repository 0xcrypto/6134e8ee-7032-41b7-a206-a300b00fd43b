export default class {
    constructor() {
        this.taskStatusCount = 0;

        this.addTaskStatuses(FleetCart.data['task-statuses']);

        if (this.taskStatusCount === 0) {
            this.addTaskStatus();
        }

        this.addTaskStatusesErrors(FleetCart.errors['task-statuses']);

        this.eventListeners();
        this.sortable();
    }

    addTaskStatuses(taskStatuses) {
        for (let taskStatus of taskStatuses) {
            this.addTaskStatus(taskStatus);
        }
    }

    addTaskStatus(taskStatus = {}) {
        let template = _.template($('#task-status-template').html());

        let html = template({ taskStatusId: this.taskStatusCount++, taskStatus });

        $('#task-statuses').append(html);

        window.admin.tooltip();
        window.admin.selectize();
    }

    addTaskStatusesErrors(errors) { 
        for (let id in errors) {
            let parent = $(`#${id}`).parent();

            parent.addClass('has-error');
            parent.append(`<span class="help-block">${errors[id][0]}</span>`);
        }
    }

    deleteTaskStatus(e) {
        $(e.currentTarget).closest('tr').remove();
    }

    eventListeners() {
        $('#add-new-task-status').on('click', () => this.addTaskStatus());
        $('#task-statuses').on('click', '.delete-row', this.deleteTaskStatus);
    }

    sortable() {
        Sortable.create(document.getElementById('task-statuses'), {
            handle: '.drag-icon',
            animation: 150,
        });
    }
}
