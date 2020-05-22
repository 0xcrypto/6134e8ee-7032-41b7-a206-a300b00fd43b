<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('product::products.products')); ?>

    <li class="active"><?php echo e(trans('product::products.products')); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('admin::components.page.index_table'); ?>
    <?php $__env->slot('buttons', ['create']); ?>
    <?php $__env->slot('resource', 'products'); ?>
    <?php $__env->slot('name', trans('product::products.product')); ?>

    <?php $__env->slot('thead'); ?>
        <?php echo $__env->make('product::admin.products.partials.thead', ['name' => 'products-index'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        new DataTable('#products-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'thumbnail', orderable: false, searchable: false, width: '10%' },
                { data: 'name', name: 'translations.name', orderable: false, defaultContent: '' },
                { data: 'price', searchable: false },
                { data: 'status', name: 'is_active', searchable: false },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>