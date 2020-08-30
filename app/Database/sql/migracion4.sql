-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.13-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla bd_control.abonos
DROP TABLE IF EXISTS `abonos`;
CREATE TABLE IF NOT EXISTS `abonos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cliente` int(11) NOT NULL,
  `cod_datos_banco` int(11) NOT NULL,
  `monto` double NOT NULL,
  `referencia` varchar(50) NOT NULL,
  `observaciones` varchar(500) NOT NULL DEFAULT '',
  `fecha_registro` datetime DEFAULT curtime(),
  `fecha_deposito` date DEFAULT NULL,
  `cod_datos_estado` int(11) DEFAULT 14,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_control.abonos: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `abonos` DISABLE KEYS */;
REPLACE INTO `abonos` (`id`, `cod_cliente`, `cod_datos_banco`, `monto`, `referencia`, `observaciones`, `fecha_registro`, `fecha_deposito`, `cod_datos_estado`) VALUES
  (1, 1, 11, 25000, 'AMZ328', 'PPPPP', '2020-08-29 18:35:06', NULL, 14),
  (2, 1, 11, 8000, 'AMZ328', 'OTRA OBSERVACION', '2020-08-29 18:35:29', NULL, 14),
  (3, 1, 12, 960200, '99585', 'TEST', '2020-08-29 18:51:17', '0000-00-00', 14),
  (4, 1, 12, 960200, '99585', 'TEST2', '2020-08-29 18:52:35', '1969-12-31', 14),
  (5, 1, 12, 9850, 'AMZ328', 'OBSAAAAA', '2020-08-29 18:55:44', '2019-08-29', 14),
  (6, 1, 13, 900, 'REF0002', 'PAPAPAPAPA', '2020-08-29 19:02:30', '2020-08-29', 14),
  (7, 1, 13, 900, 'REF0002', 'PAPAPAPAPA', '2020-08-29 19:03:18', '2020-08-29', 14);
/*!40000 ALTER TABLE `abonos` ENABLE KEYS */;

-- Volcando estructura para tabla bd_control.clasificacion
DROP TABLE IF EXISTS `clasificacion`;
CREATE TABLE IF NOT EXISTS `clasificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_control.clasificacion: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `clasificacion` DISABLE KEYS */;
REPLACE INTO `clasificacion` (`id`, `nombre`) VALUES
  (1, 'Sexo'),
  (2, 'Grupo Sanguineo'),
  (3, 'Bancos'),
  (4, 'Estado Deposito');
/*!40000 ALTER TABLE `clasificacion` ENABLE KEYS */;

-- Volcando estructura para tabla bd_control.clientes
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `nombres` varchar(70) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `direccion` varchar(300) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `cod_datos_sexo` int(11) NOT NULL,
  `cod_datos_grupo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='Nombres:\nApellidos:\nFecha de nacimiento:\nSexo:\nCédula:\nFoto del usuario:\nFoto de cédula:\nDirección: \nTeléfono:\nCorreo:\nContraseña:';

-- Volcando datos para la tabla bd_control.clientes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
REPLACE INTO `clientes` (`id`, `cod_usuario`, `cedula`, `nombres`, `apellidos`, `direccion`, `telefono`, `cod_datos_sexo`, `cod_datos_grupo`) VALUES
  (1, 1, '17783263', 'David', 'Dominguez', 'Jiron Bella Union 702', '073325816', 1, 0),
  (2, 2, '17783264', 'Deybal', 'Dominguez', 'Jiron Bella Union 702', '94452554', 1, 5);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla bd_control.datos
DROP TABLE IF EXISTS `datos`;
CREATE TABLE IF NOT EXISTS `datos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_clasificacion` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_control.datos: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `datos` DISABLE KEYS */;
REPLACE INTO `datos` (`id`, `cod_clasificacion`, `nombre`) VALUES
  (1, 1, 'Masculino'),
  (2, 1, 'Femenino'),
  (3, 2, 'O+'),
  (4, 2, 'O- '),
  (5, 2, 'A+'),
  (6, 2, 'A-'),
  (7, 2, 'B+'),
  (8, 2, 'B-'),
  (9, 2, 'AB+'),
  (10, 2, 'AB-'),
  (11, 3, 'Mercantil'),
  (12, 3, 'Venezuela'),
  (13, 3, 'Banesco'),
  (14, 4, 'Deposito por aprobar'),
  (15, 4, 'Deposito aprobado'),
  (16, 4, 'Deposito rechazado');
/*!40000 ALTER TABLE `datos` ENABLE KEYS */;

-- Volcando estructura para tabla bd_control.menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_padre` int(11) NOT NULL DEFAULT 0,
  `nombre` varchar(150) NOT NULL,
  `controller` varchar(150) NOT NULL,
  `metodo` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_control.menu: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
REPLACE INTO `menu` (`id`, `cod_padre`, `nombre`, `controller`, `metodo`) VALUES
  (1, 0, 'Maestros', '', ''),
  (2, 1, 'Usuarios', 'User', 'crear'),
  (3, 1, 'Clientes', 'Clientes', 'crear'),
  (4, 0, 'Movimientos', '', ''),
  (5, 0, 'Usuario', '', ''),
  (6, 5, 'Depositar', 'Clientes', 'depositar'),
  (7, 5, 'Mis Depositos', 'Clientes', 'misdepositos'),
  (8, 4, 'Bandeja de aprobacion depositos', 'AdminController', 'aprobarDepositos');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Volcando estructura para tabla bd_control.permisos
DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `cod_menu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_control.permisos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
REPLACE INTO `permisos` (`id`, `cod_usuario`, `cod_menu`) VALUES
  (1, 1, 1),
  (2, 1, 2),
  (3, 1, 3);
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;

-- Volcando estructura para tabla bd_control.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `clave` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla bd_control.users: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `clave`, `remember_token`, `created_at`, `updated_at`, `deleted`, `deleted_at`) VALUES
  (1, 'David Dominguez', 'davdomin@gmail.com', NULL, 'Tmp*1986', NULL, NULL, NULL, 0, NULL),
  (2, 'Deybal Dominguez', 'dominguezd@gmail.com', NULL, '1234', NULL, NULL, NULL, 0, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
