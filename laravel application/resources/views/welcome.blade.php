<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div class="outerdiv">

        <div class="innerdiv">
            Owner
            <form action="/ownerlogin" method="POST">
                @csrf
                <label for="username">Username</label><br>
                <input type="text" id="username" name="username">
                <br>
                @error('username', 'owner')
                    <span style="color: red"> {{$message}} </span>
                @enderror
                
                <label for="password">Password</label><br>
                <input type="text" id="password"  name="password">
                <br>
                @error('password', 'owner')
                <span style="color: red"> {{$message}} </span>
                @enderror
                
                <input type="submit" value="Submit">
                
                @if(session('ownerloginerror'))
                <span style="color: red">
                    {{session('ownerloginerror')}}
                </span>
                @endif

            </form>
        </div>

        <div class="innerdiv">
            Employee
            <form action="/employeelogin" method="POST">
                @csrf
                <label for="email">Email</label><br>
                <input type="text" id="email" name="email">
                <br>
                @error('email', 'employee')
                    <span style="color: red"> {{$message}} </span>
                @enderror
                
                <br><label for="password">Password</label><br>
                <input type="text" id="password" name="password">
                <br>
                @error('password', 'employee')
                <span style="color: red"> {{$message}} </span>
                @enderror
                
                <br><input type="submit" value="Submit">

                @if(session('employeeloginerror'))
                <span style="color: red">
                    {{session('employeeloginerror')}}
                </span>
                @endif

            </form>
        </div>

    </div>

</body>
<style>
    *{
        margin: 0;
        padding: 0;
    }
    .outerdiv{
        background: linear-gradient(to right, #0cebeb, #20e3b2, #29ffc6);
        height: 100%;
        width: 100%;
    }
    .innerdiv{
        background-color: #F0EAD6;
        border-radius: 5px;
        margin: 250px 0 0 200px;
        display: inline-block;
    }
    .innerdiv>form>*{
        margin: 5px 0 0 0;
    }
</style>
</html>