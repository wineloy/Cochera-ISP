# Bienvenido a Cochera Internet

En esta rama de desarrollo se ven muestran todos los scripts de PHP y JavaScript necesarios para el funcionamiento del sistema web, se esta usando vainilla JS y PHP crudo y no se sigue un patrón arquitectónico, consideramos esta versión **MVP** es por lo tanto que si tiene exito en un futuro se migraría a un framework 

## Requerimientos mínimos

 - PHP version 7.4 | 8.0
 - Servidor MySQL o MariaDB  con soporte de procedimientos almacenados
 - Servidor Apache o Ngix 
 - Composer 2.* o superior 
 - Cliente MySQL (Workbench, phpmyadmin, CLI) 
 
 ## Instrucciones de Instalación 
 1. Clona el repositorio 
 2. Cambia de rama `master`a `php` 
 3. Ejecuta el comando `composer install`
 4. En el directorio `database` se encuentra un archivo llamado `database.sql` este archivo debera de ser importado por MySQL 
 5. En caso de que no se generaran los procedimientos almacenados, en directorio `database\StoreProcedure` encontraras todos los procedimientos almacenados
 ## Home page 
 ![Home page](https://raw.githubusercontent.com/wineloy/Cochera-ISP/master/images/screen-home.jpg)
 ## Diseño base de datos
 
![Diseño base de datos](https://raw.githubusercontent.com/wineloy/Cochera-ISP/php/database/DiagramDatabase.png)
