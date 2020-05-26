<div class="row">
    <div class="col-lg-9 col-md-12">
        <div class="btn-group permission-parent-actions pull-right">
            <button type="button" class="btn btn-default allow-all"><?php echo e(trans('user::roles.permissions.allow_all')); ?></button>
            <button type="button" class="btn btn-default deny-all"><?php echo e(trans('user::roles.permissions.deny_all')); ?></button>
            <button type="button" class="btn btn-default inherit-all"><?php echo e(trans('user::roles.permissions.inherit_all')); ?></button>
        </div>
    </div>
</div>

<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module => $modulePermissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <div class="col-md-12">
                <div class="row">
                    <div class="permission-parent-head clearfix">
                        <h3><?php echo e($module); ?></h3>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <?php $__currentLoopData = $modulePermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $groupPermissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="permission-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="permission-group-head">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <h4><?php echo e($group); ?></h4>
                                    </div>

                                    <div class="col-md-8 col-sm-8">
                                        <div class="btn-group permission-group-actions pull-right">
                                            <button type="button" class="btn btn-default allow-all"><?php echo e(trans('user::roles.permissions.allow_all')); ?></button>
                                            <button type="button" class="btn btn-default deny-all"><?php echo e(trans('user::roles.permissions.deny_all')); ?></button>
                                            <button type="button" class="btn btn-default inherit-all"><?php echo e(trans('user::roles.permissions.inherit_all')); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <?php $__currentLoopData = $groupPermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionAction => $permissionLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('user::admin.partials.permissions.actions', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
