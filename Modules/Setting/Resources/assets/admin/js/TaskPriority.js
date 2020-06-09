export default class {
    constructor() {
        this.taskPriorityCount = 0;

        this.addTaskPriorities(FleetCart.data['task-priorities']);

        if (this.taskPriorityCount === 0) {
            this.addTaskPriority();
        }

        this.addTaskPrioritiesErrors(FleetCart.errors['task-priorities']);

        this.eventListeners();
        this.sortable();
    }

    addTaskPriorities(taskPriorities) {
        for (let taskPriority of taskPriorities) {
            this.addTaskPriority(taskPriority);
        }
    }

    addTaskPriority(taskPriority = {}) {
        let template = _.template($('#task-priority-template').html());

        let html = template({ taskPriorityId: this.taskPriorityCount++, taskPriority });

        $('#task-priorities').append(html);

        window.admin.tooltip();
        window.admin.selectize();
    }

    addTaskPrioritiesErrors(errors) { 
        for (let id in errors) {
            let parent = $(`#${id}`).parent();

            parent.addClass('has-error');
            parent.append(`<span class="help-block">${errors[id][0]}</span>`);
        }
    }

    deleteTaskPriority(e) {
        $(e.currentTarget).closest('tr').remove();
    }

    eventListeners() {
        $('#add-new-task-priority').on('click', () => this.addTaskPriority());
        $('#task-priorities').on('click', '.delete-row', this.deleteTaskPriority);
    }

    sortable() {
        Sortable.create(document.getElementById('task-priorities'), {
            handle: '.drag-icon',
            animation: 150,
        });
    }
}
