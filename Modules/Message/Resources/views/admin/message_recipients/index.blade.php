@extends('admin::master')

@component('admin::components.page.header')
    @slot('title', trans('message::message_recipients.message_recipients'))

    <li class="active">{{ trans('message::message_recipients.message_recipients') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'message_recipients')
    @slot('name', trans('message::message_recipients.message_recipient'))

    @component('admin::components.table')
        @slot('thead')
            <tr>
                @include('admin::partials.table.select_all')
            </tr>
        @endslot
    @endcomponent
@endcomponent

@push('scripts')
    <script>
        new DataTable('#message_recipients-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                //
            ],
        });
    </script>
@endpush
