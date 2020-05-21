@extends('admin::master')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('message::messages.message')]))
    @slot('subtitle', '')

    <li><a href="{{ route('admin.messages.index') }}">{{ trans('message::messages.messages') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('message::messages.message')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.messages.update', $message) }}" class="form-horizontal" id="message-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}
    </form>
@endsection

@include('message::admin.messages.partials.shortcuts')
