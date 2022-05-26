
DELIMITER $$

DROP PROCEDURE IF EXISTS `buscardatosmateriales` $$
CREATE PROCEDURE `buscardatosmateriales`(txdato VARCHAR(100))
BEGIN


SELECT  DISTINCT
        nombre,
        nombre nombre1,
        id

FROM    materiales
WHERE   fhbaja IS NULL
AND     nombre LIKE CONCAT('%',txdato,'%')
ORDER BY nombre;



END $$

DELIMITER ;