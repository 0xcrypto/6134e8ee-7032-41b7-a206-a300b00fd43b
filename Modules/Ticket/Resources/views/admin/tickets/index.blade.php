@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('ticket::tickets.tickets'))

    <li class="active">{{ trans('ticket::tickets.tickets') }}</li>
@endcomponent

@section('content')
    <div class="row">
        <div class="btn-group pull-right">
            <a href="{{ route("admin.tickets.create") }}" class="btn btn-primary btn-actions btn-create">
                {{ trans("admin::resource.create", ['resource' => 'Ticket']) }}
            </a>
        </div>
    </div>

    @include('ticket::admin.tickets.partials.tickets')
@endsection
