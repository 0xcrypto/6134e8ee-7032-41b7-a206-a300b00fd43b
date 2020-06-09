<script type="text/html" id="task-priority-template">
    <tr>
        <td class="text-center">
            <span class="drag-icon">
                <i class="fa">&#xf142;</i>
                <i class="fa">&#xf142;</i>
            </span>
        </td>
        <td>
            <div class="form-group">
                <label for="taskPriorities.<%- taskPriorityId %>.taskPriority_id" class="visible-xs">{{ trans('setting::task_statuses.attributes.name') }}</label>
                <input type="hidden" name="taskPriorities[<%- taskPriorityId %>][id]" value="<%- taskPriorityId %>">
                <input type="text" name="taskPriorities[<%- taskPriorityId %>][name]" id="taskPriorities.<%- taskPriorityId %>.name"
                class="form-control taskPriority" value="<%- taskPriority.name %>" 
                style="margin: 0 15px 0 15px;width: 95%;" >
            </div>
        </td>

        <td class="text-center">
            <button type="button" class="btn btn-default delete-row" data-toggle="tooltip" data-title="{{ trans('setting::task_priorities.form.delete_task_priority') }}">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
</script>
