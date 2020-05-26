<div class="dashboard-panel">
    <div class="grid-header">
        <h4><i class="fa fa-search" aria-hidden="true"></i><?php echo e(trans('admin::dashboard.latest_search_terms')); ?></h4>
    </div>

    <div class="clearfix"></div>

    <div class="table-responsive search-terms">
        <table class="table">
            <thead>
                <tr>
                    <th><?php echo e(trans('admin::dashboard.table.latest_search_terms.keyword')); ?></th>
                    <th><?php echo e(trans('admin::dashboard.table.latest_search_terms.results')); ?></th>
                    <th><?php echo e(trans('admin::dashboard.table.latest_search_terms.hits')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $latestSearchTerms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestSearchTerm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($latestSearchTerm->term); ?></td>
                        <td><?php echo e($latestSearchTerm->results); ?></td>
                        <td><?php echo e($latestSearchTerm->hits); ?></td>
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
