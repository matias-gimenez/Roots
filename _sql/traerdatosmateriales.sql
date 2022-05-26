
DELIMITER $$

DROP PROCEDURE IF EXISTS `traerdatosmateriales` $$
CREATE PROCEDURE `traerdatosmateriales`(idmateriales int)

BEGIN


SELECT  id,
nombre,
color,
codtipo

FROM    materiales
WHERE   id = idmateriales;

END $$

DELIMITER ;