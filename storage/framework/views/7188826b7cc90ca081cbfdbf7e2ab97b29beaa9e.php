<button type="button" class="btn btn-default select-media"
    data-id="<?php echo e($file->id); ?>"
    data-path="<?php echo e($file->path); ?>"
    data-filename="<?php echo e($file->filename); ?>"
    data-type="<?php echo e(strtok($file->mime, '/')); ?>"
    data-icon="<?php echo e($file->icon()); ?>"
    data-toggle="tooltip"
    title="<?php echo e(trans('media::media.file_manager.select_this_file')); ?>"
>
    <i class="fa fa-check-square-o"></i>
</button>
