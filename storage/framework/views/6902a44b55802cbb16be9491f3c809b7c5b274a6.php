<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('coupon::coupons.coupons')); ?>

    <li class="active"><?php echo e(trans('coupon::coupons.coupons')); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('admin::components.page.index_table'); ?>
    <?php $__env->slot('buttons', ['create']); ?>
    <?php $__env->slot('resource', 'coupons'); ?>
    <?php $__env->slot('name', trans('coupon::coupons.coupon')); ?>

    <?php $__env->slot('thead'); ?>
        <tr>
            <?php echo $__env->make('admin::partials.table.select_all', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <th><?php echo e(trans('coupon::coupons.table.name')); ?></th>
            <th><?php echo e(trans('coupon::coupons.table.code')); ?></th>
            <th><?php echo e(trans('coupon::coupons.table.discount')); ?></th>
            <th><?php echo e(trans('admin::admin.table.status')); ?></th>
            <th data-sort><?php echo e(trans('admin::admin.table.created')); ?></th>
        </tr>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        new DataTable('#coupons-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'name', name: 'translations.name', orderable: false, defaultContent: '' },
                { data: 'code' },
                { data: 'discount', name: 'value' },
                { data: 'status', name: 'is_active', searchable: false },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>