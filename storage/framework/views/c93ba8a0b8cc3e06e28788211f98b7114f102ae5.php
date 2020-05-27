<script>
    window.FleetCart = {
        version: '<?php echo e(fleetcart_version()); ?>',
        csrfToken: '<?php echo e(csrf_token()); ?>',
        baseUrl: '<?php echo e(url('/')); ?>',
        langs: {},
        data: {},
        errors: {},
        selectize: {},
    };

    FleetCart.langs['admin::admin.buttons.delete'] = '<?php echo e(trans('admin::admin.buttons.delete')); ?>';
    FleetCart.langs['media::media.file_manager.title'] = '<?php echo e(trans('media::media.file_manager.title')); ?>';
    FleetCart.langs['media::messages.image_has_been_added'] = '<?php echo e(trans('media::messages.image_has_been_added')); ?>';
</script>

<?php echo $__env->yieldPushContent('globals'); ?>

<?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>
