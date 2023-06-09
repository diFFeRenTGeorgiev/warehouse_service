@extends('components.layout')

@section('content')
<div id="options" class="form-wrapper">
    <fieldset class="radio-check-label" id="color">
        <span class="label">Изберете тема</span>
        <div class="input-wrapper">
            <label class="radio" id="dark">
                <input type="radio" name="color" value="dark"/>
                <span>Тъмна тема</span>
            </label>
        </div>
        <div class="input-wrapper">
            <label class="radio" id="light">
                <input type="radio" name="color" value="light"/>
                <span>Светла тема</span>
            </label>
        </div>
        {{--<div class="input-wrapper">--}}
            {{--<label class="radio" id="none">--}}
                {{--<input type="radio" name="color" value="none"/>--}}
                {{--<span>Oh boy, your design suxx. Giv' me a clean version.</span>--}}
            {{--</label>--}}
        {{--</div>--}}
    </fieldset>
</div>

<div id="form" class="form-wrapper">
    <label class="text">
        <span>Име на продукта</span>
        <div class="input-wrapper">
            <input type="text" />
        </div>
    </label>

    <label class="dropdown">
        <span>Тип</span>
        <div class="input-wrapper">
            <select size="1">
                <option>-- Моля изберете --</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
        </div>
    </label>

    {{--<label class="multiple">--}}
        {{--<span>Multiple</span>--}}
        {{--<div class="input-wrapper">--}}
            {{--<select class="multiple" size="3">--}}
                {{--<option value="1">Option 1</option>--}}
                {{--<option value="2">Option 2</option>--}}
                {{--<option value="3">Option 3</option>--}}
            {{--</select>--}}
        {{--</div>--}}
    {{--</label>--}}

    <label class="text">
        <span>Описание</span>
        <div class="input-wrapper">
            <textarea>Write, some text here  </textarea>
        </div>
    </label>
    <label for="myfile">
        <span>Качване на снимки:</span>
        <div class="input-wrapper" id="files">
    {{--<input type="file" id="myfile" name="myfile" multiple><br><br>--}}
            <br><div class="container">
                <div class="row">
                    <div class="col-sm-2 imgUp">
                        <div class="imagePreview"></div>
                        <label class="btn btn-primary">
                            Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                        </label>
                    </div><!-- col-2 -->
                    <i class="fa fa-plus imgAdd"></i>
                </div><!-- row -->
            </div><!-- container -->
        </div>
</label>
    <fieldset class="radio-check-label">
        <span class="label">Статус</span>

        <div class="input-wrapper">
            <label class="radio" for="yes">
                <input type="radio" name="foo" value="yes" id="yes"/>
                <span>Активен</span>
            </label>
        </div>

        <div class="input-wrapper">
            <label class="radio" for="no" >
                <input type="radio" name="foo" value="no" id="no"/>
                <span>Неактивен</span>
            </label>
        </div>

        {{--<div class="input-wrapper">--}}
            {{--<label class="radio" for="maybe" for="maybe">--}}
                {{--<input type="radio" name="foo" value="maybe" id="maybe"/>--}}
                {{--<span>Well, maybe</span>--}}
            {{--</label>--}}
        {{--</div>--}}
    </fieldset>

    <fieldset class="radio-check-label">
        <span class="label">Цвят</span>
        <div class="input-wrapper">
            <label class="checkbox" for="accept">
                <input type="checkbox" name="accept" id="accept"/>
                <span>Okay, I accept all u want</span>
            </label>
        </div>

        <div class="input-wrapper">
            <label class="checkbox" for="spam" >
                <input type="checkbox" name="spam" id="spam"/>
                <span>Yes, send me all your spam.</span>
            </label>
        </div>

        <div class="input-wrapper">
            <label class="checkbox" for="toolbars" >
                <input type="checkbox" name="toolbars" id="toolbars"/>
                <span>Install 1000 toolbars and add all available plugins to my browser</span>
            </label>

        </div>

    </fieldset>

    <fieldset class="number-label">
        <span class="label">Количество</span>
        <div class="input-wrapper">
            <label class="number" for="qtty">
                <input type="number" id="typeNumber" class="form-control" name="quantity" />
            </label>
        </div>
    </fieldset>
        <div class="input-wrapper">
    <input type="submit" name="submit" value="Запази"/>
    <input type="reset" name="reset" value="Изчисти"/>

    <div class="clear"></div>
    <span class="notes">* Полетата са задължителни.</span>
</div>
@endsection
@section('page_js')
    <script>
        /* JS is only for label klick on iPad & theming, so you won't need any JS for you homepage (except the iPad part) */

        $(".imgAdd").click(function(){
            $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
        });
        $(document).on("click", "i.del" , function() {
            $(this).parent().remove();
        });
        $(function() {
            $(document).on("change",".uploadFile", function()
            {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function(){ // set image data as background of div
                        //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                        uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
                    }
                }

            });
        });
        $(document).ready(function(){

            $('.form-wrapper, html').addClass('dark');
            $('input[value="dark"]').attr('checked', 'checked');

            $('#options input').click(function(){
                $('.form-wrapper, html')
                    .removeClass('dark light none')
                    .addClass($(this).val());
            });

            /* Label click for iPad iOS  */
            if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/iPad/i)) {

                $('label[for]').click(function() {
                    var el = $(this).attr('for');
                    if ($('#' + el + '[type=radio], #' + el + '[type=checkbox]').attr('selected', !$('#' + el).attr('selected'))) {
                        return;
                    } else {
                        $('#' + el)[0].focus();
                    }
                });

            }
        });
    </script>
    @endsection
