@extends('admin::master')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('store::stores.store')]))
    @slot('subtitle', '')

    <li><a href="{{ route('admin.stores.index') }}">{{ trans('store::stores.stores') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('store::stores.store')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.stores.update', $store) }}" class="form-horizontal" id="store-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}
    </form>
@endsection

@include('store::admin.stores.partials.shortcuts')
