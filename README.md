# comando para crear el proyecto

```
composer create-project --prefer-dist laravel/laravel passport
```

# luego ejecutamos el siguiente comando

Usar la opción --with-all-dependencies (-W): Puedes ejecutar el siguiente comando para permitir actualizaciones, degradaciones y eliminaciones de paquetes actualmente bloqueados a versiones específicas:
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

# Laravel - Llenar database - Seeders y Factory link

Los Seeders en Laravel se utilizan para poblar la base de datos con datos de prueba o datos iniciales. Permiten insertar registros en tablas de la base de datos de forma automática al ejecutar el comando db:seed, lo que facilita la creación de datos de prueba consistentes para el desarrollo y pruebas de la aplicación.
https://www.youtube.com/watch?v=-FuQMoXBFbQ

##Crear modelo y migracias
Con este comando creamos el modelo y la migracion
```
php artisan make:model Models/Post -m
```
en el archivo /home/DockerImages/LARAVEL_PASSPORT_POSTGRESQL/apiRestful/database/migrations/2023_05_31_185344_create_posts_table.php

y en el modelo se agrega las siguientes lineas /home/DockerImages/LARAVEL_PASSPORT_POSTGRESQL/apiRestful/app/Models/Post.php

## Ejecutamos el comando de migracion
```
php artisan migrate
```

## Ejecutamos el comando de crear los Seeder
```
php artisan make:seeder PostSeeder
```

## Ejecutamos el comando para ejecutar el Seeder
para que se llene la tabla con la informacion quemada
```
php artisan db:seed --class=NombreDelSeeder
```

## Refrescar todos los cambios
Tener cuidado porque borra todo
```
php artisan migrate:fresh --seed
```

## Modelo Factory Faker
Crear los datos en automatico
```
php artisan make:factory NombreDelFactory
```

## Ejecutamos el comando 
```
php artisan db:seed --class=NombreDelSeeder
```

## Otra Forma de ejecutar el seeder es por la consola Tinker
```
php artisan tinker
```
## Luego este comando referenciando el modelo, factory y la cantidad a insertar
```
Post::factory()->count(30)->create()
```

# Password Grant Tokens

https://laravel.com/docs/7.x/passport#password-grant-tokens
Se utiliza para crear clientes que se van a conectar a la apliacion, ejemplo aplicaciones movil, app etc.
comando para crear cliente
```
php artisan passport:client --password

php artisan key:generate 
php artisan passport:keys
```

Client Credentials Grant Tokens - OAuth2 con Laravel Passport

# Para autenticacion de maquina a maquina, tareas automatizada

Se ajusta en el siguiente archivo /home/DockerImages/LARAVEL_PASSPORT_POSTGRESQL/apiRestful/app/Http/Kernel.php

```
use Laravel\Passport\Http\Middleware\CheckClientCredentials;
```


```
    protected $middleware = [

        \App\Http\Middleware\Cors::class,
    ];
```

https://www.youtube.com/watch?v=38PvY9yRd78

Personal Access Tokens - OAuth2 con Laravel Passport - #7

Auto gestion de token es una conexion mas simple
https://laravel.com/docs/7.x/passport#personal-access-tokens

Ejecutamos el comando
Este comando de debe ejecutar antes de poder usar el modulo


```
php artisan passport:client --personal
```

```
app/Http/Middleware/Cors.php

->header("Access-Control-Allow-Credentials", "true")
```

```
app/Providers/AuthServiceProvider.php


        Passport::personalAccessClientId(
            config('passport.personal_access_client.id')
        );

        Passport::personalAccessClientSecret(
            config('passport.personal_access_client.secret')
        );
```
