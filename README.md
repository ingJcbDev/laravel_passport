# comando para crear el proyecto

```
composer create-project --prefer-dist laravel/laravel passport
```

# luego ejecutamos el siguiente comando

Usar la opci�n --with-all-dependencies (-W): Puedes ejecutar el siguiente comando para permitir actualizaciones, degradaciones y eliminaciones de paquetes actualmente bloqueados a versiones espec�ficas:
```
composer require --with-all-dependencies laravel/passport
```

# Se realiza la migracion

```
php artisan migrate
```

En el archivo  User.php

```
/home/DockerImages/LARAVEL_PASSPORT_POSTGRESQL/apiRestful/app/User.php
```

```
use Laravel\Passport\HasApiTokens;
```

```
use HasApiTokens
```

En el archivo  AuthServiceProvider.php

```
/home/DockerImages/LARAVEL_PASSPORT_POSTGRESQL/apiRestful/app/Providers/AuthServiceProvider.php
```

```
use Laravel\Passport\Passport;
```


En el archivo  auth.php

```
/home/DockerImages/LARAVEL_PASSPORT_POSTGRESQL/apiRestful/config/auth.php
```

```
'driver' => 'passport',
```

En la consola ejecutamos el comando
```
composer require laravel/ui
```

```
php artisan ui bootstrap --auth
```

En la consola ejecutamos el comando
```
php artisan passport:install
```

Creacion de Clientes - OAuth2 con Laravel Passport - #3 [Link](https://www.youtube.com/watch?v=1UWKqnwIWJw)

En el archivo  AuthServiceProvider.php

```
/home/DockerImages/LARAVEL_PASSPORT_POSTGRESQL/apiRestful/app/Providers/AuthServiceProvider.php
```

```
Passport::routes(); 
```



En la consola ejecutamos el comando

```
php artisan route:list
```

Se crea el siguiente archico
```
/home/DockerImages/LARAVEL_PASSPORT_POSTGRESQL/apiRestful/resources/views/client.blade.php
```
con este contenido
```
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
</body>
</html>
```

En el archivo web.php
```
/home/DockerImages/LARAVEL_PASSPORT_POSTGRESQL/apiRestful/routes/web.php
```
Se agrega 
```
// middleware -> para poder acceder debe de estar autenticado
Route::get('/client','ClientController@index')->middleware('auth');
```




Se crea el archivo Client.php
```
/home/DockerImages/LARAVEL_PASSPORT_POSTGRESQL/apiRestful/app/Client.php
```

```
<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Client extends Model
{
    protected $table = 'oauth_clients';
}
```

Se crea controlador para ver los usuario registrados
Consola
```
php artisan make:controller ClientController
```

Se agrega en el archivo ClientController.php
```
/home/DockerImages/LARAVEL_PASSPORT_POSTGRESQL/apiRestful/app/Http/Controllers/ClientController.php
```

```
    // Se crea metodo index para pasar los datos a la vista
    public function index()
    {
        // Se le pasa solo el id del usuario autenticado
        $clients = \App\Client::where('user_id', Auth::user()->id)->get();
        return view('client', compact('clients'));
    }
```

