-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-04-2018 a las 13:12:30
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `hospitaldb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `idAdministrador` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `cedula` int(13) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Telefono_Celular` int(11) NOT NULL,
  `Clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `Nombre`, `Apellido`, `cedula`, `Fecha_Nacimiento`, `Correo`, `Telefono_Celular`, `Clave`) VALUES
(1, 'Carlos', 'Perez', 1, '2018-03-05', '1', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE IF NOT EXISTS `cita` (
  `idCita` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `Hora` varchar(10) NOT NULL,
  `DepartamentoID` int(11) NOT NULL,
  `Paciente_idCliente` int(11) NOT NULL,
  PRIMARY KEY (`idCita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`idCita`, `Fecha`, `Hora`, `DepartamentoID`, `Paciente_idCliente`) VALUES
(1, '2018-05-15', '11:01', 2, 4),
(68, '2018-12-12', '12:12', 1, 3),
(69, '2018-11-11', '11:11', 2, 3),
(70, '2017-09-05', '09:23', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE IF NOT EXISTS `consulta` (
  `idConsulta` int(11) NOT NULL AUTO_INCREMENT,
  `Peso` int(11) NOT NULL,
  `Estatura` int(11) NOT NULL,
  `Presion_arterial` int(11) NOT NULL,
  `Sintomas` text NOT NULL,
  `Alergias` text NOT NULL,
  `Estudios_Laboratorios` text NOT NULL,
  `Diagnostico` text NOT NULL,
  `Razon_Consulta` text NOT NULL,
  `Observaciones` text NOT NULL,
  `Fecha_Consulta` date NOT NULL,
  `Paciente_idCliente` int(11) NOT NULL,
  `Doctores_idDoctores` int(11) NOT NULL,
  PRIMARY KEY (`idConsulta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`idConsulta`, `Peso`, `Estatura`, `Presion_arterial`, `Sintomas`, `Alergias`, `Estudios_Laboratorios`, `Diagnostico`, `Razon_Consulta`, `Observaciones`, `Fecha_Consulta`, `Paciente_idCliente`, `Doctores_idDoctores`) VALUES
(1, 1, 1, 1, '1', '1', '1', '1', '1', '1', '2018-04-02', 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `Nombre`, `Descripcion`) VALUES
(1, 'Cardiologia', 'Descripcion'),
(2, 'Neurologia', 'Descripción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE IF NOT EXISTS `doctores` (
  `idDoctores` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Cedula` varchar(13) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Facultad_graduo` varchar(45) NOT NULL,
  `Estudios_Realizados` text NOT NULL,
  `Telefono_Celular` int(11) NOT NULL,
  `Lugar_Especializacion` varchar(45) NOT NULL,
  `Direccion_Consultorio` varchar(45) NOT NULL,
  `Clave` varchar(45) NOT NULL,
  `Departamento_idDepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`idDoctores`, `Nombre`, `Apellido`, `Cedula`, `Fecha_Nacimiento`, `Correo`, `Facultad_graduo`, `Estudios_Realizados`, `Telefono_Celular`, `Lugar_Especializacion`, `Direccion_Consultorio`, `Clave`, `Departamento_idDepartamento`) VALUES
(2, 'Laura      ', 'Sad', '2', '2018-03-07', 'correo@correo.com', 'dacultad', 'dd', 2147483647, '2 ', 'D4-2', '2', 2),
(0, 'Laura ', 'Apellido', '1', '0023-03-22', '122222@1.com', 'sdf', 'Estudios', 4545, '2 ', '2', '2', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Cedula` varchar(13) DEFAULT NULL,
  `Telefono_Celular` int(10) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Sexo` varchar(10) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Clave` varchar(45) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `Nombre`, `Apellido`, `Cedula`, `Telefono_Celular`, `Fecha_Nacimiento`, `Correo`, `Sexo`, `Edad`, `Clave`, `created`, `modified`) VALUES
(3, 'Laura', 'Garcia', '1', 1, '0001-12-12', '24@df.com', 'Femenino', 1, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Carlos', 'Peralta', '0', 1, '0001-12-12', '11124@df.com1', 'Masculino', 1, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Carlos', 'Peralta', '0', 1, '0001-12-12', '11124@df.com1', 'Masculino', 1, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Teresa', 'Almonte', '2323', 213, '3123-02-02', 'correo@correo.com', 'Femenino', 3123, '2323', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Carmen', 'Morillo', '1', 111, '0012-12-12', 'correo@correo.com', 'Femenino', 12, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente_asegurado`
--

CREATE TABLE IF NOT EXISTS `paciente_asegurado` (
  `idPaciente_Asegurado` int(11) NOT NULL AUTO_INCREMENT,
  `Poliza` varchar(45) NOT NULL,
  `Tipo_Seguro` varchar(45) NOT NULL,
  `Seguro_idSeguro` int(11) NOT NULL,
  `Paciente_idCliente` int(11) NOT NULL,
  PRIMARY KEY (`idPaciente_Asegurado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `paciente_asegurado`
--

INSERT INTO `paciente_asegurado` (`idPaciente_Asegurado`, `Poliza`, `Tipo_Seguro`, `Seguro_idSeguro`, `Paciente_idCliente`) VALUES
(1, '1', 'Seguro 1', 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretaria`
--

CREATE TABLE IF NOT EXISTS `secretaria` (
  `idSecretaria` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Cedula` varchar(13) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Telefono_Celular` int(11) NOT NULL,
  `Clave` varchar(45) NOT NULL,
  PRIMARY KEY (`idSecretaria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `secretaria`
--

INSERT INTO `secretaria` (`idSecretaria`, `Nombre`, `Apellido`, `Cedula`, `Fecha_Nacimiento`, `Correo`, `Telefono_Celular`, `Clave`) VALUES
(1, 'Carlos  ', 'Perez', '1', '2018-03-07', 'hola@hola.com', 2147483647, '1'),
(2, 'Laura', 'Sad', '4029287263', '2018-03-07', 'correo@correo.com', 2147483647, 'clave'),
(5, 'Miguel ', 'Rodriguez', '10809', '0023-02-11', '24@df.com', 0, '10809'),
(7, 'Carlos ', 'sad', '1090', '2018-03-01', '12@GHOL', 0, '1090'),
(11, 'Camila ', 'Paco', '10010', '0012-12-12', '11124@df.com', 0, '10010'),
(12, 'Carmen', 'Rosario', '002929', '0323-12-23', 'correo@correo.com', 0, '002929');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretaria_departamento`
--

CREATE TABLE IF NOT EXISTS `secretaria_departamento` (
  `Secretaria_Departamentocol` int(11) NOT NULL,
  `Secretaria_idSecretaria` int(11) NOT NULL,
  `Departamento_idDepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguro`
--

CREATE TABLE IF NOT EXISTS `seguro` (
  `idSeguro` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Seguro` varchar(20) NOT NULL,
  `Telefono` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSeguro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `seguro`
--

INSERT INTO `seguro` (`idSeguro`, `Nombre_Seguro`, `Telefono`) VALUES
(1, 'Senasa', 2147483647),
(2, 'Humano', 2147483647),
(3, 'Palic', 82912343);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
