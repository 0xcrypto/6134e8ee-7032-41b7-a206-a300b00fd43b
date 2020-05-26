<?php $__env->startPush('shortcuts'); ?>
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd><?php echo e(trans('user::roles.navigation.back to index')); ?></dd>
    </dl>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        keypressAction([
            { key: 'b', route: "<?php echo e(route('admin.roles.index')); ?>" },
        ]);
    </script>
<?php $__env->stopPush(); ?>
