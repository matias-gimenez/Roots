DELIMITER $$

DROP PROCEDURE IF EXISTS `grabardatosarticulos` $$
CREATE  PROCEDURE `grabardatosarticulos`(

  oper 			       CHAR(1),
  idarticulos      INT,
  txnombre         VARCHAR(100),
  ncodrubro        INT,
  ncodmateriales   INT,
  nprecio          REAL,
  nstock           INT
 )
BEGIN

DECLARE sigarticulos INT DEFAULT 0;
DECLARE msg_error VARCHAR(255) DEFAULT '';


IF oper = 'A' THEN
  SELECT  IFNULL(MAX(id),0) + 1 INTO sigarticulos FROM articulos;

  IF EXISTS (SELECT * FROM articulos WHERE nombre = txnombre AND fhbaja IS NULL) THEN
    SET msg_error = 'Ya existe un articulo con el mismo nombre.';
  ELSE
    INSERT  articulos
    SELECT  sigarticulos, txnombre , ncodrubro, ncodmateriales, nprecio, nstock, now(),null;

    SET idarticulos = sigarticulos;
  END IF;
END IF;


IF oper = 'M' THEN
    UPDATE  articulos
    SET
      nombre  	   = txnombre,	
      codrubro     = ncodrubro,
		  idmateriales = ncodrubro,
		  precio       = nprecio,
      stock        = nstock
      WHERE   id = idarticulos;
END IF;

IF oper = 'B' THEN
  UPDATE  articulos
  SET     fhbaja = now()
  WHERE   id = idarticulos;
END IF;

SELECT idarticulos,msg_error;

END $$

DELIMITER ;