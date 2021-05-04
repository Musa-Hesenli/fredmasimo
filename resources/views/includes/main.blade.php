<!doctype html>
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    @include('includes.links')
</head>

<body>
    @include('common.header')



    <div id='preloader'>
        <div class='loader'>
            <img src="{{ asset('img/loading.gif') }}" width="80" style="padding-bottom: 20px;">
        </div>
    </div><!-- Preloader -->

    @yield('content')
    @include('common.footer')
    <!-- /.footer_section -->
    <a data-scroll href="#header" id="scroll-to-top"><i class="arrow_up"></i></a>
    @include('includes.scripts')
</body>

</html>
