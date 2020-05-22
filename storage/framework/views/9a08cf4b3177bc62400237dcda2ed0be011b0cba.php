<div class="thumbnail-holder">
    <?php if(is_null($path)): ?>
        <i class="fa fa-picture-o"></i>
    <?php else: ?>
        <img src="<?php echo e($path); ?>">
    <?php endif; ?>
</div>
