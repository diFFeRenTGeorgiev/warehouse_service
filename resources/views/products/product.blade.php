@extends('front.components.layout')
@section('front_body')

<table align="center" style="border-spacing: 0px; width: 100%;">
    <tr>
        <td>
            <meta http-equiv="content-type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width">
            <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans" rel="stylesheet">
            {{--<div id="header">--}}
                {{--<div class="inside">--}}
                    {{--<div id="logo">--}}
                        {{--<img id="logo-img" src="https://www.solewatch.com/sole-new-logo.png">--}}
                        {{--<!--<h1>SOLE EYEWEAR</h1>-->--}}
                    {{--</div>--}}
                    {{--<div id="nav">--}}
                        {{--<div id="nav-upper">--}}
                            {{--<a href="#"><h2 class="nav-upper-item">Contact</h2></a>--}}
                            {{--<a href="#"><h2 class="nav-upper-item">Feedback</h2></a>--}}
                            {{--<a href="#"><h2 class="nav-upper-item">Shop</h2></a>--}}
                        {{--</div>--}}
                        {{--<div id="nav-lower">--}}
                            {{--<a href="#"><h2 class="nav-lower-item">Sunglasses</h2></a>--}}
                            {{--<a href="#"><h2 class="nav-lower-item">Eyeglasses</h2></a>--}}
                            {{--<a href="#"><h2 class="nav-lower-item">Watched</h2></a>--}}
                            {{--<a href="#"><h2 class="nav-lower-item">Top Sellers</h2></a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="clearer"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="clearer"></div>
            <div id="product">
                <div class="inside">
                    <div class="product-gallery">
                        <!-- IMAGE 1 -->
                        <input name="slide-switch" id="id1" checked="checked" type="radio">
                        <label for="id1">
                            <img class="product-gallery-thumbnail-image" src="https://www.digitaldice.de/images/pic1.jpg">
                        </label>
                        <img id="thumb1" class="product-gallery-big-thumbnail-image" src="https://www.digitaldice.de/images/pic1.jpg">
                        <!-- IMAGE 2 -->
                        <input name="slide-switch" id="id2" type="radio">
                        <label for="id2">
                            <img class="product-gallery-thumbnail-image" src="https://www.digitaldice.de/images/pic2.jpg">
                        </label>
                        <img id="thumb2" class="product-gallery-big-thumbnail-image" src="https://www.digitaldice.de/images/pic2.jpg">
                        <!-- IMAGE 3 -->
                        <input name="slide-switch" id="id3" type="radio">
                        <label for="id3">
                            <img class="product-gallery-thumbnail-image" src="https://www.digitaldice.de/images/pic3.jpg">
                        </label>
                        <img id="thumb3" class="product-gallery-big-thumbnail-image" src="https://www.digitaldice.de/images/pic3.jpg">
                        <!-- IMAGE 4 -->
                        <input name="slide-switch" id="id4" type="radio">
                        <label for="id4">
                            <img class="product-gallery-thumbnail-image" src="https://images.sellbrite.com/production/31365/MTK187-OBMP580P/82f53838-f986-55be-b606-d36d4f02366a.jpg">
                        </label>
                        <img id="thumb4" class="product-gallery-big-thumbnail-image" src="https://images.sellbrite.com/production/31365/MTK187-OBMP580P/82f53838-f986-55be-b606-d36d4f02366a.jpg">
                    </div>

                    <div class="clearer"></div>
                </div>
            </div>
            <div class="clearer"></div>
            </div>
            <div id="content">
                <div class="inside">
                    <div class="tabs">
                        <!-- Radio button and lable for #tab-content1 -->
                        <input name="tabs" id="tab1" checked="" type="radio">
                        <label for="tab1">
                            <i class="content-tab-label">Features</i>
                        </label>
                        <!-- Radio button and lable for #tab-content2 -->
                        <input name="tabs" id="tab2" type="radio">
                        <label for="tab2">
                            <i class="content-tab-label">Shipping</i>
                        </label>
                        <!-- Radio button and lable for #tab-content3 -->
                        <input name="tabs" id="tab3" type="radio">
                        <label for="tab3">
                            <i class="content-tab-label">Our Promise</i>
                        </label>
                        <div id="tab-content1" class="tab-content">
                            <div id="content-description">
                                <h1>GESTALTEN SIE IHRE VORLAGE mit dem neuen Editor</h1>
                                <img class="side-image right" src="https://www.digitaldice.de/images/editorScreenshot.jpg">
                                <p>Sie können diese Vorlage ohne jegliche HTML Kenntnisse verwenden.&nbsp;</p><p>Benutzen Sie dafür einfach unseren neuen Editor, der es Ihnen ermöglicht in nur wenigen Klicks die Vorlage ganz individuell an Sie anzupassen.</p>
                                <p>Egal ob auf dem PC oder auf mobilen Endgeräten wie Smartphones oder Tablets, das Design passt sich dem Gerät an und ist <b style="color:#C99947;">mobil optimiert</b>.</p>
                                <h1>Konform mit den Ebay Richtlinien ab 2019</h1>
                                <p>Diese Vorlage wurde von grundauf ohne aktive Inhalte konstruiert, was für schnellere Ladezeiten und eine problemlose Anwedung auf Smartphones sorgt.</p>
                                <p>Das Template erfüllt alle Anforderungen die Ebay ab dem Frühjahr 2018 an alle Inserate setzt.</p>
                                <p>Damit können Sie dieses Template selbst in der Zukunft komplett sorgenfrei verwenden.</p>
                                <div class="text-space"></div>
                                <div id="quote-container">
                                    <img id="quote-logo" src="https://www.digitaldice.de/images/eleganceLogo.png">
                                    <div id="quote-divider"></div>
                                    <p id="quote-text">Buy with Confidence <br>
                                        Guaranteed Authentic & New</p>
                                </div>
                                <div class="text-space"></div>
                                <h1>If you have any Questions our Support Team is here</h1>
                                <img class="side-image left" src="http://image-us.samsung.com/SamsungUS/support/solutions/computing/windows-laptops/COMP_Win10_activation-product-key.png">
                                <p>Wir sind jeden Tag für Sie da, um alle Ihre Fragen zu beantworten</p>
                                <p>Außerdem helfen wir Ihnen direkt bei der Ersteinrichtung, in der wir die Auktionsvorlage individuell an eins Ihrer Produkte anpassen.</p>
                                <p>Alle Updates an diesem Theme sind lebenslang mit inbegriffen - somit bleiben Sie immer auf dem neusten Stand.</p>
                                <div class="text-space"></div>
                            </div>
                        </div> <!-- #tab-content1 -->
                        <div id="tab-content2" class="tab-content">
                            <div id="content-description">
                                <h1>Bezahlen Sie sicher und bequem</h1>
                                <p>Sie können ganz gemütlich mit Ihrem Paypal Account bezahlen, und gleichzeitig alle Vorteile nutzen, die dies mit sich bringt.</p>
                                <p>Die folgenden Grafiken können Sie bei Ihren Inseraten verwenden:</p>
                                <img style="height: 75px; width: auto" class="side-image left" src="https://www.digitaldice.de/images/paypal.jpg">
                                <img style="height: 75px; width: auto" class="side-image left" src="https://www.digitaldice.de/images/ueberweisung.jpg">
                                <img style="height: 75px; width: auto" class="side-image left" src="https://www.digitaldice.de/images/barzahlung.jpg">
                            </div>
                        </div> <!-- #tab-content2 -->
                        <div id="tab-content3" class="tab-content">
                            <div id="content-description">
                                <h1>Schneller Versand, direkt nach dem Kauf</h1>
                                <p>Nach dem Kauf erhalten Sie eine Email, in der wir Sie fragen wie wir das Template individuell an Sie anpassen können.</p>
                                <p>Sie erhalten danach eine an Sie angepasste Version des Templates direkt per Email zugeschickt.</p>
                                <p>Die folgenden Grafiken können Sie bei Ihren Inseraten verwenden:</p>
                                <img style="height: 70px; width: auto" class="side-image left" src="https://www.digitaldice.de/images/download-logo.jpg">
                                <img style="height: 70px; width: auto" class="side-image left" src="https://www.digitaldice.de/images/deutsche-post-logo.jpg">
                                <img style="height: 70px; width: auto" class="side-image left" src="https://www.digitaldice.de/images/dhl-logo.jpg">
                                <img style="height: 70px; width: auto" class="side-image left" src="https://www.digitaldice.de/images/translogo.jpg">
                                <img style="height: 70px; width: auto" class="side-image left" src="https://www.digitaldice.de/images/ups-logo.jpg">
                                <img style="height: 70px; width: auto" class="side-image left" src="https://www.digitaldice.de/images/hermes-logo.jpg">
                                <img style="height: 70px; width: auto" class="side-image left" src="https://www.digitaldice.de/images/dpd-logo.jpg">
                            </div>
                        </div> <!-- #tab-content3 -->
                    </div>
                </div>
            </div>
            <div class="clearer"></div>
            <div id="recommended">
                <div class="inside">
                    <h1 id="recommended-title">Passend dazu</h1>
                    <div id="recommened-container">
                        <div class="recommended-item-container">
                            <img src="https://www.digitaldice.de/images/recommended1.jpg" class="recommended-item-image">
                            <h1 class="recommended-item-name">Sonnenbrille</h1>
                            <p class="recommeneded-item-price">39,99€</p>
                            <a href="#">
                                <div class="recommended-item-button-container">
                                    <h1 class="recommended-item-button-text">Mehr Infos</h1>
                                </div>
                            </a>
                        </div>
                        <div class="recommended-item-container">
                            <img src="https://www.digitaldice.de/images/recommended2.jpg" class="recommended-item-image">
                            <h1 class="recommended-item-name">Ledertasche</h1>
                            <p class="recommeneded-item-price">39,99€</p>
                            <a href="#">
                                <div class="recommended-item-button-container">
                                    <h1 class="recommended-item-button-text">Mehr Infos</h1>
                                </div>
                            </a>
                        </div>
                        <div class="recommended-item-container last">
                            <img src="https://www.digitaldice.de/images/recommended3.jpg" class="recommended-item-image">
                            <h1 class="recommended-item-name">Leder Stiefel</h1>
                            <p class="recommeneded-item-price">39,99€</p>
                            <a href="#">
                                <div class="recommended-item-button-container">
                                    <h1 class="recommended-item-button-text">Mehr Infos</h1>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="clearer"></div>
            </div>
            <div id="footer">
                <div class="inside">
                    <div id="footer-center">
                        <div id="footer-contacts">
                            <div id="footer-contacts-title">
                                <h1 id="footer-contacts-title-text">Contact us</h1>
                            </div>
                            <div class="footer-contacts-row">
                                <img src="https://www.digitaldice.de/images/mail-icon.png">
                                <p>Via Ebay Messages</p>
                            </div>
                        </div>
                        <div id="footer-impressum">
                            <div id="footer-impressum-title">
                                <h1 id="footer-impressum-title-text">Location</h1>
                            </div>
                            <div class="footer-contacts-row">
                                <img src="https://www.digitaldice.de/images/home-icon.png">
                                <p>Our warehouse is located in central Florida and all o</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearer"></div>
            </div>

        </td>
    </tr>
</table><span id="closeHtml">
</span>
@endsection
<style>

    {
        font-family: 'Open Sans', sans-serif;
        font-size: 16px;
    }
    body{
        margin: 0;
        font-family: 'Open Sans', sans-serif;
        font-size: 16px;
        background-color: #fff;
        color: #3c3c3c;
    }
    h1 { font-family: 'Montserrat', 'Helvetica', sans-serif; font-size: 1.4em; font-weight: normal; color: #101010; margin: 0 0 1em 0; text-transform: uppercase; letter-spacing: 0.1em;}
    h2 { font-family: 'Montserrat', sans-serif; text-transform: uppercase; font-weight: normal; font-size: 1.3em; margin: 0 0 1em 0; }
    h3 { font-family: 'Open Sans', sans-serif; font-weight: normal; font-size: 1.4em; margin: 0 0 1em 0; }
    p { font-family: 'Open Sans', sans-serif; margin: 0 0 1em 0; line-height: 1.5em; font-size: 1.1em;}
    a { font-family: 'Open Sans', sans-serif; #3c3c3c; text-decoration: none }
    /*a:hover { color: #C99947;}*/
    /*a:visited {text-decoration: none; color: #101010;}*/
    b{font-size: 1em; font-weight: bold;}
    em{font-size: 1em;}
    .inside
    {
        max-width: 1000px;
        width: 100%;
        margin: 0 auto;
    }
    /*#header*/
    /*{*/
        /*width: 100%;*/
        /*background-color: white;*/
        /*min-height: 135px;*/
        /*border-bottom-color: #dcdcdc;*/
        /*border-bottom-width: 1px;*/
        /*border-bottom-style: solid;*/
    /*}*/
    #product
    {
        width: 100%;
        background-color: #eaeaea;
        min-height: 750px;
    }
    #logo
    {
        float: left;
        max-width: 254px;
        width: 25%;
        height: 79px;
        margin-top: 25px;
        /*
        border-width: 3px;
        border-style: solid;
        border-color: #222222;
        text-align: center;*/
    }
    #logo-img
    {
        width: 100%;
        height: auto;
    }
    #logo h1
    {
        font-size: 1.8em;
        letter-spacing: 0.3em;
        padding: 20px 0px;
    }
    #nav
    {
        max-width: 650px;
        width: 70%;
        height: 100px;
        float: right;
        margin-top: 25px;
    }
    #nav-upper
    {
        width: 100%;
        height: 50px;
    }
    #nav-lower
    {
        width: 100%;
        height: 50px;
    }
    /*#nav-upper-ul
    {
    list-style: none;
    background-color: aqua;
    text-align: right;
    }
    #nav-upper-ul li
    {
    font-family: 'Montserrat', sans-serif;
    text-transform: uppercase;
    font-size: 0.95em;
    float: right;
    width: 30%;
    margin: 10px;
    }
    #nav-upper-ul:nth-child(2)
    {
    background-color: red;
    }*/
    .nav-upper-item
    {
        padding-top: 15px;
        float: right;
        font-size: 0.95em;
        text-transform: uppercase;
        margin-left: 80px;
        cursor: pointer;
    }
    .nav-lower-item
    {
        font-weight: 100;
        padding: 0px 0px;
        float: right;
        font-size: 0.7em;
        text-transform: uppercase;
        margin-left: 50px;
        margin-top: 20px;
        cursor: pointer;
    }
    .product-gallery
    {
        position: relative;
        float: left;
        margin-top: 25px;
        max-width: 1400px;
        width: 82%;
    }
    #product-gallery-thumbnails
    {
        float: left;
        max-width: 85px;
        width: 15.6%;
    }
    .product-gallery-thumbnail
    {
    }
    .product-gallery-thumbnail.last
    {
        margin-top: -1px;
    }
    .product-gallery-thumbnail-image
    {
        max-width: 81px;
        width: 16%;
        height: auto;
        border-width: 2px;
        border-style: solid;
        border-color: white;
        margin-bottom: 5%;
        box-shadow: 0 10px 10px 0px rgba(0, 0, 0, 0.05);
        opacity: 0.8;
    }
    #product-gallery-big-thumbnail
    {
    }
    .product-gallery-big-thumbnail-image
    {
        position: absolute;
        top: 0;
        right: 0;
        float:right;
        max-width: 700px;
        width: 80%;
        height: auto;
        border-width: 2px;
        border-style: solid;
        border-color: white;
        box-shadow: 0 10px 10px 0px rgba(0, 0, 0, 0.05);
        -webkit-animation: scale 0.6s ease-in-out;
        -moz-animation: scale 0.6s ease-in-out;
        animation: scale 0.6s ease-in-out;
    }

    #product-title
    {
        font-size: 1.2em;
        text-transform: uppercase;
        padding: 25px;
        padding-bottom: 0px;
        margin-bottom: 5px;
    }
    #product-title-second
    {
        font-size: 1.1em;
        text-transform: uppercase;
        padding: 0px 25px;
        color: #C99947;
    }
    #content-tab-bar
    {
        margin-top: 50px;
        height: 52px;
        width: 100%;
    }
    #content-description
    {
        margin-top: 50px;
        width: 100%;
    }
    .side-image
    {
        width: 450px;
        height: auto;
        margin-bottom: 25px;
        border-width: 1px;
        border-style: solid;
        border-color: #eaeaea;
    }
    .right
    {
        float: right;
        margin-left: 40px;
    }
    .left
    {
        float: left;
        margin-right: 40px;
    }
    .text-space
    {
        width: 100%;
        height: 1px;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .content-tab
    {
        max-width: 245px;
        width: 25%;
        max-height: 38px;
        text-align: center;
        padding-top: 15px;
        margin-right: 5%;
        border-width: 1px;
        border-style: dotted;
        border-color: #ACACAC;
        color: #303030;
        float: left;
    }
    .content-tab.last
    {
        margin-right: 0;
    }
    .content-tab.active
    {
        color: white;
        background-color: #222;
        border-width: 0px;
    }
    .content-tab.active h1
    {
        color: white;
    }
    .content-tab h1
    {
        font-size: 18px;
        font-weight: normal;
        letter-spacing: 0.15em;
        margin: 0;
        padding-bottom: 1em;
    }
    .clearer
    {
        clear: both;
    }
    #recommended
    {
        margin-bottom: 50px;
    }
    #recommended-title
    {
        text-align: center;
        font-size: 2.2em;
        padding-top: 70px;
        padding-bottom: 10px;
    }
    #recommened-container
    {
        width: 100%;
    }
    .recommended-item-container
    {
        float: left;
        max-width: 300px;
        width: 30%;
        margin-right: 5%;
    }
    .recommended-item-container.last
    {
        margin-right: 0px;
    }
    .recommended-item-image
    {
        width: 100%;
        height: auto;
        background-color: #ededed;
        border-width: 2px;
        border-color: #eaeaea;
        border-style: solid;
    }
    .recommended-item-image:hover
    {
        border-width: 2px;
        border-color: #C99947;
        border-style: solid;
    }
    .recommended-item-name
    {
        padding-top: 12px;
        padding-bottom: 0px;
        margin-bottom: 5px;
        font-size: 1.3em;
        text-align: center;
    }
    .recommeneded-item-price
    {
        font-size: 1.2em;
        text-align: center;
        padding: 0;
        margin-bottom: 5px;
    }
    .recommended-item-button-container:hover
    {
        background-color: #C99947;
    }
    .recommended-item-button-container
    {
        max-width: 200px;
        width: 80%;
        height: 50px;
        background-color: #222;
        margin: 0 auto;
        cursor:pointer;
    }
    .recommended-item-button-text
    {
        color: #fff;
        font-size: 1em;
        text-align: center;
        padding: 15px 0px;
        text-decoration: none;
    }
    #footer
    {
        width: 100%;
        min-height: 450px;
        background-color: #2A2A2A;
    }
    #footer-center
    {
        width: 90%;
        margin: 0 auto;
    }
    #footer-contacts
    {
        float: left;
        width: 50%;
        height: 300px;
    }
    #footer-contacts-title
    {
        margin: 0 auto;
        margin-top: 100px;
        margin-bottom: 50px;
        width: 220px;
        height: 65px;
        border-width: 3px;
        border-style: solid;
        border-color: #fff;
        text-align: center;
    }
    #footer-contacts-title-text
    {
        font-size: 1.3em;
        letter-spacing: 0.3em;
        padding: 20px 0px;
        color: #fff;
    }
    #footer-impressum
    {
        float: right;
        width: 50%;
        height: 300px;
    }
    #footer-impressum-title
    {
        margin: 0 auto;
        margin-top: 100px;
        margin-bottom: 50px;
        width: 220px;
        height: 65px;
        border-width: 3px;
        border-style: solid;
        border-color: #fff;
        text-align: center;
    }
    #footer-impressum-title-text
    {
        font-size: 1.3em;
        letter-spacing: 0.3em;
        padding: 20px 0px;
        color: #fff;
    }
    /* TABS */
    .tabs {
        float: none;
        list-style: none;
        padding: 0;
        margin: 50px auto;
    }
    .tabs:after {
        content: '';
        display: table;
        clear: both;
    }
    .tabs input[type=radio] {
        display:none;
    }
    .tabs label {
        display: block;
        float: left;
        width: 28%;
        color: #ccc;
        font-size: 30px;
        font-weight: normal;
        text-decoration: none;
        text-align: center;
        cursor: pointer;
        -webkit-transition: all 0.3s; /* Safari 3.1 to 6.0 */
        transition: all 0.3s;
        border-style: dotted;
        border-width: 1px;
        border-color: #ACACAC;
        margin-right: 10px;
        margin-bottom: 5px;
        padding: 0.5em 0em;
    }
    .tabs label span {
        display: none;
    }
    .tabs label i {
        margin-right: 0;
    }
    .tabs label:hover {
        /* HOVER ON TAB */
    }
    .tab-content {
        display: none;
        width: 100%;
        float: left;
        box-sizing: border-box;
        background-color:#ffffff;
    }
    .content-tab-label
    {
        font-family: 'Montserrat', sans-serif;
        text-transform: uppercase;
        font-style: normal;
        color: #222222;
        font-size: 0.7em;
    }
    /* ANIMATIONS */
    .tab-content * {
        -webkit-animation: scale 0.6s ease-in-out;
        -moz-animation: scale 0.6s ease-in-out;
        animation: scale 0.6s ease-in-out;
    }
    @keyframes scale {
        0% {
            transform: scale(0.9);
            opacity: 0;
        }
        50% {
            transform: scale(1.01);
            opacity: 0.5;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }
    @keyframes gallery {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
    @keyframes gallery-reverse {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
    }
    .tabs [id^="tab"]:checked + label {
        background-color: #222222;
        color: white;
        border-style: solid;
        border-color: #222222;
    }
    #tab1:checked ~ #tab-content1,
    #tab2:checked ~ #tab-content2,
    #tab3:checked ~ #tab-content3 {
        display: block;
    }
    .tabs [id^="tab"]:checked + label > i {
        color: white;
    }
    /* GALLERY */
    input[type="radio"] {
        display: none;
    }
    .product-gallery label
    {
        cursor: pointer;
    }
    label img{
        float: none;
        display: block;
    }
    #id1 ~ #thumb1,
    #id2 ~ #thumb2,
    #id3 ~ #thumb3,
    #id4 ~ #thumb4{
        opacity: 0;
        -webkit-animation: gallery-reverse 0.2s linear;
        -moz-animation: gallery-reverse 0.2s linear;
        animation: gallery-reverse 0.2s linear;
    }
    #id1:checked ~ #thumb1,
    #id2:checked ~ #thumb2,
    #id3:checked ~ #thumb3,
    #id4:checked ~ #thumb4{
        opacity: 1;
        -webkit-animation: gallery 0.5s linear;
        -moz-animation: gallery 0.5s linear;
        animation: gallery 0.5s linear;
    }
    .product-gallery-thumbnail-image:hover
    {
        opacity: 1;
    }
    #quote-logo
    {
        float: left;
        height: 100%;
        width: auto;
        border-width: 1px;
        border-color: black;
        border-style: solid;
    }
    #quote-container
    {
        width: 70%;
        height: 70px;
        margin: 40px auto;
    }
    #quote-divider
    {
        margin: 0 25px;
        float: left;
        width: 3px;
        height: 100%;
        background-color: #C99947;
    }
    #quote-text
    {
        width: 60%;
        float: left;
        font-size: 1.5em;
        font-style: italic;
        margin: 0;
        padding: 0;
    }
    #footer-contacts-table
    {
        margin: 25px auto;
        background-color: red;
        width: 60%;
    }
    .footer-contacts-table-icon
    {
        width: 50px;
        background-color: aqua;
    }
    .footer-contacts-row
    {
        width: 250px;
        margin-top: 35px;
        text-align: left;
        margin: 0 auto;
        margin-top: 25px;
        opacity: 0.9;
    }
    .footer-contacts-row img
    {
        float: left;
        display: inline-block;
    }
    .footer-contacts-row p
    {
        display: inline-block;
        color: #fff;
        font-size: 1.2em;
        margin-left: 25px;
    }
    @media only screen and (max-width: 1000px)
    {
        .inside
        {
            width: 96%;
            padding: 0 2%;
        }
        #quote-container
        {
            width:100%;
        }
    }
    @media only screen and (max-width: 820px)
    {
        p
        {
            font-size: 1.2em;
        }
        /*#header*/
        /*{*/
            /*padding-bottom: 10px;*/
        /*}*/
        #logo
        {
            width: 100%;
            float: none;
            margin: 3% auto;
            margin-bottom: 1%;
        }
        #nav
        {
            width: 100%;
            float: none;
            margin: 0 auto;
            max-width: none;
        }
        #nav-upper
        {
            margin: 0 auto;
        }
        .nav-upper-item
        {
            font-size: 1.2em;
            text-transform: uppercase;
            margin: 0;
            text-align: center;
            width: 33.333%;
        }
        .nav-lower-item
        {
            float: right;
            font-size: 0.8em;
            text-transform: uppercase;
            margin: 20px 0 0 0;
            text-align: center;
            width: 25%;
        }
        .product-gallery
        {
            width: 100%;
            max-width: none;
            min-height: 650px;
        }
        .product-gallery-big-thumbnail-image
        {
            max-width: none;
        }
        #product-gallery-thumbnails
        {
            max-width: none;
        }
        .product-gallery-thumbnail-image
        {
            max-width: none;
        }
        #product-information
        {
            width: 96%;
            clear: both;
            float: none;
            margin-top: 0;
            max-width: none;
            margin-left: 2%;
            margin-right: 0;
            border-bottom-color: #eaeaea;
            border-bottom-width: 2px;
            border-bottom-style: solid;
        }
        #product-information-description-container
        {
        }
        #product-title
        {
            font-size: 1.6em;
        }
        #product-title-second
        {
            font-size: 1.3em;
            margin-bottom: 30px;
        }
        #product-information p
        {
            font-size: 1.2em;
        }
        #product-buy-container
        {
            max-width: none;
            width: 90%;
            height: 65px;
            margin: 20px auto;
        }
        #product-buy-price-container p
        {
            font-size: 2.1em;
            text-align: center;
        }
        .content-tab
        {
            max-width: none;
            width: 29%;
            text-align: center;
            margin-right: 5%;
        }
        .content-tab last
        {
            margin-right: 0;
        }
        .content-tab h1
        {
            font-size: 1em;
        }
        .recommended-item-name
        {
            font-size: 1.2em;
        }
        #content-description
        {
            padding: 2%;
            width: 96%;
        }
        .content-tab-label
        {
            font-size: 0.6em;
            padding-bottom: 10px;
        }
        #quote-text
        {
            font-size: 1.3em;
            width: 40%;
        }
    }
    @media only screen and (max-width: 700px)
    {
        .side-image
        {
            width: 100%;
            background-color: beige;
        }
        .recommended-item-name
        {
            font-size: 1em;
        }
        .product-gallery
        {
            min-height: 550px;
        }
    }
    @media only screen and (max-width: 620px)
    {
        .content-tab h1
        {
            font-size: 0.85em;
        }
        .recommended-item-container
        {
            max-width: none;
            width: 70%;
            float: none;
            margin: 0 auto;
        }
        .recommended-item-container.last
        {
            margin: 0 auto;
        }
        .recommended-item-name
        {
            font-size: 1.3em;
        }
        .recommeneded-item-price
        {
            font-size: 1.3em;
        }
        .recommended-item-button-container
        {
            margin-bottom: 50px;
        }
        #footer-contacts
        {
            width: 100%;
            float: none;
        }
        #footer-impressum
        {
            width: 100%;
            float: none;
        }
        #footer-center
        {
            padding-top: 30px;
        }
        .content-tab-label
        {
            font-size: 0.5em;
        }
        .tabs label
        {
            width: 30%;
            margin-right: 2%;
        }
        .tabs {
            margin-top: 30px;
        }
        .product-gallery
        {
            min-height: 480px;
        }
    }
    @media only screen and (max-width: 540px)
    {
        .product-gallery
        {
            min-height: 440px;
        }
        #quote-container
        {
            display: none;
        }
    }
    @media only screen and (max-width: 480px)
    {
        .product-gallery-thumbnail-image
        {
            margin-bottom: 4%;
        }
        .nav-upper-item
        {
            width: 100%;
        }
        .nav-lower-item
        {
            display: none;
            width: 100%;
        }
        #product-buy-price-container p
        {
            padding-top: 0.3em;
            font-size: 1.8em;
        }
        #product-buy-button h1
        {
            padding-top: 0.8em;
            font-size: 1em;
        }
        .content-tab
        {
            width: 32%;
            margin-right: 1%;
        }
        .content-tab h1
        {
            font-size: 0.5em;
        }
        .recommended-item-button-container
        {
            height: 57px;
        }
        .content-tab-label
        {
            font-size: 0.5em;
        }
        .tabs label
        {
            width: 47%;
        }
        .recommended-item-button-container
        {
            height: 50px;
        }
        .product-gallery
        {
            min-height: 400px;
        }
        #product-title
        {
            font-size: 1.4em;
        }
    }
    @media only screen and (max-width: 420px) {
        .product-gallery {
            min-height: 320px;
        }
    }
</style>