@section('page_css')
    <style>
        .clear {height:0px; clear:both;}
        body {
            /*margin:30px;*/
        }
        body
        {
            background-color:#f5f5f5;
        }
        .imagePreview {
            width: 100%;
            height: 180px;
            background-position: center center;
            background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
            background-color:#fff;
            background-size: cover;
            background-repeat:no-repeat;
            display: inline-block;
            box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
        }
        .btn-primary
        {
            display:block;
            border-radius:0px;
            box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
            margin-top:-5px;
        }
        .imgUp
        {
            margin-bottom:15px;
        }
        .del
        {
            position:absolute;
            top:0px;
            right:15px;
            width:30px;
            height:30px;
            text-align:center;
            line-height:30px;
            background-color:rgba(255,255,255,0.6);
            cursor:pointer;
        }
        .imgAdd
        {
            width:30px;
            height:30px;
            border-radius:50%;
            background-color:#4bd7ef;
            color:#fff;
            box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
            text-align:center;
            line-height:30px;
            margin-top:0px;
            cursor:pointer;
            font-size:15px;
        }
        .form-wrapper {
            float:left;
            width:100%;
            max-width:75.000em;
            background: #afafaf;
            overflow:hidden;
        }
        #files
        {
            width:100%;
            float:left;
            margin-bottom:1em;
            max-width:75.000em;
            /*background: #afafaf;*/
            overflow:hidden;
        }
        .form-wrapper label, .form-wrapper .radio-check-label {
            width:100%;
            float:left;
            margin-bottom:1em;
        }

        .number-label{
            width:100%;
            color: #afafaf;
            float:left;
            margin-bottom:1em;
        }

        .number-label span {
            float: left;
            width: 25%;
            text-align: right;
        }
        .form-wrapper label span, .form-wrapper .notes, .form-wrapper .radio-check-label span.label {
            float:left;
            width: 25%;
            text-align:right;
        }

        div.input-wrapper {
            width:70%;
            float:right;
            padding:0 0.625em;
        }
        .form-wrapper input, .form-wrapper select, .form-wrapper textarea, form-wrapper .radio {
            width:100%;
            padding:0.625em 0;
        }
        .form-wrapper .text input, .form-wrapper textarea {
            width:98%;
            padding-left: 1%; /* % will not work in FF*/
            padding-right: 1%; /* % will not work in FF*/
        }

        .form-wrapper .radio, .form-wrapper .checkbox {
            position:relative;
        }
        .form-wrapper .radio span, .form-wrapper .checkbox span {
            width :90%;
            text-align:left;
            padding-left:1.5em;
        }
        .form-wrapper .radio input, .form-wrapper .checkbox input {
            position:absolute;
            left:0;
            top:0;
            width:1em;
            height:1em;
        }

        input[type=reset], input[type=submit] {
            width:auto;
            max-width:34%;
            float:right;
        }
        input[type=submit] {
            margin-left:2%
        }
        .form-wrapper .notes {
            margin-top:1em;
            width:100%;
            text-align:left;
        }

        /* DOWN HERE: Only theming */

        /* Light Theme -----------------    */
        html.light{
            background:#EEE;
        }

        .form-wrapper.light {
            background:#EEE;
            font-family:'PT Sans', Arial, sans-serif;
            font-weight:normal;
            font-size:1em;
            line-height:1em;
            color:#424242 !important;
            padding:1em 0;
        }
        /* TEXT & TEXTAREA */
        .light label.text input, .light label.text textarea {
            border: 1px solid #cccccc;
            border-bottom-color: #fff;
            border-right-color: #fff;
            border-radius: 3px;
            background: #e5e5e5;
            color: #6C6C6C;
            transition:background .2s;
        }

        /* DROPDOWN & MULTIPLE*/
        .light label.dropdown select, .light label.multiple select {
            background: #e5e5e5;
            border: 1px solid #cccccc;
            border-bottom-color: #fff;
            border-right-color: #fff;
            border-radius:3px;
            transition:background .2s;
        }
        .light label.multiple select {
            padding-bottom:1.875em;
        }
        .light label.dropdown select option, .light label.multiple select option  {
            background:#e5e5e5;
            margin-bottom:0.625em 1%;
            cursor:pointer;
            transition:background .2s;
        }
        .light label.dropdown select:focus, .light label.multiple select:focus, .light label.dropdown select:focus option, .light label.multiple select:focus option {
            background:#FFF;
        }
        /* RADIO & CHECKBOX */
        .light .radio-check-label label {
            display:block;
            border: 1px solid #cccccc;
            border-top-color: #fff;
            border-right-color: #fff;
            border-radius: 3px;
            line-height:1em;
            background: #e5e5e5;
            cursor:pointer;
            overflow:hidden;
            margin-bottom:0.5em;
        }
        .light .radio-check-label label input {
            opacity:0.01
        }
        .light .radio-check-label label span {
            display:block;
            padding: 0.563em 15% 0.563em 1.875em;
            transition:background .2s;
            border-radius:3px;
        }
        .light .radio-check-label label span:before {
            content: "";
            display:block;
            width:12px;
            height:12px;
            background:#ffffff;
            position:absolute;
            left:8px;
            top:11px;
            border:1px solid #b9b9b9;
        }
        .light .radio-check-label label.radio span:before {
            border-radius:8px;
        }
        .light .radio-check-label label.checkbox span:before {
            border-radius:2px;
        }
        .light .radio-check-label input:checked ~ span:before {
            background-color:#424242;
            border-color:transparent;
        }
        .light .radio-check-label input:checked ~ span {
            background:#FFF;
        }
        /* SUBMIT & RESET */
        .light input[name=submit], .light input[name=reset] {
            margin-top:2.50em;
            border: 1px solid #cccccc;
            border-radius: 3px;
            padding: 0.563em 4em;
            background: #e5e5e5;
            color:#424242;
            font-size:1em;
            cursor:pointer;
            transition:background 0.2s;
        }
        .light input[name=submit] {
            padding:0.563em 6em;
        }
        .light input[name="reset"]:hover, .light input[name="submit"]:hover {
            color:#FFF;
        }
        .light input[name="reset"]:hover {
            background:#8C1D04;
        }
        .light input[name="submit"]:hover {
            background:#70995C;
        }

        /* FOCUS */
        .light label.text input:focus, .light label.text textarea:focus {
            background:#fff;
        }

        /* Dark Theme -----------------    */
        html.dark {
            background:#373431;
        }
        .form-wrapper.dark {
            background:#373431;
            font-family:'PT Sans', Arial, sans-serif;
            font-weight:normal;
            font-size:1em;
            line-height:1em;
            color:#A8A7A8;
            padding:1em 0;
        }
        /* TEXT & TEXTAREA */
        .dark label.text input, .dark label.text textarea {
            background:#000;
            background:rgba(0,0,0,0.16);
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3) inset, 0 1px rgba(255, 255, 255, 0.06);
            border: 0 none;
            border-radius: 3px;
            color: #BBBBBB;
            transition:background .2s;
        }
        /* DROPDOWN & MULTIPLE*/
        .dark label.dropdown select, .dark label.multiple select {
            background:#000;
            background:rgba(0,0,0,0.16);
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3) inset, 0 1px rgba(255, 255, 255, 0.06);
            color: #BBBBBB;
            border: 0 none;
            border-radius:3px;
            transition:background .2s;
        }
        .dark label.multiple select {
            padding-bottom:1.875em;
        }
        .dark label.dropdown select option, .dark label.multiple select option  {
            margin-bottom:0.625em 1%;
            cursor:pointer;
            transition:all .2s;
        }
        .dark label.dropdown select:focus, .dark label.multiple select:focus, .dark label.dropdown select:focus option, .dark label.multiple select:focus option {

        }
        /* RADIO & CHECKBOX */
        .dark .radio-check-label label {
            background:#000;
            background:rgba(0,0,0,0.16);
            box-shadow:0 1px rgba(255, 255, 255, 0.06);
            display:block;
            border: 0 none;
            border-radius: 3px;
            line-height:1em;
            cursor:pointer;
            overflow:hidden;
            margin-bottom:0.5em;

        }
        .dark .radio-check-label label input {
            opacity:0.01
        }
        .dark .radio-check-label label span {
            display:block;
            padding: 0.563em 15% 0.563em 1.875em;
            transition:all .2s;
            border-radius:3px;
        }
        .dark .radio-check-label label span:before {
            content: "";
            display:block;
            width:12px;
            height:12px;
            background:#000;
            background:rgba(0,0,0,0.2);
            position:absolute;
            left:8px;
            top:11px;
            border:1px solid #373431;
        }
        .dark .radio-check-label label.radio span:before {
            border-radius:8px;
        }
        .dark .radio-check-label label.checkbox span:before {
            border-radius:2px;
        }
        .dark .radio-check-label input:checked ~ span:before {
            background:#FFF;
            border-width:0px;

        }
        .dark .radio-check-label input:checked ~ span {
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3) inset, 0 1px rgba(255, 255, 255, 0.06);
            background:#000;
            background:rgba(0,0,0,0.1);
            color:#FFF;

        }
        /* SUBMIT & RESET */
        .dark input[name=submit], .dark input[name=reset] {
            margin-right:0.563em;
            margin-top:2.50em;
            font-size:1em;
            border: 0 none;
            background:#000;
            background:rgba(0,0,0,0.2);
            color: #BBBBBB;
            border-radius: 3px;
            padding: 0.563em 4em;
            cursor:pointer;
            box-shadow: 0 1px rgba(255, 255, 255, 0.06);
            transition:background 0.2s
        }
        .dark input[name=submit] {
            padding:0.563em 6em;
        }
        .dark input[name=submit]:hover, .dark input[name=reset]:hover {
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3) inset, 0 1px rgba(255, 255, 255, 0.06);
            color:#FFF;
        }
        .dark input[name="reset"]:hover {
            background:rgba(140,29,4,0.3);
        }
        .dark input[name="submit"]:hover {
            background:rgba(51,102,77,0.3);
        }

        /* FOCUS */
        .dark label.text input:focus, .dark label.text textarea:focus {
            background:#000;
            background:rgba(0,0,0,0.25);
            color:#FFF;
        }
        /* Dark Theme END ----------------- */

        /* Options */
        #options {
            margin:0 0 2em 0;
        }

        /* Media Queries */
        @media screen and (max-width: 480px)  {
            .form-wrapper .text span, .form-wrapper .dropdown span, .form-wrapper .multiple span, .form-wrapper .radio-check-label span.label {
                float:none;
                width:100%;
            }
            .form-wrapper .input-wrapper {
                float:none;
                margin-top:0.625em;
                width:90%
            }

            .form-wrapper .input-wrapper label.radio span, .form-wrapper .input-wrapper label.checkbox span {
                width:80%;
                padding-right:20%;
            }
            .form-wrapper input[name="reset"] {
                margin-top:0.563em;
                padding:0.563em 6em;
            }
        }

    </style>
