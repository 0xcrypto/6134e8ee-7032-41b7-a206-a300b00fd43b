@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('message::messages.messages'))

    <li class="active">{{ trans('message::messages.messages') }}</li>
@endcomponent

@section('content')
<div class="accordion-content clearfix">
    <div class="col-lg-3 col-md-4">
        <div class="accordion-box">
            <div class="panel-group" id="MailTabs">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">{{ trans('message::messages.messages') }}</h4>
                    </div>
                    <div id="messages_information" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="accordion-tab nav nav-tabs">
                                <li class="{{ $currentTab == 'compose' ? 'active' : ''}}">
                                    <a href="{{ route('admin.messages.index', array('currentTab'=>'compose')) }}">
                                        {{ trans('message::messages.compose') }}
                                    </a>
                                </li>
                                <li class="{{ $currentTab == 'inbox' ? 'active' : ''}}">
                                    <a href="{{ route('admin.messages.index', array('currentTab'=>'inbox')) }}">
                                        {{ trans('message::messages.inbox') }}
                                        <span class="badge badge-light"> {{ $total_inbox }} </span>
                                    </a>
                                </li>
                                <li class="{{ $currentTab == 'outbox' ? 'active' : ''}}">
                                    <a href="{{ route('admin.messages.index', array('currentTab'=>'outbox')) }}">
                                        {{ trans('message::messages.outbox') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-8">
        <div class="accordion-box-content">
            <div class="tab-content clearfix">
                <div class="tab-pane fade in active">
                    @include('message::admin.messages.partials.mail')
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
    <script>
        new DataTable('#messages-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                //
            ],
        });
    </script>
@endpush
