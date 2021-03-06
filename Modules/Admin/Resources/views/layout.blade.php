<!DOCTYPE html>
<html lang="{{ locale() }}">
    <head>
        <base href="{{ url('/') }}">
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @yield('title') - Laxmi Electronics Admin
        </title>

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:600|Roboto:400,500" rel="stylesheet">

        @foreach ($assets->allCss() as $css)
            <link media="all" type="text/css" rel="stylesheet" href="{{ v($css) }}">
        @endforeach

        @stack('styles')

        @include('admin::partials.globals')
    </head>

    <body class="skin-blue offcanvas clearfix {{ is_rtl() ? 'rtl' : 'ltr' }}">
        <div class="wrapper">
            <header class="main-header clearfix">
                @include('admin::partials.top_bar')
                
                @include('admin::partials.sidebar')
            </header>
            <div class="content-wrapper">
                <section class="content-header clearfix">
                    @yield('content_header')
                </section>

                <section class="content">
                    @include('admin::partials.notification')

                    @yield('content')
                </section>

                <div id="notification-toast"></div>
            </div>
        </div>

        @include('admin::partials.footer')

        @include('admin::partials.confirmation_modal')

        @foreach($assets->allJs() as $js)
            <script src="{{ v($js) }}"></script>
        @endforeach

        @stack('scripts')
    </body>
</html>
