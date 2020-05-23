<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('store::stores.stores')); ?>

    <li class="active"><?php echo e(trans('store::stores.stores')); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('admin::components.page.index_table'); ?>
    <?php $__env->slot('buttons', ['create']); ?>
    <?php $__env->slot('resource', 'stores'); ?>
    <?php $__env->slot('name', trans('store::stores.store')); ?>

    <?php $__env->startComponent('admin::components.table'); ?>
        <?php $__env->slot('thead'); ?>
            <tr>
                <?php echo $__env->make('admin::partials.table.select_all', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <th><?php echo e(trans('store::admin.table.id')); ?></th>
                <th><?php echo e(trans('store::admin.table.name')); ?></th>
                <th><?php echo e(trans('store::admin.table.latitude_longitude')); ?></th>
                <th><?php echo e(trans('store::admin.table.address')); ?></th>
                <th><?php echo e(trans('store::admin.table.created')); ?></th>
            </tr>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        new DataTable('#stores-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },  
                { data: 'id', orderable: false, searchable: false, width: '3%' },
                { data: 'name', orderable: false, searchable: false, width: '3%' },
                { data: 'latitude_longitude', orderable: false, searchable: false, width: '3%' },
                { data: 'address', orderable: false, searchable: false, width: '3%' },  
                { data: 'created_at', orderable: false, searchable: false, width: '3%' },       
                //
            ],
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>