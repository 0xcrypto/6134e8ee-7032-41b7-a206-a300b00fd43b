<script type="text/html" id="department-template">
    <tr>
        <td class="text-center">
            <span class="drag-icon">
                <i class="fa">&#xf142;</i>
                <i class="fa">&#xf142;</i>
            </span>
        </td>
        <td>
            <div class="form-group">
                <label for="departments.<%- departmentId %>.department_id" class="visible-xs">{{ trans('setting::departments.attributes.name') }}</label>
                <input type="hidden" name="departments[<%- departmentId %>][id]" value="<%- departmentId %>">
                <input type="text" name="departments[<%- departmentId %>][name]" id="departments.<%- departmentId %>.name"
                class="form-control department" value="<%- department.name %>" 
                style="margin: 0 15px 0 15px;width: 95%;" >
            </div>
        </td>

        <td class="text-center">
            <button type="button" class="btn btn-default delete-row" data-toggle="tooltip" data-title="{{ trans('setting::departments.form.delete_department') }}">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
</script>
