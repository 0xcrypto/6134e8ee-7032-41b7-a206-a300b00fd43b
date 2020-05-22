<div class="row">
    <div class="col-md-8">
        <?php echo $__env->make('meta::admin.meta_fields', ['entity' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
