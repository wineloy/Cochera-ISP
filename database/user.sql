# Usuario de Mysql 
USE MYSQL;

CREATE USER 'wineloy'@'%' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON *.* TO 'wineloy'@'%';

# Este usuario es necesario para realizar consultas desde fuera del servidor
# para mysql 8
ALTER USER 'wineloy' IDENTIFIED WITH mysql_native_password BY '123456';