<nav class="navbar navbar-expand">
    <ul class="navbar-nav mr-auto align-items-center">
        <li class="nav-item">
            <a class="nav-link logo" href="<?php echo e(route('admin.dashboard.index')); ?>">
                <span class="logo-lg">Laxmi Electronics</span>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav align-items-center right-nav-link">
        <li class="nav-item">
            <a href="<?php echo e(route('home')); ?>" target="_blank">
                <i class="fa fa-desktop"></i>
                <!--<?php echo e(trans('admin::admin.visit_store')); ?>-->
            </a>
        </li>

        <li class="nav-item pull-right">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#" aria-expanded="true">
                <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li class="dropdown-item user-details">
                    <a href="javaScript:void();">
                        <div class="media">
                            <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
                            <div class="media-body">
                            <h6 class="mt-2 user-title"><?php echo e($currentUser->first_name); ?></h6>
                            <p class="user-subtitle"><?php echo e($currentUser->email); ?></p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="dropdown-divider"></li>
                <li class="dropdown-item"><a href="<?php echo e(route('admin.profile.edit')); ?>"><?php echo e(trans('user::users.profile')); ?></a></li>
                <li class="dropdown-divider"></li>
                <li class="dropdown-item"><a href="<?php echo e(route('admin.logout')); ?>"><?php echo e(trans('user::auth.logout')); ?></a></li>
            </ul>
        </li>

        <?php if(count(supported_locales()) > 1): ?>
            <li class="language dropdown top-nav-menu pull-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span><?php echo e(strtoupper(locale())); ?></span>
                </a>

                <ul class="dropdown-menu">
                    <?php $__currentLoopData = supported_locales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="<?php echo e($locale === locale() ? 'active' : ''); ?>">
                            <a href="<?php echo e(localized_url($locale)); ?>"><?php echo e($language['name']); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<style>
    .right-nav-link a.nav-link {
    padding-right: .8rem !important;
    padding-left: .8rem !important;
    font-size: 20px;
    color: #353434;
}

.right-nav-link a.nav-link {
    padding-right: .8rem !important;
    padding-left: .8rem !important;
    font-size: 20px;
    color: #353434;
}
.user-profile img {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    box-shadow: 0 16px 38px -12px rgba(0,0,0,.56), 0 4px 25px 0 rgba(0,0,0,.12), 0 8px 10px -5px rgba(0,0,0,.2);
}
.user-details {
    border-bottom: 1px solid rgba(66, 59, 116, 0.15);
    padding: 1rem!important;
}
.user-details .media .avatar img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
}
.user-details .media .media-body .user-title {
    font-size: 14px;
    color: #000;
    font-weight: 600;
    margin-bottom: 2px;
}
.user-details .media .media-body .user-subtitle {
    font-size: 13px;
    color: #585858;
    margin-bottom: 0;
}
.user-profile img {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    box-shadow: 0 16px 38px -12px rgba(0,0,0,.56), 0 4px 25px 0 rgba(0,0,0,.12), 0 8px 10px -5px rgba(0,0,0,.2);
}
</style>