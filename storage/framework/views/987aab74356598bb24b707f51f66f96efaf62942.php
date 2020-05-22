<ul id="respMenu" class="horizontal-menu" data-menu-style="">
    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $group; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
