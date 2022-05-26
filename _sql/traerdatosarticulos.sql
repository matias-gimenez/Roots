
DELIMITER $$

DROP PROCEDURE IF EXISTS `traerdatosarticulos` $$
CREATE PROCEDURE `traerdatosarticulos`(articulosid int)
BEGIN


  SELECT  id, nombre, codrubro, idmateriales , precio, stock
  FROM    articulos
  WHERE   id= articulosid;



END $$

DELIMITER ;