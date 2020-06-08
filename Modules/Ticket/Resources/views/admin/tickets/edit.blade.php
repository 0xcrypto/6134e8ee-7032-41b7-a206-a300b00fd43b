@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('ticket::tickets.ticket')]))
    @slot('subtitle', '')

    <li><a href="{{ route('admin.tickets.index') }}">{{ trans('ticket::tickets.tickets') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('ticket::tickets.ticket')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.tickets.update', $ticket) }}" class="form-horizontal" id="ticket-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}

        {!! $tabs->render(compact('ticket')) !!}
    </form>
@endsection

@include('ticket::admin.tickets.partials.shortcuts')
