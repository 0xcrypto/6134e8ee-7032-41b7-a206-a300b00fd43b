@extends('public.layout')

@section('title', trans('user::auth.login'))

@section('content')
    <div class="form-wrapper">
        @include('public.partials.notification')

        <div class="form form-page">
            <form method="POST" action="{{ route('login.post') }}" class="login-form clearfix">
                {{ csrf_field() }}

                <div class="bg-blue">
                    <div class="reflection"></div>
                </div>

                <div class="login form-inner clearfix">
                    <a href="{{ route('register') }}" class="register" data-toggle="tooltip" data-placement="top" title="{{ trans('user::auth.register') }}" rel="tooltip">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </a>

                    <h3>{{ trans('user::auth.login') }}</h3>

                    <div class="form-group {{ $errors->has('email') ? 'has-error': '' }}">
                        <label for="email">{{ trans('user::auth.email') }}<span>*</span></label>

                        <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="{{ trans('user::attributes.users.email') }}" autofocus>

                        <div class="input-icon">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </div>

                        {!! $errors->first('email', '<span class="error-message">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('password') ? 'has-error': '' }}">
                        <label for="password">{{ trans('user::auth.password') }}<span>*</span></label>

                        <input type="password" name="password" class="form-control" id="password" placeholder="{{ trans('user::attributes.users.password') }}">

                        <div class="input-icon">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </div>

                        {!! $errors->first('password', '<span class="error-message">:message</span>') !!}
                    </div>

                    <div class="clearfix"></div>

                    <button type="submit" class="btn btn-primary btn-center btn-login" data-loading>
                        {{ trans('user::auth.login') }}
                    </button>

                    <div class="checkbox pull-left">
                        <input type="hidden" value="0">
                        <input type="checkbox" value="1" id="remember">

                        <label for="remember">{{ trans('user::auth.remember_me') }}</label>
                    </div>

                    <a href="{{ route('reset') }}" class="forgot-password pull-right">
                        {{ trans('user::auth.forgot_password') }}
                    </a>
                </div>
            </form>
        </div>

        <div class="social-login-buttons text-center">
            @if (count(app('enabled_social_login_providers')) !== 0)
                <span>{{ trans('user::auth.or') }}</span>
            @endif

            @if (setting('facebook_login_enabled'))
                <a href="{{ route('login.redirect', ['provider' => 'facebook']) }}" class="btn btn-facebook">
                    {{ Theme::image('public/images/facebook.png') }}
                    {{ trans('user::auth.log_in_with_facebook') }}
                </a>
            @endif

            @if (setting('google_login_enabled'))
                <a href="{{ route('login.redirect', ['provider' => 'google']) }}" class="btn btn-google">
                    {{ Theme::image('public/images/google.png') }}
                    {{ trans('user::auth.log_in_with_google') }}
                </a>
            @endif
        </div>
    </div>
@endsection
