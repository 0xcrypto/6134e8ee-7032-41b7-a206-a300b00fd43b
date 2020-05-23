@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('store::stores.stores'))

    <li class="active">{{ trans('store::stores.stores') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'stores')
    @slot('name', trans('store::stores.store'))

    @component('admin::components.table')
        @slot('thead')
            <tr>
                @include('admin::partials.table.select_all')
                <th>{{ trans('store::admin.table.id') }}</th>
                <th>{{ trans('store::admin.table.name') }}</th>
                <th>{{ trans('store::admin.table.latitude_longitude') }}</th>
                <th>{{ trans('store::admin.table.address') }}</th>
                <th>{{ trans('store::admin.table.created') }}</th>
            </tr>
        @endslot
    @endcomponent
@endcomponent

@push('scripts')
    <script>
        new DataTable('#stores-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },  
                { data: 'id', orderable: false, searchable: false, width: '3%' },
                { data: 'name', orderable: false, searchable: false, width: '3%' },
                { data: 'latitude_longitude', orderable: false, searchable: false, width: '3%' },
                { data: 'address', orderable: false, searchable: false, width: '3%' },  
                { data: 'created_at', orderable: false, searchable: false, width: '3%' },       
                //
            ],
        });
    </script>
@endpush
