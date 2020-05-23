<div class="single-image-wrapper">
    <h4><?php echo e($title); ?></h4>

    <button type="button" class="image-picker btn btn-default" data-input-name="<?php echo e($inputName); ?>">
        <i class="fa fa-folder-open m-r-5"></i><?php echo e(trans('media::media.browse')); ?>

    </button>

    <div class="clearfix"></div>

    <div class="single-image image-holder-wrapper clearfix">
        <?php if(! $file->exists): ?>
            <div class="image-holder placeholder">
                <i class="fa fa-picture-o"></i>
            </div>
        <?php else: ?>
            <div class="image-holder">
                <img src="<?php echo e($file->path); ?>">
                <button type="button" class="btn remove-image" data-input-name="<?php echo e($inputName); ?>"></button>
                <input type="hidden" name="<?php echo e($inputName); ?>" value="<?php echo e($file->id); ?>">
            </div>
        <?php endif; ?>
    </div>
</div>
