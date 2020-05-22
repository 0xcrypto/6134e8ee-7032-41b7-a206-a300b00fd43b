<?php $__env->startComponent('admin::components.table'); ?>
    <?php $__env->slot('thead'); ?>
        <?php echo $__env->make('product::admin.products.partials.thead', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        <?php if($name === 'related_products'): ?>
            DataTable.setSelectedIds('#related_products .table', <?php echo old_json('related_products', $product->relatedProductList()); ?>);
        <?php elseif($name === 'up_sells'): ?>
            DataTable.setSelectedIds('#up_sells .table', <?php echo old_json('up_sells', $product->upSellProductList()); ?>);
        <?php elseif($name === 'cross_sells'): ?>
            DataTable.setSelectedIds('#cross_sells .table', <?php echo old_json('cross_sells', $product->crossSellProductList()); ?>);
        <?php endif; ?>

        DataTable.setRoutes('#<?php echo e($name); ?> .table', {
            index: { name: 'admin.products.index', params: { except: <?php echo $product->id ?? "''"; ?> } },
            edit: 'admin.products.edit',
            destroy: 'admin.products.destroy',
        });

        new DataTable('#<?php echo e($name); ?> .table', {
            pageLength: 10,
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
