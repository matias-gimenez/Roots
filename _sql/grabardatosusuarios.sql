DELIMITER $$

DROP PROCEDURE IF EXISTS `grabardatosusuarios` $$
CREATE PROCEDURE `grabardatosusuarios`(oper CHAR(1),nidusuario INT,txapellido VARCHAR(20),txnombres VARCHAR(20), txemail varchar(60),txpassword varchar(40),nhab int,nperfil int)
BEGIN

DECLARE sigusuario INT DEFAULT 0;
DECLARE mserror VARCHAR(255) DEFAULT '';



IF oper = 'A' THEN
  SELECT  MAX(idusuario) + 1 INTO sigusuario FROM usuarios;

  INSERT  usuarios
  SELECT  sigusuario, txnombres, txapellido ,txemail, nhab, txpassword, NOW(), nperfil, null;

  SET nidusuario = sigusuario;
END IF;


IF oper = 'M' THEN
  UPDATE  usuarios
  SET     apellido = txapellido,
          nombre = txnombres,
          email = txemail,
          habilitado = nhab,
          contrasenia = txpassword,
          perfil = nperfil
  WHERE   idusuario = nidusuario;
END IF;


IF oper = 'B' THEN
  UPDATE  usuarios
  SET     fhbaja = NOW()
  WHERE   idusuario = nidusuario;
END IF;

SELECT nidusuario idusuario,mserror;

END $$

DELIMITER ;