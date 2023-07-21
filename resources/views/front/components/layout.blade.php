<!DOCTYPE html>
<html lang="en">
<head>
    <title>McLaughlin Furniture</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ec6f230225.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ 'files/favicon.jpeg'}}">
    {{--@laravelViewsStyles--}}
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

</style>