<script type="text/html" id="lead-status-template">
    <tr>
        <td class="text-center">
            <span class="drag-icon">
                <i class="fa">&#xf142;</i>
                <i class="fa">&#xf142;</i>
            </span>
        </td>
        <td>
            <div class="form-group">
                <label for="leadStatuses.<%- leadStatusId %>.leadStatus_id" class="visible-xs">{{ trans('setting::lead_statuses.attributes.name') }}</label>
                <input type="hidden" name="leadStatuses[<%- leadStatusId %>][id]" value="<%- leadStatusId %>">
                <input type="text" name="leadStatuses[<%- leadStatusId %>][name]" id="leadStatuses.<%- leadStatusId %>.name"
                class="form-control leadStatus" value="<%- leadStatus.name %>" 
                style="margin: 0 15px 0 15px;width: 95%;" >
            </div>
        </td>

        <td class="text-center">
            <button type="button" class="btn btn-default delete-row" data-toggle="tooltip" data-title="{{ trans('setting::lead_statuses.form.delete_lead_status') }}">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
</script>
