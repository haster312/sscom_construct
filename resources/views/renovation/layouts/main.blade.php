<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') - {{ trans('attribute.title') }}</title>
    <!--meta-->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.2" />
    <meta name="format-detection" content="telephone=no" />
    <?php $route = Route::getCurrentRoute()->getName(); ?>
    @if($route == $locale.".site.index")
        <meta name="title" content="{{ $seo->title }}" />
        <meta name="keywords" content="{{ $seo->metakeyword }}" />
        <meta name="description" content="{{ $seo->description }}" />
    @else
        <meta name="title" content="@yield('title')" />
        <meta name="keywords" content="@yield('keyword')" />
        <meta name="description" content="@yield('description')" />
    @endif
    <meta property="og:url"           content="{{ route($locale.'.site.index') }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $seo->title }}" />
    <meta property="og:description"   content="{{ $seo->description }}" />
    <meta property="og:image"         content="@if($info->logo >0){{asset($info->Resources->path)}}@endif"/>
    <meta name="csrf-token" content="{!! csrf_token() !!}">
</head>
    <!--slider revolution-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/renovation/rs-plugin/css/settings.min.css')}}" media="screen" />
    <!--style-->
    <link href='//fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,700,900' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&subset=vietnamese" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/renovation/style/reset.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/renovation/style/superfish.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/renovation/style/prettyPhoto.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/renovation/style/jquery.qtip.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/renovation/style/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/renovation/style/animations.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/renovation/style/responsive.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/renovation/style/odometer-theme-default.min.css') }}">
    <!--fonts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/renovation/fonts/streamline-small/styles.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/renovation/fonts/streamline-large/styles.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/renovation/fonts/template/styles.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/renovation/fonts/social/styles.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/renovation/custom.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bs_pagination-master/jquery.bs_pagination.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/renovation/images/favicon.ico')}}">
    <script type="text/javascript" src="{{ asset('assets/renovation/js/jquery-1.11.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/renovation/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <!--slider revolution-->
    <script type="text/javascript" src="{{ asset('assets/renovation/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/renovation/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/renovation/js/jquery.ba-bbq.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/renovation/js/jquery-ui-1.11.4.custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/renovation/js/jquery.ui.touch-punch.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bs_pagination-master/jquery.bs_pagination.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bs_pagination-master/localization/en.min.js') }}"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script>
        var SITE_ROOT = "{{ route('site') }}"
    </script>
</head>
<body>
    <div class="site-container">
        @include('renovation.layouts.header')
        @yield('content')
        @include('renovation.layouts.footer')
    </div>
    <!-- Script Section -->
    <a href="#top" class="scroll-top animated-element template-arrow-up" title="Scroll to top"></a>
    <!--js-->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script type="text/javascript" src="{{ asset('assets/renovation/js/jquery.isotope.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/renovation/js/jquery.easing.1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/renovation/js/jquery.carouFredSel-6.2.1-packed.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/renovation/js/jquery.touchSwipe.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/renovation/js/jquery.transit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/renovation/js/jquery.hint.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/renovation/js/jquery.costCalculator.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/renovation/js/jquery.parallax.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/renovation/js/jquery.prettyPhoto.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/renovation/js/jquery.qtip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/renovation/js/jquery.blockUI.min.js') }}"></script>
    <script type="text/javascript" src="//maps.google.com/maps/api/js?key=AIzaSyDU4_aRkPLIOldaY2r9VPNX-B0bLIksqe8"></script>
    <script type="text/javascript" src="{{ asset('assets/renovation/js/main.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/renovation/js/odometer.min.js') }}"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <!-- Place this tag where you want the +1 button to render. -->
    @yield('js');
</body>
</html>