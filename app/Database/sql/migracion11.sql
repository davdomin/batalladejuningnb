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
  `cod_datos_estado` int(11) DEFAULT 14,
  `monto` double NOT NULL,
  `referencia` varchar(50) NOT NULL,
  `observaciones` varchar(500) NOT NULL DEFAULT '',
  `fecha_registro` datetime DEFAULT curtime(),
  `fecha_deposito` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_control.abonos: ~25 rows (aproximadamente)
/*!40000 ALTER TABLE `abonos` DISABLE KEYS */;
REPLACE INTO `abonos` (`id`, `cod_cliente`, `cod_datos_banco`, `cod_datos_estado`, `monto`, `referencia`, `observaciones`, `fecha_registro`, `fecha_deposito`) VALUES
	(1, 1, 11, 16, 25000, 'AMZ328', 'PPPPP', '2020-08-29 18:35:06', NULL),
	(2, 1, 11, 16, 8000, 'AMZ328', 'OTRA OBSERVACION', '2020-08-29 18:35:29', NULL),
	(3, 1, 12, 15, 960200, '99585', 'TEST', '2020-08-29 18:51:17', '0000-00-00'),
	(4, 1, 12, 15, 960200, '99585', 'TEST2', '2020-08-29 18:52:35', '1969-12-31'),
	(5, 1, 12, 16, 9850, 'AMZ328', 'OBSAAAAA', '2020-08-29 18:55:44', '2019-08-29'),
	(6, 1, 13, 15, 900, 'REF0002', 'PAPAPAPAPA', '2020-08-29 19:02:30', '2020-08-29'),
	(7, 1, 13, 16, 900, 'REF0002', 'PAPAPAPAPA', '2020-08-29 19:03:18', '2020-08-29'),
	(8, 3, 11, 15, 900, 'AMZ789', 'Dacli hablo', '2020-08-30 15:20:02', '2020-08-30'),
	(9, 3, 11, 15, 900, '', 'test2', '2020-08-30 15:22:43', '2020-08-30'),
	(10, 1, 0, 18, -55400, 'retiro', '-', '2020-09-06 08:49:59', '2020-09-06'),
	(11, 1, 0, 18, -1500, 'retiro', '-', '2020-09-06 08:54:55', '2020-09-06'),
	(12, 1, 0, 18, -500, 'retiro', '-', '2020-09-06 08:55:06', '2020-09-06'),
	(13, 1, 0, 18, -3000, 'retiro', 'Para la separación', '2020-09-06 12:06:15', '2020-09-06'),
	(14, 1, 0, 18, -3000, 'retiro', 'Para la separación', '2020-09-06 12:06:15', '2020-09-06'),
	(15, 1, 0, 18, -1, 'retiro', 'Saco un sol', '2020-09-06 12:24:19', '2020-09-06'),
	(16, 1, 0, 18, -1, 'retiro', 'Saco un sol', '2020-09-06 12:24:19', '2020-09-06'),
	(17, 1, 0, 18, -1, 'retiro', '1 SOL', '2020-09-06 12:25:37', '2020-09-06'),
	(18, 1, 0, 18, -1, 'retiro', '1 SOL', '2020-09-06 12:25:37', '2020-09-06'),
	(19, 1, 0, 18, 0, 'retiro', 'AAA', '2020-09-06 12:26:50', '2020-09-06'),
	(20, 1, 0, 18, -12, 'retiro', 'DOCE', '2020-09-06 17:06:17', '2020-09-06'),
	(21, 1, 12, 15, 900, 'AMX1234', 'OBSERVACOION', '2020-09-06 17:40:08', '2020-09-06'),
	(22, 1, 12, 15, 900, 'AMX1234', 'OBSERVACOION', '2020-09-06 17:40:08', '2020-09-06'),
	(23, 1, 12, 16, 9000, '900', 'NUEVE LUCAS', '2020-09-06 17:42:40', '2020-09-06'),
	(24, 1, 12, 15, 9000, '900', 'NUEVE LUCAS', '2020-09-06 17:42:40', '2020-09-06'),
	(25, 1, 12, 15, 1500, 'REDF999', 'AAAA', '2020-09-06 17:43:56', '2020-09-06'),
	(26, 1, 12, 15, 900, 'AAA', 'CCCCC', '2020-09-06 17:46:14', '2020-09-06'),
	(27, 1, 0, 18, -84, 'retiro', 'DDDDD', '2020-09-13 18:03:54', '2020-09-13'),
	(28, 0, 12, 14, 1111, 'AMZ789', '333333', '2020-09-20 13:49:25', '2020-09-20'),
	(29, 1, 11, 14, 9999, 'AAAA', '88888', '2020-09-20 14:02:12', '2020-09-20'),
	(30, 1, 11, 15, 112, 'AAAA', 'AAAAA', '2020-09-20 14:06:12', '2020-09-20');
