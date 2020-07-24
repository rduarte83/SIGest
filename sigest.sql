/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE TABLE IF NOT EXISTS `assistencias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_id` bigint(20) unsigned DEFAULT NULL,
  `produto_id` bigint(20) unsigned DEFAULT NULL,
  `data_p` datetime NOT NULL,
  `motivo` varchar(20) COLLATE utf8_bin NOT NULL,
  `local` varchar(50) COLLATE utf8_bin NOT NULL,
  `tecnico` varchar(20) COLLATE utf8_bin NOT NULL,
  `entregue` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `problema` text COLLATE utf8_bin NOT NULL,
  `data_i` datetime DEFAULT NULL,
  `resolucao` text COLLATE utf8_bin,
  `obs` text COLLATE utf8_bin,
  `material` text COLLATE utf8_bin,
  `tempo` tinyint(3) unsigned DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8_bin DEFAULT 'Não Resolvido',
  `facturado` varchar(20) COLLATE utf8_bin DEFAULT 'Não',
  `factura` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `produto_id` (`produto_id`),
  CONSTRAINT `assistencias_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`nif`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `assistencias_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE IF NOT EXISTS `clientes` (
  `nif` bigint(20) unsigned NOT NULL,
  `id` bigint(20) unsigned DEFAULT NULL,
  `cliente` varchar(100) COLLATE utf8_bin NOT NULL,
  `morada` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `zona` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `responsavel` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `contacto` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`nif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE IF NOT EXISTS `contagens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contrato_id` bigint(20) unsigned NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `ult_p` int(11) DEFAULT '0',
  `ult_c` int(11) DEFAULT '0',
  `ult_data` date DEFAULT NULL,
  `act_p` int(11) DEFAULT '0',
  `act_c` int(11) DEFAULT '0',
  `act_data` date DEFAULT NULL,
  `facturar` float DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `contrato_id` (`contrato_id`),
  CONSTRAINT `contagens_ibfk_1` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE IF NOT EXISTS `contratos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_id` bigint(20) unsigned NOT NULL,
  `produto` bigint(20) unsigned NOT NULL,
  `inicio` date NOT NULL,
  `fim` date NOT NULL,
  `tipo` varchar(20) COLLATE utf8_bin NOT NULL,
  `valor` int(11) NOT NULL DEFAULT '0',
  `inc` int(11) NOT NULL,
  `preco_p` decimal(5,4) NOT NULL,
  `preco_c` decimal(5,4) DEFAULT '0.0000',
  `facturar` float DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `produto` (`produto`),
  CONSTRAINT `contratos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`nif`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `contratos_ibfk_2` FOREIGN KEY (`produto`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE IF NOT EXISTS `motivos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `motivo` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) COLLATE utf8_bin NOT NULL,
  `marca` varchar(50) COLLATE utf8_bin NOT NULL,
  `modelo` varchar(50) COLLATE utf8_bin NOT NULL,
  `num_serie` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `cliente_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`nif`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE IF NOT EXISTS `software` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cliente` varchar(255) COLLATE utf8_bin NOT NULL,
  `sw` varchar(20) COLLATE utf8_bin NOT NULL,
  `contrato` varchar(50) COLLATE utf8_bin NOT NULL,
  `valor` float NOT NULL DEFAULT '0',
  `period` varchar(50) COLLATE utf8_bin NOT NULL,
  `data` date NOT NULL,
  `modulos` varchar(50) COLLATE utf8_bin NOT NULL,
  `postos` int(1) DEFAULT '0',
  `estado` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE IF NOT EXISTS `visitas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_id` bigint(20) unsigned DEFAULT NULL,
  `ult_vis` date NOT NULL,
  `motivo_id` bigint(20) unsigned DEFAULT NULL,
  `prox_vis` date NOT NULL,
  `descricao` text COLLATE utf8_bin NOT NULL,
  `vendedor` varchar(50) COLLATE utf8_bin NOT NULL,
  `produto_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `motivo_id` (`motivo_id`),
  KEY `produto_id` (`produto_id`),
  CONSTRAINT `visitas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`nif`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `visitas_ibfk_2` FOREIGN KEY (`motivo_id`) REFERENCES `motivos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `visitas_ibfk_3` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
