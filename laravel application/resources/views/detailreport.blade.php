<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php
    date_default_timezone_set("Asia/Dhaka");
    @endphp

    <a href={{"/ownerdashboard/employeereport?date=".date('Y-m-d')}}>Go Back <<</a><br>
        <span class="user">Username: {{$username}} </span>

        <div style="background-color: #c4c4c4;display: grid; grid-template-columns: repeat(4, minmax(0, auto));">
            <div>User Name</div>
            <div>Check in</div>
            <div>Check out</div>
            <div>Office Hour</div>
            @foreach ($data as $data)
            <span style="display: contents;">
                <div>{{$data->date}}</div>
                <div>{{$data->checkin}}</div>
                <div>{{$data->checkout}}</div>
                <div>{{$data->officehour}} Hours</div>
            </span>
            @endforeach
        </div>

</body>
<style>

    span[class='user']{
        padding: 10px;
        display: inline-block;
    }
</style>
</html>