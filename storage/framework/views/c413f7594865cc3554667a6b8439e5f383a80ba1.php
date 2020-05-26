<!DOCTYPE html>
<html lang="<?php echo e(locale()); ?>">
<head>
    <meta charset="UTF-8">

    <title><?php echo e(trans('media::media.file_manager.title')); ?></title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:600|Roboto" rel="stylesheet">

    <?php $__currentLoopData = $assets->allCss(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $css): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(v($css)); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo $__env->make('admin::partials.globals', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>

<body class="file-manager">
    <div class="container">
        <?php echo $__env->make('media::admin.media.partials.uploader', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <?php echo $__env->make('media::admin.media.partials.table', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>

    <div id="notification-toast"></div>

    <?php echo $__env->make('admin::partials.confirmation_modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php $__currentLoopData = $assets->allJs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $js): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script src="<?php echo e(v($js)); ?>"></script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <script>
        DataTable.setRoutes('.file-manager .table', {
            index: {
                name: 'admin.media.index',
                params: { type: '<?php echo e($type); ?>' }
            },
            destroy: 'admin.media.destroy',
        });

        new DataTable('.file-manager .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'thumbnail', orderable: false, searchable: false, width: '10%' },
                { data: 'filename', name: 'filename' },
                { data: 'created', name: 'created_at' },
                { data: 'action', orderable: false, searchable: false },
            ],
        });
    </script>
</body>
</html>
