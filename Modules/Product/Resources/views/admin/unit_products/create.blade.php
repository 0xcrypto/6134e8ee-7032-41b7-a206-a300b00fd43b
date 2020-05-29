@extends('admin::master')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('product::unit_products.unit_product')]))

    <li><a href="{{ route('admin.unit_products.index') }}">{{ trans('product::unit_products.unit_products') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('product::unit_products.unit_product')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.unit_products.store') }}" class="form-horizontal" id="unit-product-create-form" novalidate>
        {{ csrf_field() }}
    </form>
@endsection

@include('product::admin.unit_products.partials.shortcuts')
