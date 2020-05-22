@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('message::messages.messages'))

    <li class="active">{{ trans('message::messages.messages') }}</li>
@endcomponent

@section('content')
<div class="accordion-content clearfix">
    <div class="col-lg-3 col-md-4">
        <div class="accordion-box">
            <div class="panel-group" id="AttributeTabs">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a>{{ trans('message::messages.messages') }}</a>
                        </h4>
                    </div>

                    <div id="messages_information" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="accordion-tab nav nav-tabs">
                                <li class="active ">
                                    <a href="#inbox" data-toggle="tab">
                                        {{ trans('message::messages.inbox') }}
                                        <span class="badge badge-light"> 4 </span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="#outbox" data-toggle="tab">{{ trans('message::messages.outbox') }}</a>
                                </li>
                                <li class=" ">
                                    <a href="#compose" data-toggle="tab">{{ trans('message::messages.compose') }}</a>
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
                <div class="tab-pane fade in active" id="inbox">
                    <h3 class="tab-content-title">
                        {{ trans('message::messages.inbox') }} 
                        <span class="badge badge-light"> 4 </span>
                    </h3>
                    @include('message::admin.messages.partials.inbox')
                </div>
                <div class="tab-pane fade in " id="outbox">
                    <h3 class="tab-content-title">{{ trans('message::messages.outbox') }}</h3>
                    @include('message::admin.messages.partials.outbox')
                </div>
                <div class="tab-pane fade in " id="compose">
                    <h3 class="tab-content-title">{{ trans('message::messages.compose') }}</h3>
                    @include('message::admin.messages.partials.compose')
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
