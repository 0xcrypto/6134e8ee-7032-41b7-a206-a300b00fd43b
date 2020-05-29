@extends('admin::master')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('product::unit_products.unit_product')]))
    @slot('subtitle', '')

    <li><a href="{{ route('admin.unit_products.index') }}">{{ trans('product::unit_products.unit_products') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('product::unit_products.unit_product')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.unit_products.update', $unitProduct) }}" class="form-horizontal" id="unit-product-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}
    </form>
@endsection

@include('product::admin.unit_products.partials.shortcuts')
