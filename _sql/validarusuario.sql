
DELIMITER $$

DROP PROCEDURE IF EXISTS `validarusuario` $$
CREATE PROCEDURE `validarusuario`(opcion int, txemail VARCHAR(60), pass VARCHAR(20), olvido int)
BEGIN

DECLARE usuid SMALLINT DEFAULT 0;
DECLARE nomusuario VARCHAR(100) DEFAULT '';
DECLARE mensaje VARCHAR(100) DEFAULT '';
DECLARE txperfil VARCHAR(20) DEFAULT '';
DECLARE resp SMALLINT DEFAULT 0;

SET usuid = 0;
SET resp = 0;

IF txemail = '' then
  SET mensaje = 'INGRESAR EL EMAIL';
ELSE



  -- PARA LA ADMINISTRACION
  IF opcion IN (1,2) THEN


    SELECT idusuario,
          CASE
            WHEN perfil = 1 THEN 'ADMINISTRADOR'
            WHEN perfil = 2 THEN 'VENDEDOR'

          END
    INTO usuid,txperfil
    FROM usuarios WHERE email = txemail AND habilitado = 1 AND fhbaja IS NULL AND perfil = opcion;

    IF usuid = 0 then
      SET mensaje = "USUARIO INEXISTENTE";
    ELSE
      IF olvido = 1 THEN
          SET mensaje = "SE HA ENVIADO UN EMAIL A SU CUENTA PARA RENOVAR SU CLAVE";
          SET resp = -1;
      ELSE
        SELECT CONCAT(apellido,', ',nombre) INTO nomusuario FROM usuarios WHERE idusuario = usuid AND contrasenia = pass;

        IF nomusuario = '' then
          SET mensaje = "CLAVE INCORRECTA";
          SET usuid = 0;
        else
            SET mensaje = CONCAT(usuid,' - ',nomusuario);
            SET resp = 1;
        end IF;
      END IF;
    end IF;

  END IF;



END IF;


SELECT resp,usuid,mensaje,txperfil,txemail;

-- Logear el Acceso correcto

IF resp = 1 THEN
  INSERT log_accesos SELECT opcion, usuid, now();
END IF;


END $$

DELIMITER ;