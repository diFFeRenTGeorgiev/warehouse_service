{{--<div id="header">--}}
    {{--<div class="logo">--}}
        {{--<a href="{{route('front.index')}}">McLaughlin furniture</a>--}}
    {{--</div>--}}
    {{--<nav>--}}
        {{--<form class="search" action="search.php">--}}
            {{--<input name="q" placeholder="Search..." type="search">--}}
        {{--</form>--}}
        {{--<ul>--}}
            {{--<li>--}}
                {{--@if(Helpers::is_admin())--}}

                    {{--<a href="{{route('admin_page')}}">Админ</a>--}}
                {{--@else--}}
                    {{--<a href="{{route('front.index')}}">Начало</a>--}}
                {{--@endif--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="{{route('tab_all_products') }}">Продукти</a>--}}
                {{--<ul class="mega-dropdown">--}}
                    {{--<li class="row">--}}
                        {{--<ul class="mega-col">--}}
                            {{--<li><a href="#">Дивани</a></li>--}}
                            {{--<li><a href="#">Канапета</a></li>--}}
                            {{--<li><a href="#">Секции</a></li>--}}
                            {{--<li><a href="#">Маси</a></li>--}}
                        {{--</ul>--}}
                        {{--<ul class="mega-col">--}}
                            {{--<li><a href="#">Легла</a></li>--}}
                            {{--<li><a href="#">Гардероби</a></li>--}}
                            {{--<li><a href="#">Скринове</a></li>--}}
                            {{--<li><a href="#">Матраци</a></li>--}}
                        {{--</ul>--}}
                        {{--<ul class="mega-col">--}}
                            {{--<li><a href="#">Кухни</a></li>--}}
                            {{--<li><a href="#">Модулни кухни</a></li>--}}
                            {{--<li><a href="#">Трапезни маси</a></li>--}}
                            {{--<li><a href="#">Столове</a></li>--}}
                        {{--</ul>--}}
                        {{--<ul class="mega-col">--}}
                            {{--<li><a href="#">Офис столове</a></li>--}}
                            {{--<li><a href="#">Бюра</a></li>--}}
                            {{--<li><a href="#">Шкафове</a></li>--}}
                            {{--<li><a href="#">Мека мебел</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="dropdown">--}}
                {{--<a href="">За нас</a>--}}
                {{--<ul>--}}
                    {{--<li><a href="#">About Version</a></li>--}}
                    {{--<li><a href="#">About Version</a></li>--}}
                    {{--<li><a href="#">Contact Us</a></li>--}}
                    {{--<li><a href="#">Contact Us</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="">Контакти</a>--}}
            {{--</li>--}}
            {{--@guest--}}
                {{--<li class="dropdown">--}}
                    {{--<a id="logBtn" href="{{route('login_tabs')}}">Вход</a>--}}
                {{--</li>--}}
            {{--@else--}}
                {{--<li>--}}
                    {{--<form id="logout-form-dropdown" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                        {{--@csrf--}}
                    {{--</form>--}}
                    {{--<a id="logoutBtn" href="{{route('logout')}}" onclick="event.preventDefault();--}}
                       {{--document.getElementById('logout-form-dropdown').submit();">Изход</a>--}}
                {{--</li>--}}
            {{--@endguest--}}
        {{--</ul>--}}
    {{--</nav>--}}
{{--</div>--}}

{{--<script>--}}
    {{--$('#header').prepend('<div id="menu-icon"><span class="first"></span><span class="second"></span><span class="third"></span></div>');--}}

    {{--$("#menu-icon").on("click", function () {--}}
        {{--$("nav").slideToggle();--}}
        {{--$(this).toggleClass("active");--}}
    {{--});--}}
{{--</script>--}}
{{--<style>--}}
    {{--@import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');--}}


    {{--*, *:before, *:after {--}}
        {{---moz-box-sizing: border-box;--}}
        {{---webkit-box-sizing: border-box;--}}
        {{--box-sizing: border-box;--}}
        {{--margin: 0;--}}
        {{--padding: 0--}}
    {{--}--}}

    {{--body {--}}
        {{--background: #bdc3c7;--}}
        {{--line-height: 1.5;--}}
        {{--font-family: sans-serif;--}}
        {{--text-transform: uppercase;--}}
        {{--font-size: 14px;--}}
        {{--color: #fff--}}
    {{--}--}}

    {{--a {--}}
        {{--text-decoration: none;--}}
        {{--color: #fff--}}
    {{--}--}}

    {{--#header {--}}
        {{--background: #1E262D;--}}
        {{--width: 100%;--}}
        {{--position: relative--}}
    {{--}--}}

    {{--#header:after {--}}
        {{--content: "";--}}
        {{--clear: both;--}}
        {{--display: block--}}
    {{--}--}}

    {{--.search {--}}
        {{--float: right;--}}
        {{--padding: 30px--}}
    {{--}--}}

    {{--input {--}}
        {{--border: none;--}}
        {{--padding: 10px;--}}
        {{--border-radius: 20px--}}
    {{--}--}}

    {{--.logo {--}}
        {{--float: left;--}}
        {{--padding: 26px 0 26px--}}
    {{--}--}}

    {{--.logo a {--}}
        {{--font-size: 18px;--}}
        {{--display: block;--}}
        {{--padding: 0 0 0 20px--}}
    {{--}--}}

    {{--nav {--}}
        {{--float: right;--}}
    {{--}--}}

    {{--nav > ul {--}}
        {{--float: left;--}}
        {{--position: relative--}}
    {{--}--}}

    {{--nav li {--}}
        {{--list-style: none;--}}
        {{--float: left--}}
    {{--}--}}

    {{--nav .dropdown {--}}
        {{--position: relative--}}
    {{--}--}}

    {{--nav li a {--}}
        {{--float: left;--}}
        {{--padding: 35px--}}
    {{--}--}}

    {{--nav li a:hover {--}}
        {{--background: #2C3E50--}}
    {{--}--}}

    {{--nav li ul {--}}
        {{--display: none--}}
    {{--}--}}

    {{--nav li:hover ul {--}}
        {{--display: inline;--}}
        {{--z-index: 10;--}}
    {{--}--}}

    {{--nav li li {--}}
        {{--float: none;--}}
    {{--}--}}

    {{--nav .dropdown ul {--}}
        {{--position: absolute;--}}
        {{--left: 0;--}}
        {{--top: 100%;--}}
        {{--background: #fff;--}}
        {{--padding: 20px 0;--}}
        {{--border-bottom: 3px solid #34495e--}}
    {{--}--}}

    {{--nav .dropdown li {--}}
        {{--white-space: nowrap--}}
    {{--}--}}

    {{--nav .dropdown li a {--}}
        {{--padding: 10px 35px;--}}
        {{--font-size: 13px;--}}
        {{--min-width: 200px--}}
    {{--}--}}

    {{--nav .mega-dropdown {--}}
        {{--width: 100%;--}}
        {{--position: absolute;--}}
        {{--top: 100%;--}}
        {{--left: 0;--}}
        {{--background: #fff;--}}
        {{--overflow: hidden;--}}
        {{--padding: 20px 35px;--}}
        {{--border-bottom: 3px solid #34495e;--}}
        {{--/*z-index: 10;*/--}}
    {{--}--}}

    {{--nav li li a {--}}
        {{--float: none;--}}
        {{--color: #333;--}}
        {{--display: block;--}}
        {{--padding: 8px 10px;--}}
        {{--border-radius: 3px;--}}
        {{--font-size: 13px--}}
    {{--}--}}

    {{--/*nav li li a:hover {*/--}}
    {{--/*background: #bdc3c7;*/--}}
    {{--/*background: #FAFBFB*/--}}
    {{--/*}*/--}}

    {{--.mega-col {--}}
        {{--width: 25%;--}}
        {{--float: left--}}
    {{--}--}}

    {{--#menu-icon {--}}
        {{--position: absolute;--}}
        {{--right: 0;--}}
        {{--top: 50%;--}}
        {{--margin-top: -12px;--}}
        {{--margin-right: 30px;--}}
        {{--display: none--}}
    {{--}--}}

    {{--#menu-icon span {--}}
        {{--border: 2px solid #fff;--}}
        {{--width: 30px;--}}
        {{--margin-bottom: 5px;--}}
        {{--display: block;--}}
        {{---webkit-transition: all .2s;--}}
        {{--transition: all .1s--}}
    {{--}--}}

    {{--@media only screen and (max-width: 1170px) {--}}
        {{--nav > ul > li > a {--}}
            {{--padding: 35px 15px--}}
        {{--}--}}
    {{--}--}}

    {{--a {--}}
        {{--color: white;--}}
    {{--}--}}

    {{--@media only screen and (min-width: 960px) {--}}
        {{--nav {--}}
            {{--display: block !important--}}
        {{--}--}}
    {{--}--}}

    {{--@media only screen and (max-width: 959px) {--}}
        {{--nav {--}}
            {{--display: none;--}}
            {{--width: 100%;--}}
            {{--clear: both;--}}
            {{--float: none;--}}
            {{--max-height: 400px;--}}
            {{--overflow-y: scroll--}}
        {{--}--}}

        {{--#menu-icon {--}}
            {{--display: inline;--}}
            {{--top: 45px;--}}
            {{--cursor: pointer--}}
        {{--}--}}

        {{--#menu-icon.active .first {--}}
            {{--transform: rotate(45deg);--}}
            {{---webkit-transform: rotate(45deg);--}}
            {{--margin-top: 10px--}}
        {{--}--}}

        {{--#menu-icon.active .second {--}}
            {{--transform: rotate(135deg);--}}
            {{---webkit-transform: rotate(135deg);--}}
            {{--position: relative;--}}
            {{--top: -9px;--}}
        {{--}--}}

        {{--#menu-icon.active .third {--}}
            {{--display: none--}}
        {{--}--}}

        {{--.search {--}}
            {{--float: none--}}
        {{--}--}}

        {{--.search input {--}}
            {{--width: 100%--}}
        {{--}--}}

        {{--nav {--}}
            {{--padding: 10px--}}
        {{--}--}}

        {{--nav ul {--}}
            {{--float: none--}}
        {{--}--}}

        {{--nav li {--}}
            {{--float: none--}}
        {{--}--}}

        {{--nav ul li a {--}}
            {{--float: none;--}}
            {{--padding: 8px;--}}
            {{--display: block--}}
        {{--}--}}

        {{--#header nav ul ul {--}}
            {{--display: block;--}}
            {{--position: static;--}}
            {{--background: none;--}}
            {{--border: none;--}}
            {{--padding: 0--}}
        {{--}--}}

        {{--#header nav a {--}}
            {{--color: #fff;--}}
            {{--padding: 8px--}}
        {{--}--}}

        {{--#header nav a:hover {--}}
            {{--background: #fff;--}}
            {{--color: #333;--}}
            {{--border-radius: 3px--}}
        {{--}--}}

        {{--#header nav ul li li a:before {--}}
            {{--content: "- "--}}
        {{--}--}}

        {{--.mega-col {--}}
            {{--width: 100%--}}
        {{--}--}}
    {{--}--}}

{{--</style>--}}
<div class="header">
    <a href="#" class="logo">McLaughlin warehouse</a>
    <div class="header-right">
        <a class="active" href="#">Home</a>

        <a  data-toggle="modal" data-target="#login" id="logBtn" href="#">Login</a>
        <a href="#" data-toggle="modal" data-target="#myModal">Register</a>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">

        <div class="modal-dialog">

            <!-- Modal content-->
            {{--@include('auth.register_form')--}}
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="login" role="dialog">

        <div class="modal-dialog">

            <!-- Modal content-->
            {{--@include('auth.login_form')--}}
        </div>
    </div>
</div>
<script>
    // $(document).ready(function() {
    //     // Close the modal when the close button or outside the modal is clicked
    //     $('.close, .modal').on('click', function() {
    //         $('#myModal').hide(); // or $('#myModal').modal('hide');
    //         $('.modal-backdrop').remove(); // Remove the modal backdrop
    //         $('body').removeClass('modal-open'); // Restore body class to enable scrolling
    //     });
    // });
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
    .header {
        overflow: hidden;
        background-color: #f1f1f1;
        position: relative;
        /*width: 98%;*/
        z-index: 10;
        /*left: -1.5%;*/
        /*height: 52px;*/
        /*padding: 20px 10px;*/
    }

    #homePage {
        width: 100%;
        margin-right: -120px;
    }

    .header a {
        float: left;
        color: black;
        text-align: center;
        padding: 12px;
        text-decoration: none;
        font-size: 18px;
        line-height: 25px;
        border-radius: 4px;
    }

    .header a.logo {
        font-size: 25px;
        font-weight: bold;
    }

    .header a:hover {
        background-color: #ddd;
        color: black;
    }

    .header a.active {
        background-color: dodgerblue;
        color: white;
    }

    .header-right {
        float: right;
    }
    .modal:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
        align: middle;

    }

    .modal-dialog {
        display: inline-block;
        vertical-align: middle;
        opacity: 10!important;
    }

    body {
        background-color: #EBEBEB;
        font-family: 'Open Sans', sans-serif;
        height: 100%;
        width: 99%
    }
    .top-bar {
        background-color: #e8ded1;
        width: 100%;
        border-radius: 0.5rem;
        padding: 0.4rem;
        display: flex;
        flex-flow: row;
        justify-content: space-between;
    }
    .form-header {
        display: flex;
        flew-flow: row wrap;
    }
    .submit {
        margin-right: 1rem;
    }
    .welcome-text {
        text-align: center;
        flex-basis: 100%;
        color: black;
        font-size: 1.5rem;
    }
    .form-header, .home-links {
        display: flex;
        flex-flow: row wrap;
        text-align: center;
    }
    .form-options, .form-header-text {
        flex: 1 0 100%;
    }
    #save, #update {
        margin: 1rem;
    }
    .cont {
        background-color: white;
        margin: auto;
        margin-top: 1rem;
        border-radius:1rem;
        padding: 0.5rem;
        width: 100%;
    }
    .menu-btn {
        font-size: 1.8rem;
        border-radius: 0.4rem;
        border: none;
        margin-top: auto;
        cursor: pointer;
    }
    .login-btn {
        border-radius: 0.4rem;
        font-size: 0.7rem;
        background-color:white;
        border:none;
        padding: 0;
    }
    .dropdown {
        position: relative;
        display: inline-block;
    }
    .dropdown-content {
        position: absolute;
        background-color: #e8ded1;
        border-radius: 0.4rem;
        max-width: 10rem;
        display: none;
        text-align: center;
        color:black;
        z-index:1;
    }
    .show {
        display:block;
    }
    .white-hr, .black-hr {
        margin: 0;
        border: 1px solid;
    }
    .white-hr {
        color: white;
    }
    .black-hr {
        color: black;
    }
    .dropdown-cart, .dropdown-products, .dropdown-form {
        margin: 0.2rem;
    }
    form {
        margin: 1rem;;
    }
    /*label, h2 {*/
        /*color: white;*/
    /*}*/
    .home{
        text-align: center;
        color: white;
        margin: 0.8rem;
    }
    .p-home{
        font-size: 1.2rem;
    }
    a {
        color: white;
    }
    .fa-shopping-cart {
        margin-right: 0.5rem;
    }
    .home-icons {
        display: flex;
        flex-flow: column;
    }
    .icon {
        margin-top: 0.2rem;
    }
    .home-links {
        justify-content: center;
    }
    .home-text {
        margin-top: 0.5rem;
        text-align: left;
    }
    section {
        text-align: center;
        margin: 1rem;
        color: white;
    }
    .filter-section {
        display:flex;
        flex-flow: row wrap;
        justify-content: space-between;
    }
    .view-cont {
        margin: 0.2rem;
        color: black;
    }
    .filter-btn {
        /*border: ;*/
        border-radius: 1.4rem;
        font-size: 1.9rem;
        background-color:#e8ded1;
    }
    .filter-text {
        margin-top: 0.2rem;
        border-radius: 0.2rem;
        border: none;
        width: 90%;
        height: 1.4rem;
    }
    #filter-label {
        font-size: 0.8rem;
        color: black;
    }
    .filters {
        width: 7rem;
        text-align: right;
        position: relative;
    }
    ::placeholder {
        font-size:0.8rem;
        text-align: center;
    }
    .filter-range {
        width: 100%;
    }
    .filter-form {
        margin:0.2rem;
        text-align: center;
    }
    .filter-dropdown{
        display:none;
        background-color: #e8ded1;
        border-radius: 0.8rem;
        position: absolute;
        z-index:1;
    }

    img {
        border-radius:1rem;
        width:100%;
        max-height:100%;
    }
    .product-img{
        width:8rem;
    }
    .products-card{
        display:flex;
        flex-flow: row wrap;
        margin:1rem;
    }
    .product{
        padding: 0.2rem;
        display: flex;
        flex-flow: row wrap;
        max-width:80vw;
    }
    .product-description{
        width:100%;
        text-align:justify;
        margin:0.5rem;
    }
    .price {
        font-size: 1.5rem;
    }
    .product-title {
        font-size: 0.9rem;
    }
</style>