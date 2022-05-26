
DELIMITER $$

DROP PROCEDURE IF EXISTS `traerrubro` $$
CREATE  PROCEDURE `traerrubro`()
BEGIN


  SELECT  id, descripcion
  FROM    codificadores
  WHERE   idcodificador=1
  AND     habilitado =2
  AND     fhbaja IS NULL
  ORDER BY descripcion;



END $$

DELIMITER ;