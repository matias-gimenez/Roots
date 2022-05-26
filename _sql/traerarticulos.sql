
DELIMITER $$

DROP PROCEDURE IF EXISTS `traerarticulos` $$
CREATE  PROCEDURE `traerarticulos`(nidarticulos int)
BEGIN


  SELECT  id, nombre
  FROM    articulos
  WHERE   id= nidarticulos
  AND     fhbaja IS NULL ;



END $$

DELIMITER ;