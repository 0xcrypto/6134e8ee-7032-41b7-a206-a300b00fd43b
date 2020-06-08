@extends('admin::master')
@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('lead::leads.lead')]))
    @slot('subtitle', '')

    <li><a href="{{ route('admin.leads.index') }}">{{ trans('lead::leads.leads') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('lead::leads.lead')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.leads.update', $lead) }}" class="form-horizontal" id="lead-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}
    </form>
@endsection

@include('lead::admin.leads.partials.shortcuts')
