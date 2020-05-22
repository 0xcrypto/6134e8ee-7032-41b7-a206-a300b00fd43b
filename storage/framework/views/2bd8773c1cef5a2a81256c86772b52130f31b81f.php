<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="btn-group pull-right">
            <?php if(isset($buttons, $name)): ?>
                <?php $__currentLoopData = $buttons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route("admin.{$resource}.{$view}")); ?>" class="btn btn-primary btn-actions btn-<?php echo e($view); ?>">
                        <?php echo e(trans("admin::resource.{$view}", ['resource' => $name])); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <?php echo e($buttons ?? ''); ?>

            <?php endif; ?>
        </div>
    </div>

    <div class="box box-primary">
        <div class="box-body index-table" id="<?php echo e(isset($resource) ? "{$resource}-table" : ''); ?>">
            <?php if(isset($thead)): ?>
                <?php echo $__env->make('admin::components.table', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php else: ?>
                <?php echo e($slot); ?>

            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php if(isset($name)): ?>
    <?php $__env->startPush('shortcuts'); ?>
        <?php if(isset($buttons) && in_array('create', $buttons)): ?>
            <dl class="dl-horizontal">
                <dt><code>c</code></dt>
                <dd><?php echo e(trans('admin::resource.create', ['resource' => $name])); ?></dd>
            </dl>
        <?php endif; ?>

        <dl class="dl-horizontal">
            <dt><code>Del</code></dt>
            <dd><?php echo e(trans('admin::resource.delete', ['resource' => $name])); ?></dd>
        </dl>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script>
            <?php if(isset($buttons) && in_array('create', $buttons)): ?>
                keypressAction([
                    { key: 'c', route: '<?php echo e(route("admin.{$resource}.create")); ?>'}
                ]);
            <?php endif; ?>

            Mousetrap.bind('del', function () {
                $('<?php echo e($selector ?? ''); ?> .btn-delete').trigger('click');
            });

            <?php if(isset($resource)): ?>
                DataTable.setRoutes('#<?php echo e($resource); ?>-table .table', {
                    index: '<?php echo e("admin.{$resource}.index"); ?>',
                    edit: '<?php echo e("admin.{$resource}.edit"); ?>',
                    destroy: '<?php echo e("admin.{$resource}.destroy"); ?>',
                });
            <?php endif; ?>
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
