@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('storeunit::storeunits.storeunit')]))
    @slot('subtitle', '')

    <li><a href="{{ route('admin.store_units.index') }}">{{ trans('storeunit::store_units.store_units') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('storeunit::store_units.store_unit')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.store_units.update', $storeUnit) }}" class="form-horizontal" id="storeunit-edit-form" novalidate>
    	   
        {{ csrf_field() }}

        {{ method_field('put') }}

        {!! $tabs->render(compact('storeUnit')) !!}

    </form>
@endsection

@include('storeunit::admin.store_units.partials.shortcuts')