@extends('public.account.layout')

@section('title', trans('storefront::account.links.my_tickets'))

@section('account_breadcrumb')
    <li class="active">{{ trans('storefront::account.links.my_tickets') }}</li>
@endsection

@section('content_right')
    <div class="row">
        <div class="btn-group" >
            <a href="{{ route('account.tickets.create') }}" class="btn btn-primary btn-actions btn-create" style="margin-left: 15px;">
                {{ trans("storefront::account.tickets.new_ticket") }}
            </a>
        </div>
    </div>
    <br/>
    <div class="index-table">
        @if ($tickets->isEmpty())
            <h3 class="text-center">{{ trans('storefront::account.tickets.no_tickets') }}</h3>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ trans('storefront::account.tickets.ticket_id') }}</th>
                            <th>{{ trans('storefront::account.tickets.subject') }}</th>
                            <th>{{ trans('storefront::account.tickets.status_id') }}</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>#{{ $ticket->id }}</td>
                                <td>{{ $ticket->subject }}</td>
                                <td>{{ $ticket->ticketStatus ? $ticket->ticketStatus->name : '' }}</td>
                                <td>
                                    <a href="{{ route('account.tickets.show', $ticket) }}" class="btn-view" data-toggle="tooltip" title="{{ trans('storefront::account.tickets.view_ticket') }}" rel="tooltip">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    @if ($tickets->isNotEmpty())
        <div class="pull-right">
            {!! $tickets->links() !!}
        </div>
    @endif
@endsection
