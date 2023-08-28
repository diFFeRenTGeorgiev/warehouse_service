@extends('front.components.layout')
@section('front_body')
    <section class="sectiontop">
        <h1 class="head">Mclaughlin furniture!</h1>
        <div class="maincontent">
            <p>Благодарим ви, че пазарувахте от нас. Ще се свържем с вас за допълнително уточнение във връзка с доставката.</p>
        </div>
        <div class="footer">
            Имате въпроси? <a href="">Свържете се с нас</a>
            <br><br>
            <a href="{{route('front.index')}}" class="button">Начало</a> <a href="" class="button">See Blogs</a>
        </div>
    </section>
    @endsection
@section('css')
    <style>
        * {
            box-sizing: border-box;
        }

        html {
            font-size: 16px;
            background-color: #fffffe;
        }
        body {
            padding: 0;
            margin:0;
            min-width: 600px;
            font-family: 'Akkurat-Regular', sans-serif;
            background-color: #fffffe;
            color: #1a1a1a;
            text-align: center;
            word-wrap: break-word;
            -webkit-font-smoothing: antialiased
        }
        a:link,
        a:visited {
            color: #00c2a8;
        }
        a:hover,
        a:active {
            color: #fff;
        }

        body{
            background: #bdc3c7;
            background: -moz-linear-gradient(45deg,#117c8e 0,#6bc691 100%);
            background: -webkit-linear-gradient(45deg,#117c8e 0,#6bc691 100%);
            background: linear-gradient(45deg,#117c8e 0,#6bc691 100%);
        }
        .sectiontop {
            text-align:center;
            color:#1E262D
        }
        .head {
            margin: 0 auto;
            padding: 80px 0 0;
            max-width: 820px;
        }
        h1{
            margin: 0;
            font-family: Montserrat, sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.1;
            text-transform: uppercase;
            -webkit-hyphens: auto;
            -moz-hyphens: auto;
            -ms-hyphens: auto;
            hyphens: auto;
            display: inline-block;
        }
        .maincontent {
            font-size: 4.0625rem;
            line-height: 1;
            color: #1E262D;
            margin: 20px auto 0;
            font-size: 1rem;
            line-height: 1.4;
            max-width: 820px;
        }
        .footer {
            margin: 0 auto;
            padding: 80px 0 25px;
            padding: 0;
            max-width: 820px;
        }
        .footer a{color:#1E262D !important;}
        .footer a:hover{color:#fff !important;}
        a.button{
            padding: .25rem .5rem;
            font-size: .875rem;
            border-radius: .2rem;
            color: #fff;
            background-color: #0275d8;
            border-color: #0275d8;
            text-decoration:none;
            margin-right:5px;
        }
        @media only screen and (min-width: 40em) {
            .head {
                padding-top: 150px;
            }
            .head {
                font-size: 3.25rem;
            }
            .maincontent {
                font-size: 1.25rem;
            }
            .footer {
                padding: 145px 0 25px;
            }
        }
    </style>
    @endsection