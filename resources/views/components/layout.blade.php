<!DOCTYPE html>>
<head>
    <title>@yield('title', 'McLaughlin Autoparts')</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    {{--<link rel="stylesheet" href="{{ asset('css/style.css') }}">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- bootstrap-select component -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>
<body>
    @section('left_navigation')
        @include('components.left_navigation')
    @show

@section('header')
    @include('components.header')
@show
    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <!-- begin:: body_content section -->
        @yield('content')
        <!-- end:: body_content section -->
        </div>
    </div>
    <!-- end:: Content -->
    @section('footer')
        @include('components.footer')
    @show
@section('page_js')
<script>
    $(document).ready(function () {
        // $("#sidebar").niceScroll({
        //     cursorcolor: '#53619d',
        //     cursorwidth: 4,
        //     cursorborder: 'none'
        // });

        $('#title').on('click', function () {
            $('#sidebarCollapse').addClass('active');
            $('#sidebar').removeClass('active');
            $('#viewport').fadeOut();
        });

        $('#sidebarCollapse').on('click', function () {
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $('#sidebar').addClass('active');
                $('#viewport').fadeIn();
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            }
        });
    });
    function getTabContent(tab) {
        $.ajax({
            type: "GET",
            url: "warehouse/vehicles",
            success: function(data) {
                $('.tab-content').html(data);
            }
        });
    }
</script>
@show
<!--end::Page Scripts -->
</body>    <!--begin::Page Custom Styles(used by this page) -->
@yield('page_css')
<!--end::Page Custom Styles -->

@section('style')
<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500');

    body {
        overflow-x: hidden;
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
    }
    #sidebar ul li.active>a, a[aria-expanded="true"] {
        border-left: 3px solid #009688;
        color: #1d2129;
        background-color: #fff;
    }

    /* Toggle Styles */
    #sidebar ul li.active>a, a[aria-expanded="true"] {
        border-left: 3px solid #009688;
        color: #1d2129;
        background-color: #fff;
    }
    a[aria-expanded="false"]::before, a[aria-expanded="true"]::before {
        content: '\e259';
        display: block;
        position: absolute;
        right: 20px;
        font-family: 'Glyphicons Halflings', serif;
        font-size: 0.6em;
    }

    a[aria-expanded="true"] {
        content: '\e260';
    }

    ul ul a {
        font-size: 0.9em !important;
        padding-left: 30px !important;
    }
    a[data-toggle="collapse"] {
        position: relative;
    }

    #viewport {
        position: fixed;
        width: 100vw;
        height: 100vh;
        /*background: rgba(0, 0, 0, 0.7);*/
        z-index: 998;
        /*display: none;*/
    }
    /*padding-left: 250px;*/
    /*-webkit-transition: all 0.5s ease;*/
    /*-moz-transition: all 0.5s ease;*/
    /*-o-transition: all 0.5s ease;*/
    /*transition: all 0.5s ease;*/
    /*}*/

    #sidebarCollapse {
        display: none;
    }

    @media ( max-width : 768px) {
        #sidebar a {
            color: #fff;
        }
        #sidebar ul li.active>a, a[aria-expanded="true"] {
            color: #1d2129 !important;
            background-color: #fff;
        }
        #sidebar {
            margin-left: -250px;
            width: 250px;
            color: #fff;
            background: #009688;
            overflow-y: scroll;
            box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
            position: fixed;
            top: 0;
            left: -250px;
            height: 100vh;
            z-index: 999;
        }
        #sidebar.active {
            margin-left: 0;
            left: 0;
        }
        #sidebar .sidebar-header {
            display: block;
            padding: 20px;
        }
        #sidebar ul li a, #sidebar ul li a:hover, #sidebar ul li.active>a, a[aria-expanded="true"]
        {
            border-left: none;
        }

        /*Botao menu sidebar*/
        #sidebarCollapse {
            display: inline-block;
            width: 44px;
            height: 34px;
            padding: 9px 10px;
            background: #f5f5f5;
            margin-left: 15px;
        }
        #sidebarCollapse span {
            width: 22px;
            height: 2px;
            border-radius: 1px;
            margin: 0 auto;
            display: block;
            background: #1d2129;
            transition: all 0.8s cubic-bezier(0.810, -0.330, 0.345, 1.375);
            transition-delay: 0.2s;
        }
        #sidebarCollapse span:first-of-type {
            transform: rotate(45deg) translate(2px, 2px);
        }
        #sidebarCollapse span:nth-of-type(2) {
            opacity: 0;
        }
        #sidebarCollapse span:last-of-type {
            transform: rotate(-45deg) translate(1px, -1px);
        }
        #sidebarCollapse.active span {
            transform: none;
            opacity: 1;
        }
        #sidebarCollapse.active .icon-bar+.icon-bar {
            margin-top: 4px;
        }
    }


    #content {
        width: 100%;
        position: relative;
        margin-right: 0;
    }

    /* Sidebar Styles */

    #sidebar {
        z-index: 1000;
        position: fixed;
        left: 250px;
        width: 250px;
        height: 100%;
        margin-left: -250px;
        overflow-y: auto;
        background: #37474F;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    #sidebar header {
        background-color: #263238;
        font-size: 20px;
        line-height: 52px;
        text-align: center;
    }

    #sidebar header a {
        color: #fff;
        display: block;
        text-decoration: none;
    }

    #sidebar header a:hover {
        color: #fff;
    }

    #sidebar .nav{

    }

    #sidebar .nav a{
        background: none;
        border-bottom: 1px solid #455A64;
        color: #CFD8DC;
        font-size: 14px;
        padding: 16px 24px;
    }

    #sidebar .nav a:hover{
        background: none;
        color: #ECEFF1;
    }

    #sidebar .nav a i{
        margin-right: 16px;
    }
    #sidebar ul li a, #sidebar ul li a:hover, #sidebar ul li.active>a, a[aria-expanded="true"]
    {
        border-left: none;
    }
    #sidebarCollapse {
        display: inline-block;
        width: 44px;
        height: 34px;
        padding: 9px 10px;
        background: #f5f5f5;
        margin-left: 15px;
    }
    #sidebarCollapse span {
        width: 22px;
        height: 2px;
        border-radius: 1px;
        margin: 0 auto;
        display: block;
        background: #1d2129;
        transition: all 0.8s cubic-bezier(0.810, -0.330, 0.345, 1.375);
        transition-delay: 0.2s;
    }
    #sidebarCollapse span:first-of-type {
        transform: rotate(45deg) translate(2px, 2px);
    }
    #sidebarCollapse span:nth-of-type(2) {
        opacity: 0;
    }
    #sidebarCollapse span:last-of-type {
        transform: rotate(-45deg) translate(1px, -1px);
    }
    #sidebarCollapse.active span {
        transform: none;
        opacity: 1;
    }
    #sidebarCollapse.active .icon-bar+.icon-bar {
        margin-top: 4px;
    }
</style>
@show