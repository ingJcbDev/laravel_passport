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
