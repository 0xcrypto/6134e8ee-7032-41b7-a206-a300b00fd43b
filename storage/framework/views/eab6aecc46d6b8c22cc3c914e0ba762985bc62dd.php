<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::password('password', trans('user::attributes.users.new_password'), $errors)); ?>

        <?php echo e(Form::password('password_confirmation', trans('user::attributes.users.new_password_confirmation'), $errors)); ?>

    </div>
</div>
