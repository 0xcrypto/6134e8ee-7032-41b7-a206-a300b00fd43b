@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('storeunit::storeunits.storeunit')]))

    <li><a href="{{ route('admin.storeunits.index') }}">{{ trans('storeunit::storeunits.storeunits') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('storeunit::storeunits.storeunit')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.storeunits.store') }}" class="form-horizontal" id="storeunit-create-form" novalidate>
        {{ csrf_field() }}

        {!! $tabs->render(compact('storeunit')) !!}
        
    </form>
@endsection

@include('storeunit::admin.storeunits.partials.shortcuts')
