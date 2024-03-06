# SIE API 1.0

## Descripción

Repositorio backend para el servicio API del proyecto SIE el cual es un proyecto formativo del programa de formación
ADSO.

## Directorios
```
sie-api/
├── app/
│   ├── Console/
│   ├── Exceptions/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   ├── Models/
│   └── Providers/
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeds/
├── public/
├── resources/
│   ├── js/
│   │   └── components/
│   ├── lang/
│   ├── sass/
│   └── views/
├── routes/
├── storage/
│   ├── app/
│   ├── framework/
│   └── logs/
├── tests/
├── vendor/
├── .env
├── .gitignore
├── artisan
├── composer.json
├── composer.lock
└── README.md
```

## Tecnologías

- Laravel [10]
- PHP [8.3]
- MySQL [8.0]
- Composer [2.1]

## Instalación

Sigue estos pasos para instalar y configurar el proyecto en tu entorno local:

1. Clona el repositorio:
   ```bash
   git clone https://github.com/rasoftdev/sie-api.git
2. Instala las dependencias del proyecto con composer:
   ```bash
   composer install
3. ICopia el archivo de configuración de ejemplo y configura tu entorno:
   ```bash
   cp .env.example .env
4. Genera la clave de aplicación:
   ```bash
   php artisan key:generate
5. Configura tu archivo .env con los datos de tu entorno local:
   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=sie_db
    DB_USERNAME=
    DB_PASSWORD=
6. Ejecuta las migraciones para crear las tablas en la base de datos:
    ```bash
   php artisan migrate --seed
7. Ejecuta el servidor de desarrollo o puedes crear un vhost personalizado para ejecutar el api:
   ```bash
    php artisan server

## Autores

- [@rasoftdev](https://www.github.com/rasoftdev)
- [@manuel01978](https://www.github.com/manuel01978)
