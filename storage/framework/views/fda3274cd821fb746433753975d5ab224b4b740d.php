<div class="multiple-images-wrapper">
    <h4><?php echo e($title); ?></h4>

    <button type="button" class="image-picker btn btn-default" data-input-name="<?php echo e($inputName); ?>" data-multiple>
        <i class="fa fa-folder-open m-r-5"></i><?php echo e(trans('media::media.browse')); ?>

    </button>

    <div class="multiple-images">
        <div class="col-md-12">
            <div class="row">
                <div class="image-list image-holder-wrapper clearfix">
                    <?php if($files->isEmpty()): ?>
                        <div class="image-holder placeholder cursor-auto">
                            <i class="fa fa-picture-o"></i>
                        </div>
                    <?php else: ?>
                        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="image-holder">
                                <img src="<?php echo e($file->path); ?>">
                                <button type="button" class="btn remove-image"></button>
                                <input type="hidden" name="<?php echo e($inputName); ?>" value="<?php echo e($file->id); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
