DELIMITER $$

DROP PROCEDURE IF EXISTS `grabardatosmateriales` $$
CREATE PROCEDURE `grabardatosmateriales`(
  oper CHAR(1),
  idmateriales INT,
  txnombre VARCHAR(100),
  txcolor VARCHAR(200),
  incodtipo VARCHAR(60)
 )
BEGIN

DECLARE sigmaterial INT DEFAULT 0;
DECLARE msg_error VARCHAR(255) DEFAULT '';


IF oper = 'A' THEN
  SELECT  IFNULL(MAX(id),0) + 1 INTO sigmaterial FROM materiales;

  IF EXISTS (SELECT * FROM materiales WHERE nombre = txnombre AND color = txcolor AND codtipo = incodtipo AND fhbaja IS NULL) THEN
    SET msg_error = 'Ya existe el material.';
  ELSE
    INSERT  materiales
    SELECT  sigmaterial, txnombre, txcolor, incodtipo, now(), null;

    SET idmateriales = sigmaterial;
  END IF;
END IF;


IF oper = 'M' THEN
  UPDATE  materiales
  SET     nombre = txnombre,
          color  = txcolor,
          codtipo  = incodtipo


  WHERE   id = idmateriales;
END IF;


IF oper = 'B' THEN
  UPDATE  materiales
  SET     fhbaja = now()
  WHERE   id = idmateriales;
END IF;

SELECT idmateriales,msg_error;

END $$

DELIMITER ;