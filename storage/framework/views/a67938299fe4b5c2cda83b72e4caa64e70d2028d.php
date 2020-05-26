<div class="permission-row">
    <div class="row">
        <div class="col-md-5 col-sm-4">
            <span class="permission-label"><?php echo e(trans($permissionLabel)); ?></sapn>
        </div>

        <div class="col-md-7 col-sm-8">
            <div class="row">
                <div class="radio-btn clearfix">

                    <?php if(! is_null($entity)): ?>
                        <?php
                            $permissionValue = old('permissions')["{$group}.{$permissionAction}"] ?? permission_value($entity->permissions, "{$group}.{$permissionAction}")
                        ?>
                    <?php endif; ?>

                    <div class="radio">
                        <input type="radio" value="0" id="<?php echo e("{$group}-{$permissionAction}"); ?>-inherit" name="permissions[<?php echo e("{$group}.{$permissionAction}"); ?>]" class="permission-inherit" <?php echo e(isset($permissionValue) && $permissionValue == 0 ? 'checked' : ''); ?>>

                        <label for="<?php echo e("{$group}-{$permissionAction}"); ?>-inherit"><?php echo e(trans('user::roles.permissions.inherit')); ?></label>
                    </div>

                    <div class="radio">
                        <input type="radio" value="-1" id="<?php echo e("{$group}-{$permissionAction}"); ?>-deny" name="permissions[<?php echo e("{$group}.{$permissionAction}"); ?>]" class="permission-deny" <?php echo e(isset($permissionValue) && $permissionValue == -1 ? 'checked' : ''); ?>>

                        <label for="<?php echo e("{$group}-{$permissionAction}"); ?>-deny"><?php echo e(trans('user::roles.permissions.deny')); ?></label>
                    </div>

                    <div class="radio">
                        <input type="radio" value="1" id="<?php echo e("{$group}-{$permissionAction}"); ?>-allow" name="permissions[<?php echo e("{$group}.{$permissionAction}"); ?>]" class="permission-allow" <?php echo e(isset($permissionValue) && $permissionValue == 1 ? 'checked' : ''); ?>>

                        <label for="<?php echo e("{$group}-{$permissionAction}"); ?>-allow"><?php echo e(trans('user::roles.permissions.allow')); ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
