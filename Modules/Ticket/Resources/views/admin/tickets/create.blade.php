@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('ticket::tickets.ticket')]))

    <li><a href="{{ route('admin.tickets.index') }}">{{ trans('ticket::tickets.tickets') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('ticket::tickets.ticket')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.tickets.store') }}" class="form-horizontal" id="ticket-create-form" novalidate>
        {{ csrf_field() }}
    </form>
@endsection

@include('ticket::admin.tickets.partials.shortcuts')
