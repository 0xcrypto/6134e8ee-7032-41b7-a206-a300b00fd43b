<?php if(session()->has('success')): ?>
    <div class="alert alert-success fade in clearfix">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
        <div class="alert-icon">
            <i class="fa fa-check" aria-hidden="true"></i>
        </div>
        <span class="alert-text"><?php echo e(session('success')); ?></span>
    </div>
<?php endif; ?>

<?php if(session()->has('error')): ?>
    <div class="alert alert-danger fade in clearfix">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
        <div class="alert-icon">
            <i class="fa fa-exclamation" aria-hidden="true"></i>
        </div>
        <span class="alert-text"><?php echo e(session('error')); ?></span>
    </div>
<?php endif; ?>
