<div id="viewport">
    <!-- Sidebar -->
    <nav id="sidebar">
        <header>
            <a href="#" id="title">McLaughlin furniture!</a>
        </header>
        <ul class="nav" id="sidebarNav">
            <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                    Категории
                </a>
                <ul class="nav collapse list-unstyled" id="homeSubmenu">
                    <li><a href="{{route('tab_all_products') }}"><span>Продукти</span></a></li>
                    <li><a href="#">Поръчки</a></li>
                    <li><a href="#">Типове</a></li>
                    <li><a href="#submenu_suppliers" data-toggle="collapse" aria-expanded="false">Доставчици</a>
                        <ul class="nav collapse list-unstyled" id="submenu_suppliers">
                            <li><a href=""><span>Шофьори</span></a></li>
                            <li><a href="#">Графици</a></li>
                            <li><a href="#">Наличности</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#submenu_spravki" data-toggle="collapse" aria-expanded="false"> Рекламации
                </a>
                <ul class="nav collapse list-unstyled" id="submenu_spravki">
                    <li><a href="#">Акаунти</a></li>
                    <li><a href=""><span>Категории Продукти</span></a></li>
                    <li><a href="#">Позиции</a></li>
                    <li><a href="#">Логове</a></li>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="zmdi zmdi-calendar"></i> Акаунти
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="zmdi zmdi-info-outline"></i> Продажби
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="zmdi zmdi-settings"></i> Справки
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="zmdi zmdi-comment-more"></i> Дистрибуции
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="zmdi zmdi-comment-more"></i> Доставки
                </a>
            </li>
        </ul>
    </nav>
</div>
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
                if ($(this).hasClass('active')) {
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
                success: function (data) {
                    $('.tab-content').html(data);
                }
            });
        }
    </script>
@show
@section('page_css')
    <style>
        .nav{
            display: block;
        }
        #sidebar ul li a:hover {
            border-left: 3px solid #009688 !important;
            color: #1d2129 !important;
            background: #fff !important;
        }

        #sidebar ul li.active > a, a[aria-expanded="true"] {
            border-left: 3px solid #009688 !important;
            color: #1d2129 !important;
            background-color: #fff !important;
        }
        #sidebar ul li.active > a, a[aria-expanded="true"] {
            border-left: 3px solid #009688;
            color: #1d2129;
            background-color: #fff;
        }

        /* Toggle Styles */
        #sidebar ul li.active > a, a[aria-expanded="true"] {
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
        @media ( max-width: 768px) {
            #sidebar a {
                color: #fff;
            }

            #sidebar ul li.active > a, a[aria-expanded="true"] {
                color: #1d2129 !important;
                background-color: #fff;
            }

            #sidebar {
                margin-left: -250px;
                width: 15%;
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

            #sidebar ul li a, #sidebar ul li a:hover, #sidebar ul li.active > a, a[aria-expanded="true"] {
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

            #sidebarCollapse.active .icon-bar + .icon-bar {
                margin-top: 4px;
            }
        }
        #sidebar {
            z-index: 1000;
            position: fixed;
            left: 250px;
            width: 18%;
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
            line-height: 49px;
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

        #sidebar .nav {

        }

        #sidebar .nav a {
            background: none;
            border-bottom: 1px solid #455A64;
            color: #CFD8DC;
            font-size: 14px;
            padding: 16px 24px;
        }

        #sidebar .nav a:hover {
            background: none;
            color: #ECEFF1;
        }

        /*#sidebar .nav a i{*/
        /*margin-right: 16px;*/
        /*}*/
        #sidebar ul li a, #sidebar ul li a:hover, #sidebar ul li.active > a, a[aria-expanded="true"] {
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

        #sidebarCollapse.active .icon-bar + .icon-bar {
            margin-top: 4px;
        }
        #sidebarCollapse {
            display: none;
        }
    </style>
    @endsection

