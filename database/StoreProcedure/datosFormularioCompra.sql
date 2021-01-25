CREATE DEFINER=`root`@`localhost` PROCEDURE `datosFormularioCompra`(
in _email varchar(250)
)
BEGIN
 if exists(select 1 from usuarios where email = _email ) = 1 then
	select C.nombre, C.apellidos, C.telefono, U.email from clientes C inner join usuarios U on (U.idCliente=C.idCliente)
    where U.email= _email LIMIT 1;
 else
	select -1 ;# no existe este correo;
 end if;
END