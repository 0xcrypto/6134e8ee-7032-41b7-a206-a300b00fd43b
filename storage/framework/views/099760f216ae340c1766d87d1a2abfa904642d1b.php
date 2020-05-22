<script type="text/html" id="option-select-template">
    <div class="option-select <% if (optionId === undefined) { %> m-b-15 <% } %>">
        <div class="table-responsive">
            <table class="options table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th><?php echo e(trans('option::attributes.label')); ?></th>
                        <th><?php echo e(trans('option::attributes.price')); ?></th>
                        <th><?php echo e(trans('option::attributes.price_type')); ?></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody
                    <% if (optionId === undefined) { %>
                        id="select-values"
                    <% } else { %>
                        id="option-<%- optionId %>-select-values"
                    <% } %>
                >
                    
                </tbody>
            </table>
        </div>

        <button
            type="button"
            class="btn btn-default"
            <% if (optionId === undefined) { %>
                id="add-new-row"
            <% } else { %>
                id="option-<%- optionId %>-add-new-row"
            <% } %>
        >
            <?php echo e(trans('option::options.form.add_new_row')); ?>

        </button>
    </div>
</script>
