CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarPaquete`(
	in _idCategoria integer,
    in _nombrepaquete varchar(100),
    in _megas varchar(100),
    in _descripcion text,
    in imagen varchar (100),
    in precio decimal (10,2),
    in _porcentaje decimal(10,2)
)
BEGIN

	declare ultimoPaquete integer;
    start transaction;
		#inserto paquete 
		insert into paquetes () values (null, _idCategoria, _nombrepaquete, _megas, _descripcion, imagen, precio );
			#obtengo el ultimo ID generado 
			select idPaquete from paquetes order by idPaquete DESC LIMIT 1 INTO ultimoPaquete;
		#valido si el porcentaje es mayor a 0 
        #Estado 0 = false 1 = true; 
		if ( _porcentaje > 0) then  
			insert into ofertas() values (null, ultimoPaquete, _porcentaje, 1);
		else 
			insert into ofertas() values (null, ultimoPaquete, 0, 0);
		end if;
        commit;
END