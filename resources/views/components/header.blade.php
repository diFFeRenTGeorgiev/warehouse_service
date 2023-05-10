<div class="header">
    <a href="#" class="logo">McLaughlin warehouse</a>
    <div class="header-right">
        <a class="active" href="#">Home</a>
        <a href="#">Contact</a>
        <a href="#">About</a>
    </div>

    {{--<div class="cont">--}}
        {{--<header class="top-bar">--}}
            {{--<div class="dropdown">--}}
                {{--<a id="icon">--}}
                    {{--<button class="menu-btn">--}}
                        {{--<i class="fas fa-bars"></i>--}}
                    {{--</button></a>--}}
                {{--<div class="dropdown-content" >--}}
                    {{--<div class="dropdown-form">--}}
                        {{--Form--}}
                    {{--</div><hr class="white-hr"/>--}}
                    {{--<div class="dropdown-products">--}}
                        {{--Products--}}
                    {{--</div><hr class="white-hr"/>--}}
                    {{--<div class="dropdown-cart">--}}
                        {{--Cart--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<span class="welcome-text">CoderHouse eCommerce</span>--}}
            {{--<button class="login-btn">Sign up/Login</button>--}}
        {{--</header>--}}
        {{--<section>--}}
            {{--<h5 style="color:black;">Products List</h5><hr class="black-hr"/>--}}
            {{--<div class="view-cont">--}}
                {{--<div class="filter-section">--}}
                    {{--<div class="results">--}}
                        {{--Showing 0 of 0 results.--}}
                    {{--</div>--}}
                    {{--<div class="filters">--}}
                        {{--<button class="filter-btn btn btn-primary btn-lg">Filters</button>--}}
                        {{--<div class="filter-dropdown">--}}
                            {{--<form class="filter-form">--}}
                                {{--<label for="name" id="filter-label">Name:</label><br/>--}}
                                {{--<input type="text" class="filter-text" id="name" name="name"--}}
                                       {{--placeholder="Type a name..."/>--}}


                                {{--<label for="code" id="filter-label">Code:</label><br/>--}}
                                {{--<input type="text" class="filter-text" id="code" name="code"--}}
                                       {{--placeholder="Type a code..."/>--}}


                                {{--<label for="price" id="filter-label">Price:</label><br/>--}}
                                {{--<input type="range" min="0.01" step="0.01" max="10000" class="filter-range">--}}


                                {{--<label for="stock" id="filter-label" >Stock:</label><br/>--}}
                                {{--<input type="range" min="0" step="1" class="filter-range">--}}

                            {{--</form>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}
    {{--</div>--}}
</div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
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
    label, h2 {
        color: white;
    }
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
{{--<script>--}}
    {{--const menu_btn = document.getElementsByClassName("menu-btn")[0];--}}
    {{--const menu_dropdown = document.getElementsByClassName("dropdown-content")[0];--}}
    {{--const filter_btn = document.getElementsByClassName("filter-btn")[0];--}}
    {{--const filter_dropdown = document.getElementsByClassName("filter-dropdown")[0];--}}
    {{--let filter_display = filter_dropdown.style.display;--}}
    {{--const icon = document.getElementById("icon");--}}
    {{--menu_btn.onclick = () => {--}}
        {{--if(menu_dropdown.style.display != 'block'){--}}
            {{--menu_dropdown.style.display = 'block';--}}
        {{--}else{--}}
            {{--menu_dropdown.style.display = 'none';--}}
        {{--}--}}
    {{--}--}}
    {{--filter_btn.onclick = () => {--}}
        {{--if(filter_dropdown.style.display != 'block'){--}}
            {{--filter_dropdown.style.display = 'block';--}}

        {{--}else{--}}
            {{--filter_dropdown.style.display = 'none';--}}
        {{--}--}}
    {{--}--}}



{{--</script>--}}