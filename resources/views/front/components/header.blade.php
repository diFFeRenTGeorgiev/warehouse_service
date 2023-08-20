<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
</head>
<div id="header">
    <div class="logo">
        <a href="{{route('front.index')}}">McLaughlin furniture</a>
    </div>
    <nav>
        <div class="navbar-inner">
            {{--<ul class="nav navbar-right">--}}
                {{--<li class="dropdown">--}}
                    <a href="{{route('showFavorites')}}" class="dropdown-toggle active" role="button" aria-haspopup="true" aria-expanded="false">
                        <span id="favorite-products-total" class="badge badge-notify" style="right: 3%;position: absolute; padding: 2px 4px; background-color:#cb1523;@if((isset($favoriteIds[0]))?count($favoriteIds[0]):0)==0)visibility:hidden;@endif">{{isset($favoriteIds[0])?count($favoriteIds[0]):0}}</span>
                        <i class="far fa-heart" id="hasFavorite" aria-hidden="true" ></i></a>
            <a href="{{route('cart.index')}}" class="dropdown-toggle active" role="button" aria-haspopup="true" aria-expanded="false">
               <span id="shopping_CART" class="badge badge-notify" style="right: 0.5%; padding: 2px 4px; position: absolute; background-color:#cb1523;@if((isset($productsCart[0]['products']) ? count($productsCart[0]['products']):0)==0)visibility:hidden;@endif">{{isset($productsCart[0]['products']) ? count($productsCart[0]['products']):0}}</span>
                <i class="fas fa-shopping-cart" id="cart" aria-hidden="true" ></i></a>
                {{--</li>--}}
            {{--</ul>--}}
        </div>
        <form class="search" action="search.php">
            <input name="q" placeholder="Search..." type="search">
        </form>
        <ul>
            <li>
            @if(Helpers::is_admin())

                <a href="{{route('admin_page')}}">Админ</a>
                @else
                <a href="{{route('front.index')}}">Начало</a>
            @endif
                </li>
            <li>
                <a href="{{route('tab_all_products') }}">Продукти</a>
                <ul class="mega-dropdown">
                    <li class="row">
                        <ul class="mega-col">
                            <li><a href="#">Дивани</a></li>
                            <li><a href="#">Канапета</a></li>
                            <li><a href="#">Секции</a></li>
                            <li><a href="#">Маси</a></li>
                        </ul>
                        <ul class="mega-col">
                            <li><a href="#">Легла</a></li>
                            <li><a href="#">Гардероби</a></li>
                            <li><a href="#">Скринове</a></li>
                            <li><a href="#">Матраци</a></li>
                        </ul>
                        <ul class="mega-col">
                            <li><a href="#">Кухни</a></li>
                            <li><a href="#">Модулни кухни</a></li>
                            <li><a href="#">Трапезни маси</a></li>
                            <li><a href="#">Столове</a></li>
                        </ul>
                        <ul class="mega-col">
                            <li><a href="#">Офис столове</a></li>
                            <li><a href="#">Бюра</a></li>
                            <li><a href="#">Шкафове</a></li>
                            <li><a href="#">Мека мебел</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="">За нас</a>
                <ul>
                    <li><a href="#">About Version</a></li>
                    <li><a href="#">About Version</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </li>
            <li>
                <a href="">Контакти</a>
            </li>
            @guest
                <li class="dropdown">
                    <a id="logBtn" href="{{route('login_tabs')}}">Вход</a>
                </li>
            @else
                <li>
                    <form id="logout-form-dropdown" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a id="logoutBtn" href="{{route('logout')}}" onclick="event.preventDefault();
                       document.getElementById('logout-form-dropdown').submit();">Изход</a>
                </li>
            @endguest
        </ul>
    </nav>
</div>

