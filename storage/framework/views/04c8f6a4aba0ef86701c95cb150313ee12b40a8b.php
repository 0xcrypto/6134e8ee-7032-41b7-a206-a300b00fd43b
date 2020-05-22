<?php echo $__env->make('admin::partials.selectize_remote', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startPush('shortcuts'); ?>
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd><?php echo e(trans('admin::admin.shortcuts.back_to_index', ['name' => trans('coupon::coupons.coupon')])); ?></dd>
    </dl>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        keypressAction([
            { key: 'b', route: "<?php echo e(route('admin.coupons.index')); ?>" },
        ]);
    </script>
<?php $__env->stopPush(); ?>
