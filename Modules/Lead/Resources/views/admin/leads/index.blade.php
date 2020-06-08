@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('lead::leads.leads'))

    <li class="active">{{ trans('lead::leads.leads') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'leads')
    @slot('name', trans('lead::leads.lead'))

<div class="accordion-content clearfix">
    <div class="col-lg-3 col-md-4">
        <div class="accordion-box">
            <div class="panel-group" id="StoreTabs">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a>
                                {{ trans('lead::leads.lead_information') }}
                            </a>
                        </h4>
                    </div>
                    <div id="store_information" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="accordion-tab nav nav-tabs">
                                @foreach($storeLists as $stores)
                                    <li>
                                        <a href="#{{ str_replace(' ', '-', $stores['id']) }}" data-toggle='tab'>{{ $stores['name'] }}</a>
                                    </li>
                                @endforeach
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
                @foreach($storeLists as $stores)
                <div class='tab-pane fade in' id="{{ str_replace(' ', '-', $stores['id']) }}">
                    <h3 class='tab-content-title'> {{ $stores['name'] }}</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="accordion-content clearfix">
                                <div class="col-lg-2 col-md-4">
                                    <h3>0</h3>
                                    <br>
                                    <h6>{{ trans('lead::attributes.index.contacted') }}</h6>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <h3>0</h3>
                                    <br>
                                    <h6>{{ trans('lead::attributes.index.customer') }}</h6>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <h3>0</h3>
                                    <br>
                                    <h6>{{ trans('lead::attributes.index.new') }}</h6>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <h3>0</h3>
                                    <br>
                                    <h6>{{ trans('lead::attributes.index.proposal_sent') }}</h6>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <h3>0</h3>
                                    <br>
                                    <h6>{{ trans('lead::attributes.index.qualified') }}</h6>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <h3>0</h3>
                                    <br>
                                    <h6 style="color:red;">{{ trans('lead::attributes.index.lost') }}</h6>
                                </div>
                            </div>
                            <br>
                            <div class="btn-group pull-left">
                                <a href="" class="btn btn-primary btn-actions btn-create">
                                Delete
                                </a>
                            </div>
                            <table class="table table-striped table-hover " id="">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="checkbox">
                                                <input type="checkbox" class="select-all" id="-select-all">
                                                <label for="-select-all"></label>
                                            </div>
                                        </th>
                                        <th>{{ trans('lead::attributes.table.name') }}</th>
                                        <th>{{ trans('lead::attributes.table.email') }}</th>
                                        <th>{{ trans('lead::attributes.table.assigned') }}</th>
                                        <th>{{ trans('lead::attributes.table.status') }}</th>
                                        <th>{{ trans('lead::attributes.table.product') }}</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
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
