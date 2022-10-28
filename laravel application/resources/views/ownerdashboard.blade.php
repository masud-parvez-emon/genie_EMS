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

    <div>
        <div class="headingdiv"> 
            <span>Hello, {{ $owner->username }}</span>
            <a href="/ownerdashboard/logout">Logout</a>
            <a href="/ownerdashboard/addemployee">Add Employee</a>
            <a href={{"/ownerdashboard/employeereport?date=".date('Y-m-d')}}>Employee Report</a>
        </div>
        <div class="employeediv">
            @foreach ($employees as $employee)
                <a href="#">{{$employee->username}}</a>
            @endforeach
        </div>
    </div>
</body>
<style>
    .headingdiv{
        background-color: yellowgreen;
        padding: 10px;
        width: 600px;
        border-radius: 5px;
        margin: 5px;
    }
    .headingdiv>a{
        background-color: rgb(64, 71, 90);
        color: white;
        padding: 10px;
        display: inline-block;
    }   
    .headingdiv>span{
        margin: 0 0 0 5px;
    }
    a[href='/ownerdashboard/logout']{
        margin: 0 170px 0 10px;
    }



    .headingdiv>a:hover{
        cursor: pointer;
        background-color:deepskyblue;
        color: black;
    } 

    .employeediv>a{
        width: 600px;
        background-color:rgb(187, 171, 171);
        display: block;
        border-radius: 5px;
        padding: 10px;
        margin: 5px;
    }

    a{
        text-decoration: none;
        color: black;
    }
</style>
</html>