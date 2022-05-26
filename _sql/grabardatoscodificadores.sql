
DELIMITER $$

DROP PROCEDURE IF EXISTS `grabardatoscodificadores` $$
CREATE PROCEDURE `grabardatoscodificadores`(noper char(1),nid int,nidcodificador int,  txdescripcion varchar(60) ,nhabilitado int)
BEGIN

DECLARE sigcodificador INT DEFAULT 0;
DECLARE mserror VARCHAR(255) DEFAULT '';


IF noper = 'A' THEN
  SELECT  IFNULL(MAX(id),0) + 1 INTO sigcodificador FROM codificadores WHERE idcodificador = nidcodificador;

  INSERT  codificadores
  SELECT  sigcodificador, nidcodificador,txdescripcion , now(), null, nhabilitado;

  SET  nid = sigcodificador;
END IF;


IF noper = 'M' THEN
  UPDATE  codificadores
  SET     idcodificador = nidcodificador,
          descripcion = txdescripcion,
          habilitado = nhabilitado
  WHERE   idcodificador = nidcodificador
AND        id = nid;

END IF;


IF noper = 'B' THEN
  UPDATE  codificadores
  SET     fhbaja = now()
 WHERE   idcodificador = nidcodificador
AND        id = nid;
END IF;

SELECT nid,mserror;

END $$

DELIMITER ;