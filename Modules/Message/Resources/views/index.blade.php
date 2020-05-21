@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('message::message.messages'))

    <li class="active">{{ trans('message::message.messages') }}</li>
@endcomponent

@section('content')
    <h1>Index</h1>
@endSection