@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('lead::leads.lead')]))

    <li><a href="{{ route('admin.leads.index') }}">{{ trans('lead::leads.leads') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('lead::leads.lead')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.leads.store') }}" class="form-horizontal" id="lead-create-form" novalidate>
        {{ csrf_field() }}

        @include('lead::admin.leads.partials.createlead')
    </form>
@endsection

@include('lead::admin.leads.partials.shortcuts')
