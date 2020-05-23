<div id="description" class="description tab-pane fade in <?php echo e(request()->has('reviews') || review_form_has_error($errors) ? '' : 'active'); ?>">
    <?php echo $product->description; ?>

</div>
