<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::text('label', trans('tax::attributes.label'), $errors, $taxClass, ['required' => true])); ?>

        <?php echo e(Form::select('based_on', trans('tax::attributes.based_on'), $errors, trans('tax::taxes.form.based_on'), $taxClass, ['required' => true])); ?>

    </div>
</div>
