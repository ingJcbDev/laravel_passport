{{-- @extends('layouts.app') --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="{{ url('/oauth/clients') }}" method="POST">
            <P>
                <input type="text" name="name" />
            </P>
            <P>
                <input type="text" name="redirect" />
            </P>
            <P>
                <input type="submit" name="send" value="Enviar"/>
            </P>
            {{ csrf_field() }}
        </form>
        <!-- {{ $clients }} -->
        <table border="1">
            <tbody>
                <tr>
                    <td>ID</td>
                    <td>NAME</td>
                    <td>REDIRECT</td>
                    <td>SECRET</td>
                </tr>
                @foreach($clients as $client)
                    <tr>
                        <td>{{$client->id}}</td>
                        <td>{{$client->name}}</td>
                        <td>{{$client->redirect}}</td>
                        <td>{{$client->secret}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Personal Access Tokens</h2>
        <form action="{{ url('oauth/personal-access-tokens') }}" method="POST">
            <input type="text" name="name" placeholder="Nombre " />
            <input type="submit" value="Crear" />
            {{ csrf_field() }}
        </form>
</body>
</html>
