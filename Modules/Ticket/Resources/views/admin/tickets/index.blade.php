@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('ticket::tickets.tickets'))

    <li class="active">{{ trans('ticket::tickets.tickets') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'tickets')
    @slot('name', trans('ticket::tickets.ticket'))

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
        new DataTable('#tickets-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                //
            ],
        });
    </script>
@endpush
