<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <a href="/ownerdashboard">Go Back <<</a>

        <form action="/ownerdashboard/addemployee/add" method="POST">
            @csrf
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username"><br>
            @error('username')
            <span style="color: red"> {{$message}} </span>
            @enderror
            <br><label for="email">Email</label><br>
            <input type="text" id="email" name="email"><br>
            @error('email')
            <span style="color: red"> {{$message}} </span>
            @enderror
            <br><label for="password">Password</label><br>
            <input type="text" id="password" name="password"><br>
            @error('password')
            <span style="color: red"> {{$message}} </span>
            @enderror
            <br><button type="submit">Submit</button><br>

            @if (session('message'))
            <span style="color: red"> {{session('message')}} </span>
            @endif
        </form>
    </div>
</body>
<style>
    *{
        padding: 0;
        margin: 0;
    }
    div{
        height: auto;
        position: relative;
    }
</style>
</html>