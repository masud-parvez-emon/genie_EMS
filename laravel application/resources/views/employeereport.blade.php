<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <a href="/ownerdashboard">Go Back <<</a>

    <form action="/ownerdashboard/employeereport" method="POST">
        @csrf
        <label for="date">Date:</label>
        <select name="date" id="date" onchange="this.form.submit()">
            @for ($i=0;$i<count($datebagYMD);$i++)
            <option value={{$datebagYMD[$i]->date}}
                @php
                    if(isset($_POST['date']) && $_POST['date'] == $datebagYMD[$i]->date) echo 'selected="selected"';
                @endphp
            >{{$datebagDMY[$i]->date}}</option>
            @endfor
        </select>
    </form>






        <div style="background-color: #c4c4c4;display: grid; grid-template-columns: repeat(4, minmax(0, auto));">
            <div>User Name</div>
            <div>Check in</div>
            <div>Check out</div>
            <div>Office Hour</div>
            @foreach ($data as $data)
            <a href={{'/ownerdashboard/employeereport/detailreport/'.$data->username}} style="display: contents;">
                <div>{{$data->username}}</div>
                <div>{{$data->checkin}}</div>
                <div>{{$data->checkout}}</div>
                <div>{{$data->officehour}}</div>
            </a>
            @endforeach
        </div>


</body>
<style>
    
    select[name='date']{
        padding: 5px;
        border: none
    }

</style>
</html>