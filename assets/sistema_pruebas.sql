-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2015 a las 22:59:40
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistema_pruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajusteinventario`
--

CREATE TABLE IF NOT EXISTS `ajusteinventario` (
  `Id` int(12) NOT NULL,
  `Fecha` date NOT NULL,
  `Descripcion` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `CodBodega` int(12) NOT NULL,
  `campo2` int(12) NOT NULL,
  `campo3` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, '', NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE IF NOT EXISTS `bodega` (
  `CodBodega` varchar(10) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Estatus` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodegarticulo`
--

CREATE TABLE IF NOT EXISTS `bodegarticulo` (
  `CodBodega` varchar(10) NOT NULL,
  `CodProducto` varchar(10) NOT NULL,
  `Cantidad` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `CodCliente` varchar(10) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Estatus` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`CodCliente`, `Descripcion`, `Direccion`, `Telefono`, `Estatus`) VALUES
('090128095', 'Yordano Ceballos', 'Portugal 981, Coquimbo con Portugal', '990445612', '1'),
('19177580', 'Yerffrey Romero', 'Calle San Diego 161 Edif. Panorama', '990924462', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `NumCompra` varchar(10) NOT NULL,
  `CodProveedor` varchar(10) NOT NULL,
  `Bodega` varchar(10) NOT NULL,
  `Fecha` date NOT NULL,
  `Vencimiento` date NOT NULL,
  `ForPago` varchar(10) NOT NULL,
  `TotExento` decimal(10,0) NOT NULL,
  `TotDescuento` decimal(10,0) NOT NULL,
  `TotNeto` decimal(10,0) NOT NULL,
  `TotIva` decimal(10,0) NOT NULL,
  `TotImpuesto` decimal(10,0) NOT NULL,
  `TotRetencion` decimal(10,0) NOT NULL,
  `Total` decimal(10,0) NOT NULL,
  `CanComprado` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`NumCompra`, `CodProveedor`, `Bodega`, `Fecha`, `Vencimiento`, `ForPago`, `TotExento`, `TotDescuento`, `TotNeto`, `TotIva`, `TotImpuesto`, `TotRetencion`, `Total`, `CanComprado`) VALUES
