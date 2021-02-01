# Bienvenido a Cochera Internet

En esta rama de desarrollo se muestran todos los scripts de PHP y JavaScript necesarios para el funcionamiento del sistema web, se esta usando vainilla JS y PHP crudo y no se sigue un patrón arquitectónico, consideramos esta versión **MVP** es por lo tanto que si tiene exito en un futuro se migraría a un framework 

## Requerimientos mínimos

 - PHP version 7.4 | 8.0
 - Servidor MySQL o MariaDB con soporte para procedimientos almacenados
 - Servidor Apache o Ngix 
 - Cliente MySQL (Workbench, phpmyadmin, CLI) 
 - Servidor con certificación SSL
 - Cuenta en Firebase para funciones de autentificación
 - Configuración de variables de entorno

 ## Instrucciones de Instalación 
 1. Clona el repositorio 
 2. Cambia de rama `master`a `AppDigital` 
 3. En el directorio `database` se encuentra un archivo llamado `database.sql` este archivo debera de ser importado por un cliente de MySQL. 
 4. En caso de que no se importaran los procedimientos almacenados con el script anterior, en el directorio `database\StoreProcedure` encontraras todos los procedimientos almacenados y podras generalos de manera manual.
 ## Home page 
 ![Home page](https://raw.githubusercontent.com/wineloy/Cochera-ISP/master/images/screen-home.jpg)

 ## Diseño base de datos
![Diseño base de datos](https://raw.githubusercontent.com/wineloy/Cochera-ISP/AppDigital/database/DiagramDatabase.png)

## Consideraciones diseño base de datos 
Para el correcto funcionamiento de las operaciones de la base de datos compruebe que todos los paquetes cuenten con una oferta ya que esta sera utilizada de referencia al momento de realizar las consultas, una vez que se haga esta tarea se tiene que ejecutar el scritp ubicado en `include\updatePaquetes.php` esto generara los precios y descuentos (Si la oferta tiene estado 0 quiere no se realizara descuento)
