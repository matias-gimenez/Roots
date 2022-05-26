
DELIMITER $$

DROP PROCEDURE IF EXISTS `traercodificadores_lista` $$
CREATE PROCEDURE `traercodificadores_lista`(txbusq varchar (10), ncodificador int)
BEGIN

IF txbusq = "por_filtro" THEN
  SELECT  id,
          idcodificador,
          descripcion

  FROM    codificadores
  WHERE   fhbaja is null
  AND     ncodificador like idcodificador
  ORDER BY descripcion;
END IF;


END $$

DELIMITER ;