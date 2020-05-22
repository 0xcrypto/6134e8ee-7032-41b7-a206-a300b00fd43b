<div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>

                <h3 class="modal-title"><?php echo e(trans('admin::admin.delete.confirmation')); ?></h3>
            </div>

            <div class="modal-body">
                <div class="default-message">
                    <?php echo e($message ?? trans('admin::admin.delete.confirmation_message')); ?>

                </div>
            </div>

            <div class="modal-footer">
                <form method="POST" id="confirmation-form">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('delete')); ?>


                    <button type="button" class="btn btn-default cancel" data-dismiss="modal">
                        <?php echo e(trans('admin::admin.buttons.cancel')); ?>

                    </button>

                    <button type="submit" class="btn btn-danger delete">
                        <?php echo e(trans('admin::admin.buttons.delete')); ?>

                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
