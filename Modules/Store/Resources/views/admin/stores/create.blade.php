@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('store::stores.store')]))

    <li><a href="{{ route('admin.stores.index') }}">{{ trans('store::stores.stores') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('store::stores.store')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.stores.store') }}" class="form-horizontal" id="store-create-form" novalidate>
        {{ csrf_field() }}

    </form>
@endsection

@include('store::admin.stores.partials.shortcuts')
