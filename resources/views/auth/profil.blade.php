<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<div class="tab">
    <button class="tablinks" onclick="openForm(event, 'Registration')">Регистрация</button>
    <button class="tablinks" onclick="openForm(event, 'Login')">Вход</button>
    <button class="tablinks" onclick="openForm(event, 'ForgotPass')">Забравена парола</button>
</div>
<div id="Registration" class="tabcontent">
    @include('auth.register_form')
</div>
<div id="Login" class="tabcontent">
    @include('auth.login_form')
</div>
<script>
    function openForm(evt, formName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(formName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
<style>
    body {
        background-color: #bdc3c7;}

    /* Style the tab */
    .tab {
        overflow: hidden;
        /*border: 1px solid #ccc;*/
        background-color: white;
        width: 30%;
        left:35.5%;
        position: absolute;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        /*border: 1px solid #ccc;*/
        border-top: none;
        top:20%;
    }
</style>