<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
        </head>
        <body>
            @foreach ($users as $user)
                <tr>
                    <th>{{$user->id}}</th>
                    <td>{{$user->nom . " " . $user->prenom}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                </tr>
            @endforeach
        </body>
    </table>
</body>
</html>