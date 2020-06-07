<script type="text/html" id="ticket-status-template">
    <tr>
        <td class="text-center">
            <span class="drag-icon">
                <i class="fa">&#xf142;</i>
                <i class="fa">&#xf142;</i>
            </span>
        </td>
        <td>
            <div class="form-group">
                <label for="ticketStatuses.<%- ticketStatusId %>.ticketStatus_id" class="visible-xs">{{ trans('setting::ticket_statuses.attributes.name') }}</label>
                <input type="hidden" name="ticketStatuses[<%- ticketStatusId %>][id]" value="<%- ticketStatusId %>">
                <input type="text" name="ticketStatuses[<%- ticketStatusId %>][name]" id="ticketStatuses.<%- ticketStatusId %>.name"
                class="form-control ticketStatus" value="<%- ticketStatus.name %>" 
                style="margin: 0 15px 0 15px;width: 95%;" >
            </div>
        </td>

        <td class="text-center">
            <button type="button" class="btn btn-default delete-row" data-toggle="tooltip" data-title="{{ trans('setting::ticket_statuses.form.delete_ticket_status') }}">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
</script>
