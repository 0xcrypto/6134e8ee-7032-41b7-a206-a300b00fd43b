<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('order::orders.orders')); ?>

    <li class="active"><?php echo e(trans('order::orders.orders')); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-body index-table" id="orders-table">
            <?php $__env->startComponent('admin::components.table'); ?>
                <?php $__env->slot('thead'); ?>
                    <tr>
                        <th><?php echo e(trans('order::orders.table.order_id')); ?></th>
                        <th><?php echo e(trans('order::orders.table.customer_name')); ?></th>
                        <th><?php echo e(trans('order::orders.table.customer_email')); ?></th>
                        <th><?php echo e(trans('admin::admin.table.status')); ?></th>
                        <th><?php echo e(trans('order::orders.table.total')); ?></th>
                        <th data-sort><?php echo e(trans('admin::admin.table.created')); ?></th>
                    </tr>
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        DataTable.setRoutes('#orders-table .table', {
            index: '<?php echo e("admin.orders.index"); ?>',
            show: '<?php echo e("admin.orders.show"); ?>',
        });

        new DataTable('#orders-table .table', {
            columns: [
                { data: 'id' },
                { data: 'customer_name', orderable: false, searchable: false },
                { data: 'customer_email' },
                { data: 'status' },
                { data: 'total' },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>