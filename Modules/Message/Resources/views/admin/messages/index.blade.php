@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('message::messages.messages'))

    <li class="active">{{ trans('message::messages.messages') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'messages')
    @slot('name', trans('message::messages.message'))

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
        new DataTable('#messages-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                //
            ],
        });
    </script>
@endpush
