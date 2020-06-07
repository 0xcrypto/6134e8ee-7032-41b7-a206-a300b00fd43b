<script type="text/html" id="ticket-priority-template">
    <tr>
        <td class="text-center">
            <span class="drag-icon">
                <i class="fa">&#xf142;</i>
                <i class="fa">&#xf142;</i>
            </span>
        </td>
        <td>
            <div class="form-group">
                <label for="ticketPriorities.<%- ticketPriorityId %>.ticketPriority_id" class="visible-xs">{{ trans('setting::ticket_statuses.attributes.name') }}</label>
                <input type="hidden" name="ticketPriorities[<%- ticketPriorityId %>][id]" value="<%- ticketPriorityId %>">
                <input type="text" name="ticketPriorities[<%- ticketPriorityId %>][name]" id="ticketPriorities.<%- ticketPriorityId %>.name"
                class="form-control ticketPriority" value="<%- ticketPriority.name %>" 
                style="margin: 0 15px 0 15px;width: 95%;" >
            </div>
        </td>

        <td class="text-center">
            <button type="button" class="btn btn-default delete-row" data-toggle="tooltip" data-title="{{ trans('setting::ticket_priorities.form.delete_ticket_priority') }}">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
</script>
