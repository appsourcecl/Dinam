# Software de gestión para centros médicos

[![Laravel](https://img.shields.io/badge/Powered%20by-Laravel-orange.svg?style=flat)](https://www.laravel.com/)

Software médico de código libre para consultorios y clínicas. Organiza la agenda médica, historia clínica y administración en centros de atención.

## Requisitos del servidor
   - PHP >= 5.5.9
   - MySql 
   - Nginx o Apache Server
   - Composer 
   
## Instalación
   - Descargar el proyecto y crear un virtualhost en apache o una nueva configuración de servidor en nginx
   - Descargar las librerías necesarias  ejecutando "composer install" desde la raíz del proyecto
   - Configurar el archivo .env para la conexión de la base de datos (debe crear una base de datos en MySql)
   - Ejecutar el comando "php artisan migrate", para generar las entidades de la base de datos de manera automática
  
## Versión 1.0 
   - Ingresa pacientes, profesionales y especialidades
   - Realiza agenda de horas a profesionales

 

