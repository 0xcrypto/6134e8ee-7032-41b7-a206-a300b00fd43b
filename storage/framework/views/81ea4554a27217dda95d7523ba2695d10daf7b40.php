<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="single-grid total-sales">
        <h4><?php echo e(trans('admin::dashboard.total_sales')); ?></h4>

        <i class="fa fa-money pull-left" aria-hidden="true"></i>
        <span class="pull-right"><?php echo e($totalSales->format()); ?></span>
    </div>
</div>
