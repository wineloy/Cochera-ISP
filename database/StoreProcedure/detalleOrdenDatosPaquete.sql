CREATE DEFINER=`root`@`localhost` PROCEDURE `detalleOrdenDatosPaquete`(
	in _idOferta integer
)
BEGIN

if exists (select 1 from ofertas where idOferta = _idOferta) = 1 then
	select P.nombrepaquete, P.megas, P.descuento from 
        paquetes P inner join ofertas O on (P.idPaquete = O. idPaquete)
        where idOferta = _idOferta;
	else 
		select -1; #No existe este paquete u oferta
end if;
END