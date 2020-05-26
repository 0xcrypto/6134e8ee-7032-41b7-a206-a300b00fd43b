<div class="box-body index-table" id="media-table">
    <?php $__env->startComponent('admin::components.table'); ?>
        <?php $__env->slot('thead'); ?>
            <tr>
                <?php echo $__env->make('admin::partials.table.select_all', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <th><?php echo e(trans('media::media.table.thumbnail')); ?></th>
                <th><?php echo e(trans('media::media.table.filename')); ?></th>
                <th data-sort><?php echo e(trans('admin::admin.table.created')); ?></th>

                <?php if (! (request()->routeIs('admin.media.index'))): ?>
                    <th class="min-tablet"></th>
                <?php endif; ?>
            </tr>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
</div>
