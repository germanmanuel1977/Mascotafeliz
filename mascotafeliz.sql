-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2022 a las 04:34:16
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mascotafeliz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliacion`
--

CREATE TABLE `afiliacion` (
  `idafiliacion` int(6) NOT NULL,
  `fechaafi` date NOT NULL,
  `idmascota` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `afiliacion`
--

INSERT INTO `afiliacion` (`idafiliacion`, `fechaafi`, `idmascota`) VALUES
(8, '2022-09-21', 'gato1'),
(9, '2022-09-20', 'gato2'),
(10, '2022-09-20', 'perro1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `idespecie` int(3) NOT NULL,
  `especie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`idespecie`, `especie`) VALUES
(1, 'Gato'),
(2, 'Perro'),
(8, 'cerdo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idestado` int(3) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idestado`, `estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Sano'),
(4, 'Enfermo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiaclinica`
--

CREATE TABLE `historiaclinica` (
  `idhistoriac` int(6) NOT NULL,
  `idvisita` int(11) NOT NULL,
  `idmedicamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historiaclinica`
--

INSERT INTO `historiaclinica` (`idhistoriac`, `idvisita`, `idmedicamento`) VALUES
(10, 22, 8),
(11, 22, 10),
(13, 14, 8),
(14, 21, 9),
(15, 18, 8),
(16, 21, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `idmascota` varchar(12) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `raza` varchar(20) NOT NULL,
  `idespecie` int(3) NOT NULL,
  `idpersona` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`idmascota`, `nombre`, `color`, `raza`, `idespecie`, `idpersona`) VALUES
('gato1', 'Michin', 'Negro', 'Criollo', 1, '91499067'),
('gato2', 'Tom', 'negro y blanco', 'criollo', 1, '91499064'),
('perro1', 'Rufo', 'Marrón', 'Criollo', 2, '91499068'),
('perro2', 'Ringo', 'Gris', 'bulldog', 2, '91499070');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE `medicamento` (
  `idmedicamento` int(11) NOT NULL,
  `medicamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicamento`
--

INSERT INTO `medicamento` (`idmedicamento`, `medicamento`) VALUES
(8, 'Previcox'),
(9, 'NextGard'),
(10, 'Dragxicilina'),
(11, 'Doxicam');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` varchar(12) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(15) NOT NULL,
  `tarjetaprof` varchar(15) NOT NULL,
  `idtipousua` int(11) NOT NULL,
  `idestado` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombres`, `apellidos`, `direccion`, `telefono`, `email`, `password`, `tarjetaprof`, `idtipousua`, `idestado`) VALUES
('1095304301', 'MIGUEL', 'PEREZ', 'Calle 9  #3-120', '32152145654', 'miguel.perez@gmail.com', '123456789', '999999999', 2, 1),
('91499062', 'GERMAN MANUEL', 'ARGUELLO LOPEZ', 'Calle 91 #21-38', '3176366494', 'germanmanuell@gmail.com', '1234', '999999999', 1, 1),
('91499063', 'Jonathan', 'Marin', 'Calle 9 3-120', '31525024052', 'jonathan.marin@gmail.com', '1234', '91499066', 2, 1),
('91499064', 'Claudia', 'Medina', 'Carrera 27 33-25', '3172512317', 'claudia.medina@gmail.com', '1234', '', 3, 1),
('91499067', 'Sandra', 'Bermudez', 'direccion8', 'telefono8', 'sandra.bermudez@gmail.com', '1234', '', 3, 1),
('91499068', 'Nicol', 'Centeno', 'direccion', 'telefono', 'nicol.centeno@gmail.com', '1234', '', 3, 1),
('91499069', 'Mariana', 'Rueda', 'direccion', '99999999', 'mariana.rueda@gmail.com', '1234', '0', 3, 1),
('91499070', 'MIguel', 'Leal', 'Carrera 23 52-52', '3216549875', 'miguel.leal@gmail.com', '1234', '0', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipousua` int(11) NOT NULL,
  `tipousua` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idtipousua`, `tipousua`) VALUES
(1, 'Administrador'),
(2, 'Veterinario'),
(3, 'Propietario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `idvisita` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `temperatura` decimal(4,2) NOT NULL,
  `peso` decimal(5,2) NOT NULL,
  `frecrespiratoria` int(4) DEFAULT NULL,
  `freccardiaca` int(4) DEFAULT NULL,
  `recomendaciones` varchar(100) DEFAULT NULL,
  `vrconsulta` decimal(12,2) NOT NULL,
  `idpersona` varchar(12) NOT NULL,
  `idmascota` varchar(12) NOT NULL,
  `idestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`idvisita`, `fecha`, `hora`, `temperatura`, `peso`, `frecrespiratoria`, `freccardiaca`, `recomendaciones`, `vrconsulta`, `idpersona`, `idmascota`, `idestado`) VALUES
(14, '2022-09-15', '08:00:00', '37.00', '3.00', 30, 140, 'Gato presenta inflamación del tracto urinario, micción frecuente. Se envía antibiótico', '1.00', '91499063', 'gato1', 4),
(18, '2022-09-15', '13:39:00', '38.00', '4.00', 30, 150, 'Gato con diarrea varios días, se le envía tratamiento con gastroenteril', '1.00', '91499063', 'gato2', 4),
(21, '2022-09-12', '13:48:00', '38.00', '8.00', 16, 100, 'Perro con moquillo, se envia tratamiento paliativo', '0.00', '91499063', 'perro1', 4),
(22, '2022-09-20', '16:03:00', '37.00', '12.00', 14, 90, 'infeccion bacteriana, se envía tratamiento de antibiotico por 10 dias', '0.00', '91499063', 'perro2', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliacion`
--
ALTER TABLE `afiliacion`
  ADD PRIMARY KEY (`idafiliacion`),
  ADD KEY `fk_afiliacion_mascota1` (`idmascota`);

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`idespecie`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idestado`);

--
-- Indices de la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
  ADD PRIMARY KEY (`idhistoriac`),
  ADD KEY `fk_historiaclinica_visita1` (`idvisita`),
  ADD KEY `fk_historiaclinica_medicamento2` (`idmedicamento`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`idmascota`),
  ADD KEY `fk_mascota_especie1` (`idespecie`),
  ADD KEY `fk_mascota_persona2` (`idpersona`);

--
-- Indices de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`idmedicamento`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `fk_persona_tipousuario1` (`idtipousua`),
  ADD KEY `fk_persona_estado2` (`idestado`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idtipousua`);

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`idvisita`),
  ADD KEY `fk_visita_persona1` (`idpersona`),
  ADD KEY `fk_visita_mascota2` (`idmascota`),
  ADD KEY `fk_visita_estado3` (`idestado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afiliacion`
--
ALTER TABLE `afiliacion`
  MODIFY `idafiliacion` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `idespecie` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idestado` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
  MODIFY `idhistoriac` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `idmedicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipousua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `idvisita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `afiliacion`
--
ALTER TABLE `afiliacion`
  ADD CONSTRAINT `fk_afiliacion_mascota1` FOREIGN KEY (`idmascota`) REFERENCES `mascota` (`idmascota`);

--
-- Filtros para la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
  ADD CONSTRAINT `fk_historiaclinica_medicamento2` FOREIGN KEY (`idmedicamento`) REFERENCES `medicamento` (`idmedicamento`),
  ADD CONSTRAINT `fk_historiaclinica_visita1` FOREIGN KEY (`idvisita`) REFERENCES `visita` (`idvisita`);

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `fk_mascota_especie1` FOREIGN KEY (`idespecie`) REFERENCES `especie` (`idespecie`),
  ADD CONSTRAINT `fk_mascota_persona2` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_persona_estado2` FOREIGN KEY (`idestado`) REFERENCES `estado` (`idestado`),
  ADD CONSTRAINT `fk_persona_tipousuario1` FOREIGN KEY (`idtipousua`) REFERENCES `tipousuario` (`idtipousua`);

--
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `fk_visita_estado3` FOREIGN KEY (`idestado`) REFERENCES `estado` (`idestado`),
  ADD CONSTRAINT `fk_visita_mascota2` FOREIGN KEY (`idmascota`) REFERENCES `mascota` (`idmascota`),
  ADD CONSTRAINT `fk_visita_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
