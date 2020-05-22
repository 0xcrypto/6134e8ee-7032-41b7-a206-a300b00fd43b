<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('tax::taxes.taxes')); ?>

    <li class="active"><?php echo e(trans('tax::taxes.taxes')); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('admin::components.page.index_table'); ?>
    <?php $__env->slot('buttons', ['create']); ?>
    <?php $__env->slot('resource', 'taxes'); ?>
    <?php $__env->slot('name', trans('tax::taxes.tax')); ?>

    <?php $__env->startComponent('admin::components.table'); ?>
        <?php $__env->slot('thead'); ?>
            <tr>
                <?php echo $__env->make('admin::partials.table.select_all', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <th><?php echo e(trans('tax::taxes.table.tax_class')); ?></th>
                <th data-sort><?php echo e(trans('admin::admin.table.created')); ?></th>
            </tr>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        new DataTable('#taxes-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'label', name: 'translations.label', orderable: false, defaultContent: '' },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>