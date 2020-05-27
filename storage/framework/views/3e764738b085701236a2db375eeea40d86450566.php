<div class="modal fade" id="keyboard-shortcuts-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</a>
                <h4 class="modal-title"><?php echo e(trans('admin::admin.shortcuts.available_shortcuts')); ?></h4>
            </div>

            <div class="modal-body">
                <dl class="dl-horizontal">
                    <dt><code>?</code></dt>
                    <dd><?php echo e(trans('admin::admin.shortcuts.this_menu')); ?></dd>
                </dl>

                <?php echo $__env->yieldPushContent('shortcuts'); ?>
            </div>
        </div>
    </div>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <span>v<?php echo e(fleetcart_version()); ?></span>
    </div>

    <a href="#" data-toggle="modal" data-target="#keyboard-shortcuts-modal">
        <i class="fa fa-keyboard-o"></i>
    </a>&nbsp;

    <span>Copyright &copy; <?php echo e(date('Y')); ?> <a href="http://envaysoft.com/fleetcart" target="_blank">FleetCart</a></span>
</footer>
