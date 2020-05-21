@extends('admin::master')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('message::message_recipients.message_recipient')]))

    <li><a href="{{ route('admin.message_recipients.index') }}">{{ trans('message::message_recipients.message_recipients') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('message::message_recipients.message_recipient')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.message_recipients.store') }}" class="form-horizontal" id="message-recipient-create-form" novalidate>
        {{ csrf_field() }}
    </form>
@endsection

@include('message::admin.message_recipients.partials.shortcuts')
