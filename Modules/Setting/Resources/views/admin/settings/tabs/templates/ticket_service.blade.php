<script type="text/html" id="ticket-service-template">
    <tr>
        <td class="text-center">
            <span class="drag-icon">
                <i class="fa">&#xf142;</i>
                <i class="fa">&#xf142;</i>
            </span>
        </td>
        <td>
            <div class="form-group">
                <label for="ticketServices.<%- ticketServiceId %>.ticketService_id" class="visible-xs">{{ trans('setting::ticket_services.attributes.name') }}</label>
                <input type="hidden" name="ticketServices[<%- ticketServiceId %>][id]" value="<%- ticketServiceId %>">
                <input type="text" name="ticketServices[<%- ticketServiceId %>][name]" id="ticketServices.<%- ticketServiceId %>.name"
                class="form-control ticketService" value="<%- ticketService.name %>" 
                style="margin: 0 15px 0 15px;width: 95%;" >
            </div>
        </td>

        <td class="text-center">
            <button type="button" class="btn btn-default delete-row" data-toggle="tooltip" data-title="{{ trans('setting::ticket_services.form.delete_ticket_service') }}">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
</script>
