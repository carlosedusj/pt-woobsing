# Comenzamos!

## Instalacion

Clona el repositorio

    git clone https://github.com/carlosedusj/pt-woobsing.git

Ingresa en la carpeta pt-woobsing

    cd pt-woobsing

Instala las dependencias de composer

    composer install

Crea un .env o copialo del .env que viene por defecto

    cp .env.example .env

Genera un nuevo key de aplicacion

    php artisan key:generate

Crea una base de datos y configurala en tu punto env (yo uso Mysql)

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ptwoobsing
    DB_USERNAME=root
    DB_PASSWORD=

Corremos las migracions para el diagrama Entidad-Relacion con data factory (**Recuerda configurar la base de datos antes de migrar**)
    
    php artisan migrate --path=/database/migrations/ER/ --seed

Corre las migraciones restante para tabla users (**Debes correr la migracion anterior, ya que tienen dependencia**)

    php artisan migrate

En caso de querer migrar todo de nuevo
```
php artisan migrate:fresh --path=/database/migrations/ER/ --seed
php artisan migrate:fresh
```
Iniciar el servidor web local

    php artisan serve

puedes acceder en http://localhost:8000


# Resumen

## Dependencias

- [google2fa-laravel](https://github.com/antonioribeiro/google2fa-laravel) - Para autenticar con google authenticator
- [BaconQrCode](https://github.com/Bacon/BaconQrCode) - Para generar codigos QR

## Carpetas destacadas

- `app/Components/` - Contiene el componente de google authenticator
- `app/Http/Controllers/ER` - Contiene los controlladores relacionados con pregunta 1 modelo ER
- `app/Http/Repositories/ER` - Contiene los repositorios relacionados con pregunta 1 modelo ER, implementan una interfaz.
- `app/Providers/AppServiceProvider.php` - Contiene un singleton para google Authenticator, y un binding que puede cambiar el motor de busqueda (ELOQUENT o QueryBuilder)
- `app/Http/Middleware/Custom` - Contiene los middleware creados para la prueba
- `database/factories/ER` - Contiene un factory para autogenerar usuarios en la tabla usuarios
- `database/migrations/ER` - Contiene las migraciones relacionadas con pregunta 1 modelo ER
- `database/migrations` - Contiene las migraciones por defecto (se usa la migracion de la tabla users)
- `database/seeds/ER` - Contiene un seeder que alimenta las tablas roles y permisos
- `routes` - Todas las rutas se encuentran en web.php (contiene comentada las respuestas SQL. Las R(numero) identifica que respuesta de la prueba responde)


