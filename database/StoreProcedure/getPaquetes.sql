CREATE DEFINER=`root`@`localhost` PROCEDURE `getPaquetes`()
BEGIN
	
    #Verifico que existan paquetes en la base de datos
    if exists (select COUNT(idPaquete) FROM paquetes) > 0 then 
		select P. IdPaquete, P.nombrepaquete, P.megas, P.descripcion, C.Categoria, P.precio, P.descuento as 'Precio Con descuento', O.estado, O.Porcentaje from paquetes P inner join ofertas O on (P.idPaquete = O. idPaquete) 
		inner join categorias C on (P.idCategoria= C.idCategoria); 
	else 
		select -1; # no existen paquetes registrados
	end if;
END