('1', '101', '1', '2015-07-15', '2015-07-15', 'Efectivo', '1239', '0', '1239', '12', '15', '0', '1590', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra`
--

CREATE TABLE IF NOT EXISTS `detallecompra` (
  `Item` int(11) NOT NULL,
  `NumCompra` varchar(10) NOT NULL,
  `CodProducto` varchar(10) NOT NULL,
  `Cantidad` decimal(10,0) NOT NULL,
  `Precio` decimal(10,0) NOT NULL,
  `UniMedida` varchar(10) NOT NULL,
  `Descuento` decimal(10,0) NOT NULL,
  `Exento` decimal(10,0) NOT NULL,
  `SubTotal` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalledespacho`
--

CREATE TABLE IF NOT EXISTS `detalledespacho` (
  `NumDespacho` varchar(10) NOT NULL,
  `Item` varchar(10) NOT NULL,
  `CodProducto` varchar(10) NOT NULL,
  `Cantidad` decimal(10,0) NOT NULL,
  `Precio` decimal(10,0) NOT NULL,
  `Descuento` decimal(10,0) NOT NULL,
  `Exento` decimal(10,0) NOT NULL,
  `Subtotal` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE IF NOT EXISTS `detalleventa` (
  `Item` int(11) NOT NULL,
  `NumVenta` int(12) NOT NULL,
  `CodProducto` varchar(40) NOT NULL,
  `Descripcion` varchar(120) NOT NULL,
  `Cantidad` int(12) NOT NULL,
  `Precio` decimal(10,0) NOT NULL,
  `UniMedida` decimal(10,0) NOT NULL,
  `Descuento` decimal(10,0) NOT NULL,
  `Exento` decimal(10,0) NOT NULL,
  `Subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`Item`, `NumVenta`, `CodProducto`, `Descripcion`, `Cantidad`, `Precio`, `UniMedida`, `Descuento`, `Exento`, `Subtotal`) VALUES
(0, 10, 'E1CebMoraPlum_Gen', 'Cebolla Morada', 20, '1590', '0', '0', '0', 0),
(0, 90, 'E1CebMoraPlum_Gen', 'Cebolla Morada', 12, '1590', '0', '0', '0', 0),
(0, 91, 'E1CebMoraPlum_Gen', 'Cebolla Morada', 20, '1590', '0', '0', '0', 0),
(0, 100, 'E1Cebollajuli', 'Cebolla Morada', 20, '1906', '0', '0', '0', 0),
(0, 123, 'E1CebMoraPlum_Gen', 'Cebolla Morada', 20, '1590', '0', '0', '0', 0),
(0, 600, 'E1CebMoraPlum_Gen', 'Cebolla Morada', 20, '1590', '0', '0', '0', 0),
(0, 601, 'VenTom_Gen1', 'Tomate Vene', 3, '560', '0', '0', '0', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE IF NOT EXISTS `historial` (
  `CodHistorial` varchar(10) NOT NULL,
  `CodUsuario` varchar(10) NOT NULL,
  `Tabla` varchar(20) NOT NULL,
  `Movimiento` varchar(10) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordendespacho`
--

CREATE TABLE IF NOT EXISTS `ordendespacho` (
  `NumDespacho` varchar(10) NOT NULL,
  `CodCliente` varchar(10) NOT NULL,
  `Fecha` date NOT NULL,
  `Vencimiento` date NOT NULL,
  `ForPago` varchar(10) NOT NULL,
  `TotExento` decimal(10,0) NOT NULL,
  `TotDescuento` decimal(10,0) NOT NULL,
  `TotNeto` decimal(10,0) NOT NULL,
  `TotIva` decimal(10,0) NOT NULL,
  `TotImpuesto` decimal(10,0) NOT NULL,
  `TotRetencion` decimal(10,0) NOT NULL,
  `Total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
  `CodPermiso` varchar(10) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `UrlInicio` varchar(50) NOT NULL,
  `UrlImagen` varchar(50) NOT NULL,
  `Categoria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `Id` bigint(20) NOT NULL,
  `CodProducto` varchar(40) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `UniMedida` varchar(10) NOT NULL,
  `CanExistencia` decimal(10,0) NOT NULL,
  `PreCompra` decimal(10,0) NOT NULL,
  `PreVenta` decimal(10,0) NOT NULL,
  `CodProveedor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id`, `CodProducto`, `Descripcion`, `UniMedida`, `CanExistencia`, `PreCompra`, `PreVenta`, `CodProveedor`) VALUES
(1, 'C1AjiAM_Gen', 'Aji Amarillo en Mitades - Congelado (Kg)', 'KG', '-892', '2990', '0', 'N/A'),
(2, 'C1AjiAP_Gen', 'Aji Amarillo en Pasta - Congelado (Kg)', 'KG', '-1026', '6000', '0', 'N/A'),
(3, 'C1AjiL_Gen', 'Aji Limo - Congelado (Kg)', 'KG', '-28', '5500', '0', 'N/A'),
(4, 'C1AjiMP_Gen', 'Aji Mirasol Pasta - Congelado (Kg)', 'KG', '450', '5800', '0', 'N/A'),
(5, 'C1AjiPP_Gen', 'Aji Panca en Pasta - Congelado (Kg)', 'KG', '-733', '5590', '0', 'N/A'),
(6, 'C1AraIQF_Gen', 'Arandano IQF - Congelado (Kg)', 'KG', '-72', '3500', '0', 'N/A'),
(7, 'C1ArvIQF_Gen', 'Arverja IQF - Congelado (Kg)', 'KG', '-368', '1300', '0', 'N/A'),
(8, 'C1BorPF_Gen', 'Borojo Pulpa - S.A.S (Kg)', 'KG', '50', '4500', '0', 'N/A'),
(9, 'C1Camar100200_Gen', 'Camaron 100-200 - Congelado (Kg)', 'KG', '0', '7500', '0', 'N/A'),
(10, 'C1CamC_Gen', 'Camote Pre-Cocido Peruano - Congelado (Kl)', 'KG', '-153', '1990', '0', 'N/A'),
(11, 'C1CamPP_Gen', 'Camote Peruano Pre Cocido - Congelado (Kg)', 'KG', '-301', '1990', '0', 'N/A'),
(12, 'C1ChiP_Gen', 'Chirimolla Pulpa "Guallarauco" - Congelado (Kg)', 'KG', '-57', '4000', '0', 'N/A'),
(13, 'C1ChoC_Gen', 'Choclo Chileno Grano - Congelado (KL)', 'KG', '-118', '1300', '0', 'N/A'),
(14, 'C1ChoEnPe', 'Choclo Entero Peruano Congelado (KL)', 'GR', '-28', '2200', '0', 'N/A'),
(16, 'C1ChoPG_Gen', 'Choclo Peruano Grano - Congelado (Kg)', 'KG', '-2723', '2500', '0', 'N/A'),
(15, 'C1ChoP_Gen', 'Choclo Pasta - Congelado (KL)', 'KG', '-232', '1790', '0', 'N/A'),
(17, 'C1COCHAY', 'Cochayuyo congelado (KL)', 'KG', '-4', '5590', '0', 'N/A'),
(18, 'C1CurP_Gen', 'Curuba Pulpa S.A.S. - Congelado (Kg)', 'KG', '20', '4500', '0', 'N/A'),
(19, 'C1DurP_Gen', 'Durazno Pulpa "Guallarauco" - Congelado (Kg)', 'KG', '-114', '2590', '0', 'N/A'),
(20, 'C1Esp_Gen', 'Esparrago - Congelado (Kg)', 'KG', '-535', '3890', '0', 'N/A'),
(21, 'C1FRAMIQF', 'Pulpa  de frambueza IQF (KG)', 'KG', '0', '4000', '0', 'N/A'),
(22, 'C1FramIQF_Gen', 'Frambueza IQF - Congelado (Kg)', 'KG', '-42', '3990', '0', 'N/A'),
(23, 'C1FramP_Gen', 'Frambueza Pulpa "Guallarauco" - Congelado (Kg)', 'KG', '-174', '3500', '0', 'N/A'),
(24, 'C1FruP_Gen', 'Frutilla Pulpa "Guallarauco" - Congelado (Kg)', 'KG', '-51', '2690', '0', 'N/A'),
(25, 'C1GuaP_Gen', 'Guanabana - Pulpa - Congelado (Kg)', 'KG', '38', '3500', '0', 'N/A'),
(26, 'C1GuayPS_Gen', 'Guayaba Pulpa S.A.S. - Congelado (Kg)', 'KG', '-1', '4500', '0', 'N/A'),
(27, 'C1HabIQF_Gen', 'Habas IQF - Congelado (Kg)', 'KG', '-463', '1800', '0', 'N/A'),
(28, 'C1HojP_Gen', 'Hoja de Platano - Congelada (Kg)', 'KG', '14', '2500', '0', 'N/A'),
(29, 'C1Hua_Gen', 'Huacatay - Congelado (Kg)', 'KG', '-33', '4590', '0', 'N/A'),
(30, 'C1LimonPulp_Gen', 'Limon - Pulpa', 'KG', '-10', '2990', '0', 'N/A'),
(31, 'C1LucP_Gen', 'Lucuma - Pulpa - Congelado (Kg)', 'KG', '17', '4000', '0', 'N/A'),
(32, 'C1LulPS_Gen', 'Lulo - Pulpa - SAS (Kg)', 'KG', '65', '4500', '0', 'N/A'),
(33, 'C1ManAP_Gen', 'Mango con Azucar - Pulpa - Congelado (Kg)', 'KG', '40', '2100', '0', 'N/A'),
(34, 'C1MangoGualla_Gen', 'Mango Pulpa "Guallarauco" - Congelado (Kg)', 'KG', '-55', '3500', '0', 'N/A'),
(35, 'C1ManT_Gen', 'Mango en Trozo - Congelado (Kg)', 'KG', '104', '2890', '0', 'N/A'),
(36, 'C1MarCPP_Gen', 'Maracuya con Pepa - Pulpa - Congelado (Kg)', 'KG', '0', '2800', '0', 'N/A'),
(37, 'C1MarSP_Gen', 'Maracuya sin Pepa - Pulpa - Congelado (Kg)', 'KG', '-180', '3390', '0', 'N/A'),
(38, 'C1MasW_Gen', 'Masa Wantan - Congelado (Un)', 'UN', '-1489', '1345', '0', 'N/A'),
(39, 'C1MoraIQF_Gen', 'Mora IQF - Congelado', 'GR', '-16', '3590', '0', 'N/A'),
(40, 'C1MorPS_Gen', 'Mora - Pulpa SAS - Congelado (Kg)', 'KG', '39', '5000', '0', 'N/A'),
(41, 'C1PapAP_Gen', 'Papa Amarilla Peruana - Congelado (Kg)', 'KG', '-742', '2500', '0', 'N/A'),
(42, 'C1PapayPG_Gen', 'Papaya - Pulpa - Guallarauco (Kg)', 'KG', '0', '4500', '0', 'N/A'),
(43, 'C1PapayT_Gen', 'Papaya en Trozo - Congelado (Kg)', 'KG', '53', '2890', '0', 'N/A'),
(44, 'C1PapHu_Gen', 'Papa Huario - Congelado (Kg)', 'KG', '-679', '2500', '0', 'N/A'),
(45, 'C1PapPF_Gen', 'Papa Pre-Frita - Congelado (Kg)', 'KG', '-320', '1300', '0', 'N/A'),
(46, 'C1PinPG_Gen', 'Pi?a - Pulpa - Guallarauco (Kg)', 'KG', '-28', '2800', '0', 'N/A'),
(47, 'C1PorG_Gen', 'Poroto Grando - Congelado (Kg)', 'KG', '-212', '3300', '0', 'N/A'),
(48, 'C1PorV_Gen', 'Poroto Verde - Congelado (Kg)', 'KG', '-4', '1990', '0', 'N/A'),
(49, 'C1Prim_Gen', 'Primavera - Congelado (Kg)', 'KG', '31', '1300', '0', 'N/A'),
(50, 'C1PulpMelon_Gen', 'Melon "Guallarauco Pulpa - Congelado (Kl)', 'GR', '-1', '2190', '0', 'N/A'),
(51, 'C1RocE_Gen', 'Rocoto Entero - Congelado (Kg)', 'KG', '-315', '2800', '0', 'N/A'),
(52, 'C1SalmFel_Gen', 'Salmon Fileteado - Congelado (Kg)', 'KG', '0', '5560', '0', 'N/A'),
(53, 'C1TamP_Gen', 'Tamarindo - Pulpa - Congelado (Kg)', 'KG', '-44', '4500', '0', 'N/A'),
(54, 'C1TomaP_Gen', 'Tomate - Pulpa - SAS (Kg)', 'UN', '10', '4500', '0', 'N/A'),
(55, 'C1YucT_Gen', 'Yuca en Trozo - Congelado (Kg)', 'KG', '-1360', '2200', '0', 'N/A'),
(56, 'C1YuySP_Gen', 'Yuyo - Congelado - Sabor Peruano (Kg)', 'KG', '-7', '6000', '0', 'N/A'),
(57, 'CO1CAM', 'Camar?n congelado 36*40 (kl)', 'KG', '-24', '10000', '0', 'N/A'),
(59, 'e1abastero_Gen', 'Abastero (Kl)', 'GR', '-4', '6000', '0', 'N/A'),
(60, 'E1AceBalsa_Gen', 'Aceto Balsamico (Botella x 1 LT)', '0', '-10', '5300', '0', 'N/A'),
(62, 'E1AceiteMaravilla', 'Aceite Maravilla Chef (Und)', 'UN', '-24', '2390', '0', 'N/A'),
(63, 'E1AceiteOliv', 'Aceite de Oliva (Botella x 1LT)', 'BTLL', '-2', '4190', '0', 'N/A'),
(61, 'E1Aceite_Gen', 'Aceite Fritomac (Bidon x 10Lt)', 'UN', '-84', '18000', '0', 'N/A'),
(64, 'E1AceML_Gen', 'Aceituna Morada Laminada (Kg)', 'GR', '-41', '3500', '0', 'N/A'),
(65, 'E1AceOli_Gen', 'Aceite de Oliva (Bidon x 5LT)', 'UN', '2', '15000', '0', 'N/A'),
(66, 'E1AceSBi_Gen', 'Aceite de Sesamo (Bidon x 1.750ML)', 'UN', '-86', '16000', '0', 'N/A'),
(67, 'E1AceSBo_Gen', 'Aceite Sesamo (Botella x 207 ml)', 'BTLL', '329', '1800', '0', 'N/A'),
(68, 'E1AceSCa_Gen', 'Aceite Sesamo (Caja)', 'CJA', '6', '96000', '0', 'N/A'),
(69, 'E1AceVBi_Gen', 'Aceite Vegetal (Bidon x 5lt)', 'UN', '-139', '6990', '0', 'N/A'),
(70, 'E1AceVBo_Gen', 'Aceite Vegetal (Botella x 900ml)', 'BTLL', '-186', '1390', '0', 'N/A'),
(71, 'E1AchiM_Gen', 'Achiote Molido (Kg)', 'KG', '-5', '4500', '0', 'N/A'),
(72, 'E1AgarAgar', 'Agar Agar (Paquete x 10GR)', 'PQTE', '-9', '1090', '0', 'N/A'),
(73, 'E1Agua de rosas_Gen', 'Agua de Rosas (Botella x 300ml)', 'BTLL', '-3', '5900', '0', 'N/A'),
(74, 'E1Aguac/g_Gen', 'Agua Vital C/G (Displey)', 'PQTE', '-17', '3290', '0', 'N/A'),
(75, 'E1AguaCacha', 'Agua MIneral S/G "CACHANTUN" (UND)', 'UN', '-12', '1000', '0', 'N/A'),
(76, 'E1AguaQueiro_Gen', 'Aguardiente Queirolo (Botella x 4Lt)', 'LT', '-15', '28000', '0', 'N/A'),
(77, 'E1AguaSG_Gen', 'Agua Porvenir 330x24 Sin Gas (Paquete)', 'PQTE', '-34', '12000', '0', 'N/A'),
(78, 'E1AguavitalS/G', 'Agua Vital S/G (Displey)', 'PQTE', '-11', '3290', '0', 'N/A'),
(79, 'E1AguCG_Gen', 'Agua Porvenir 330x24 Con Gas (Paquete)', 'PQTE', '-14', '12000', '0', 'N/A'),
(80, 'E1AguUQ_Gen', 'Aguardiente de Uva - Quierolo (Caja)', 'CJA', '6', '0', '0', 'N/A'),
(81, 'E1AjiAB_Gen', 'Aji Amarillo Base "Frontera Sur" - Congelado (Kg)', 'KG', '-25', '6500', '0', 'N/A'),
(83, 'E1AjiAjoP_Gen', 'Aji Con Ajo - Pasta (Displey - x12 Un)', 'PQTE', '1', '0', '0', 'N/A'),
(82, 'E1AjiAjo_Gen', 'Salsa Picante de Ajo "LEE KUM KEE" (Botella x 368G', 'UN', '-7', '2890', '0', 'N/A'),
(84, 'E1AjiColor', 'Aji de Color (KL)', 'KG', '-3', '2500', '0', 'N/A'),
(85, 'E1AjiME_Gen', 'Aji Mirasol con Pepa Seco (Kg)', 'KG', '-37', '5500', '0', 'N/A'),
(86, 'E1Ajimirasolsinp', 'Aji Mirasol sin pepa seco (Kl)', 'KG', '31', '9000', '0', 'N/A'),
(87, 'E1AjinoG_Gen', 'Ajinomoto a Granel (Kg)', 'KG', '-29', '1890', '0', 'N/A'),
(88, 'E1AjinoR_Gen', 'Ajinomoto Rotulado (Kg)', 'KG', '-745', '2000', '0', 'N/A'),
(90, 'E1Ajinosill5_Gen', 'Ajinosillao (Bidos x 5LT)', 'UN', '-4', '5500', '0', 'N/A'),
(89, 'E1AjinoS_Gen', 'Ajino Siyao (Ltr)', 'LT', '-1', '1800', '0', 'N/A'),
(91, 'E1AjinoU_Gen', 'Ajinomoto - Umani (Paquete - x5)', 'PQTE', '2', '2000', '0', 'N/A'),
(92, 'E1AjiPCP_Gen', 'Aji Panca con Pepa Seco (Kg)', 'KG', '-31', '5500', '0', 'N/A'),
(93, 'E1AjiPSP_Gen', 'Aji Panca Sin Pepa Seco (Kg)', 'KG', '-38', '8000', '0', 'N/A'),
(94, 'E1AjiTarC_Gen', 'Aji Tar? - Crema (Caja)', 'UN', '8', '0', '0', 'N/A'),
(95, 'E1AJOPOL', 'Ajo en polvo (kl)', 'KG', '-2', '1690', '0', 'N/A'),
(96, 'E1AjoPolvo', 'Ajo en Polvo (KL)', 'KG', '-1', '1690', '0', 'N/A'),
(97, 'E1Alb3_Gen', 'Albahaca - Paquete', 'PQTE', '174', '2500', '0', 'N/A'),
(98, 'E1AlcF_Gen', 'Alcaparra "Gourmet" (Frasco x 8-8,5MM)', 'UN', '-31', '5800', '0', 'N/A'),
(99, 'E1AlcN_Gen', 'Alcachofa - Nalcahue (Un - x100 Gr)', 'UN', '18', '0', '0', 'N/A'),
(100, 'E1Alg_Gen', 'Algarrobina "San Roque" (Botella x 500Gr)', 'BTLL', '-76', '3500', '0', 'N/A'),
(102, 'E1almendralam', 'Almendra Laminada (KL)', 'KG', '-14', '12990', '0', 'N/A'),
(101, 'E1Almendra_Gen', 'Almendra Seca (Kg)', 'GR', '-11', '10000', '0', 'N/A'),
(103, 'E1AloeVera', 'Aloe Vera (Botella x 1.5LT)', 'BTLL', '-18', '1800', '0', 'N/A'),
(104, 'E1Alusa', 'Alusa (35x380mm X 1400mts)', 'UN', '-4', '25000', '0', 'N/A'),
(106, 'E1AmarAng_Gen', 'Amargo de Angostura (Botella)', 'BLLA', '-11', '4500', '0', 'N/A'),
(105, 'E1Amar_Gen', 'Amarillin (Und  x 26Gr)', 'UN', '-38', '200', '0', 'N/A'),
(107, 'E1Ampolleta', 'Ampolleta Normal (Und)', 'UN', '-33', '0', '0', 'N/A'),
(108, 'E1AnisEstrella_Gen', 'Anis Estrella (Kl)', 'KG', '-4', '12990', '0', 'N/A'),
(109, 'E1ArrAr_Gen', 'Arroz Arboreo (Und)', 'UN', '-33', '3990', '0', 'N/A'),
(110, 'E1ArroTuca_Gen', 'Arroz Tucapel (Kg)', 'GR', '-115', '1000', '0', 'N/A'),
(111, 'E1ArrozArboVer_Gen', 'Arroz Arboreo Verde (Und)', 'UN', '-36', '3990', '0', 'N/A'),
(112, 'E1ArrozAruba', 'Arroz "ARUBA" (KL)', 'UN', '-52', '990', '0', 'N/A'),
(113, 'E1ArrozBasmati', 'Arroz Basmati (KL)', 'KG', '-5', '3200', '0', 'N/A'),
(114, 'E1ArrozGluti', 'Arroz Glutinoso (KL)', 'KG', '-2', '3090', '0', 'N/A'),
(115, 'E1ArrozInt_Gen', 'Arroz Integral (Kg)', 'KG', '-16', '1790', '0', 'N/A'),
(116, 'E1AtunAceidey_Gen', 'Atun Lomo en Aceite Deyco (Und x 184g)', 'UN', '-44', '1000', '0', 'N/A'),
(117, 'E1Atungrande_Gen', 'Atun Grande (Tarro)', 'UN', '-1', '10000', '0', 'N/A'),
(118, 'E1Avena_Gen', 'Avena (Kg)', 'KG', '-3', '1990', '0', 'N/A'),
(119, 'E1Azaf_Gen', 'Azafran "MARCO POLO"(Paquete x 0.5 Gr)', 'PQTE', '-44', '5000', '0', 'N/A'),
(120, 'E1AzucarGr', 'Azucar Granulada (KL)', 'KG', '-72', '690', '0', 'N/A'),
(121, 'E1Azucariansa_Gen', 'Azucar Ianza (Kg)', 'UN', '-124', '790', '0', 'N/A'),
(122, 'E1Azuflor', 'Azucar Flor (KL)', 'KG', '-17', '1500', '0', 'N/A'),
(123, 'E1Bande_Gen', 'Bandeja (Paquete)', 'PQTE', '-2', '11500', '0', 'N/A'),
(124, 'E1BaseTarta', 'Base de Tarta (Bandeja)', 'BDJA', '-10', '2590', '0', 'N/A'),
(125, 'E1BdjComida', 'Bandeja de comida (Und)', 'UN', '-292', '190', '0', 'N/A'),
(126, 'E1BICARB', 'Bicarbonato (kl)', 'KG', '0', '1500', '0', 'N/A'),
(127, 'E1BolPP_Gen', 'Bolsa Proporcionada / Prepicadas (Und)', 'UN', '-23', '11500', '0', 'N/A'),
(128, 'E1Bolsabasura', 'Bolsa de Basura (Paquete)', 'PQTE', '-7', '2490', '0', 'N/A'),
(129, 'E1BolsaCami_Gen', 'Bolsa Camiseta (Paquete)', 'PQTE', '-38', '1190', '0', 'N/A'),
(130, 'E1BOLSELLAALVAC', 'Bolsa sellado al vacio und', 'UN', '-40', '250', '0', 'N/A'),
(131, 'E1Bomb_Gen', 'Bombilla (Bolsa)', 'BLSA', '-64', '2900', '0', 'N/A'),
(132, 'E1BRRA', 'Brote de rabanito (bandeja)', 'BDJA', '-18', '690', '0', 'N/A'),
(133, 'E1Burrera', 'Tortilla Burrera Tia Rosa (Pqt x 8 Und)', 'PQTE', '-168', '1690', '0', 'N/A'),
(134, 'E1CafC_Gen', 'Cafe Chico (Un)', 'UN', '-115', '1190', '0', 'N/A'),
(135, 'E1CaiguaChile', 'Caigua Chilena (KL)', 'KG', '-1', '3000', '0', 'N/A'),
(136, 'E1Caldo_Gen', 'Caldo Maggui (caja)', 'CJA', '-39', '3590', '0', 'N/A'),
(137, 'E1CaldSCDG_Gen', 'Caldo Sabor Costilla - Do?a Gusta (Un)', 'UN', '-28', '150', '0', 'N/A'),
(138, 'E1CaldSGDG_Gen', 'Caldo Sabor Gallina - Do?a Gusta (Un)', 'UN', '-156', '150', '0', 'N/A'),
(139, 'E1CaldSPDG_Gen', 'Caldo Sabor Pescado - Do?a Gusta (Un)', 'UN', '-114', '150', '0', 'N/A'),
(140, 'E1CallaSeca_Gen', 'Callampa Seca (Kg)', 'KG', '19', '14000', '0', 'N/A'),
(141, 'E1CalT_Gen', 'Calamar Tinta (Botella)', 'BTLL', '-11', '6000', '0', 'N/A'),
(142, 'E1CamisetaGra', 'Bolsa Camiseta Grande (Paquete)', 'PQTE', '-23', '2390', '0', 'N/A'),
(144, 'E1CANECHI', 'Canela china (pqt)', 'PQTE', '0', '2890', '0', 'N/A'),
(143, 'E1CanE_Gen', 'Canela Entera (Kg)', 'KG', '-8', '14000', '0', 'N/A'),
(146, 'E1Cardamomo', 'Cardamomo Entero (Kl)', 'KG', '-2', '36000', '0', 'N/A'),
(147, 'E1Carnesoya_Gen', 'Carne de Soya (Kl)', 'KG', '-4', '1990', '0', 'N/A'),
(145, 'E1Car_Gen', 'Carbon (Kg)', 'KG', '-53', '890', '0', 'N/A'),
(148, 'E1CebMoraPlum_Gen', 'Cebolla Morada Pluma (Kl)', 'KG', '-105', '1590', '0', 'N/A'),
(149, 'E1Cebollajuli', 'Cebolla Morada Juliana (KL)', 'KG', '-140', '1906', '0', 'N/A'),
(150, 'E1CERCOR', 'Cerveza Corona 330 long *24 (caja)', 'CJA', '0', '19500', '0', 'N/A'),
(151, 'E1CerCusD_Gen', 'Cerveza Cusque?a Dorada (Caja x 24)', 'CJA', '-77', '18990', '0', 'N/A'),
(152, 'E1CerCusN_Gen', 'Cerveza Cusque?a Negra (Caja x 24)', 'CJA', '-13', '18990', '0', 'N/A'),
(153, 'E1cha chiGE', 'chancaca chilena (500gr)uni', 'UN', '-4', '1000', '0', 'N/A'),
(154, 'E1ChaP_Gen', 'Chancaca Peruana (Kg)', 'KG', '11', '2290', '0', 'N/A'),
(155, 'E1CHATAR', 'Champi?on tarro 400 GR (Und)', 'UN', '-26', '1200', '0', 'N/A'),
(156, 'E1Chicha1LT_Gen', 'Chicha Jora (Botella x 1Lt)', 'LT', '-771', '1600', '0', 'N/A'),
(157, 'E1ChicMZ_Gen', 'Chicha Morada - Concentrado - Zayori (Displey)', 'PQTE', '6', '0', '0', 'N/A'),
(158, 'E1Chif_Gen', 'Chifle (Und)', 'UN', '-347', '700', '0', 'N/A'),
(159, 'E1ChiJ_Gen', 'Chicha Jora (Botella x 500Lt)', 'BTLL', '-250', '800', '0', 'N/A'),
(161, 'E1ChiMG2_Gen', 'Chicha Morada - Gloria (Display - x400ml)', 'PQTE', '0', '0', '0', 'N/A'),
(160, 'E1ChiMG_Gen', 'Chicha Morada - Gloria (Un - x400 ml)', 'UN', '19', '0', '0', 'N/A'),
(163, 'E1ChiMN2_Gen', 'Chicha Morada - La Negrita (Displey)', 'PQTE', '-9', '2590', '0', 'N/A'),
(162, 'E1ChiMN_Gen', 'Chicha Morada - La Negrita (Un)', 'UN', '2', '0', '0', 'N/A'),
(164, 'E1chimorad_Gen', 'Concentrado de Chicha Morada (Botella x 2Lt)', 'UN', '2', '5900', '0', 'N/A'),
(165, 'E1Choclotronco_Gen', 'Choclo Chileno Tronco - Congelado (KL)', 'KG', '-36', '1500', '0', 'N/A'),
(166, 'E1ChocoDP_Gen', 'Chocolate Do?a Pepa (Un)', 'UN', '-30', '0', '0', 'N/A'),
(167, 'E1ChocoKatun_Gen', 'Chocolate katun (Caja)', 'CJA', '-24', '2900', '0', 'N/A'),
(169, 'E1ChocoLCAM_Gen', 'Chocolate Luker C/Azucar Morena (Un - x25 Gr)', 'UN', '58', '0', '0', 'N/A'),
(168, 'E1ChocoLC_Gen', 'Chocolate Luker C/Azucar Morena (Caja - x500gr - 1', 'CJA', '5', '20168', '0', 'N/A'),
(170, 'E1ChocoLSA_Gen', 'Chocolate Luker Tradicional S/Azu 250Gr (Caja - x2', 'CJA', '5', '35294', '0', 'N/A'),
(171, 'E1CHocoNegro', 'chocolate Negro (KL)', 'KG', '-2', '3690', '0', 'N/A'),
(172, 'E1ChocoSolSAz_Compra', 'Chocolate Sol C/Azucar 500Gr (Caja x 10)', 'CJA', '5', '20168', '0', 'N/A'),
(173, 'E1ChocoTazaCaja_Compra', 'Chocolate Taza (Caja)', 'CJA', '5', '12605', '0', 'N/A'),
(174, 'E1ChorizaEs', 'Chorizo Espa?ol (Und)', 'UN', '-2', '2690', '0', 'N/A'),
(175, 'E1ChoT_Gen', 'Chocolate Taza (Und)', 'UN', '-72', '588', '0', 'N/A'),
(176, 'E1chuchoca', 'Chuchoca (KL)', 'KG', '-4', '1190', '0', 'N/A'),
(177, 'E1CifC_Gen', 'Cif Crema (Und)', 'UN', '-19', '1790', '0', 'N/A'),
(178, 'E1ClavoOlo_GEN', 'Clavo de Olor (Kg)', 'GR', '-2', '17000', '0', 'N/A'),
(180, 'E1CloroGel_Gen', 'Cloro Gel (Und x 900ml)', 'UN', '-33', '1590', '0', 'N/A'),
(179, 'E1Cloro_Gen', 'Cloro Liquido (Und)', 'UN', '-8', '1490', '0', 'N/A'),
(181, 'E1Coca1.5', 'Bebida Coca Kola 1.5 Light (UND)', 'UN', '-24', '1200', '0', 'N/A'),
(182, 'E1Cocakola', 'Bebida Coca Kola 2.5 LT Normal (Displey x 6)', 'PQTE', '-11', '9990', '0', 'N/A'),
(183, 'E1CocaZeroLata', 'Bebida Coca Kola Zero (Displey x 24Und x 350CC)', 'PQTE', '-3', '9990', '0', 'N/A'),
(184, 'E1CocFrutDey_Gen', 'Coctel de Frutas "Deyco" (Lata x 570Gr)', 'LT', '-18', '1300', '0', 'N/A'),
(185, 'E1cochapat', 'Cochayuyo Congelado (Pqt)', 'PQTE', '-2', '1590', '0', 'N/A'),
(186, 'E1Cochayuyo', 'Cochayuyo Fresco (Pqt)', 'PQTE', '-12', '1590', '0', 'N/A'),
(187, 'E1CocoLopez_Gen', 'Coco Lopez (Und x 400Ml)', 'UN', '-24', '2290', '0', 'N/A'),
(188, 'E1Cocorallado', 'Coco Rallado (Kl)', 'KG', '-2', '5000', '0', 'N/A'),
(189, 'E1Cocoslice', 'Coco Slice (Kl)', 'KG', '0', '9890', '0', 'N/A'),
(190, 'E1CocW_Gen', 'Cocoa Winter (Und x 160Gr)', 'UN', '-191', '1800', '0', 'N/A'),
(191, 'E1ColaCaballo', 'Linasa Cola de Caballo (Kl)', 'KG', '-1', '4500', '0', 'N/A'),
(192, 'E1Colantao', 'Colantao (KL)', 'KG', '-3', '6990', '0', 'N/A'),
(193, 'E1Colapez', 'Colapez (Caja)', 'CJA', '-1', '36990', '0', 'N/A'),
(194, 'E1COloraAma_Gen', 'Colorante Amarillo Vegetal (Kl)', 'KG', '-2', '15000', '0', 'N/A'),
(195, 'E1ColPost_Gen', 'Colombiana - Postobon (Botella x 2Lt)', 'BTLL', '5', '1800', '0', 'N/A'),
(196, 'E1ColPP_Gen', 'Colombiana - Postobon (Botella x 410Lt)', 'UN', '0', '900', '0', 'N/A'),
(197, 'E1COM', 'Comino Suelto (KL)', 'KG', '-16', '2500', '0', 'N/A'),
(198, 'E1ConcentrJugo_Gen', 'Concentrado de Jugo (Bidon x 5Lt)', 'UN', '-4', '2490', '0', 'N/A'),
(200, 'E1Corvina_Gen', 'Cabeza de Corvina (Kl)', 'KG', '0', '1390', '0', 'N/A'),
(199, 'E1CorV_Gen', 'Coraz?n de vacuno (KL)', 'KG', '-275', '3500', '0', 'N/A'),
(201, 'E1cremaCoccGn', 'crema de  coco(400m) uni', 'UN', '-4', '1700', '0', 'N/A'),
(202, 'E1CremaCol', 'Crema Colun (Und)', 'UN', '-30', '2190', '0', 'N/A'),
(203, 'E1Cuchillodescar', 'Cuchillo Descartable (Bolsa x 100)', 'BLSA', '-1', '1290', '0', 'N/A'),
(204, 'E1Curcuma_Gen', 'Curcuma (Kl)', 'KG', '-1', '6500', '0', 'N/A'),
(205, 'E1CurrAP_Gen', 'Curry Amarillo - Pasta (Kg)', 'KG', '-6', '2500', '0', 'N/A'),
(206, 'E1CurrG_Gen', 'Curry a Granel (Kg)', 'KG', '-11', '4500', '0', 'N/A'),
(207, 'E1Curry verde', 'Curry Verde - Pasta (Und)', 'UN', '-6', '2500', '0', 'N/A'),
(208, 'E1Currymasamman', 'Curry Masamman - Pasta (Und)', 'UN', '-2', '3500', '0', 'N/A'),
(209, 'E1Curryrojo', 'Curry Rojo - Pasta (Und)', 'UN', '-4', '2500', '0', 'N/A'),
(210, 'E1Damasco', 'Damasco (KL)', 'KG', '-2', '11400', '0', 'N/A'),
(211, 'E1DamasTurco', 'Damasco Turco (KL)', 'KG', '-2', '6900', '0', 'N/A'),
(212, 'E1Datiles', 'Datiles (KL)', 'KG', '-6', '6900', '0', 'N/A'),
(213, 'E1Dijon', 'Mostaza Dijon (Frasco x 850 GR)', 'UN', '-6', '4390', '0', 'N/A'),
(215, 'E1DonAMA2_Gen', 'Do?a Arepa - Maiz Amarillo (Display - x20)', 'PQTE', '15', '0', '0', 'N/A'),
(214, 'E1DonAMA_Gen', 'Do?a Arepa - Maiz Amarillo (Kg)', 'UN', '24', '0', '0', 'N/A'),
(217, 'E1DonAMB2_Gen', 'Do?a Arepa - Maiz Blanco (Display - x20)', 'PQTE', '11', '0', '0', 'N/A'),
(216, 'E1DonAMB_Gen', 'Do?a Arepa - Maiz Blanco (Kg)', 'PQTE', '13', '0', '0', 'N/A'),
(218, 'E1Dulcessalon_Gen', 'Dulces Salon (Und)', 'UN', '-20', '1290', '0', 'N/A'),
(219, 'E1DulMenb_Gen', 'Dulce de Membrillo (Und)', 'UN', '-9', '600', '0', 'N/A'),
(220, 'E1DulMent_Gen', 'Dulce de Menta (Und)', 'UN', '-5', '1790', '0', 'N/A'),
(221, 'E1duraznoConser', 'Durazno Conservero (KL)', 'KG', '-13', '1390', '0', 'N/A'),
(222, 'E1Duraznopelado', 'Durazno Pelado (KL)', 'KG', '-78', '1390', '0', 'N/A'),
(223, 'E1DurC_Gen', 'Durazno Mitad Dos Caballo (Lata)', 'LATA', '-11', '1590', '0', 'N/A'),
(224, 'E1encende_Gen', 'Encendedores de Cocina (Und)', 'UN', '-2', '690', '0', 'N/A'),
(225, 'E1EndLiq_Gen', 'Endulsante Liquido Splenda (Un)', 'UN', '-27', '3290', '0', 'N/A'),
(227, 'E1Ene2_Gen', 'Eneldo (Kg)', 'KG', '-2', '22000', '0', 'N/A'),
(226, 'E1Ene_Gen', 'Eneldo (Sobre)', 'SBRE', '-2', '600', '0', 'N/A'),
(228, 'E1EnsSus_Gen', 'Envase de Suspiro (Und)', 'UN', '-325', '76', '0', 'N/A'),
(229, 'E1Escobillon', 'Escobillon (Und)', 'UN', '-4', '1690', '0', 'N/A'),
(230, 'E1EsenVaini_Gen', 'Esencia de Vainilla (Botella x 1Lt)', 'BTLL', '-7', '3500', '0', 'N/A'),
(231, 'E1EspaBlan_Gen', 'Esparrago Blanco "Deyco" (Frasco x 330Gr)', 'UN', '-29', '1800', '0', 'N/A'),
(232, 'E1Esponja_Gen', 'Esponja (Paquete)', 'PQTE', '-2', '1190', '0', 'N/A'),
(233, 'E1Estragonseco_Gen', 'Estragon Seco (Kg)', 'KG', '-1', '35000', '0', 'N/A'),
(234, 'E1Exprimidorlimon_Gen', 'Exprimidor de Limon Metal (Und)', 'UN', '-2', '6500', '0', 'N/A'),
(236, 'E1fanK2_Gen', 'Bebida Fanta 2.5 LT Normal (Display x 6)', 'PQTE', '-3', '9990', '0', 'N/A'),
(235, 'E1FanK_Gen', 'Bebida Fanta (Un - 500 ml)', 'UN', '3', '0', '0', 'N/A'),
(237, 'E1Fetucche_Gen', 'Fideo Fetuccheti (Und)', 'UN', '-205', '790', '0', 'N/A'),
(238, 'E1FidA_Gen', 'Fideo de Arroz Fino Thai (450 Gr)', 'UN', '-145', '1390', '0', 'N/A'),
(240, 'E1FidCA_Gen', 'Fideo Cabello de angel (Und)', 'UN', '0', '1190', '0', 'N/A'),
(241, 'E1fidcorba_Gen', 'Fideo Corbata (Und)', 'UN', '-5', '750', '0', 'N/A'),
(239, 'E1FidC_Gen', 'Fideo Carozi (Un)', 'UN', '-74', '650', '0', 'N/A'),
(242, 'E1FideoGrueso_Gen', 'Fideo de Arroz Grueso Thai (Und)', 'UN', '-10', '1390', '0', 'N/A'),
(243, 'E1FidT_Gen', 'Fideo Triunfo (Und)', 'UN', '53', '500', '0', 'N/A'),
(244, 'E1FlorComest', 'Flores Comestibles (Bdj)', 'BDJA', '-3', '1890', '0', 'N/A'),
(245, 'E1FreC_Gen', 'Frejol Canario (Kg)', 'KG', '-494', '2200', '0', 'N/A'),
(246, 'E1FreN_Gen', 'Frejol Negro (Kg)', 'KG', '-1', '1590', '0', 'N/A'),
(247, 'E1FrijolNegro', 'Frijol Negro (KL)', 'KG', '0', '1590', '0', 'N/A'),
(248, 'E1FRRO', 'Frijol rojo (KL)', 'KG', '-4', '2000', '0', 'N/A'),
(249, 'E1Galangal', 'Galangal Deshidratado (Und x 57Gr)', 'UN', '-6', '1390', '0', 'N/A'),
(251, 'E1GallC2_Gen', 'Galleta Casino (Pqte)', 'PQTE', '0', '1000', '0', 'N/A'),
(252, 'E1GallCS_Gen', 'Galleta Club Social (Pqte)', 'PQTE', '-70', '1000', '0', 'N/A'),
(250, 'E1GallC_Gen', 'Galleta Casino (Und)', 'UN', '-30', '0', '0', 'N/A'),
(253, 'E1Galletaanimalito', 'Galleta Animalitos (KL)', 'KG', '-7', '2000', '0', 'N/A'),
(58, 'E1_Sal', 'Sal (Kl)', 'KG', '-67', '390', '0', 'N/A'),
(255, 'RemoVen_1', 'Remolacha ', '0', '12', '4320', '4740', ''),
(256, 'RemoVen_2', 'Remolacha Estirada', '3', '45', '1234', '4740', ''),
(254, 'VenTom_Gen1', 'Tomate Venezolano', 'KG', '30', '560', '700', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `CodProveedor` varchar(10) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Estatus` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `CodUsuario` varchar(10) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Contrasena` varchar(40) NOT NULL,
  `Tipo` varchar(10) NOT NULL,
  `Departamento` varchar(10) NOT NULL,
  `Estatus` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`CodUsuario`, `Nombre`, `Contrasena`, `Tipo`, `Departamento`, `Estatus`) VALUES
('grimaneza', 'Grimaneza Silvs', 'dd5fef9c1c1da1394d6d34b248c51be2ad740840', 'admin', 'helpdesk', '1'),
('jquiroz', 'Javier Quiroz', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'admin', 'presidente', '1'),
('yromeroc', 'Yerffrey Romero', '03d2ca640b43fbf991f283cb0b5818e9d7d5db80', 'admin', 'ti', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariopermiso`
--

CREATE TABLE IF NOT EXISTS `usuariopermiso` (
  `CodUsuario` varchar(10) NOT NULL,
  `CodPermiso` varchar(10) NOT NULL,
  `Estatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `NumVenta` int(12) NOT NULL,
  `CodCliente` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CodBodega` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Vencimiento` date NOT NULL,
  `ForPago` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `TotExento` decimal(10,0) NOT NULL,
  `TotDescuento` decimal(10,0) NOT NULL,
  `TotNeto` decimal(10,0) NOT NULL,
  `TotIva` decimal(10,0) NOT NULL,
  `TotImpuesto` decimal(10,0) NOT NULL,
  `TotRetencion` decimal(10,0) NOT NULL,
  `Total` decimal(10,0) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=123457 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`NumVenta`, `CodCliente`, `CodBodega`, `Fecha`, `Vencimiento`, `ForPago`, `TotExento`, `TotDescuento`, `TotNeto`, `TotIva`, `TotImpuesto`, `TotRetencion`, `Total`) VALUES
(1, '', 'Javier', '2005-07-27', '2015-07-29', '0', '0', '0', '0', '0', '0', '0', '0'),
(2, '', 'Javier', '2005-07-27', '2015-07-29', '0', '0', '0', '0', '0', '0', '0', '0'),
(6, '', 'Javier', '2005-07-27', '2015-07-29', '0', '0', '0', '0', '0', '0', '0', '0'),
(10, '', 'yromeroc', '2005-07-27', '2015-07-24', '0', '0', '0', '0', '0', '0', '0', '0'),
(90, '', 'Javier', '2005-07-27', '2015-07-29', '0', '0', '0', '0', '0', '0', '0', '0'),
(91, '', 'yromeroc', '2005-07-07', '2015-07-16', '0', '0', '0', '0', '0', '0', '0', '0'),
(100, '', 'yromeroc', '2005-07-27', '2015-07-27', '0', '0', '0', '0', '0', '0', '0', '0'),
(123, '', '123', '2005-07-14', '2015-07-09', '0', '0', '0', '0', '0', '0', '0', '0'),
(600, '', 'yromeroc', '2005-07-15', '2015-07-30', '0', '0', '0', '0', '0', '0', '0', '0'),
(601, '', 'yromeroc', '2005-07-27', '2015-07-22', '0', '0', '5', '0', '0', '0', '0', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `authassignment`
--
ALTER TABLE `authassignment`
  ADD PRIMARY KEY (`itemname`,`userid`);

--
-- Indices de la tabla `authitem`
--
ALTER TABLE `authitem`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD PRIMARY KEY (`CodBodega`), ADD KEY `Codigo` (`CodBodega`);

--
-- Indices de la tabla `bodegarticulo`
--
ALTER TABLE `bodegarticulo`
  ADD PRIMARY KEY (`CodBodega`), ADD KEY `CodProducto` (`CodProducto`), ADD KEY `CodProducto_2` (`CodProducto`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CodCliente`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`NumCompra`,`CodProveedor`), ADD KEY `CodProveedor` (`CodProveedor`);

--
-- Indices de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD PRIMARY KEY (`NumCompra`,`CodProducto`), ADD KEY `CodProducto` (`CodProducto`);

--
-- Indices de la tabla `detalledespacho`
--
ALTER TABLE `detalledespacho`
  ADD PRIMARY KEY (`NumDespacho`,`CodProducto`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`NumVenta`,`CodProducto`), ADD KEY `CodProducto` (`CodProducto`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`CodHistorial`,`CodUsuario`);

--
-- Indices de la tabla `ordendespacho`
--
ALTER TABLE `ordendespacho`
  ADD PRIMARY KEY (`NumDespacho`,`CodCliente`), ADD KEY `CodCliente` (`CodCliente`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`CodPermiso`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`CodProducto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`CodProveedor`), ADD UNIQUE KEY `Codigo` (`CodProveedor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CodUsuario`);

--
-- Indices de la tabla `usuariopermiso`
--
ALTER TABLE `usuariopermiso`
  ADD PRIMARY KEY (`CodUsuario`,`CodPermiso`), ADD KEY `CodPermiso` (`CodPermiso`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`NumVenta`), ADD KEY `CodCliente` (`CodCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `NumVenta` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=123457;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `authassignment`
--
ALTER TABLE `authassignment`
ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `authitemchild`
--
ALTER TABLE `authitemchild`
ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
ADD CONSTRAINT `detallecompra_ibfk_1` FOREIGN KEY (`NumCompra`) REFERENCES `compra` (`NumCompra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`NumVenta`) REFERENCES `venta` (`NumVenta`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
