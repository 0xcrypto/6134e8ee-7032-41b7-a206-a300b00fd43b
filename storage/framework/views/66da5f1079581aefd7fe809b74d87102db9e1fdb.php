<?php $__env->startSection('title', trans('user::auth.login')); ?>

<?php $__env->startSection('content'); ?>
    <div class="form-wrapper">
        <?php echo $__env->make('public.partials.notification', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="form form-page">
            <form method="POST" action="<?php echo e(route('login.post')); ?>" class="login-form clearfix">
                <?php echo e(csrf_field()); ?>


                <div class="bg-blue">
                    <div class="reflection"></div>
                </div>

                <div class="login form-inner clearfix">
                    <a href="<?php echo e(route('register')); ?>" class="register" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('user::auth.register')); ?>" rel="tooltip">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </a>

                    <h3><?php echo e(trans('user::auth.login')); ?></h3>

                    <div class="form-group <?php echo e($errors->has('email') ? 'has-error': ''); ?>">
                        <label for="email"><?php echo e(trans('user::auth.email')); ?><span>*</span></label>

                        <input type="text" name="email" value="<?php echo e(old('email')); ?>" class="form-control" id="email" placeholder="<?php echo e(trans('user::attributes.users.email')); ?>" autofocus>

                        <div class="input-icon">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </div>

                        <?php echo $errors->first('email', '<span class="error-message">:message</span>'); ?>

                    </div>

                    <div class="form-group <?php echo e($errors->has('password') ? 'has-error': ''); ?>">
                        <label for="password"><?php echo e(trans('user::auth.password')); ?><span>*</span></label>

                        <input type="password" name="password" class="form-control" id="password" placeholder="<?php echo e(trans('user::attributes.users.password')); ?>">

                        <div class="input-icon">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </div>

                        <?php echo $errors->first('password', '<span class="error-message">:message</span>'); ?>

                    </div>

                    <div class="clearfix"></div>

                    <button type="submit" class="btn btn-primary btn-center btn-login" data-loading>
                        <?php echo e(trans('user::auth.login')); ?>

                    </button>

                    <div class="checkbox pull-left">
                        <input type="hidden" value="0">
                        <input type="checkbox" value="1" id="remember">

                        <label for="remember"><?php echo e(trans('user::auth.remember_me')); ?></label>
                    </div>

                    <a href="<?php echo e(route('reset')); ?>" class="forgot-password pull-right">
                        <?php echo e(trans('user::auth.forgot_password')); ?>

                    </a>
                </div>
            </form>
        </div>

        <div class="social-login-buttons text-center">
            <?php if(count(app('enabled_social_login_providers')) !== 0): ?>
                <span><?php echo e(trans('user::auth.or')); ?></span>
            <?php endif; ?>

            <?php if(setting('facebook_login_enabled')): ?>
                <a href="<?php echo e(route('login.redirect', ['provider' => 'facebook'])); ?>" class="btn btn-facebook">
                    <?php echo e(Theme::image('public/images/facebook.png')); ?>

                    <?php echo e(trans('user::auth.log_in_with_facebook')); ?>

                </a>
            <?php endif; ?>

            <?php if(setting('google_login_enabled')): ?>
                <a href="<?php echo e(route('login.redirect', ['provider' => 'google'])); ?>" class="btn btn-google">
                    <?php echo e(Theme::image('public/images/google.png')); ?>

                    <?php echo e(trans('user::auth.log_in_with_google')); ?>

                </a>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>