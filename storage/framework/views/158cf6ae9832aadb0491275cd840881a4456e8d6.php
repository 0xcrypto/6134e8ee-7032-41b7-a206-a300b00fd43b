<div class="thumbnail-holder">
    <?php if($file->isImage()): ?>
        <img src="<?php echo e($file->path); ?>">
    <?php else: ?>
        <i class="file-icon fa <?php echo e($file->icon()); ?>"></i>
    <?php endif; ?>
</div>
