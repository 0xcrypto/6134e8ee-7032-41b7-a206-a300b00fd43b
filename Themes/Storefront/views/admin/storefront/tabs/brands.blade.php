<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('storefront_brand_section_enabled', trans('storefront::attributes.section_status'), trans('storefront::storefront.form.enable_brands_section'), $errors, $settings) }}
    </div>
</div>

<div class="m-b-15">
    @include('media::admin.image_picker.multiple', [
        'title' => trans('storefront::storefront.form.brands'),
        'inputName' => 'storefront_brands[]',
        'files' => $brands,
    ])
</div>
