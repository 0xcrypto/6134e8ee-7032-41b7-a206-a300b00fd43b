<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('storeunit::storeunits.storeunits')); ?>

    <li class="active"><?php echo e(trans('storeunit::storeunits.storeunits')); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('admin::components.page.index_table'); ?>
    <?php $__env->slot('buttons', ['create']); ?>
    <?php $__env->slot('resource', 'storeunits'); ?>
    <?php $__env->slot('name', trans('storeunit::storeunits.storeunit')); ?>

    <?php $__env->startComponent('admin::components.table'); ?>
        <?php $__env->slot('thead'); ?>
            <tr>
                <?php echo $__env->make('admin::partials.table.select_all', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <th><?php echo e(trans('storeunit::attributes.form.name')); ?></th>
                <th><?php echo e(trans('storeunit::attributes.form.store')); ?></th>
                <!-- <th><?php echo e(trans('storeunit::attributes.form.product')); ?></th>
                <th><?php echo e(trans('storeunit::attributes.form.quantity')); ?></th> -->
                <th><?php echo e(trans('storeunit::attributes.form.availability')); ?></th>
            </tr>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        new DataTable('#storeunits-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'name', orderable: false, searchable: false, width: '3%' },
                { data: 'store', orderable: false, searchable: false, width: '3%' },

                //{ data: 'product', orderable: false, searchable: false, width: '3%' },
                //{ data: 'quantity', orderable: false, searchable: false, width: '3%' },
                
                { data: 'availability', orderable: false, searchable: false, width: '3%' },
                //
            ],
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>