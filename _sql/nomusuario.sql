DELIMITER $$

DROP PROCEDURE IF EXISTS `nomusuario` $$
CREATE PROCEDURE `nomusuario`(userid smallint, txperfil VARCHAR(40))
BEGIN

DECLARE usuario VARCHAR(100) DEFAULT '';
DECLARE fechabk VARCHAR(20) DEFAULT '00/00/0000';


IF txperfil IN ('ADMINISTRADOR') THEN
  SELECT CONCAT('BIENVENIDO ',apellido,', ',nombre) INTO usuario FROM usuarios WHERE idusuario = userid;
END IF;

IF txperfil IN ('VENDEDOR') THEN
  SELECT CONCAT('BIENVENIDO ',apellido,', ',nombre),nombre INTO usuario FROM usuarios WHERE idusuario = userid;
END IF;

SELECT usuario,fechabk;

END $$

DELIMITER ;