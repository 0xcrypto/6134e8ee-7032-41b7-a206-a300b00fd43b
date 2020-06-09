@extends('public.layout')

@section('title', trans('storefront::account.tickets.view_ticket'))

@section('breadcrumb')
    <li><a href="{{ route('account.dashboard.index') }}">{{ trans('storefront::account.links.my_account') }}</a></li>
    <li><a href="{{ route('account.tickets.index') }}">{{ trans('storefront::account.links.my_tickets') }}</a></li>
    <li class="active">{{ trans('storefront::account.tickets.view_ticket') }}</li>
@endsection

@section('content')
    <div class="orders-view-wrapper clearfix">
        <div class="row">
            <h3>{{ trans('storefront::account.tickets.view_ticket') }}</h3>

            <div class="col-md-6 col-sm-6">
                <div class="order-details">
                    <h5>{{ trans('storefront::account.tickets.ticket_details') }}</h5>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>{{ trans('storefront::account.tickets.ticket_id') }}:</td>
                                    <td>{{ $ticket->id }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('storefront::account.tickets.department_id') }}:</td>
                                    <td>{{ $ticket->department ? $ticket->department->name : '' }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('storefront::account.tickets.status_id') }}:</td>
                                    <td>{{ $ticket->ticketStatus ? $ticket->ticketStatus->name : '' }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('storefront::account.tickets.service_id') }}:</td>
                                    <td>{{ $ticket->ticketService ? $ticket->ticketService->name : '' }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('storefront::account.tickets.priority_id') }}:</td>
                                    <td>{{ $ticket->ticketPriority ? $ticket->ticketPriority->name : '' }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('storefront::account.tickets.store_id') }}:</td>
                                    <td>{{ $ticket->store ? $ticket->store->name : '' }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('storefront::account.tickets.assigned_to') }}:</td>
                                    <td>{{ $ticket->assignee ? $ticket->assignee->full_name : '' }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('storefront::account.tickets.subject') }}:</td>
                                    <td>{{ $ticket->subject }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('storefront::account.tickets.description') }}:</td>
                                    <td>{!! $ticket->description !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
