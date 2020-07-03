CREATE TABLE `clientes` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	`cliente` VARCHAR(100) NOT NULL COLLATE 'utf8_bin',
	`nif` BIGINT(20) UNSIGNED NOT NULL,
	`zona` VARCHAR(50) NOT NULL COLLATE 'utf8_bin',
	PRIMARY KEY (`id`),
	UNIQUE INDEX `id` (`id`)
)
COLLATE='utf8_bin'
ENGINE=InnoDB
AUTO_INCREMENT=35
;
CREATE TABLE `produtos` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	`tipo` VARCHAR(50) NOT NULL COLLATE 'utf8_bin',
	`marca` VARCHAR(50) NOT NULL COLLATE 'utf8_bin',
	`modelo` VARCHAR(50) NOT NULL COLLATE 'utf8_bin',
	`num_serie` VARCHAR(50) NOT NULL COLLATE 'utf8_bin',
	`cliente_id` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `id` (`id`),
	INDEX `cliente_id` (`cliente_id`),
	CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
)
COLLATE='utf8_bin'
ENGINE=InnoDB
AUTO_INCREMENT=25
;
CREATE TABLE `motivos` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	`motivo` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_bin',
	PRIMARY KEY (`id`),
	UNIQUE INDEX `id` (`id`)
)
COLLATE='utf8_bin'
ENGINE=InnoDB
AUTO_INCREMENT=12
;
CREATE TABLE `visitas` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	`cliente_id` BIGINT(20) UNSIGNED NOT NULL,
	`ult_vis` DATE NOT NULL,
	`motivo_id` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
	`prox_vis` DATE NOT NULL,
	`descricao` TEXT NOT NULL COLLATE 'utf8_bin',
	`tecnico` VARCHAR(50) NOT NULL COLLATE 'utf8_bin',
	`produto_id` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `id` (`id`),
	INDEX `FK_produtos_id` (`produto_id`),
	INDEX `FK_motivos_id` (`motivo_id`),
	INDEX `FK_clientes_id` (`cliente_id`),
	CONSTRAINT `FK_motivos_id` FOREIGN KEY (`motivo_id`) REFERENCES `motivos` (`id`) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT `FK_produtos_id` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
)
COLLATE='utf8_bin'
ENGINE=InnoDB
AUTO_INCREMENT=102
;