/*!40000 ALTER TABLE `abonos` ENABLE KEYS */;

-- Volcando estructura para tabla bd_control.clasificacion
DROP TABLE IF EXISTS `clasificacion`;
CREATE TABLE IF NOT EXISTS `clasificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `key_value` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_control.clasificacion: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `clasificacion` DISABLE KEYS */;
REPLACE INTO `clasificacion` (`id`, `nombre`, `key_value`) VALUES
	(1, 'Sexo', NULL),
	(2, 'Grupo Sanguineo', NULL),
	(3, 'Bancos', NULL),
	(4, 'Estado Deposito', NULL),
	(5, 'Correo Administrador', 'MAIL_ADMIN'),
	(6, 'Grado de  Jerarquia', NULL),
	(7, 'Estados de Venezuela', NULL),
	(8, 'Cargo', NULL),
	(9, 'Grado de instrucción', NULL),
	(10, 'Talla Camisa', NULL),
	(11, 'Talla Pantalon', NULL),
	(12, 'Talla Calzado', NULL),
	(13, 'Talla Gorra', NULL),
	(14, 'Estado Civil', NULL);
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
  `cod_datos_sexo` int(11) DEFAULT NULL,
  `cod_datos_grupo` int(11) DEFAULT NULL,
  `cod_datos_jerarquia` int(11) DEFAULT NULL,
  `cod_datos_lugar_nac` int(11) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `telefono_fijo` varchar(50) DEFAULT NULL,
  `cod_datos_cargo` int(11) DEFAULT NULL,
  `cod_datos_grado` int(11) DEFAULT NULL,
  `especialidad` varchar(50) DEFAULT NULL,
  `unidad` varchar(150) DEFAULT NULL,
  `fecha_asc` date DEFAULT NULL,
  `estatura` float DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `cod_datos_camisa` int(11) DEFAULT NULL,
  `cod_datos_pantalon` int(11) DEFAULT NULL,
  `cod_datos_calzado` int(11) DEFAULT NULL,
  `cod_datos_gorra` int(11) DEFAULT NULL,
  `cod_datos_estado_civil` int(11) DEFAULT NULL,
  `conyuge` varchar(200) DEFAULT NULL,
  `padre` varchar(200) DEFAULT NULL,
  `madre` varchar(200) DEFAULT NULL,
  `direccion_emergencia` varchar(500) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COMMENT='Nombres:\nApellidos:\nFecha de nacimiento:\nSexo:\nCédula:\nFoto del usuario:\nFoto de cédula:\nDirección: \nTeléfono:\nCorreo:\nContraseña:';

-- Volcando datos para la tabla bd_control.clientes: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
REPLACE INTO `clientes` (`id`, `cod_usuario`, `cedula`, `nombres`, `apellidos`, `direccion`, `telefono`, `cod_datos_sexo`, `cod_datos_grupo`, `cod_datos_jerarquia`, `cod_datos_lugar_nac`, `fecha_nac`, `telefono_fijo`, `cod_datos_cargo`, `cod_datos_grado`, `especialidad`, `unidad`, `fecha_asc`, `estatura`, `peso`, `cod_datos_camisa`, `cod_datos_pantalon`, `cod_datos_calzado`, `cod_datos_gorra`, `cod_datos_estado_civil`, `conyuge`, `padre`, `madre`, `direccion_emergencia`, `foto`) VALUES
	(1, 1, '17783263', 'David', 'Dominguez', 'Jiron Bella Union 702', '073325816', 1, 3, 20, 27, '1986-01-18', '949404876', 46, 49, 'Desarrrollo de software', 'Unidad', '2020-10-28', 1.81, 100, 52, 56, 67, 72, 74, 'Shirley Hernandez', 'Dimas Dominguez', 'Suly Rojas', 'Jiron Bella Union 702', '1601856303_9e1a3e774dcd9d43e0ff.jpg'),
	(2, 2, '17783264', 'Deybal', 'Dominguez', 'Jiron Bella Union 702', '94452554', 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 3, '7386', 'Mario', 'Antequera', 'Bqto', '99999', 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 4, '1111', 'Ale', 'Domin', '9999', 'dddd', 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 5, '17783269', 'edwin', 'algar', 'las tunaas', '111', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla bd_control.clientes_hijos
DROP TABLE IF EXISTS `clientes_hijos`;
CREATE TABLE IF NOT EXISTS `clientes_hijos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cliente` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `fecha_nac` date DEFAULT NULL,
  `cod_datos_sexo` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_control.clientes_hijos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes_hijos` DISABLE KEYS */;