@endsection
{{--@livewire('users-table-view')--}}
{{--@section('content')--}}
{{--<div class="login-box">--}}
    {{--<h2>Добавяне на продукт</h2>--}}
    {{--<form>--}}
        {{--@csrf--}}

        {{--<div class="form-group">--}}
            {{--<div class="user-box">--}}
                {{--<input type="text" name="product_name" required="">--}}
                {{--<label>Име на продукта</label>--}}
        {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<div class="user-box">--}}
                {{--<input type="text" name="product_type" required="">--}}
                {{--<label>Категория</label>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="user-box">--}}
            {{--<input type="text" name="product_type" required="">--}}
            {{--<label>Тип</label>--}}
        {{--</div>--}}
        {{--<div class="user-box">--}}
            {{--<input type="text" name="product_code" required="">--}}
            {{--<label>PLU</label>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="buttons">--}}
        {{--<button type="submit" id="submit_form" onclick="submitForm()">--}}
            {{--<a href="#" type="submit" >--}}
            {{--<span></span>--}}
            {{--<span></span>--}}
            {{--<span></span>--}}
            {{--<span></span>--}}
            {{--Запази--}}
            {{--</a>--}}
        {{--</button>--}}
        {{--<button class="hBack" type="button" id="close_form"  data-dismiss="modal" >--}}
            {{--<a id="close" href="#">--}}
            {{--<span></span>--}}
            {{--<span></span>--}}
            {{--<span></span>--}}
            {{--Затвори--}}
            {{--</a>--}}
        {{--</button>--}}
        {{--</div>--}}
    {{--</form>--}}
{{--</div>--}}
{{--@endsection--}}
{{--@section('page_js')--}}
{{--<script>--}}
    {{--function closeForm() {--}}
            {{--myWindow.close();--}}
    {{--}--}}
{{--</script>--}}
{{--@endsection--}}
{{--@section('page_css')--}}
{{--<style>--}}
    {{--html {--}}
        {{--height: 100%;--}}
    {{--}--}}
    {{--body {--}}
        {{--margin:0;--}}
        {{--padding:0;--}}
        {{--font-family: sans-serif;--}}
        {{--background: linear-gradient(#141e30, #243b55);--}}
    {{--}--}}
    {{--#close{--}}
        {{--margin-left:-8px;--}}
    {{--}--}}

    {{--.login-box {--}}
        {{--position: absolute;--}}
        {{--/*top: 50%;*/--}}
        {{--/*left: 50%;*/--}}
        {{--width: 80%;--}}
        {{--padding: 40px;--}}
        {{--/*transform: translate(-50%, -50%);*/--}}
        {{--background: rgba(0,0,0,.5);--}}
        {{--box-sizing: border-box;--}}
        {{--box-shadow: 0 15px 25px rgba(0,0,0,.6);--}}
        {{--border-radius: 10px;--}}
        {{--z-index: 3;--}}
    {{--}--}}

    {{--.login-box h2 {--}}
        {{--margin: 0 0 30px;--}}
        {{--padding: 0;--}}
        {{--color: #fff;--}}
        {{--text-align: center;--}}
    {{--}--}}

    {{--.login-box .user-box {--}}
        {{--position: relative;--}}
    {{--}--}}

    {{--.login-box .user-box input {--}}
        {{--width: 100%;--}}
        {{--padding: 10px 0;--}}
        {{--font-size: 16px;--}}
        {{--color: #fff;--}}
        {{--margin-bottom: 30px;--}}
        {{--border: none;--}}
        {{--border-bottom: 1px solid #fff;--}}
        {{--outline: none;--}}
        {{--background: transparent;--}}
    {{--}--}}
    {{--.login-box .user-box label {--}}
        {{--position: absolute;--}}
        {{--top:0;--}}
        {{--left: 0;--}}
        {{--padding: 10px 0;--}}
        {{--font-size: 16px;--}}
        {{--color: #fff;--}}
        {{--pointer-events: none;--}}
        {{--transition: .5s;--}}
    {{--}--}}

    {{--.login-box .user-box input:focus ~ label,--}}
    {{--.login-box .user-box input:valid ~ label {--}}
        {{--top: -20px;--}}
        {{--left: 0;--}}
        {{--color: #03e9f4;--}}
        {{--font-size: 12px;--}}
    {{--}--}}

    {{--.login-box form a {--}}
        {{--position: relative;--}}
        {{--display: inline-block;--}}
        {{--padding: 10px 20px;--}}
        {{--color: #03e9f4;--}}
        {{--font-size: 16px;--}}
        {{--text-decoration: none;--}}
        {{--text-transform: uppercase;--}}
        {{--overflow: hidden;--}}
        {{--transition: .5s;--}}
        {{--margin-top: 40px;--}}
        {{--letter-spacing: 4px--}}
    {{--}--}}

    {{--.login-box form .buttons button {--}}
        {{--position: relative;--}}
        {{--display: inline-block;--}}
        {{--padding: 10px 20px;--}}
        {{--color: #03e9f4;--}}
        {{--background: linear-gradient(#141e30, #243b55);--}}
        {{--font-size: 16px;--}}
        {{--text-decoration: none;--}}
        {{--text-transform: uppercase;--}}
        {{--overflow: hidden;--}}
        {{--transition: .5s;--}}
        {{--margin-top: 40px;--}}
        {{--letter-spacing: 4px;--}}
        {{--margin-left: 5%;--}}
    {{--}--}}

    {{--.login-box a:hover {--}}
        {{--background: #03e9f4;--}}
        {{--color: #fff;--}}
        {{--border-radius: 5px;--}}
        {{--box-shadow: 0 0 5px #03e9f4,--}}
        {{--0 0 25px #03e9f4,--}}
        {{--0 0 50px #03e9f4,--}}
        {{--0 0 100px #03e9f4;--}}
    {{--}--}}

    {{--.login-box a span {--}}
        {{--position: absolute;--}}
        {{--display: block;--}}
    {{--}--}}

    {{--.login-box a span:nth-child(1) {--}}
        {{--top: 0;--}}
        {{--left: -100%;--}}
        {{--width: 100%;--}}
        {{--height: 2px;--}}
        {{--background: linear-gradient(90deg, transparent, #03e9f4);--}}
        {{--animation: btn-anim1 1s linear infinite;--}}
    {{--}--}}

    {{--@keyframes btn-anim1 {--}}
        {{--0% {--}}
            {{--left: -100%;--}}
        {{--}--}}
        {{--50%,100% {--}}
            {{--left: 100%;--}}
        {{--}--}}
    {{--}--}}

    {{--.login-box a span:nth-child(2) {--}}
        {{--top: -100%;--}}
        {{--right: 0;--}}
        {{--width: 2px;--}}
        {{--height: 100%;--}}
        {{--background: linear-gradient(180deg, transparent, #03e9f4);--}}
        {{--animation: btn-anim2 1s linear infinite;--}}
        {{--animation-delay: .25s--}}
    {{--}--}}

    {{--@keyframes btn-anim2 {--}}
        {{--0% {--}}
            {{--top: -100%;--}}
        {{--}--}}
        {{--50%,100% {--}}
            {{--top: 100%;--}}
        {{--}--}}
    {{--}--}}

    {{--.login-box a span:nth-child(3) {--}}
        {{--bottom: 0;--}}
        {{--right: -100%;--}}
        {{--width: 100%;--}}
        {{--height: 2px;--}}
        {{--background: linear-gradient(270deg, transparent, #03e9f4);--}}
        {{--animation: btn-anim3 1s linear infinite;--}}
        {{--animation-delay: .5s--}}
    {{--}--}}

    {{--@keyframes btn-anim3 {--}}
        {{--0% {--}}
            {{--right: -100%;--}}
        {{--}--}}
        {{--50%,100% {--}}
            {{--right: 100%;--}}
        {{--}--}}
    {{--}--}}

    {{--.login-box a span:nth-child(4) {--}}
        {{--bottom: -100%;--}}
        {{--left: 0;--}}
        {{--width: 2px;--}}
        {{--height: 100%;--}}
        {{--background: linear-gradient(360deg, transparent, #03e9f4);--}}
        {{--animation: btn-anim4 1s linear infinite;--}}
        {{--animation-delay: .75s--}}
    {{--}--}}

    {{--@keyframes btn-anim4 {--}}
        {{--0% {--}}
            {{--bottom: -100%;--}}
        {{--}--}}
        {{--50%,100% {--}}
            {{--bottom: 100%;--}}
        {{--}--}}
    {{--}--}}

{{--</style>--}}
{{--@endsection--}}