@extends('front.components.layout')
@section('front_body')
<div class="main">
    <div class="container">
        <article>
            <h1 class="center">Furniture Classifier</h1>
            <h2 class="subtitle center">with Tensorflow.js</h2>
            <br />
            <p>This demo loads a Deep Learning model able to classify furniture images into one of 128 categories. Choose an image or select one from your own computer to see the model running predictions in real-time in your browser!</p>
            <br />
        </article>
        <div class="product-gallery">
            <div class="product-photo-main">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/1.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/2.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/3.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/4.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/5.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/6.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/7.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/8.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/9.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/10.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/11.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/12.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img id="imageFromUser">
                            <div id="textInfoSendImage">
                                Use the menu on the right to use a photo from your computer!
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="tf-results">
                Select a image on the left
                <br>
                <b>OR</b>
                <br>
                <input type="file" id="userImageInput" onchange="startUserImage()" accept="image/x-png,image/jpg,image/jpeg" />
                <br>
                <br>
                <h1 id="results_title">Processing...</h1>
                <h2 id="first_place"></h2>
                <h4 id="second_place"></h4>
                <h4 id="third_place"></h4>
                <h4 id="fourth_place"></h4>
                <h4 id="fifth_place"></h4>
            </div>
            <div class="product-photos-side">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/1.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/2.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/3.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/4.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/5.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/6.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/7.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/8.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/9.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/10.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/11.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/images/12.jpg" crossOrigin="anonymous">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img src="https://adrianodennanni.github.io/furniture_classifier/upload_icon.png" style="padding:15px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            tf = window.tf;

            async function loadMobilenet() {
                const modelWeigths = await tf.loadModel('https://adrianodennanni.github.io/furniture_classifier/model/model.json');

                // Return a model that outputs an internal activation.
                const layer = modelWeigths.getLayer('dense');
                model = await tf.model({inputs: modelWeigths.inputs, outputs: layer.output});
            };

            canvas = document.createElement('canvas');
            canvas.width  = 224;
            canvas.height = 224;
            ctx = canvas.getContext("2d");
            loadMN = loadMobilenet();

            swiperSide = new Swiper('.product-photos-side .swiper-container', {
                direction: 'horizontal',
                centeredSlides: true,
                spaceBetween: 30,
                slidesPerView: 'auto',
                touchRatio: 0.2,
                slideToClickedSlide: true,
            })
            swiperProduct = new Swiper('.product-photo-main .swiper-container', {
                direction: 'horizontal',
                pagination: '.swiper-pagination',
                paginationClickable: true,
            })

            swiperSide.params.control = swiperProduct;
            swiperProduct.params.control = swiperSide;

            swiperSide.on('transitionEnd', function () {
                if (swiperSide.activeIndex == 12){
                    if($("#imageFromUser")[0].src != ""){
                        inferImage($("#imageFromUser")[0]);
                    }
                    else {
                        $("#results_title").text("");
                        $("#first_place").text("");
                        $("#second_place").text("");
                        $("#third_place").text("");
                        $("#fourth_place").text("");
                        $("#fifth_place").text("");
                    }
                } else {
                    inferImage($('.swiper-slide-active img')[0]);
                }
            });

            loadMN.then(function(){
                inferImage($('.swiper-slide-active img')[0]);
            });
        });

        async function startUserImage(imageFilePath) {
            $("#textInfoSendImage").remove();
            var imgDataURL = window.URL.createObjectURL(document.getElementById('userImageInput').files[0]);
            $("#imageFromUser")[0].src = imgDataURL;
            if(swiperProduct.activeIndex == 12){
                await new Promise(resolve => setTimeout(resolve, 10));
                inferImage($("#imageFromUser")[0]);
            } else{
                swiperProduct.slideTo(12);
            };
        };

        async function inferImage(image){
            // Set text as "Processing" and erase old results
            $("#results_title").text("Processing...");
            $("#first_place").text("");
            $("#second_place").text("");
            $("#third_place").text("");
            $("#fourth_place").text("");
            $("#fifth_place").text("");

            // Deep Learning Inference
            ctx.drawImage(image, 0, 0, image.naturalWidth, image.naturalHeight, 0, 0, 224, 224);
            imageData = ctx.getImageData(0, 0, 224, 224);
            imagePixels = tf.fromPixels(imageData).expandDims(0).toFloat().div(tf.scalar(255));
            predictedArray = await model.predict(imagePixels).as1D().data();

            response = {}

            for (i = 0; i <= 127; i++) {
                if(Number.isFinite(response[labels[i][1]])){
                    response[labels[i][1]] += predictedArray[i];
                }
                else {
                    response[labels[i][1]] = predictedArray[i];
                }
            };

            response = Object.keys(response).map(item => [item, response[item]]);

            response.sort(function(a, b) {
                return a[1] < b[1] ? 1 : -1;
            });

            // Print top 5 on html elements
            $("#results_title").text("Results");
            $("#first_place").text(buldLabel(response,  0));
            $("#second_place").text(buldLabel(response, 1));
            $("#third_place").text(buldLabel(response,  2));
            $("#fourth_place").text(buldLabel(response, 3));
            $("#fifth_place").text(buldLabel(response,  4));

        }

        function buldLabel(response, index){
            return response[index][0]+": "+response[index][1].toFixed(4);
        }
    </script>
    @endsection
