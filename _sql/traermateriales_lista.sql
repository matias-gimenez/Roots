DELIMITER $$

DROP PROCEDURE IF EXISTS `traermateriales_lista` $$
CREATE PROCEDURE `traermateriales_lista`(txbusq VARCHAR(10), txnombre VARCHAR(40))
BEGIN


IF txbusq = "por_nombre" THEN

  SELECT  id,
          nombre,
          color
  FROM    materiales
  WHERE   nombre like CONCAT('%',txnombre,'%')
  AND     fhbaja IS NULL
  ORDER BY nombre;

ELSE

  SELECT id,
          nombre,
          color
  FROM    materiales
  WHERE   fhbaja IS NULL
  ORDER BY nombre;

END IF;



END $$

DELIMITER ;