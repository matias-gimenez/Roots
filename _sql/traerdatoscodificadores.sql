
DELIMITER $$

DROP PROCEDURE IF EXISTS `traerdatoscodificadores` $$
CREATE PROCEDURE `traerdatoscodificadores`(nid int,nidcodificador int)
BEGIN

select id,idcodificador, descripcion,habilitado from codificadores where id = nid and idcodificador = nidcodificador order by id;


END $$

DELIMITER ;