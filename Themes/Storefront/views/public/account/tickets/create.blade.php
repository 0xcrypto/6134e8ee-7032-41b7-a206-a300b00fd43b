@extends('public.account.layout')

@section('title', trans('storefront::account.tickets.new_ticket'))

@section('account_breadcrumb')
    <li class="active">{{ trans('storefront::account.tickets.new_ticket') }}</li>
@endsection

@section('content_right')
    <form method="POST" action="{{ route('account.tickets.store') }}">
        {{ csrf_field() }}

        <div class="account-details">
            <div class="account clearfix">
                <h4>{{ trans('storefront::account.tickets.new_ticket') }}</h4>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group {{ $errors->has('subject') ? 'has-error': '' }}">
                            <label for="subject">
                                {{ trans('storefront::account.tickets.subject') }}<span>*</span>
                            </label>
                            <input type="hidden" name="source" id="source" value="1">
                            <input type="text" name="subject" id="subject" class="form-control">

                            {!! $errors->first('subject', '<span class="error-message">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <textarea name="description" class="form-control " id="description" rows="10" cols="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" data-loading>
            {{ trans('storefront::account.profile.save_changes') }}
        </button>
    </form>
@endsection
