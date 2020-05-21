@extends('admin::master')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('message::message_recipients.message_recipient')]))
    @slot('subtitle', '')

    <li><a href="{{ route('admin.message_recipients.index') }}">{{ trans('message::message_recipients.message_recipients') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('message::message_recipients.message_recipient')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.message_recipients.update', $messageRecipient) }}" class="form-horizontal" id="message-recipient-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}
    </form>
@endsection

@include('message::admin.message_recipients.partials.shortcuts')
