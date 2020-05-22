<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('currency::currency_rates.currency_rates')); ?>

    <li class="active"><?php echo e(trans('currency::currency_rates.currency_rates')); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="btn-group pull-right">
            <button id="refresh-rates" class="btn btn-primary btn-actions" data-loading>
                <?php echo e(trans('currency::currency_rates.refresh_rates')); ?>

            </button>
        </div>
    </div>

    <div class="box box-primary">
        <div class="box-body index-table" id="currency-rates-table">
            <?php $__env->startComponent('admin::components.table'); ?>
                <?php $__env->slot('thead'); ?>
                    <tr>
                        <th><?php echo e(trans('currency::currency_rates.table.currency')); ?></th>
                        <th><?php echo e(trans('currency::currency_rates.table.code')); ?></th>
                        <th><?php echo e(trans('currency::currency_rates.table.rate')); ?></th>
                        <th data-sort><?php echo e(trans('currency::currency_rates.table.last_updated')); ?></th>
                    </tr>
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        DataTable.setRoutes('#currency-rates-table .table', {
            index: 'admin.currency_rates.index',
            edit: 'admin.currency_rates.edit',
        });

        new DataTable('#currency-rates-table .table', {
            columns: [
                { data: 'currency_name', orderable: false, searchable: false },
                { data: 'currency' },
                { data: 'rate', searchable: false },
                { data: 'updated_at', searchable: false },
            ],
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>