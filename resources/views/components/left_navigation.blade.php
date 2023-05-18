<div id="viewport">
    <!-- Sidebar -->
    <nav id="sidebar">
        <header>
            <a href="#" id="title">McLaughlin furniture!</a>
        </header>
        <ul class="nav">
            <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                    Категории
                </a>
                <ul class="nav collapse list-unstyled" id="homeSubmenu">
                    <li><a href="{{route('tab_all_products') }}"><span>Продукти</span></a></li>
                    <li><a href="#">Поръчки</a></li>
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
                    <i class="zmdi zmdi-calendar"></i> Отчети
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


