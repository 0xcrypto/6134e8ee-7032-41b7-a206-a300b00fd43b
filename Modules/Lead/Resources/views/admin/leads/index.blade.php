@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('lead::leads.leads'))

    <li class="active">{{ trans('lead::leads.leads') }}</li>
@endcomponent

@section('content')
    <div class="row">
        <div class="btn-group pull-right">
            <a href="{{ route("admin.leads.create") }}" class="btn btn-primary btn-actions btn-create">
                {{ trans("admin::resource.create", ['resource' => 'Lead']) }}
            </a>
        </div>
    </div>

    @include('lead::admin.leads.partials.leads')
@endsection
