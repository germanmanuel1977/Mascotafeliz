-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2022 a las 00:10:25
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `idespecie` int(3) NOT NULL,
  `especie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiaclinica`
--

CREATE TABLE `historiaclinica` (
  `idhistoriac` int(6) NOT NULL,
  `idvisita` int(11) NOT NULL,
  `idmedicamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE `medicamento` (
  `idmedicamento` int(11) NOT NULL,
  `medicamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('91499062', 'GERMAN MANUEL', 'ARGUELLO LOPEZ', 'BUCARAMANGA', '3176366491', 'germanmanuell@gmail.com', '123', '0', 1, 1),
('9595', 'NATHALIA', 'GARZON', 'CALLE 172 # 48 21 ', '3157300589', 'natygarzon@gmail.com', '777', '0358794', 2, 1),
('9696', 'LUIS CARLOS', 'GONZALEZ', 'CALLE 68 # 72 41 ', '3146980381', 'lcarlosgonza@outlook.com', '321', '0', 3, 1);

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
  MODIFY `idafiliacion` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `idespecie` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idestado` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
  MODIFY `idhistoriac` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `idmedicamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipousua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `idvisita` int(11) NOT NULL AUTO_INCREMENT;

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
