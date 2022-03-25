<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(session('adding'))
	    <div class="alert alert-success">
            <strong>Succés!</strong> {{session('adding')}}
        </div>
    @endif
    <table border=1>
        <head>
            <th>
                id
            </th>
            <th>
                nom complet
            </th>
            <th>
                username
            </th>
            <th>
                password
            </th>
            <th colspan="2">
                Actions
            </th>
        </head>
        <body>
            @foreach ($users as $user)
                <tr>
                    <th>{{$user->id}}</th>
                    <td>{{$user->nom . " " . $user->prenom}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td><a href="/edituser/{{$user->id}}">edit</a></td>
                    <td><a href="deleteuser/{{$user->id}}">delete</a></td>
                </tr>
            @endforeach
        </body>
    </table>
    @if (session('nom'))
        <div class="alert alert-success">
            <strong>Bienvenue M. </strong> {{session('nom')}}
        </div>
    @endif
</body>
</html>
