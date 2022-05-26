
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE  `usuarios` (
  `idusuario` int(11) default NULL,
  `nombre` varchar(50)  default NULL,
  `apellido` varchar(50)  default NULL,
  `email` varchar(100)  default NULL,
  `habilitado` smallint(6) default NULL,
  `contrasenia` varchar(20)  default NULL,
  `fhcarga` datetime default NULL,
  `perfil` int(11) default NULL,
  `fhbaja` datetime default NULL,
  KEY `ind1` (`idusuario`)
) ;