REPLACE INTO `clientes_hijos` (`id`, `cod_cliente`, `nombre`, `fecha_nac`, `cod_datos_sexo`, `deleted`) VALUES
	(1, 1, 'Sharon Sofia', '2020-10-29', 2, 0),
	(2, 1, 'David Alejandro', '2020-10-19', 1, 0),
	(3, 1, 'AAAA', '2020-10-29', 1, 1);
/*!40000 ALTER TABLE `clientes_hijos` ENABLE KEYS */;

-- Volcando estructura para tabla bd_control.datos
DROP TABLE IF EXISTS `datos`;
CREATE TABLE IF NOT EXISTS `datos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_clasificacion` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_control.datos: ~74 rows (aproximadamente)
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
	(16, 4, 'Deposito rechazado'),
	(17, 5, 'marioantequera@gmail.com'),
	(18, 4, 'Retiro Completado'),
	(19, 6, 'Cabo'),
	(20, 6, 'Teniente'),
	(21, 6, 'Sargento'),
	(22, 7, 'Amazonas'),
	(23, 7, 'Anzoátegui'),
	(24, 7, 'Apure'),
	(25, 7, 'Aragua'),
	(26, 7, 'Barinas'),
	(27, 7, 'Lara'),
	(28, 7, 'Distrito Capital'),
	(29, 7, 'Bolívar'),
	(30, 7, 'Carabobo'),
	(31, 7, 'Cojedes'),
	(32, 7, 'Delta Amacuro'),
	(33, 7, 'Falcón'),
	(34, 7, 'Guárico'),
	(35, 7, 'Mérida'),
	(36, 7, 'Miranda'),
	(37, 7, 'Monagas'),
	(38, 7, 'Nueva Esparta'),
	(39, 7, 'Portuguesa'),
	(40, 7, 'Táchira'),
	(41, 7, 'Trujillo'),
	(42, 7, 'Vargas'),
	(43, 7, 'Yaracuy'),
	(44, 7, 'Zulia'),
	(45, 8, 'Cargo1'),
	(46, 8, 'Cargo2'),
	(47, 9, 'Bachiller'),
	(48, 9, 'Tecnico'),
	(49, 9, 'Universitario'),
	(50, 10, 'S'),
	(51, 10, 'M'),
	(52, 10, 'L'),
	(53, 10, 'XL'),
	(54, 11, '34'),
	(55, 11, '36'),
	(56, 11, '38'),
	(57, 12, '30'),
	(58, 12, '32'),
	(59, 12, '34'),
	(60, 12, '36'),
	(61, 12, '38'),
	(62, 12, '39'),
	(63, 12, '40'),
	(64, 12, '41'),
	(65, 12, '42'),
	(66, 12, '43'),
	(67, 12, '44'),
	(68, 12, '45'),
	(69, 13, 'S'),
	(70, 13, 'M'),
	(71, 13, 'L'),
	(72, 13, 'XXL'),
	(73, 14, 'Soltero'),
	(74, 14, 'Casado'),
	(75, 14, 'Divorciado'),
	(76, 14, 'Viudo');
