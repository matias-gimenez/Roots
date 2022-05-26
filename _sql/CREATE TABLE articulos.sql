
DROP TABLE IF EXISTS `articulos`;
CREATE TABLE `articulos` (
  `id` int default NULL,
  `nombre` varchar(100) default NULL,
  `codrubro` int default NULL,
  `idmateriales` int default NULL,
  `precio` real default NULL,
  `stock` int default NULL,
  `fhcarga` datetime default NULL,
  `fhbaja` datetime default NULL,
  KEY `ind1` (`id`),
  KEY `ind2` (`nombre`)
);