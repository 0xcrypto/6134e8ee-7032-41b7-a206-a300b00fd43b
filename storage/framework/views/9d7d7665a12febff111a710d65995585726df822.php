<?php $__env->startComponent('admin::components.table', ['id' => 'product-reviews-table']); ?>
    <?php $__env->slot('thead'); ?>
        <tr>
            <?php echo $__env->make('admin::partials.table.select_all', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <th><?php echo e(trans('review::reviews.table.reviewer_name')); ?></th>
            <th><?php echo e(trans('review::reviews.table.rating')); ?></th>
            <th><?php echo e(trans('review::reviews.table.approved')); ?></th>
            <th data-sort><?php echo e(trans('admin::admin.table.date')); ?></th>
        </tr>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        Mousetrap.bind('del', function () {
            $('#product-reviews-table_wrapper .btn-delete').trigger('click');
        });

        DataTable.setRoutes('#product-reviews-table', {
            index: { name: 'admin.reviews.index' },
            edit: { name: 'admin.reviews.edit' },
            destroy: { name: 'admin.reviews.destroy' },
        });

        new DataTable('#product-reviews-table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'reviewer_name' },
                { data: 'rating' },
                { data: 'status', name: 'is_approved', searchable: false },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
<?php $__env->stopPush(); ?>
