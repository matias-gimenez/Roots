
DELIMITER $$

DROP PROCEDURE IF EXISTS `traerarticulos_lista` $$
CREATE PROCEDURE `traerarticulos_lista`(nidarticulos INT)
BEGIN

	IF nidarticulos > 0 THEN

	  SELECT  a.id,
			  a.nombre, c.descripcion, a.precio,
			  a.stock
	  FROM    articulos a, codificadores c
	  WHERE   a.id = nidarticulos
	  AND     a.codrubro = p.id
	  AND     a.fhbaja IS NULL
	  AND     c.fhbaja IS NULL
	  ORDER BY a.nombre;

	ELSE

	  SELECT a.id,
			  a.nombre, c.descripcion, a.precio,
			  a.stock
	  FROM    articulos a,codificadores c
	  WHERE   a.codrubro = c.id
	  AND     a.fhbaja IS NULL
	  AND     c.fhbaja IS NULL
	  ORDER BY a.nombre;
	  
	END IF;

END $$

DELIMITER ;