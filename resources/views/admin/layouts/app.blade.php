<!DOCTYPE html>
<html lang="en">
<head>
    <title>Material Admin - Dashboard</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/theme-default/bootstrap.css?1422792965') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/theme-default/materialadmin.css?1425466319') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/theme-default/font-awesome.min.css?1422529194') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/theme-default/material-design-iconic-font.min.css?1421434286') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/theme-default/libs/rickshaw/rickshaw.css?1422792967') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/theme-default/libs/morris/morris.core.css?1420463396') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/theme-default/custom.css') }}" />
    <script src="http://cdn.ckeditor.com/4.5.10/full/ckeditor.js"></script>
    <!-- END STYLESHEETS -->

    <style>
        #base {
            background-color: white;
        }

         .label {
             padding: 9px;
         }

        .fa-btn {
            margin-right: 6px;
        }

        .tgl {
            display: none;
        }
        .tgl, .tgl:after, .tgl:before, .tgl *, .tgl *:after, .tgl *:before, .tgl + .tgl-btn {
            box-sizing: border-box;
        }
        .tgl::-moz-selection, .tgl:after::-moz-selection, .tgl:before::-moz-selection, .tgl *::-moz-selection, .tgl *:after::-moz-selection, .tgl *:before::-moz-selection, .tgl + .tgl-btn::-moz-selection {
            background: none;
        }
        .tgl::selection, .tgl:after::selection, .tgl:before::selection, .tgl *::selection, .tgl *:after::selection, .tgl *:before::selection, .tgl + .tgl-btn::selection {
            background: none;
        }
        .tgl + .tgl-btn {
            outline: 0;
            display: block;
            width: 4em;
            height: 2em;
            position: relative;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .tgl-skewed + .tgl-btn {
            overflow: hidden;
            -webkit-transform: skew(-10deg);
            transform: skew(-10deg);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transition: all .2s ease;
            transition: all .2s ease;
            font-family: sans-serif;
            background: #888;
        }
        .tgl-skewed + .tgl-btn:after, .tgl-skewed + .tgl-btn:before {
            -webkit-transform: skew(10deg);
            transform: skew(10deg);
            display: inline-block;
            -webkit-transition: all .2s ease;
            transition: all .2s ease;
            width: 100%;
            text-align: center;
            position: absolute;
            line-height: 2em;
            font-weight: bold;
            color: #fff;
            text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
        }
        .tgl-skewed + .tgl-btn:after {
            left: 100%;
            content: attr(data-tg-on);
        }
        .tgl-skewed + .tgl-btn:before {
            left: 0;
            content: attr(data-tg-off);
        }
        .tgl-skewed + .tgl-btn:active {
            background: #888;
        }
        .tgl-skewed + .tgl-btn:active:before {
            left: -10%;
        }
        .tgl-skewed:checked + .tgl-btn {
            background: #86d993;
        }
        .tgl-skewed:checked + .tgl-btn:before {
            left: -100%;
        }
        .tgl-skewed:checked + .tgl-btn:after {
            left: 0;
        }
        .tgl-skewed:checked + .tgl-btn:active:after {
            left: 10%;
        }

    </style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('assets/js/libs/utils/html5shiv.js?1403934957')}}') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/libs/utils/respond.min.js?1403934956') }}') }}"></script>
    <![endif]-->
    <script>
        var baseUrl = "{{ route('index') }}"
    </script>
</head>
<body class="menubar-hoverable header-fixed ">

<!-- BEGIN HEADER-->
<header id="header" >
    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand" >
                    <div class="brand-holder">
                        <a href="{{ route('index') }}">
                            <span class="text-lg text-bold text-primary">SSCOM</span>
                        </a>
                    </div>
                </li>
                @if (!Auth::guest())
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">
            <ul class="header-nav header-nav-options">
                <li>
                    <!-- Search form -->
                    <form class="navbar-search" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
                        </div>
                        <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                    </form>
                </li>

            </ul><!--end .header-nav-options -->

            <ul class="header-nav header-nav-profile">
                @if (Auth::guest())
                    <li><a style="text-align: center;font-size: 22px;" href="{{ url('/login') }}">Login</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="text-align: center;font-size: 22px;">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
                @endif
            </ul><!--end .header-nav-profile -->

        </div><!--end #header-navbar-collapse -->
    </div>
</header>
<!-- END HEADER-->

<!-- BEGIN BASE-->
<div id="base">

    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->

    <!-- BEGIN CONTENT-->
    <div id="content">
        <section>
            <div class="section-body">
                <div class="row">
                    @yield('content')
                </div><!--end .row -->
            </div><!--end .section-body -->
        </section>
    </div><!--end #content-->
    <!-- END CONTENT -->

    @include('admin.layouts.sidebar')

</div><!--end #base-->
<!-- END BASE -->

<!-- BEGIN JAVASCRIPT -->
<script src="{{ asset('assets/js/libs/jquery/jquery.min.js') }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="{{ asset('assets/js/libs/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/libs/spin.js/spin.min.js') }}"></script>
<script src="{{ asset('assets/js/libs/autosize/jquery.autosize.min.js') }}"></script>
<script src="{{ asset('assets/js/libs/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/libs/flot/jquery.flot.min.js') }}"></script>
<script src="{{ asset('assets/js/libs/flot/jquery.flot.time.min.js') }}"></script>
<script src="{{ asset('assets/js/libs/flot/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('assets/js/libs/flot/jquery.flot.orderBars.js') }}"></script>
<script src="{{ asset('assets/js/libs/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/js/libs/flot/curvedLines.js') }}"></script>
<script src="{{ asset('assets/js/libs/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('assets/js/libs/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/js/libs/nanoscroller/jquery.nanoscroller.min.js') }}"></script>
<script src="{{ asset('assets/js/libs/d3/d3.min.js') }}"></script>
<script src="{{ asset('assets/js/libs/d3/d3.v3.js') }}"></script>
<script src="{{ asset('assets/js/libs/rickshaw/rickshaw.min.js') }}"></script>
<script src="{{ asset('assets/js/core/source/App.js') }}"></script>
<script src="{{ asset('assets/js/core/source/AppNavigation.js') }}"></script>
<script src="{{ asset('assets/js/core/source/AppOffcanvas.js') }}"></script>
<script src="{{ asset('assets/js/core/source/AppCard.js') }}"></script>
<script src="{{ asset('assets/js/core/source/AppForm.js') }}"></script>
<script src="{{ asset('assets/js/core/source/AppNavSearch.js') }}"></script>
<script src="{{ asset('assets/js/core/source/AppVendor.js') }}"></script>
<script src="https://cdn.rawgit.com/makeusabrew/bootbox/master/bootbox.js"></script>
<!-- END JAVASCRIPT -->

@yield('js')
</body>
</html>
