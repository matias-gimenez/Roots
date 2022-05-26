DELIMITER $$

DROP PROCEDURE IF EXISTS `traerusuarios_lista` $$
CREATE PROCEDURE `traerusuarios_lista`(txbusq VARCHAR(10), txnombre VARCHAR(40))
BEGIN


IF txbusq = "por_nombre" THEN

  SELECT idusuario id,
          CONCAT(apellido,', ',nombre) nombre,
          CASE
            WHEN perfil = 1 THEN 'ADMINISTRADOR'
            WHEN perfil = 2 THEN 'VENDEDOR'
          END nivel,
          email
  FROM    usuarios
  WHERE   (apellido like CONCAT('%',txnombre,'%') OR nombre like CONCAT('%',txnombre,'%'))
  AND     fhbaja IS NULL
  ORDER BY CONCAT(apellido,', ',nombre);

ELSE
   SELECT idusuario id,
          CONCAT(apellido,', ',nombre) nombre,
          CASE
            WHEN perfil = 1 THEN 'ADMINISTRADOR'
            WHEN perfil = 2 THEN 'VENDEDOR'
          END nivel,
          email
  FROM    usuarios
  WHERE     fhbaja IS NULL
  ORDER BY CONCAT(apellido,', ',nombre);

END IF;

END $$

DELIMITER ;
