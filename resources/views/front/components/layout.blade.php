<!DOCTYPE html>
<html lang="en">
<head>
    <title>McLaughlin Furniture</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ec6f230225.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ 'files/favicon.jpeg'}}">
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.0.4/js.cookie.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.0.4/js.cookie.min.js" integrity="sha512-Nonc2AqL1+VEN+97F3n4YxucBOAL5BgqNwEVc2uUjdKOWAmzwj5ChdJQvN2KldAxkCxE4OenuJ/RL18bWxGGzA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
    {{--@laravelViewsStyles--}}

<!-- App JS -->
    <script src="{{ asset('js/cart_products.js') }}?{{0}}"></script>
{{--    <script src="{{ asset('js/favourites_products.js') }}?''"></script>--}}
</head>
<body>
<div id="grid-container">
    <div id="box-1">
@include('front.components.header')
    </div>
    <!-- begin:: Content -->
    <div id="main" class="row container justify-content-center">
        <!-- begin:: body_content section -->
    @yield('front_body')
    <!-- end:: body_content section -->
        <!-- end:: Content -->
    </div>
    @include('front.components.footer')
</div>
</body>
@yield('js')

<style>
.container{
    width:103%;
}
</style>
<script>
    {{--var favoriteProductsIdsArr = @json{\App\FavoriteProductsManager::getIds()};--}}
    </script>
@yield('css')