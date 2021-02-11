<!DOCTYPE html>
<!--
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.5.1
Author: Sunnyat A.
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0?ref=myorange
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <title>
            @if(!count(Request::segments()))
                {{config('admin.title')." ".config('admin.app_version')}}
            @else
                {{ucfirst(Request::segment(count(Request::segments())))}} - {{config('admin.title')}}
            @endif
        </title>
        <meta name="description" content="Analytics Dashboard">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        {{-- if in debug mode, disable cache on browser--}}
        @if(env('APP_DEBUG'))
            <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
            <meta http-equiv="Pragma" content="no-cache" />
            <meta http-equiv="Expires" content="0" />
        @endif
        <!-- base css -->
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="{{ admin_asset("vendor/smartadmin-laravel/smartadmin/css/vendors.bundle.css") }}">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="{{ admin_asset("vendor/smartadmin-laravel/smartadmin/css/app.bundle.css") }}">
        {{--<link id="mytheme" rel="stylesheet" media="screen, print" href="#">--}}
        <link id="myskin" rel="stylesheet" media="screen, print" href="{{ admin_asset("vendor/smartadmin-laravel/smartadmin/css/skins/skin-master.css") }}">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ admin_asset("vendor/smartadmin-laravel/smartadmin/img/favicon/apple-touch-icon.png") }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ admin_asset(config('admin.themes.favicon')) }}">
        <link rel="mask-icon" href="{{ admin_asset("vendor/smartadmin-laravel/smartadmin/img/favicon/safari-pinned-tab.svg")}}" color="#5bbad5">
        <link rel="stylesheet" media="screen, print" href="{{ admin_asset("vendor/smartadmin-laravel/smartadmin/css/datagrid/datatables/datatables.bundle.css") }}">
        {{--<link rel="stylesheet" media="screen, print" href="{{ admin_asset("vendor/smartadmin-laravel/smartadmin/css/miscellaneous/reactions/reactions.css")}}">
        <link rel="stylesheet" media="screen, print" href="{{ admin_asset("vendor/smartadmin-laravel/smartadmin/css/miscellaneous/fullcalendar/fullcalendar.bundle.css")}}">
        <link rel="stylesheet" media="screen, print" href="{{ admin_asset("vendor/smartadmin-laravel/smartadmin/css/miscellaneous/jqvmap/jqvmap.bundle.css")}}">--}}

        <script src="{{ Admin::jQuery() }}"></script>

        <!-- Add aditional CSS and JS for Admin LTE-->
        {!! Admin::css() !!}
        <!-- END Additional delrared css -->

        <!-- Add aditional Header JS -->
        {!! Admin::headerJs() !!}


    </head>
    <!-- BEGIN Body -->
    <!-- Possible Classes

		* 'header-function-fixed'         - header is in a fixed at all times
		* 'nav-function-fixed'            - left panel is fixed
		* 'nav-function-minify'			  - skew nav to maximize space
		* 'nav-function-hidden'           - roll mouse on edge to reveal
		* 'nav-function-top'              - relocate left pane to top
		* 'mod-main-boxed'                - encapsulates to a container
		* 'nav-mobile-push'               - content pushed on menu reveal
		* 'nav-mobile-no-overlay'         - removes mesh on menu reveal
		* 'nav-mobile-slide-out'          - content overlaps menu
		* 'mod-bigger-font'               - content fonts are bigger for readability
		* 'mod-high-contrast'             - 4.5:1 text contrast ratio
		* 'mod-color-blind'               - color vision deficiency
		* 'mod-pace-custom'               - preloader will be inside content
		* 'mod-clean-page-bg'             - adds more whitespace
		* 'mod-hide-nav-icons'            - invisible navigation icons
		* 'mod-disable-animation'         - disables css based animations
		* 'mod-hide-info-card'            - hides info card from left panel
		* 'mod-lean-subheader'            - distinguished page header
		* 'mod-nav-link'                  - clear breakdown of nav links

		>>> more settings are described inside documentation page >>>
	-->
    <body class="mod-bg-1 {{config('admin.themes.skin')}} {{join(' ', config('admin.themes.layout'))}}">
        <!-- DOC: script to save and load page settings -->
        @include('admin::partials.theme_script')

        @if($alert = config('admin.top_alert'))
		    <div style="text-align: center;padding: 5px;font-size: 12px;background-color: #ffffd5;color: #ff0000;">
		        {!! $alert !!}
		    </div>
		@endif

        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside -->

                @include('admin::partials.sidebar')

                <!-- END Left Aside -->
                <div class="page-content-wrapper" id="pjax-container">

                    <!-- BEGIN Page Header -->
                    @include('admin::partials.header')
                    <!-- END Page Header -->

                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">

                    <!-- BEGIN Breadcrumb -->
                    @include('admin::partials.breadcrumb')
                    <!-- END Breadcrumb -->

                    <!-- BEGIN PAGE CONTENT---->
                    <div id="app">
                        <!-- BEGIN Additional delrared css on each page-->
                        {!! Admin::style() !!}

                        @yield('content')
                    </div>
                    <!-- END PAGE CONTENT---->

                    </main>
                    {!! Admin::script() !!}
                    {!! Admin::html() !!}
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
                    <!-- END Page Content -->

                    <!-- BEGIN Page Footer -->
                    @include('admin::partials.footer')
                    <!-- END Page Footer -->

                    <!-- BEGIN Myapps Shortcuts -->
                    @include('admin::partials.shortcut')
                    <!-- END Shortcuts -->

                    <!-- BEGIN Color profile -->
                    <!-- this area is hidden and will not be seen on screens or screen readers -->
                    <!-- we use this only for CSS color refernce for JS stuff -->
                    @include('admin::partials.color-profile')
                    <!-- END Color profile -->
                </div>
            </div>
        </div>
        <!-- END Page Wrapper -->

        <!-- BEGIN Quick Menu -->
        @include('admin::partials.floating-menu')
        <!-- END Quick Menu -->

        <!-- BEGIN Messenger -->
        @include('admin::partials.messenger')
        <!-- END Messenger -->

        <!-- BEGIN Page Settings -->
        @include('admin::partials.page-setting')
        <!-- END Page Settings -->

        <!-- base vendor bundle:
			 DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations
						+ pace.js (recommended)
						+ jquery.js (core)
						+ jquery-ui-cust.js (core)
						+ popper.js (core)
						+ bootstrap.js (core)
						+ slimscroll.js (extension)
						+ app.navigation.js (core)
						+ ba-throttle-debounce.js (core)
						+ waves.js (extension)
						+ smartpanels.js (extension)
						+ src/../jquery-snippets.js (core) -->
        <script src="{{ admin_asset("vendor/smartadmin-laravel/smartadmin/js/vendors_no_jquery.bundle.js")}}"></script>
        <script src="{{ admin_asset("vendor/smartadmin-laravel/smartadmin/js/app.bundle.js")}}"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                /*
                 * start open parent accordion tab based on active child
                 * */
                var activeMenu = localStorage.getItem('activeMenu');
                if(activeMenu){
                    $('#js-nav-menu a[href="' + activeMenu + '"]').parents('li').addClass('active');
                }
                $('.treeviews-child').find('.active').parents('.treeviews-parent').addClass('open active');
                /*
                 * end open parent accordion tab based on active child
                 * */

                /*
                 * Activate smart panels
                 * */
                $('#js-page-content').smartPanel();
            });

            /* initiate script after pjax success*/
            $(document).on('pjax:success', function (){
                $('#js-page-content').smartPanel();
            });

            /*initiate CSRF token for laravel ajax*/
            function LA() {}
            LA.token = "{{ csrf_token() }}";
            LA.user = @json($_user_);
            /********************** ALL SCRIPT BELOW THEESE ****************************/
        </script>

        <!-- REQUIRED JS SCRIPTS -->
        {!! Admin::js() !!}
    </body>
    <!-- END Body -->
</html>
