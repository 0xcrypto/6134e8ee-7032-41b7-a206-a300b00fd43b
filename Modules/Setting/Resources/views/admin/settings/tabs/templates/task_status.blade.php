<script type="text/html" id="task-status-template">
    <tr>
        <td class="text-center">
            <span class="drag-icon">
                <i class="fa">&#xf142;</i>
                <i class="fa">&#xf142;</i>
            </span>
        </td>
        <td>
            <div class="form-group">
                <label for="taskStatuses.<%- taskStatusId %>.taskStatus_id" class="visible-xs">{{ trans('setting::task_statuses.attributes.name') }}</label>
                <input type="hidden" name="taskStatuses[<%- taskStatusId %>][id]" value="<%- taskStatusId %>">
                <input type="text" name="taskStatuses[<%- taskStatusId %>][name]" id="taskStatuses.<%- taskStatusId %>.name"
                class="form-control taskStatus" value="<%- taskStatus.name %>" 
                style="margin: 0 15px 0 15px;width: 95%;" >
            </div>
        </td>

        <td class="text-center">
            <button type="button" class="btn btn-default delete-row" data-toggle="tooltip" data-title="{{ trans('setting::task_statuses.form.delete_task_status') }}">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
</script>
