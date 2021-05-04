-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2021 a las 03:00:44
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `censa`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GetBitacoraId` (IN `idE` INT, IN `idP` INT)  NO SQL
BEGIN

SELECT MAX(IdBitacora) FROM bitacoras 
WHERE IdEstudiante = idE AND IdPrograma = idP;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ValidarBitacora` (IN `idP` INT, IN `idE` INT)  NO SQL
BEGIN 

DECLARE num  INT unsigned DEFAULT 1;
SET num = (SELECT MAX(B.NumBitacora) FROM bitacoras AS B INNER JOIN estudiantes AS E ON B.IdEstudiante = E.IdEstudiante
INNER JOIN estudiantesprogramas AS EP ON EP.IdEstudiante = E.IdEstudiante
INNER JOIN programas AS P ON P.IdPrograma = EP.IdPrograma
WHERE EP.IdPrograma = idP AND B.IdEstudiante = idE);
IF num IS NULL THEN 
   SET num = 0;
END IF;
SELECT num;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ValidarDocumento` (IN `doc` VARCHAR(20))  NO SQL
BEGIN
   DECLARE _validarDoc VARCHAR(20);
   IF(SELECT COUNT(Documento) FROM empleados WHERE Documento = doc)>0 THEN

   SET _validarDoc =(SELECT Documento FROM empleados WHERE Documento = doc);
   SELECT _validarDoc;
   ELSE
   
   SELECT 'null';
   
   END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ValidarDocumentoProgramaE` (IN `idprog` INT, IN `doc` VARCHAR(20))  NO SQL
BEGIN
   DECLARE _validarDoc VARCHAR(20);
   IF(SELECT COUNT(E.Documento) FROM estudiantes AS E INNER JOIN estudiantesprogramas AS EP ON E.IdEstudiante = EP.IdEstudiante
     WHERE E.Documento = doc AND EP.IdPrograma=idprog)>0 THEN

   SET _validarDoc =(SELECT Documento FROM estudiantes WHERE Documento = doc);
   SELECT _validarDoc;
   ELSE
   
   SELECT 'null';
   
   END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacoras`
--

CREATE TABLE `bitacoras` (
  `IdBitacora` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `NumFolio` int(25) DEFAULT NULL,
  `Observaciones` longtext COLLATE utf8_spanish2_ci DEFAULT NULL,
  `NumBitacora` int(11) NOT NULL,
  `IdEstudiante` int(11) NOT NULL,
  `IdPrograma` int(11) NOT NULL,
  `IdEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacorasevaluaciones`
--

CREATE TABLE `bitacorasevaluaciones` (
  `IdBitacorasevaluaciones` int(11) NOT NULL,
  `IdBitacora` int(11) NOT NULL,
  `IdEvaluacion` int(11) NOT NULL,
  `Respuesta` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacorasfunciones`
--

