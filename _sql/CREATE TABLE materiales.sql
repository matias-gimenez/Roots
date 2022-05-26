
DROP TABLE IF EXISTS `materiales`;
CREATE TABLE `materiales` (
  `id` int default NULL,
  `nombre` varchar(100) default NULL,
  `color` varchar(100) default NULL,
  `codtipo` int default NULL,
  `fhcarga` datetime default NULL,
  `fhbaja` datetime default NULL,
  KEY `ind1` (`id`),
  KEY `ind2` (`nombre`)
);