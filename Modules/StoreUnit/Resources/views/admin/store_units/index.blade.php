@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('storeunit::store_units.store_units'))

    <li class="active">{{ trans('storeunit::store_units.store_units') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'store_units')
    @slot('name', trans('storeunit::store_units.store_unit'))

    @component('admin::components.table')
        @slot('thead')
            <tr>
                @include('admin::partials.table.select_all')
                <th>{{ trans('storeunit::attributes.form.name') }}</th>
                <th>{{ trans('storeunit::attributes.form.store') }}</th>
                <th>{{ trans('storeunit::attributes.form.availability') }}</th>
            </tr>
        @endslot
    @endcomponent
@endcomponent

@push('scripts')
    <script>
        new DataTable('#store_units-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'name', name: 'storeUnit.name', orderable: false },
                { data: 'store', name: 'store.name', orderable: false, searchable: false, defaultContent: '' },
                { data: 'availability', name: 'availability', orderable: false, searchable: false }
            ],
        });
    </script>
@endpush
