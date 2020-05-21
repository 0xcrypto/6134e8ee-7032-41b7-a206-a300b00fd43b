@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('message::messages.message')]))

    <li><a href="{{ route('admin.messages.index') }}">{{ trans('message::messages.messages') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('message::messages.message')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.messages.store') }}" class="form-horizontal" id="message-create-form" novalidate>
        {{ csrf_field() }}
    </form>
@endsection

@include('message::admin.messages.partials.shortcuts')
