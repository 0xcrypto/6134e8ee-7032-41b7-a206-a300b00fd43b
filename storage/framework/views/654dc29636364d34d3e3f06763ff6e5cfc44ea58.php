<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('review::reviews.reviews')); ?>

    <li class="active"><?php echo e(trans('review::reviews.reviews')); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('admin::components.page.index_table'); ?>
    <?php $__env->slot('resource', 'reviews'); ?>
    <?php $__env->slot('name', trans('review::reviews.review')); ?>

    <?php $__env->slot('thead'); ?>
        <tr>
            <?php echo $__env->make('admin::partials.table.select_all', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <th><?php echo e(trans('review::reviews.table.product')); ?></th>
            <th><?php echo e(trans('review::reviews.table.reviewer_name')); ?></th>
            <th><?php echo e(trans('review::reviews.table.rating')); ?></th>
            <th><?php echo e(trans('review::reviews.table.approved')); ?></th>
            <th data-sort><?php echo e(trans('admin::admin.table.date')); ?></th>
        </tr>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        new DataTable('#reviews-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'product', name: 'product.price', orderable: false, searchable: false, defaultContent: '' },
                { data: 'reviewer_name' },
                { data: 'rating' },
                { data: 'status', name: 'is_approved', searchable: false },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>