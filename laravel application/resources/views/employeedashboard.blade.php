<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <a href="/employeedashboard/logout">Logout</a>

    @if (isset($data->checkin) && isset($data->checkout))
        <div>Checked out, come back tomorrow!</div>
    @elseif (!$data)
        <div>{{date('d F, Y')}}</div>
        <a href={{"/employeedashboard/checkin/".$auth}}><button class="checkin">Check In</button></a>


    @elseif (!isset($data->checkout))
        <div>{{date('d F, Y')}}</div>
        <a href={{"/employeedashboard/checkout/".$data->employees_id}}><button class="checkout">Check Out</button></a>


    @endif

</body>
<style>
    .checkin{
        padding: 10px;
        background-color: forestgreen;
        color: white;
        border: none;
        border-radius: 5px;
        width: 100px;
        cursor: pointer;
    }
    .checkout{
        padding: 10px;
        background-color: blue;
        color: white;
        border: none;
        border-radius: 5px;
        width: 100px;
        cursor: pointer;
    }

    .checkin:hover{
        background-color: rgb(46, 100, 46);
    }
    .checkout:hover{
        background-color: rgb(71, 71, 133);
    }
</style>
</html>