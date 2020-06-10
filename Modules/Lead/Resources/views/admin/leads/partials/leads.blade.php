<div class="accordion-content clearfix">
    <div class="col-lg-3 col-md-4">
        <div class="accordion-box">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title" style="padding: 10px;font-size: 17px;">{{ trans('lead::leads.leads') }}</h4>
                    </div>
                    <div id="lead_information" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="accordion-tab nav nav-tabs">
                                @foreach ($stores as $store)
                                    @php
                                        $storeName = str_replace(" ", "_", $store['name']);
                                        $leadCount = $leads[$storeName."_count"];
                                    @endphp
                                    <li class="{{ ($loop->index == 0) ? 'active' : ''}}">
                                        <a href="#{{ $storeName }}" data-toggle="tab" aria-expanded="true">
                                            {{ $store['name'] }}
                                            <span class="badge badge-light"> {{ $leadCount }} </span>
                                        </a>
                                    </li>
                                @endforeach
                                <li>
                                    <a href="#online" data-toggle="tab" aria-expanded="true">
                                        {{ trans('lead::leads.online_leads') }}
                                        <span class="badge badge-light"> {{ $leads["online_count"] }} </span>
                                    </a>
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
                @foreach ($stores as $store)
                    @php
                        $storeName = str_replace(" ", "_", $store['name']);
                        $storeLeads = $leads[$storeName];
                    @endphp
                    <div class="tab-pane fade in {{ ($loop->index == 0) ? 'active' : ''}}" id="{{ $storeName }}">
                        <h3 class="tab-content-title">
                            {{ $store['name']." ".trans('lead::leads.leads') }}
                            <span class="badge badge-light">{{ $storeLeads->count() }}</span>
                        </h3>
                        <hr>
                        <div class="row">
                            @foreach($leadStatuses as $leadStatus)
                                <div class="col-md-2 bd-highlight">
                                    @php
                                        $count = $storeLeads->where('status_id', '=', $leadStatus->id)->count() 
                                    @endphp
                                    <h5>{{ $count }}</h5><br>
                                    <div>{{ $leadStatus->name }}</div>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="row">
                            <table class="table table-striped table-hover" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th>{{ trans('lead::attributes.form.id')}}</th>
                                        <th>{{ trans('lead::attributes.form.subject')}}</th>
                                        <th>{{ trans('lead::attributes.form.customer_name')}}</th>
                                        <th>{{ trans('lead::attributes.form.department_id')}}</th>
                                        <th>{{ trans('lead::attributes.form.service_id')}}</th>
                                        <th>{{ trans('lead::attributes.form.status_id')}}</th>
                                        <th>{{ trans('lead::attributes.form.priority_id')}}</th>
                                        <th>{{ trans('lead::attributes.form.assigned_to')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($storeLeads as $lead)
                                        <tr role="row">
                                            <td>#{{ $lead->id }}</td>
                                            <td>
                                                <a href="{{ route('admin.leads.edit', array('id'=>$lead->id )) }}">
                                                    {{ \Illuminate\Support\Str::limit($lead->subject, 50, $end='...') }}
                                                </a>
                                            </td>
                                            <td>{{ $lead->customer_name }}</td>
                                            <td>{{ $lead->department ? $lead->department->name : '' }}</td>
                                            <td>{{ $lead->leadService ? $lead->leadService->name : '' }}</td>
                                            <td>{{ $lead->leadStatus ? $lead->leadStatus->name : '' }}</td>
                                            <td>{{ $lead->leadPriority ? $lead->leadPriority->name : '' }}</td>
                                            <td>{{ $lead->assignee ? $lead->assignee->full_name : '' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach

                <div class="tab-pane fade in" id="online">
                    <h3 class="tab-content-title">
                        {{ trans('lead::leads.online_leads') }}
                        <span class="badge badge-light">{{ $leads["online_count"] }}</span>
                    </h3>
                    <hr>
                    <div class="row">
                        @foreach($leadStatuses as $leadStatus)
                            <div class="col-md-2 bd-highlight">
                                @php
                                    $count = $leads["online"]->where('status_id', '=', $leadStatus->id)->count() 
                                @endphp
                                <h5>{{ $count }}</h5><br>
                                <div>{{ $leadStatus->name }}</div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row">
                        <table class="table table-striped table-hover" role="grid">
                            <thead>
                                <tr role="row">
                                    <th>{{ trans('lead::attributes.form.id')}}</th>
                                    <th>{{ trans('lead::attributes.form.subject')}}</th>
                                    <th>{{ trans('lead::attributes.form.customer_name')}}</th>
                                    <th>{{ trans('lead::attributes.form.department_id')}}</th>
                                    <th>{{ trans('lead::attributes.form.service_id')}}</th>
                                    <th>{{ trans('lead::attributes.form.status_id')}}</th>
                                    <th>{{ trans('lead::attributes.form.priority_id')}}</th>
                                    <th>{{ trans('lead::attributes.form.assigned_to')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($leads["online"] as $lead)
                                    <tr role="row">
                                        <td>#{{ $lead->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.leads.edit', array('id'=>$lead->id )) }}">
                                                {{ \Illuminate\Support\Str::limit($lead->subject, 50, $end='...') }}
                                            </a>
                                        </td>
                                        <td>{{ $lead->customer_name }}</td>
                                        <td>{{ $lead->department ? $lead->department->name : '' }}</td>
                                        <td>{{ $lead->leadService ? $lead->leadService->name : '' }}</td>
                                        <td>{{ $lead->leadStatus ? $lead->leadStatus->name : '' }}</td>
                                        <td>{{ $lead->leadPriority ? $lead->leadPriority->name : '' }}</td>
                                        <td>{{ $lead->assignee ? $lead->assignee->full_name : '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>