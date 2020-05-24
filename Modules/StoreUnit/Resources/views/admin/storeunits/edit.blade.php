@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('storeunit::storeunits.storeunit')]))
    @slot('subtitle', '')

    <li><a href="{{ route('admin.storeunits.index') }}">{{ trans('storeunit::storeunits.storeunits') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('storeunit::storeunits.storeunit')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.storeunits.update', $storeunit) }}" class="form-horizontal" id="storeunit-edit-form" novalidate>
    	
        {{ csrf_field() }}

        {{ method_field('put') }}

        {!! $tabs->render(compact('storeunit')) !!}

    </form>
@endsection

@include('storeunit::admin.storeunits.partials.shortcuts')
