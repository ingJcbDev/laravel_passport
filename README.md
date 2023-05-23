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

