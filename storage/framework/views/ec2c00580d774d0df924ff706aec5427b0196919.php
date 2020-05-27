<div class="accordion-content clearfix">
    <div class="col-lg-3 col-md-4">
        <div class="accordion-box">
            <div class="panel-group" id="<?php echo e($name); ?>">
                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a
                                    <?php if(count($groups) > 1): ?>
                                        class="<?php echo e(($options['active'] ?? false) ? '' : 'collapsed'); ?> <?php echo e($tabs->group($group)->hasError() ? 'has-error' : ''); ?>"
                                        data-toggle="collapse"
                                        data-parent="#<?php echo e($name); ?>"
                                        href="#<?php echo e($group); ?>"
                                    <?php endif; ?>
                                >
                                    <?php echo e($options['title']); ?>

                                </a>
                            </h4>
                        </div>

                        <div id="<?php echo e($group); ?>" class="panel-collapse collapse <?php echo e(($options['active'] ?? false) ? 'in' : ''); ?>">
                            <div class="panel-body">
                                <ul class="accordion-tab nav nav-tabs">
                                    <?php echo e($tabs->group($group)->navs()); ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <div class="col-lg-9 col-md-8">
        <div class="accordion-box-content">
            <div class="tab-content clearfix">
                <?php echo e($contents); ?>


                <?php echo $__env->make('admin::form.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
</div>