<script>
    $('#header').prepend('<div id="menu-icon"><span class="first"></span><span class="second"></span><span class="third"></span></div>');

    $("#menu-icon").on("click", function () {
        $("nav").slideToggle();
        $(this).toggleClass("active");
        });
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');


    *, *:before, *:after {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        margin: 0;
        padding: 0
    }

    body {
        background: #bdc3c7;
        /*line-height: 1.5;*/
        /*font-family: sans-serif !important;*/
        text-transform: uppercase !important;
        font-size: 16px !important;
        /*color: #fff*/
    }

    a {
        text-decoration: none;
        color: #fff !important;
    }

    #header {
        background: #1E262D;
        width: 100%;
        position: relative
    }

    #header:after {
        content: "";
        clear: both;
        display: block
    }

    .search {
        float: right;
        padding-top: 30px;
    }
    .navbar-inner{
        float: right;
        font-size: 18px;
        padding: 18px;
        margin-top: 17px;
    }
    #hasFavorite{
        font-size: 23px;
        color: #FFF!important;
    }
    #cart{
        font-size: 23px;
    }
    #favorite-products-total{
        font-size: 11px;
        padding: 1px 3px;

    }
    input {
        border: none;
        padding: 10px;
        border-radius: 20px
    }

    .logo {
        float: left;
        padding: 26px 0 26px
    }

    .logo a {
        font-size: 22px;
        display: block;
        padding: 0 0 0 20px
    }

    nav {
        float: right;
    }

    nav > ul {
        float: left;
        position: relative
    }

    nav li {
        list-style: none;
        float: left
    }

    nav .dropdown {
        position: relative
    }

    nav li a {
        float: left;
        padding: 35px
    }

    nav li a:hover {
        background: #2C3E50;
        color:#fff !important;
    }

    nav li ul {
        display: none
    }

    nav li:hover ul {
        display: inline;
        z-index: 10;
    }

    nav li li {
        float: none;
    }

    nav .dropdown ul {
        position: absolute;
        left: 0;
        top: 100%;
        background: #fff;
        padding: 20px 0;
        border-bottom: 3px solid #34495e
    }

    nav .dropdown li {
        white-space: nowrap
    }

    nav .dropdown li a {
        padding: 10px 35px;
        font-size: 13px;
        min-width: 200px;
        /*color: #222;*/
    }

    nav .mega-dropdown {
        width: 100%;
        position: absolute;
        top: 100%;
        left: 0;
        background: #fff;
        overflow: hidden;
        padding: 20px 35px;
        border-bottom: 3px solid #34495e;
        /*z-index: 10;*/
    }

    nav li li a {
        float: none;
        color: #333 !important;
        display: block;
        padding: 8px 10px;
        border-radius: 3px;
        font-size: 13px
    }

    /*nav li li a:hover {*/
        /*background: #bdc3c7;*/
        /*background: #FAFBFB*/
    /*}*/

    .mega-col {
        width: 25%;
        float: left
    }

    #menu-icon {
        position: absolute;
        right: 0;
        top: 50%;
        margin-top: -12px;
        margin-right: 30px;
        display: none
    }

    #menu-icon span {
        border: 2px solid #fff;
        width: 30px;
        margin-bottom: 5px;
        display: block;
        -webkit-transition: all .2s;
        transition: all .1s
    }

    @media only screen and (max-width: 1170px) {
        nav > ul > li > a {
            padding: 35px 15px
        }
    }

    a {
        color: white;
    }

    @media only screen and (min-width: 960px) {
        nav {
            display: block !important
        }
    }

    @media only screen and (max-width: 959px) {
        nav {
            display: none;
            width: 100%;
            clear: both;
            float: none;
            max-height: 400px;
            overflow-y: scroll
        }

        #menu-icon {
            display: inline;
            top: 45px;
            cursor: pointer
        }

        #menu-icon.active .first {
            transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            margin-top: 10px
        }

        #menu-icon.active .second {
            transform: rotate(135deg);
            -webkit-transform: rotate(135deg);
            position: relative;
            top: -9px;
        }

        #menu-icon.active .third {
            display: none
        }

        .search {
            float: none;
            /*background-color: var(--app-content-secondary-color);*/
            /*border: 1px solid var(--app-content-secondary-color);*/
            /*color: var(--app-content-main-color);*/
            /*font-size: 14px;*/
            /*line-height: 24px;*/
            /*border-radius: 4px;*/
            /*padding: 0px 10px 0px 32px;*/
            /*height: 32px;*/
            /*background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23fff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-search'%3E%3Ccircle cx='11' cy='11' r='8'/%3E%3Cline x1='21' y1='21' x2='16.65' y2='16.65'/%3E%3C/svg%3E");*/
            /*background-size: 16px;*/
            /*background-repeat: no-repeat;*/
            /*background-position: left 10px center;*/
            /*width: 100%;*/
            /*max-width: 320px;*/
            transition: 0.2s;
            position: relative !important;
        }

        .search input {
            width: 100%
        }

        nav {
            padding: 10px
        }

        nav ul {
            float: none
        }

        nav li {
            float: none
        }

        nav ul li a {
            float: none;
            padding: 8px;
            display: block
        }

        #header nav ul ul {
            display: block;
            position: static;
            background: none;
            border: none;
            padding: 0
        }

        #header nav a {
            color: #fff;
            padding: 8px
        }

        #header nav a:hover {
            background: #fff;
            color: #333;
            border-radius: 3px
        }

        #header nav ul li li a:before {
            content: "- "
        }

        .mega-col {
            width: 100%
        }
    }

</style>