# Nombre del Proyecto

Breve descripción del proyecto y su propósito.

## Requisitos Previos

- PHP >= 7.3
- Composer
- Node.js y npm

## Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/tu-usuario/tu-repositorio.git
   cd tu-repositorio

2. Instala las dependencias de PHP:
    composer install

3. Copia el archivo de entorno y genera la clave de la aplicación:
    cp .env.example .env
    php artisan key:generate

4. Configura la base de datos en el archivo .env

5. Ejecuta las migraciones y los seeders:
    php artisan migrate 

6. Instala las dependencias de Node.js:
    npm install:

7. Compila los assets:
    npm run dev

8. Inicia el servidor de desarrollo:
    php artisan serve

