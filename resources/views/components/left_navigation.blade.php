
<div id="viewport">
    <!-- Sidebar -->
    <nav id="sidebar">
        <header>
            <a href="#" id="title">McLaughlin autoparts!</a>
        </header>
        <ul class="nav">
            <li >
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                    Категории
                </a>
                <ul class="nav collapse list-unstyled" id="homeSubmenu">
                    <li ><a href="{{route('tab_content_vehicles') }}" ><span>Автомобили</span></a></li>
                    <li ><a href="#">Авточасти</a></li>
                    <li><a href="#">Производители</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="zmdi zmdi-link"></i> Shortcuts
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="zmdi zmdi-widgets"></i> Overview
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="zmdi zmdi-calendar"></i> Events
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="zmdi zmdi-info-outline"></i> About
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="zmdi zmdi-settings"></i> Services
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="zmdi zmdi-comment-more"></i> Contact
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="zmdi zmdi-comment-more"></i> end
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


