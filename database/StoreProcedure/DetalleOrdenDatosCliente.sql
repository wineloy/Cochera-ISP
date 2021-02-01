CREATE DEFINER=`root`@`localhost` PROCEDURE `DetalleOrdenDatosCliente`(
	in _email varchar(250)
)
BEGIN
	if exists (select 1 from usuarios where email = _email) = 1 then 
	select C.nombre, C.apellidos, C.telefono, D.Direccion, D.referencia, D.numero, D.localidad
		from direcciones D inner join clientes C on (D.idCliente = C.idCliente) inner join usuarios U on (C.idCliente = U.idCliente) 
		where U.email = _email;
	else
		select -1; # no existe este usuario
	end if;
END