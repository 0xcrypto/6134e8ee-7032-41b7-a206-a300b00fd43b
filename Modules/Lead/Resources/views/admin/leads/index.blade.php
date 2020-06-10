@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('lead::leads.leads'))

    <li class="active">{{ trans('lead::leads.leads') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'leads')
    @slot('name', trans('lead::leads.lead'))

    <div class="row">
        <div class="btn-group pull-right">
            <a href="{{ route("admin.leads.create") }}" class="btn btn-primary btn-actions btn-create">
                {{ trans("admin::resource.create", ['resource' => 'Ticket']) }}
            </a>
        </div>
    </div>
@endcomponent

@push('scripts')
    <script>
        new DataTable('#leads-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                //
            ],
        });
    </script>
@endpush