/*!40000 ALTER TABLE `datos` ENABLE KEYS */;

-- Volcando estructura para tabla bd_control.menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_padre` int(11) NOT NULL DEFAULT 0,
  `nombre` varchar(150) NOT NULL,
  `controller` varchar(150) NOT NULL,
  `metodo` varchar(150) NOT NULL,
  `deleted` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_control.menu: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
REPLACE INTO `menu` (`id`, `cod_padre`, `nombre`, `controller`, `metodo`, `deleted`) VALUES
	(1, 0, 'Maestros', '', '', 0),
	(2, 1, 'Usuarios', 'User', 'crear', 0),
	(3, 1, 'Clientes', 'Clientes', 'crear', 1),
	(4, 0, 'Movimientos', '', '', 0),
	(5, 0, 'Usuario', '', '', 0),
	(6, 5, 'Depositar', 'Clientes', 'depositar', 0),
	(7, 5, 'Mis movimientos', 'Clientes', 'misdepositos', 0),
	(8, 4, 'Aprobacion depositos', 'AdminController', 'aprobarDepositos', 0),
	(9, 4, 'Retirar', 'Clientes', 'retirar', 0),
	(10, 5, 'Actualizar Datos', 'Clientes', 'actualizar', 0),
	(11, 5, 'Cerrar sesión', 'user', 'cerrarSesion', 0),
	(12, 5, 'Subir Foto', 'User', 'subirFoto', 0);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Volcando estructura para tabla bd_control.perfiles
DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE IF NOT EXISTS `perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_control.perfiles: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
REPLACE INTO `perfiles` (`id`, `nombre`) VALUES
	(1, 'Visitante'),
	(2, 'Administrador'),
	(3, 'Usuario');
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;

-- Volcando estructura para tabla bd_control.perfil_menu
DROP TABLE IF EXISTS `perfil_menu`;
CREATE TABLE IF NOT EXISTS `perfil_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_perfil` int(11) NOT NULL,
  `cod_menu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_control.perfil_menu: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `perfil_menu` DISABLE KEYS */;
REPLACE INTO `perfil_menu` (`id`, `cod_perfil`, `cod_menu`) VALUES
	(1, 2, 1),
	(2, 2, 2),
	(3, 2, 3),
	(4, 2, 4),
	(5, 2, 5),
	(6, 2, 6),
	(7, 2, 7),
	(8, 2, 8),
	(9, 2, 9),
	(10, 2, 10),
	(11, 2, 11),
	(12, 3, 5),
	(13, 3, 6),
	(14, 3, 7),
	(15, 3, 10),
	(16, 3, 11),
	(17, 2, 12),
	(18, 3, 12);
/*!40000 ALTER TABLE `perfil_menu` ENABLE KEYS */;

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
  `cod_perfil` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla bd_control.users: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `clave`, `remember_token`, `created_at`, `updated_at`, `deleted`, `deleted_at`, `cod_perfil`) VALUES
	(1, 'David Dominguez', 'davdomin@gmail.com', NULL, 'Tmp*1986', NULL, NULL, NULL, 0, NULL, 2),
	(2, 'Deybal Dominguez', 'dominguezd@gmail.com', NULL, '1234', NULL, NULL, NULL, 0, NULL, 2),
	(3, 'Mario Antequera', 'marioantequera@gmail.com', '2020-09-20 13:34:35', '1234', NULL, NULL, NULL, 0, NULL, 2),
	(4, 'Ale Domin', 'davadomin@gmail.com', NULL, '111111', NULL, NULL, NULL, 0, NULL, 3),
	(5, 'edwin algar', 'davdomin+1@gmail.com', NULL, '123', NULL, NULL, NULL, 0, NULL, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
