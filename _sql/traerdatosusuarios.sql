
DELIMITER $$

DROP PROCEDURE IF EXISTS `traerdatosusuarios` $$
CREATE PROCEDURE `traerdatosusuarios`(usuarioid int, txperfil VARCHAR(40))
BEGIN

IF txperfil IN ('','ADMINISTRADOR','VENDEDOR') THEN
  SELECT  idusuario id, apellido, nombre nombres, email, contrasenia, habilitado, perfil, MD5(contrasenia) clave
  FROM    usuarios
  WHERE   idusuario = usuarioid;
END IF;

END $$

DELIMITER ;