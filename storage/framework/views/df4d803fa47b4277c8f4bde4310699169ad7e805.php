<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::text('first_name', trans('user::attributes.users.first_name'), $errors, $currentUser, ['required' => true])); ?>

        <?php echo e(Form::text('last_name', trans('user::attributes.users.last_name'), $errors, $currentUser, ['required' => true])); ?>

        <?php echo e(Form::email('email', trans('user::attributes.users.email'), $errors, $currentUser, ['required' => true])); ?>

    </div>
</div>
