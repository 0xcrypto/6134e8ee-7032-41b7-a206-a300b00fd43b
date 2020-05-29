<?php $__env->startPush('globals'); ?>
    <script>
        FleetCart.maxFileSize = <?php echo e((int) ini_get('upload_max_filesize')); ?>

    </script>
<?php $__env->stopPush(); ?>

<div class="row">
    <div class="col-md-12">
        <form method="POST" class="dropzone">
            <?php echo e(csrf_field()); ?>


            <div class="dz-message needsclick">
                <?php echo e(trans('media::media.drop_files_here')); ?>

            </div>
        </form>
    </div>
</div>
