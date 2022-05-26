
DROP TABLE IF EXISTS `codificadores`;
CREATE TABLE  `codificadores` (
  `id` int(11) default NULL,
  `idcodificador` int(11) default NULL,
  `descripcion` varchar(60)  default NULL,
  `fhcarga` datetime default NULL,
  `fhbaja` datetime default NULL,
  `habilitado` char(1) default NULL,
  KEY `indexc` (`id`)
) ;