CREATE TABLE `bitacorasfunciones` (
  `IdBitacorasFunciones` int(11) NOT NULL,
  `IdBitacora` int(11) NOT NULL,
  `IdFuncion` int(11) NOT NULL,
  `Respuesta` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `IdCargo` int(11) NOT NULL,
  `Cargo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criteriosevaluar`
--

CREATE TABLE `criteriosevaluar` (
  `IdCriteriosEvaluar` int(11) NOT NULL,
  `CriterioEvaluar` longtext COLLATE utf32_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criteriosevaluarbitacoras`
--

CREATE TABLE `criteriosevaluarbitacoras` (
  `IdCriterioEvaluarBitacora` int(11) NOT NULL,
  `IdBitacora` int(11) NOT NULL,
  `IdCriterioEvaluar` int(11) NOT NULL,
  `Respuesta` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `IdEmpleado` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellido` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Correo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Celular` bigint(20) NOT NULL,
  `IdCargo` int(11) NOT NULL,
  `Telefono` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `IdTipoDocumento` int(11) NOT NULL,
  `Documento` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `IdEmpresa` int(11) NOT NULL,
  `Empresa` varchar(55) COLLATE utf32_spanish2_ci NOT NULL,
  `IdEstudiante` int(11) NOT NULL,
  `Nit` varchar(55) COLLATE utf32_spanish2_ci NOT NULL,
  `NombreContacto` varchar(55) COLLATE utf32_spanish2_ci NOT NULL,
  `CargoContacto` varchar(55) COLLATE utf32_spanish2_ci NOT NULL,
  `TelefonoEmpresa` varchar(30) COLLATE utf32_spanish2_ci NOT NULL,
  `CorreoEmpresa` varchar(55) COLLATE utf32_spanish2_ci NOT NULL,
  `DireccionEmpresa` varchar(55) COLLATE utf32_spanish2_ci NOT NULL,
  `CargoPracticante` varchar(55) COLLATE utf32_spanish2_ci NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFinalizacion` date NOT NULL,
  `Modalidad` varchar(55) COLLATE utf32_spanish2_ci NOT NULL,
  `Activo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `IdEstudiante` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellido` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Documento` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `CorreoEstudiante` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `IdTipoDocumento` int(11) NOT NULL,
  `Telefono` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Celular` bigint(20) NOT NULL,
  `NumeroFolio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantesprogramas`
--

CREATE TABLE `estudiantesprogramas` (
  `IdEstudiantesProgramas` int(11) NOT NULL,
  `IdPrograma` int(11) NOT NULL,
  `IdEstudiante` int(11) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `IdEvaluacion` int(11) NOT NULL,
  `Area` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `AspectosEvaluar` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `evaluaciones`
--

INSERT INTO `evaluaciones` (`IdEvaluacion`, `Area`, `AspectosEvaluar`, `Descripcion`) VALUES
(1, 'SABER', 'logica de programacion', 'Aspecto a mejorar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE `funciones` (
  `IdFuncion` int(11) NOT NULL,
  `Descripcion` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `IdPrograma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `IdPrograma` int(11) NOT NULL,
  `NombrePrograma` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Codigo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `IdRol` int(11) NOT NULL,
  `Rol` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`IdRol`, `Rol`) VALUES
(1, 'Administrador'),
(2, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposdocumento`
--

CREATE TABLE `tiposdocumento` (
  `IdTipoDocumento` int(11) NOT NULL,
  `DocumentoIdentidad` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tiposdocumento`
--

INSERT INTO `tiposdocumento` (`IdTipoDocumento`, `DocumentoIdentidad`) VALUES
(1, 'Cédula de ciudadanía'),
(2, 'Cédula de extranjería'),
(3, 'Tarjeta de Identidad'),
(4, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioestudiantes`
--

CREATE TABLE `usuarioestudiantes` (
  `IdUsuarioEstudiante` int(11) NOT NULL,
  `Usuario` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `Clave` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fechaRecuperacion` datetime NOT NULL DEFAULT current_timestamp(),
  `Estado` bit(1) NOT NULL,
  `IdEstudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `Usuario` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Clave` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fechaRecuperacion` datetime DEFAULT NULL,
  `IdRol` int(11) NOT NULL,
  `IdEmpleado` int(11) NOT NULL,
  `Estado` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacoras`
--
ALTER TABLE `bitacoras`
  ADD PRIMARY KEY (`IdBitacora`),
  ADD KEY `IdPrograma` (`IdPrograma`) USING BTREE,
  ADD KEY `IdEstudiante` (`IdEstudiante`) USING BTREE,
  ADD KEY `IdEmpresa` (`IdEmpresa`);

--
-- Indices de la tabla `bitacorasevaluaciones`
--
ALTER TABLE `bitacorasevaluaciones`
  ADD PRIMARY KEY (`IdBitacorasevaluaciones`),
  ADD KEY `IdBitacoras` (`IdBitacora`) USING BTREE,
  ADD KEY `IdEvaluacion` (`IdEvaluacion`) USING BTREE;

--
-- Indices de la tabla `bitacorasfunciones`
--
ALTER TABLE `bitacorasfunciones`
  ADD PRIMARY KEY (`IdBitacorasFunciones`),
  ADD KEY `IdBitacora` (`IdBitacora`),
  ADD KEY `IdFuncion` (`IdFuncion`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`IdCargo`);

--
-- Indices de la tabla `criteriosevaluar`
--
ALTER TABLE `criteriosevaluar`
  ADD PRIMARY KEY (`IdCriteriosEvaluar`);

--
-- Indices de la tabla `criteriosevaluarbitacoras`
--
ALTER TABLE `criteriosevaluarbitacoras`
  ADD PRIMARY KEY (`IdCriterioEvaluarBitacora`),
  ADD KEY `IdBitacora` (`IdBitacora`),
  ADD KEY `IdCriterioEvaluar` (`IdCriterioEvaluar`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`IdEmpleado`),
  ADD KEY `IdCargo` (`IdCargo`),
  ADD KEY `IdTipoDocumento` (`IdTipoDocumento`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`IdEmpresa`),
  ADD KEY `IdEstudiante` (`IdEstudiante`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`IdEstudiante`),
  ADD KEY `IdTipoDocumento` (`IdTipoDocumento`);

--
-- Indices de la tabla `estudiantesprogramas`
--
ALTER TABLE `estudiantesprogramas`
  ADD PRIMARY KEY (`IdEstudiantesProgramas`),
  ADD KEY `IdPrograma` (`IdPrograma`),
  ADD KEY `IdEstudiante` (`IdEstudiante`);

--
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`IdEvaluacion`);

--
-- Indices de la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD PRIMARY KEY (`IdFuncion`),
  ADD KEY `IdPrograma` (`IdPrograma`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`IdPrograma`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `tiposdocumento`
--
ALTER TABLE `tiposdocumento`
  ADD PRIMARY KEY (`IdTipoDocumento`);

--
-- Indices de la tabla `usuarioestudiantes`
--
ALTER TABLE `usuarioestudiantes`
  ADD PRIMARY KEY (`IdUsuarioEstudiante`),
  ADD KEY `IdEstudiante` (`IdEstudiante`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `IdRol` (`IdRol`),
  ADD KEY `IdEmpleado` (`IdEmpleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacoras`
--
ALTER TABLE `bitacoras`
  MODIFY `IdBitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `bitacorasevaluaciones`
--
ALTER TABLE `bitacorasevaluaciones`
  MODIFY `IdBitacorasevaluaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `bitacorasfunciones`
--
ALTER TABLE `bitacorasfunciones`
  MODIFY `IdBitacorasFunciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `IdCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `criteriosevaluar`
--
ALTER TABLE `criteriosevaluar`
  MODIFY `IdCriteriosEvaluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `criteriosevaluarbitacoras`
--
ALTER TABLE `criteriosevaluarbitacoras`
  MODIFY `IdCriterioEvaluarBitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `IdEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `IdEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `IdEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estudiantesprogramas`
--
ALTER TABLE `estudiantesprogramas`
  MODIFY `IdEstudiantesProgramas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  MODIFY `IdEvaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `IdFuncion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `IdPrograma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tiposdocumento`
--
ALTER TABLE `tiposdocumento`
  MODIFY `IdTipoDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarioestudiantes`
--
ALTER TABLE `usuarioestudiantes`
  MODIFY `IdUsuarioEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacoras`
--
ALTER TABLE `bitacoras`
  ADD CONSTRAINT `fk_bitacoras_empresas` FOREIGN KEY (`IdEmpresa`) REFERENCES `empresas` (`IdEmpresa`),
  ADD CONSTRAINT `fk_bitacoras_estudiantes` FOREIGN KEY (`IdEstudiante`) REFERENCES `estudiantes` (`IdEstudiante`),
  ADD CONSTRAINT `fk_bitacoras_programas` FOREIGN KEY (`IdPrograma`) REFERENCES `programas` (`IdPrograma`);

--
-- Filtros para la tabla `bitacorasevaluaciones`
--
ALTER TABLE `bitacorasevaluaciones`
  ADD CONSTRAINT `FK_bitacorasevaluaciones_bitacoras` FOREIGN KEY (`IdBitacora`) REFERENCES `bitacoras` (`IdBitacora`),
  ADD CONSTRAINT `FK_bitacorasevaluaciones_evaluaciones` FOREIGN KEY (`IdEvaluacion`) REFERENCES `evaluaciones` (`IdEvaluacion`);

--
-- Filtros para la tabla `bitacorasfunciones`
--
ALTER TABLE `bitacorasfunciones`
  ADD CONSTRAINT `fk_bitacorasfunciones_bitacoras` FOREIGN KEY (`IdBitacora`) REFERENCES `bitacoras` (`IdBitacora`),
  ADD CONSTRAINT `fk_bitacorasfunciones_funciones` FOREIGN KEY (`IdFuncion`) REFERENCES `funciones` (`IdFuncion`);

--
-- Filtros para la tabla `criteriosevaluarbitacoras`
--
ALTER TABLE `criteriosevaluarbitacoras`
  ADD CONSTRAINT `fk_criteriosevaluarbitacoras_bitacoras` FOREIGN KEY (`IdBitacora`) REFERENCES `bitacoras` (`IdBitacora`),
  ADD CONSTRAINT `fk_criteriosevaluarbitacoras_criteriosevaluar` FOREIGN KEY (`IdCriterioEvaluar`) REFERENCES `criteriosevaluar` (`IdCriteriosEvaluar`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `fk_empleados_cargos` FOREIGN KEY (`IdCargo`) REFERENCES `cargos` (`IdCargo`),
  ADD CONSTRAINT `fk_empleados_tiposdocumento` FOREIGN KEY (`IdTipoDocumento`) REFERENCES `tiposdocumento` (`IdTipoDocumento`);

--
-- Filtros para la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `fk_empresas_estudiantes` FOREIGN KEY (`IdEstudiante`) REFERENCES `estudiantes` (`IdEstudiante`);

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `fk_estudiantes_tiposdocumento` FOREIGN KEY (`IdTipoDocumento`) REFERENCES `tiposdocumento` (`IdTipoDocumento`);

--
-- Filtros para la tabla `estudiantesprogramas`
--
ALTER TABLE `estudiantesprogramas`
  ADD CONSTRAINT `fk_estudiantesprogramas_estudiantes` FOREIGN KEY (`IdEstudiante`) REFERENCES `estudiantes` (`IdEstudiante`),
  ADD CONSTRAINT `fk_estudiantesprogramas_programas` FOREIGN KEY (`IdPrograma`) REFERENCES `programas` (`IdPrograma`);

--
-- Filtros para la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD CONSTRAINT `fk_funciones_programas` FOREIGN KEY (`IdPrograma`) REFERENCES `programas` (`IdPrograma`);

--
-- Filtros para la tabla `usuarioestudiantes`
--
ALTER TABLE `usuarioestudiantes`
  ADD CONSTRAINT `fk_usuarioestudiante_estudiantes` FOREIGN KEY (`IdEstudiante`) REFERENCES `estudiantes` (`IdEstudiante`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_empleados` FOREIGN KEY (`IdEmpleado`) REFERENCES `empleados` (`IdEmpleado`),
  ADD CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`IdRol`) REFERENCES `roles` (`IdRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
