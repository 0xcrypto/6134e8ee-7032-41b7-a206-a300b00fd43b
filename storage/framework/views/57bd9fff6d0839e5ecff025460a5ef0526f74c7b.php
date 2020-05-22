<div class="dashboard-panel">
    <div class="grid-header">
        <h4><i class="fa fa-shopping-cart" aria-hidden="true"></i><?php echo e(trans('admin::dashboard.latest_orders')); ?></h4>
    </div>

    <div class="clearfix"></div>

    <div class="table-responsive anchor-table">
        <table class="table">
            <thead>
                <tr>
                    <th><?php echo e(trans('admin::dashboard.table.latest_orders.order_id')); ?></th>
                    <th><?php echo e(trans('admin::dashboard.table.customer')); ?></th>
                    <th><?php echo e(trans('admin::dashboard.table.latest_orders.status')); ?></th>
                    <th><?php echo e(trans('admin::dashboard.table.latest_orders.total')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $latestOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <a href="<?php echo e(route('admin.orders.show', $latestOrder)); ?>">
                                <?php echo e($latestOrder->id); ?>

                            </a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.orders.show', $latestOrder)); ?>">
                                <?php echo e($latestOrder->customer_full_name); ?>

                            </a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.orders.show', $latestOrder)); ?>">
                                <?php echo e($latestOrder->status()); ?>

                            </a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.orders.show', $latestOrder)); ?>">
                                <?php echo e($latestOrder->total->format($latestOrder->currency)); ?>

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
