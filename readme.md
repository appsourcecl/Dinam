## Software de gestión para centros médicos

[![Laravel](https://img.shields.io/badge/Powered%20by-Laravel-orange.svg?style=flat)](https://www.laravel.com/)

Software médico de código libre para consultorios y clínicas. Organiza la agenda médica, historia clínica y administración en centros de atención.

# Requisitos del servidor
   - PHP >= 5.5.9
   - MySql 
   - Nginx o Apache Server
   - Composer 
   
# Instalación
   - Clonar o descargar el proyecto en el directorio del servidor web  (www, html, public, etc..) o crear un virtualhost en apache o una nueva configuración de servidor en nginx
   - Acceder a la raíz del proyecto y ejecutar "composer install" desde la consola (para descargar todas las librerías necesarias)
   - Configurar el archivo .env para la conexión de la base de datos (debe crear previamente una base de datos en MySql vacía)
   - Ejecutar el comando "php artisan migrate", para generar las entidades de la base de datos de manera automática
  
# Versión 1.0 
   - Ingresa pacientes, profesionales y especialidades
   - Realiza agenda de horas a profesionales

 