<style>
    *,
    *:after,
    *:before {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        word-wrap: break-word;
        -webkit-tap-highlight-color: transparent;
    }

    html,
    body {
        min-height: 90vh;
        /*margin: 10px;*/
    }

    html {
        background-color: #FFF;
        text-rendering: optimizeLegibility;
        -webkit-text-size-adjust: 100%;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    body {
        color: #444;
        background-attachment: fixed;
        font-family: "Noto Sans", sans-serif;
        font-weight: normal;
        font-style: normal;
    }

    .container {
        margin: auto;
        padding: 25px 0;
        max-width: 1025px;
    }

    h1, h2, p {
        margin-bottom: 15px;
    }
    h1, h2 {
        line-height: 1em;
    }
    .center {
        text-align: center;
    }
    h2.subtitle {
        font-size: inherit;
        font-style: italic;
        font-weight: normal;
    }
    a {
        color: inherit;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }

    .swiper-container,
    .swiper-container * {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    .swiper-container .swiper-no-swiping .swiper-button-prev,
    .swiper-container .swiper-no-swiping .swiper-button-next {
        opacity: 0;
    }
    .swiper-button-next.swiper-button-disabled,
    .swiper-button-prev.swiper-button-disabled {
        opacity: .1;
    }

    .product-gallery .product-photos-side,
    .product-gallery .product-photo-main {
        position: relative;
        width: 48%;
    }

    .tf-results {
        position: relative;
        height: 100%;
        float: right;
        width: 48%;
        padding: 20px;
    }

    .product-gallery .product-photo-main {
        margin-bottom: 30px;
        float: left;
        border-style: groove;
        border-width: thin;
    }

    .product-gallery .product-photos-side .swiper-container {
        height: 70px;
        border-style: groove;
        border-width: thin;
    }

    .product-gallery .product-photo-main .swiper-container {
        height: 320px;
    }

    .product-gallery .product-photos-side .swiper-slide {
        width: 70px;
        opacity: .4;
        transition: 225ms opacity ease-in-out;
    }

    .product-gallery .product-photos-side .swiper-slide.swiper-slide-active {
        opacity: 1;
    }

    .product-gallery .swiper-container {
        position: static;
        width: 100%;
    }

    .product-gallery .swiper-slide {
        cursor: pointer;
        text-align: center;
    }

    .product-gallery img {
        max-height: 100%;
        max-width: 100%;
    }

    .product-photos-side .swiper-slide img {
        max-height: 100%;
        max-width: 100%;
    }

    @media (max-width: 1025px) {
        .container {
            padding: 0;
        }
    }
</style>