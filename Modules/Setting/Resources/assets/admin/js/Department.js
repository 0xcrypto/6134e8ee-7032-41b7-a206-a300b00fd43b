export default class {
    constructor() {
        this.departmentCount = 0;

        this.addDepartments(FleetCart.data['departments']);

        if (this.departmentCount === 0) {
            this.addDepartment();
        }

        this.addDepartmentsErrors(FleetCart.errors['departments']);

        this.eventListeners();
        this.sortable();
    }

    addDepartments(departments) {
        for (let department of departments) {
            this.addDepartment(department);
        }
    }

    addDepartment(department = {}) {
        let template = _.template($('#department-template').html());

        let html = template({ departmentId: this.departmentCount++, department });

        $('#departments').append(html);

        window.admin.tooltip();
        window.admin.selectize();
    }

    addDepartmentsErrors(errors) { 
        for (let id in errors) {
            let parent = $(`#${id}`).parent();

            parent.addClass('has-error');
            parent.append(`<span class="help-block">${errors[id][0]}</span>`);
        }
    }

    deleteDepartment(e) {
        $(e.currentTarget).closest('tr').remove();
    }

    eventListeners() {
        $('#add-new-department').on('click', () => this.addDepartment());
        $('#departments').on('click', '.delete-row', this.deleteDepartment);
    }

    sortable() {
        Sortable.create(document.getElementById('departments'), {
            handle: '.drag-icon',
            animation: 150,
        });
    }
}
