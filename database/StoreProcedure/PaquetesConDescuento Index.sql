CREATE DEFINER=`root`@`localhost` PROCEDURE `PaquetesConOferta`()
BEGIN
	select P.nombrepaquete, P.megas, P.descripcion, C.Categoria, P.precio, O.estado from paquetes P inner join ofertas O on (P.idPaquete = O. idPaquete) 
	inner join categorias C on (P.idCategoria= C.idCategoria);
END