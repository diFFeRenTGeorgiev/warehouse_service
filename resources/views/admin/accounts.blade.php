@extends('components.layout')
@section('content')
<div class="table-title">
    <h3>Администраторски достъп</h3>
</div>
<table class="table-fill">
    <thead>
    <tr>
        <th class="text-left">Имейл</th>
        <th class="text-left">Потребител</th>
        <th class="text-left">Достъп</th>
    </tr>
    </thead>
    <tbody class="table-hover">
    @foreach($users as $user)
    <tr>
        @csrf
        <td class="text-left">{{$user->email}}</td>
        <td class="text-left">{{$user->first_name.' '.$user->last_name}}</td>
        {{--<td class="text-left">{{!empty($user->roles->role)?$user->roles->role:'Потребител'}}</td>--}}
        <td class="text-left">
            <label>
                <select onchange="updateRole({{$user->id}},this.value)" name="choiceRole" id="mySelect_{{$user->id}}" type="select" data-userid="{{$user->id}}">
                    <option selected value="{{!empty($user->roles->role)?1:null}}"> {{!empty($user->roles->role)?'Администратор':'Потребител'}}</option>
                    @if(!empty($user->roles->role))
                        <option value="null" >Потребител</option>
                        @else
                        <option value="1" >Администратор</option>
                    @endif
                    {{--<option value="1" >Администратор</option>--}}
                    {{--<option value="null" >Потребител</option>--}}
                </select>
                <div id="result_{{$user->id}}" hidden></div>
            </label>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<script>
    function updateRole(userId,role) {
        var url = "{{ route('updateRole')}}";

        var data = {
            "user_id": userId,
            "role_id": role
        };
console.log(data);
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                // 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify(data),
        })
            .then(function (data) {

            });
    }
    // // Get a reference to the select element
    // var selectElement = document.getElementById('mySelect_');
    //
    // // Add an event listener to the select element
    // selectElement.addEventListener('change', function () {
    //     // Get the selected value
    //     var selectedValue = selectElement.value;
    //
    //     var userId = selectElement.getAttribute('data-userid');
    //     // Create a new XMLHttpRequest object
    //
    //     // .then(function (response) {
    //     //     return response.json();
    //     // })
    //
    // });
        {{--var arr = JSON.stringify(selectedValue,userId);--}}
        {{--// Configure the request--}}
       {{--$.ajax({--}}
           {{--headers: {--}}
               {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
           {{--},--}}
           {{--method: "POST",--}}
           {{--url: "{{route('updateRole')}}",--}}
           {{--dataType: 'JSON',--}}
           {{--data:arr,--}}
           {{--success: function (data) {--}}
               {{--console.log(data);--}}
           {{--}--}}
       {{--});--}}

    // });
</script>
    @endsection
@section('page_js')

    @endsection
@section('page_css')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

        body {
            background-color: #777879;
            font-family: "Roboto", helvetica, arial, sans-serif;
            font-size: 16px;
            font-weight: 400;
            text-rendering: optimizeLegibility;
        }

        div.table-title {
            display: block;
            margin: auto;
            max-width: 600px;
            padding:5px;
            width: 100%;
        }

        .table-title h3 {
            color: #fafafa;
            font-size: 30px;
            font-weight: 400;
            font-style:normal;
            font-family: "Roboto", helvetica, arial, sans-serif;
            text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
            text-transform:uppercase;
        }


        /*** Table Styles **/

        .table-fill {
            background: white;
            border-radius:3px;
            border-collapse: collapse;
            height: 320px;
            margin: auto;
            max-width: 600px;
            padding:5px;
            width: 100%;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            animation: float 5s infinite;
        }

        th {
            color:#D5DDE5;;
            background:#1b1e24;
            border-bottom:4px solid #9ea7af;
            border-right: 1px solid #343a45;
            font-size:23px;
            font-weight: 100;
            padding:24px;
            text-align:left;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
            vertical-align:middle;
        }

        th:first-child {
            border-top-left-radius:3px;
        }

        th:last-child {
            border-top-right-radius:3px;
            border-right:none;
        }

        tr {
            border-top: 1px solid #C1C3D1;
            border-bottom-: 1px solid #C1C3D1;
            color:#666B85;
            font-size:16px;
            font-weight:normal;
            text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
        }

        tr:hover td {
            background:#4E5066;
            color:#FFFFFF;
            border-top: 1px solid #22262e;
        }

        tr:first-child {
            border-top:none;
        }

        tr:last-child {
            border-bottom:none;
        }

        tr:nth-child(odd) td {
            background:#EBEBEB;
        }

        tr:nth-child(odd):hover td {
            background:#4E5066;
        }

        tr:last-child td:first-child {
            border-bottom-left-radius:3px;
        }

        tr:last-child td:last-child {
            border-bottom-right-radius:3px;
        }

        td {
            background:#FFFFFF;
            padding:20px;
            text-align:left;
            vertical-align:middle;
            font-weight:300;
            font-size:18px;
            text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
            border-right: 1px solid #C1C3D1;
        }

        td:last-child {
            border-right: 0px;
        }

        th.text-left {
            text-align: left;
        }

        th.text-center {
            text-align: center;
        }

        th.text-right {
            text-align: right;
        }

        td.text-left {
            text-align: left;
        }

        td.text-center {
            text-align: center;
        }

        td.text-right {
            text-align: right;
        }

    </style>
     @endsection