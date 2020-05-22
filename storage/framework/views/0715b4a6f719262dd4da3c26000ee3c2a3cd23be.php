<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::text('first_name', trans('user::attributes.users.first_name'), $errors, $user, ['required' => true])); ?>

        <?php echo e(Form::text('last_name', trans('user::attributes.users.last_name'), $errors, $user, ['required' => true])); ?>

        <?php echo e(Form::email('email', trans('user::attributes.users.email'), $errors, $user, ['required' => true])); ?>

        <?php echo e(Form::select('roles', trans('user::attributes.users.roles'), $errors, $roles, $user, ['multiple' => true, 'required' => true, 'class' => 'selectize prevent-creation'])); ?>


        <?php if(request()->routeIs('admin.users.create')): ?>
            <?php echo e(Form::password('password', trans('user::attributes.users.password'), $errors, null, ['required' => true])); ?>

            <?php echo e(Form::password('password_confirmation', trans('user::attributes.users.password_confirmation'), $errors, null, ['required' => true])); ?>

        <?php endif; ?>

        <?php if(request()->routeIs('admin.users.edit')): ?>
            <?php echo e(Form::checkbox('activated', trans('user::attributes.users.activated'), trans('user::users.form.activated'), $errors, $user, ['disabled' => $user->id === $currentUser->id, 'checked' => old('activated', $user->isActivated())])); ?>

        <?php endif; ?>
    </div>
</div>
