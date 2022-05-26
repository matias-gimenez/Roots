DELIMITER $$

DROP PROCEDURE IF EXISTS `buscardatosarticulos` $$
CREATE PROCEDURE `buscardatosarticulos`(txdato VARCHAR(100))
BEGIN


SELECT  DISTINCT
        nombre,
        nombre nombre1,
        id

FROM    articulos
WHERE   fhbaja IS NULL
AND     nombre LIKE CONCAT('%',txdato,'%')
ORDER BY nombre;



END $$

DELIMITER ;