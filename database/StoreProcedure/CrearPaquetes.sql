CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearPaquetes`(
	in _idCategoria integer,
    in _nombrePaquete varchar(100),
    in _velocidad varchar(100), #megas
    in _descripcion text,
    in _imagen varchar(100),
    in precio decimal(10,2)
)
BEGIN
    declare paquete integer;
    start transaction;
		insert into paquetes() Values (null, _idCategoria,  _nombrePaquete, _velocidad,  _descripcion, _imagen, precio);
		select idPaquete from paquetes order by idPaquete desc limit 1 into paquete; #Tengo el ultimo registro de paquete
		insert into Ofertas() values(null, paquete, 0, 0); 
	commit;
END