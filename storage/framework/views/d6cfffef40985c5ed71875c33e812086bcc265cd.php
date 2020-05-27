<div class="dashboard-panel">
    <div class="grid-header">
        <h4><i class="fa fa-comments-o" aria-hidden="true"></i><?php echo e(trans('admin::dashboard.latest_reviews')); ?></h4>
    </div>

    <div class="clearfix"></div>

    <div class="table-responsive anchor-table">
        <table class="table">
            <thead>
                <tr>
                    <th><?php echo e(trans('admin::dashboard.table.latest_reviews.product')); ?></th>
                    <th><?php echo e(trans('admin::dashboard.table.customer')); ?></th>
                    <th><?php echo e(trans('admin::dashboard.table.latest_reviews.rating')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $latestReviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestReview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <a href="<?php echo e(route('admin.reviews.edit', $latestReview)); ?>">
                                <?php echo e($latestReview->product->name); ?>

                            </a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.reviews.edit', $latestReview)); ?>">
                                <?php echo e($latestReview->reviewer_name); ?>

                            </a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.reviews.edit', $latestReview)); ?>">
                                <?php echo e($latestReview->rating); ?>

                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td class="empty" colspan="5"><?php echo e(trans('admin::dashboard.no_data')); ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
