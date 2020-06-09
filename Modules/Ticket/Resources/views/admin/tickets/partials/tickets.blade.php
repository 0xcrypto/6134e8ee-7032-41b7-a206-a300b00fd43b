<div class="accordion-content clearfix">
    <div class="col-lg-3 col-md-4">
        <div class="accordion-box">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title" style="padding: 10px;font-size: 17px;">{{ trans('ticket::tickets.tickets') }}</h4>
                    </div>
                    <div id="messages_information" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="accordion-tab nav nav-tabs">
                                @foreach ($stores as $store)
                                    @php
                                        $ticketCount = $tickets->where('store_id', '=', $store['id'])->count();
                                    @endphp
                                    <li class="{{ ($loop->index == 0) ? 'active' : ''}}">
                                        <a href="#{{str_replace(" ", "-", $store['name'])}}" data-toggle="tab" aria-expanded="true">
                                            {{ $store['name'] }}
                                            <span class="badge badge-light"> {{ $ticketCount }} </span>
                                        </a>
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
                @foreach ($stores as $store)
                    @php
                        $storeTickets = $tickets->where('store_id', '=', $store['id']);
                    @endphp
                    <div class="tab-pane fade in {{ ($loop->index == 0) ? 'active' : ''}}" id="{{str_replace(" ", "-", $store['name'])}}">
                        <h3 class="tab-content-title">
                            {{ $store['name']." ".trans('ticket::tickets.tickets') }}
                            <span class="badge badge-light">{{ $storeTickets->count() }}</span>
                        </h3>
                        <hr>
                        <div class="row">
                            @foreach($ticketStatuses as $ticketStatus)
                                <div class="col-md-2 bd-highlight">
                                    @php
                                        $count = $storeTickets->where('status_id', '=', $ticketStatus->id)->count() 
                                    @endphp
                                    <h5>{{ $count }}</h5><br>
                                    <div>{{ $ticketStatus->name }}</div>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="row">
                            <table class="table table-striped table-hover" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th>{{ trans('ticket::attributes.form.id')}}</th>
                                        <th>{{ trans('ticket::attributes.form.subject')}}</th>
                                        <th>{{ trans('ticket::attributes.form.customer_name')}}</th>
                                        <th>{{ trans('ticket::attributes.form.department_id')}}</th>
                                        <th>{{ trans('ticket::attributes.form.service_id')}}</th>
                                        <th>{{ trans('ticket::attributes.form.status_id')}}</th>
                                        <th>{{ trans('ticket::attributes.form.priority_id')}}</th>
                                        <th>{{ trans('ticket::attributes.form.assigned_to')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($storeTickets as $ticket)
                                        <tr role="row">
                                            <td>{{ $ticket->id }}</td>
                                            <td>
                                                <a href="{{ route('admin.tickets.edit', array('id'=>$ticket->id )) }}">
                                                    {{ \Illuminate\Support\Str::limit($ticket->subject, 50, $end='...') }}
                                                </a>
                                            </td>
                                            <td>{{ $ticket->customer_name }}</td>
                                            <td>{{ $ticket->department ? $ticket->department->name : '' }}</td>
                                            <td>{{ $ticket->ticketService ? $ticket->ticketService->name : '' }}</td>
                                            <td>{{ $ticket->ticketStatus ? $ticket->ticketStatus->name : '' }}</td>
                                            <td>{{ $ticket->ticketPriority ? $ticket->ticketPriority->name : '' }}</td>
                                            <td>{{ $ticket->assignee ? $ticket->assignee->full_name : '' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>