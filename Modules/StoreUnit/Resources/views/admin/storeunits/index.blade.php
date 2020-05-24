@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('storeunit::storeunits.storeunits'))

    <li class="active">{{ trans('storeunit::storeunits.storeunits') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'storeunits')
    @slot('name', trans('storeunit::storeunits.storeunit'))

    @component('admin::components.table')
        @slot('thead')
            <tr>
                @include('admin::partials.table.select_all')
                <th>{{ trans('storeunit::attributes.form.name') }}</th>
                <th>{{ trans('storeunit::attributes.form.store') }}</th>
                <th>{{ trans('storeunit::attributes.form.product') }}</th>
                <th>{{ trans('storeunit::attributes.form.quantity') }}</th>
                <th>{{ trans('storeunit::attributes.form.availability') }}</th>
            </tr>
        @endslot
    @endcomponent
@endcomponent

@push('scripts')
    <script>
        new DataTable('#storeunits-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'name', orderable: false, searchable: false, width: '3%' },
                { data: 'store', orderable: false, searchable: false, width: '3%' },
                { data: 'product', orderable: false, searchable: false, width: '3%' },
                { data: 'quantity', orderable: false, searchable: false, width: '3%' },
                { data: 'availability', orderable: false, searchable: false, width: '3%' },
                //
            ],
        });
    </script>
@endpush
