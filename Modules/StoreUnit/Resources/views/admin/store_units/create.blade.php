@extends('admin::layout')



@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('storeunit::store_units.store_unit')]))

    <li><a href="{{ route('admin.store_units.index') }}">{{ trans('storeunit::store_units.store_units') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('storeunit::store_units.store_unit')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.store_units.store') }}" class="form-horizontal" id="storeunit-create-form" novalidate>
        {{ csrf_field() }}

        {!! $tabs->render(compact('storeUnit')) !!}
        
    </form>
@endsection

@include('storeunit::admin.store_units.partials.shortcuts')
