@extends('admin::master')

@component('admin::components.page.header')
    @slot('title', trans('product::unit_products.unit_products'))

    <li class="active">{{ trans('product::unit_products.unit_products') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'unit_products')
    @slot('name', trans('product::unit_products.unit_product'))

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
        new DataTable('#unit_products-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                //
            ],
        });
    </script>
@endpush
