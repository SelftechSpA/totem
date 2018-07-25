-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2018 a las 00:39:01
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estacion_sueno3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authassignment`
--

CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitem`
--

CREATE TABLE `authitem` (
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
('Admin', 2, NULL, NULL, 'N;'),
('Authenticated', 2, NULL, NULL, 'N;'),
('Guest', 2, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Table.*', 1, NULL, NULL, 'N;'),
('Table.Admin', 0, NULL, NULL, 'N;'),
('Table.Create', 0, NULL, NULL, 'N;'),
('Table.Delete', 0, NULL, NULL, 'N;'),
('Table.Index', 0, NULL, NULL, 'N;'),
('Table.Update', 0, NULL, NULL, 'N;'),
('Table.View', 0, NULL, NULL, 'N;'),
('User.Activation.*', 1, NULL, NULL, 'N;'),
('User.Activation.Activation', 0, NULL, NULL, 'N;'),
('User.Default.*', 1, NULL, NULL, 'N;'),
('User.Default.Index', 0, NULL, NULL, 'N;'),
('User.Login.*', 1, NULL, NULL, 'N;'),
('User.Login.Login', 0, NULL, NULL, 'N;'),
('User.Logout.*', 1, NULL, NULL, 'N;'),
('User.Logout.Logout', 0, NULL, NULL, 'N;'),
('User.Profile.*', 1, NULL, NULL, 'N;'),
('User.Profile.Changepassword', 0, NULL, NULL, 'N;'),
('User.Profile.Edit', 0, NULL, NULL, 'N;'),
('User.Profile.Profile', 0, NULL, NULL, 'N;'),
('User.Recovery.*', 1, NULL, NULL, 'N;'),
('User.Recovery.Recovery', 0, NULL, NULL, 'N;'),
('User.User.*', 1, NULL, NULL, 'N;'),
('User.User.Index', 0, NULL, NULL, 'N;'),
('User.User.View', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitemchild`
--

CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('Authenticated', 'Site.Index'),
('Authenticated', 'Table.*'),
('Authenticated', 'Table.Create'),
('Authenticated', 'Table.Index'),
('Authenticated', 'Table.Update'),
('Authenticated', 'Table.View'),
('Authenticated', 'User.Activation.*'),
('Authenticated', 'User.Activation.Activation'),
('Authenticated', 'User.Default.*'),
('Authenticated', 'User.Default.Index'),
('Authenticated', 'User.Login.Login'),
('Authenticated', 'User.Logout.*'),
('Authenticated', 'User.Logout.Logout'),
('Authenticated', 'User.Profile.*'),
('Authenticated', 'User.Profile.Changepassword'),
('Authenticated', 'User.Profile.Edit'),
('Authenticated', 'User.Profile.Profile'),
('Authenticated', 'User.Recovery.Recovery');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`id`, `name`) VALUES
(1, 'Empresa 1'),
(2, 'NEWBE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `occupation`
--

CREATE TABLE `occupation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `occupation`
--

INSERT INTO `occupation` (`id`, `name`) VALUES
(1, 'Licenciado en Ciencias de la Agricultura y los Recursos Naturales'),
(2, 'Ingeniero Agronomo'),
(3, 'Ingeniero Forestal'),
(4, 'Magister en Economia Agraria y Ambiental'),
(5, 'Magister en Fisiologia y Produccion Vegetal'),
(6, 'Magister en Gestion de Empresas Agroalimentarias'),
(7, 'Magister en Recursos Naturales'),
(8, 'Magister en Sistemas de Produccion Animal.'),
(9, 'Doctorado Biotecnologia Vegetal '),
(10, 'Doctorado Ciencias de la Agricultura (magister grado intermedio)'),
(11, 'Doctorado Arquitectura y Estudios Urbanos'),
(12, 'Magister Patrimonio Cultural'),
(13, 'Licenciado en Arquitectura'),
(14, 'Arquitecto'),
(15, 'Magister Administracion de la Construccion (Arquitectura / Ingenieria)'),
(16, 'Magister Arquitectura'),
(17, 'Magister Arquitectura del Paisaje'),
(18, 'Magister Arquitectura Sustentable y Energia'),
(19, 'Magister Proyecto Urbano'),
(20, 'Licenciado en Diseno'),
(21, 'Disenador'),
(22, 'Magister Diseno Avanzado'),
(23, 'Asentamientos Humanos y Medio Ambiente'),
(24, 'Desarrollo Urbano'),
(25, 'Licenciado en Actuacion'),
(26, 'Actor'),
(27, 'Licenciado en Musica mencion Composicion Musical'),
(28, 'Licenciado en Musica mencion en Interpretacion Musical'),
(29, 'Licenciado en Musica mencion Musicologia'),
(30, 'Licenciado en Musica opcion Teoria y Literatura Musical'),
(31, 'Interprete Musical, mencion en Canto'),
(32, 'Interprete Musical, mencion en Direccion Coral'),
(33, 'Interprete Musical, mencion en Instrumento'),
(34, 'Licenciado en Biologia Marina'),
(35, 'Licenciado en Bioquimica'),
(36, 'Licenciado en Ciencias Biologicas'),
(37, 'Biologo con especialidad en Bioprocesos'),
(38, 'Biologo con especialidad en Recursos Naturales y Medio Ambiente.'),
(39, 'Biologo Marino'),
(40, 'Bioquimico'),
(41, 'Ciencias Biologicas (magister grado intermedio)'),
(42, 'Mencion en Ciencias Fisiologicas'),
(43, 'Mencion en Biologia Celular y Molecular'),
(44, 'Mencion en Ecologia'),
(45, 'Mencion en Genetica Molecular y Microbiologia'),
(46, 'Licenciado en Ciencias Economicas y de la Administracion'),
(47, 'Ingeniero Comercial, mencion Administracion de Empresas'),
(48, 'Ingeniero Comercial, mencion Economia'),
(49, 'Administracion de Salud (Administracion / Medicina)'),
(50, 'Ciencias de la Administracion'),
(51, 'Gestion Estrat?gica de Personas y Comportamiento Organizacional (Administracion / Psicologia)'),
(52, 'Finanzas'),
(53, 'Innovacion (Administracion / Ingenieria)'),
(54, 'Administracion de Empresas MBA UC'),
(55, 'Administracion de Empresas'),
(56, 'Economia'),
(57, 'Economia, mencion en Economia Financiera'),
(58, 'Economia, mencion en Macroeconomia'),
(59, 'Economia, mencion en Organizacion Industrial'),
(60, 'Economia, mencion en Politicas P?blicas'),
(61, 'Macroeconomia Aplicada'),
(62, 'Doctorado Economia'),
(63, 'Licenciado en Psicologia'),
(64, 'Psicologo'),
(65, 'Psicologia Clinica'),
(66, 'Psicologia Educacional'),
(67, 'Psicologia de la Salud'),
(68, 'Psicologia Laboral-Organizacional'),
(69, 'Psicoterapia Psicoanalitica Intersubjetiva'),
(70, 'Direccion Estrat?gica de Recursos Humanos y Comportamiento Organizacional'),
(71, 'Medicion y Evaluacion de Programas Educacionales'),
(72, 'Doctorado Psicologia'),
(73, 'Doctorado Psicoterapia'),
(74, 'Doctorado Neurociencias'),
(75, 'Licenciado en Trabajo Social'),
(76, 'Trabajador Social'),
(77, 'Magister en Trabajo Social'),
(78, 'Magister en Trabajo Social y Familia'),
(79, 'Magister en Trabajo Social y Organizaciones'),
(80, 'Postitulo en Estudios de la Familia'),
(81, 'Licenciado en Sociologia'),
(82, 'Licenciado en Antropologia'),
(83, 'Licenciado en Arqueologia'),
(84, 'Sociologo'),
(85, 'Antropologo'),
(86, 'Arqueologo'),
(87, 'Diseno y An?lisis de Encuestas Sociales'),
(88, 'Sociologia'),
(89, 'Doctorado Sociologia'),
(90, 'Licenciado en Comunicacion Social'),
(91, 'Director Audiovisual'),
(92, 'Periodista'),
(93, 'Publicista'),
(94, 'Comunicacion Social mencion en Comunicacion y Educacion'),
(95, 'Periodismo mencion Prensa Escrita'),
(96, 'Ciencias de la Comunicacion (Magister Comunicacion Estratagica)'),
(97, 'Licenciado en Derecho'),
(98, 'Abogado (otorgado por la Corte Suprema)'),
(99, 'Derecho - LLM'),
(100, 'Derecho - LLM mencion Constitucional'),
(101, 'Derecho - LLM mencion Derecho de la Empresa'),
(102, 'Derecho - LLM mencion Derecho Regulatorio'),
(103, 'Derecho - LLM mencion Derecho Tributario'),
(104, 'Derecho de la Empresa-LLM (version internacional)'),
(105, 'Derecho (Magister en Ciencias Juridicas, grado intermedio)'),
(106, 'Licenciado en Educacion'),
(107, 'Educador de P?rvulos'),
(108, 'Profesor de Educacion General B?sica mencion en Ciencias Naturales'),
(109, 'Profesor de Educacion General B?sica, mencion Ciencias Sociales'),
(110, 'Profesor de Educacion General B?sica, mencion Lenguaje y Comunicacion'),
(111, 'Profesor de Educacion General B?sica, mencion Matem?tica'),
(112, 'Profesor de Educacion Media en Artes Esc?nicas '),
(113, 'Profesor de Educacion Media en Artes Visuales'),
(114, 'Profesor de Educacion Media en Ciencias Naturales y Biologia'),
(115, 'Profesor de Educacion Media en Educacion Musical'),
(116, 'Profesor de Educacion Media en Filosofia'),
(117, 'Profesor de Educacion Media en Fisica'),
(118, 'Profesor de Educacion Media en Historia'),
(119, 'Profesor de Educacion Media en Ingl?s\r'),
(120, 'Profesor de Educacion Media en Lenguaje y Comunicacion'),
(121, 'Profesor de Educacion Media en Matem?tica'),
(122, 'Profesor de Educacion Media en Matem?tica y Fisica'),
(123, 'Profesor de Educacion Media en Quimica'),
(124, 'Profesor de Educacion Media en Religion y Moral'),
(125, 'Profesor de Educacion Media en Ciencias Naturales y Biologia'),
(126, 'Profesor de Educacion Media en Fisica'),
(127, 'Profesor de Educacion Media en Matem?tica'),
(128, 'Profesor de Educacion Media en Quimica'),
(129, 'Profesor de Ingl?s para Educacion B?sica y Media'),
(130, 'Educacion, mencion en Curriculum Escolar'),
(131, 'Educacion, mencion en Dificultades del Aprendizaje'),
(132, 'Educacion, mencion en Direccion y Liderazgo Educacional'),
(133, 'Educacion, mencion en Evaluacion de Aprendizajes'),
(134, 'Educacion'),
(135, 'Licenciado en Fisica'),
(136, 'Licenciado en Astronomia'),
(137, 'Fisica'),
(138, 'Fisica Medica'),
(139, 'Astrofisica'),
(140, 'Licenciado en Estetica'),
(141, 'Licenciado en Ciencia Politica'),
(142, 'Cientista Politico'),
(143, 'Ciencia Politica, mencion en Gobierno y Politicas P?blicas'),
(144, 'Ciencia Politica, mencion en Relaciones Internacionales'),
(145, 'Licenciado en Historia'),
(146, 'Ingeniero Civil de Biotecnologia'),
(147, 'Ingeniero Civil de Computacion '),
(148, 'Ingeniero Civil con Diploma de Especialidad en'),
(149, 'Ingeniero Civil de Industrias con Diploma de Especialidad en:'),
(150, 'Ingeniero Civil Electricista'),
(151, 'Ingeniero Civil Mec?nico'),
(152, 'Administracion de la Construccion (Arquitectura / Ingenieria)'),
(153, 'Magister Ciencias de la Ingenieria ?rea Ciencia de la Computacion'),
(154, 'Magister Ciencias de la Ingenieria ?rea Ingenieria de Transporte y Logistica'),
(155, 'Magister Ciencias de la Ingenieria ?rea Ingenieria El?ctrica'),
(156, 'Magister Ciencias de la Ingenieria ?rea Ingenieria en Mineria'),
(157, 'Magister Ciencias de la Ingenieria ?rea Ingenieria Estructural y Geot?cnica'),
(158, 'Magister Ciencias de la Ingenieria ?rea Ingenieria Hidr?ulica y Ambiental'),
(159, 'Magister Ciencias de la Ingenieria ?rea Ingenieria Industrial y de Sistemas'),
(160, 'Magister Ciencias de la Ingenieria ?rea Ingenieria Mec?nica y Metal?rgica'),
(161, 'Magister Ciencias de la Ingenieria ?rea Ingenieria Quimica y Bioprocesos'),
(162, 'Magister Ciencias de la Ingenieria ?rea Ingenieria y Gestion de la Construccion'),
(163, 'Magister Ingenieria'),
(164, 'Magister Ingenieria de la Energia'),
(165, 'Magister Ingenieria Estructural y Geot?cnica'),
(166, 'Magister Ingenieria Industrial'),
(167, 'Magister Innovacion'),
(168, 'Magister Procesamiento y Gestion de la Informacion (Letras / Ingenieria)'),
(169, 'Magister Tecnologias de Informacion y Gestion'),
(170, 'Doctorado Ciencias de la Ingenieria ?rea Ciencia de la Computacion'),
(171, 'Doctorado Ciencias de la Ingenieria ?rea Ingenieria Civil'),
(172, 'Doctorado Ciencias de la Ingenieria ?rea Ingenieria El?ctrica'),
(173, 'Doctorado Ciencias de la Ingenieria ?rea Ingenieria Mec?nica'),
(174, 'Doctorado Ciencias de la Ingenieria ?rea Ingenieria Quimica y Bioprocesos'),
(175, 'Doctorado Ciencias de la Ingenieria ?rea Ingenieria Industrial y de Transporte.'),
(176, 'Licenciado en Letras Mencion en Ling?istica y Literatura Hisp?nicas'),
(177, 'Licenciado en Letras Mencion en Ling?istica y Literatura Inglesas'),
(178, 'Profesor de Ingles para Educacion B?sica y Media'),
(179, 'Licenciado en Estadistica'),
(180, 'Licenciado en Matematica'),
(181, 'Licenciado en Nutricion y Diet?tica'),
(182, 'Licenciado en Kinesiologia'),
(183, 'Licenciado en Fonoaudiologia'),
(184, 'Licenciado en Odontologia'),
(185, 'Licenciado en Enfermeria'),
(186, 'Licenciado en Medicina'),
(187, 'Ciencias Medicas'),
(188, 'Neurociencias'),
(189, 'Anatomia Patologica '),
(190, 'Anestesiologia'),
(191, 'Cirugia General'),
(192, 'Cirugia Pedi?trica'),
(193, 'Dermatologia'),
(194, 'Geriatria'),
(195, 'Inmunologia, Alergia y Reumatologia'),
(196, 'Laboratorio Clinico'),
(197, 'Medicina de Adolescencia'),
(198, 'Medicina Intensiva del Nino'),
(199, 'Medicina de Urgencia'),
(200, 'Medicina Familiar Mencion Adulto'),
(201, 'Medicina Familiar Mencion Nino'),
(202, 'Medicina Interna'),
(203, 'Medicina Nuclear'),
(204, 'Neonatologia'),
(205, 'Neurocirugia'),
(206, 'Neurologia'),
(207, 'Neurologia Pediatrica'),
(208, 'Neuroradiologia Diagnostica'),
(209, 'Nutricion Clinica y Diabetologia '),
(210, 'Obstetricia y Ginecologia'),
(211, 'Oftalmologia'),
(212, 'Otorrinolaringologia'),
(213, 'Pediatria'),
(214, 'Psiquiatria'),
(215, 'Psiquiatria de Enlace y Medicina Psicosom?tica'),
(216, 'Psiquiatria del nino y del adolescente'),
(217, 'Radiologia'),
(218, 'Salud Publica'),
(219, 'Traumatologia y Ortopedia'),
(220, 'Urologia'),
(221, 'Anestesia Cardiovascular'),
(222, 'Anestesia Regional y Analgesia Perioperatoria'),
(223, 'Anestesiologia Pedi?trica'),
(224, 'Cardiologia'),
(225, 'Cardiologia Intervencional'),
(226, 'Cardiologia Pedi?trica '),
(227, 'Cirugia Cardiovascular'),
(228, 'Cirugia Digestiva'),
(229, 'Cirugia Oncologica y de Cabeza y Cuello'),
(230, 'Cirugia Pl?stica y Reconstructiva'),
(231, 'Cirugia Vascular '),
(232, 'Coloproctologia'),
(233, 'Endocrinologia'),
(234, 'Endocrinologia Pedi?trica'),
(235, 'Enfermedades Infecciosas del Adulto'),
(236, 'Enfermedades Infecciosas del Nino'),
(237, 'Enfermedades Respiratorias del Adulto'),
(238, 'Enfermedades Respiratorias y Medicina Intensiva del Adulto'),
(239, 'Enfermedades Respiratorias del Nino '),
(240, 'Gastroenterologia'),
(241, 'Gastroenterologia y Nutricion Pedi?trica '),
(242, 'Geriatria'),
(243, 'Ginecologia Oncologica'),
(244, 'Hematologia'),
(245, 'Hematologia y Oncologia pedi?trica '),
(246, 'Hemostasia y Trombosis'),
(247, 'Inmunologia Clinica y Reumatologia'),
(248, 'Medicina Intensiva del Adulto'),
(249, 'Medicina Intensiva del Nino'),
(250, 'Medicina Materno Fetal'),
(251, 'Medicina Paliativa'),
(252, 'Medicina Transfusional y Banco de Sangre'),
(253, 'Nefrologia Adultos'),
(254, 'Neonatologia'),
(255, 'Nutricion Clinica y Diabetologia'),
(256, 'Oncologia M?dica'),
(257, 'Radiologia Pedi?trica'),
(258, 'Licenciado en Quimica'),
(259, 'Licenciado en Quimica y Farmacia'),
(260, 'Bachiller en Teologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `occupation_area`
--

CREATE TABLE `occupation_area` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `occupation_area`
--

INSERT INTO `occupation_area` (`id`, `name`) VALUES
(1, 'Primero'),
(2, 'Segundo'),
(3, 'Tercero'),
(4, 'Cuarto'),
(5, 'Quinto'),
(6, 'Sexto'),
(7, 'Septimo'),
(8, 'Octavo'),
(9, 'Noveno'),
(10, 'Decimo'),
(11, 'Decimo Primero'),
(12, 'Decimo segundo'),
(13, 'Mas + ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` int(10) NOT NULL DEFAULT '0',
  `height` decimal(10,2) NOT NULL DEFAULT '0.00',
  `weight` decimal(10,2) NOT NULL DEFAULT '0.00',
  `age` int(10) NOT NULL DEFAULT '0',
  `marital_status` int(10) NOT NULL DEFAULT '0',
  `activity_level` int(10) NOT NULL DEFAULT '0',
  `working_days_sleep_hours` time NOT NULL DEFAULT '00:00:00',
  `working_days_sleep_hours_desired` time NOT NULL DEFAULT '00:00:00',
  `working_days_sleep_quality` decimal(10,2) NOT NULL DEFAULT '0.00',
  `weekend_sleep_hours` time NOT NULL DEFAULT '00:00:00',
  `weekend_sleep_hours_desired` time NOT NULL DEFAULT '00:00:00',
  `weekend_sleep_quality` int(10) NOT NULL DEFAULT '0',
  `working_hours` time NOT NULL DEFAULT '00:00:00',
  `exercise_hours` time NOT NULL DEFAULT '00:00:00',
  `recreation_hours` time NOT NULL DEFAULT '00:00:00',
  `travel_hours` time NOT NULL DEFAULT '00:00:00',
  `company_id` int(10) NOT NULL DEFAULT '0',
  `occupation_id` int(10) NOT NULL DEFAULT '0',
  `occupation_area_id` int(10) NOT NULL DEFAULT '0',
  `provider` varchar(255) NOT NULL DEFAULT '',
  `provider_id` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `gender`, `height`, `weight`, `age`, `marital_status`, `activity_level`, `working_days_sleep_hours`, `working_days_sleep_hours_desired`, `working_days_sleep_quality`, `weekend_sleep_hours`, `weekend_sleep_hours_desired`, `weekend_sleep_quality`, `working_hours`, `exercise_hours`, `recreation_hours`, `travel_hours`, `company_id`, `occupation_id`, `occupation_area_id`, `provider`, `provider_id`) VALUES
(1, 'Administrador', 1, '1.80', '60.00', 0, 1, 1, '00:00:00', '00:00:00', '0.00', '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 1, 1, 'cantinflas', ''),
(6, 'Demo', 1, '1.80', '60.00', 0, 1, 1, '00:00:00', '00:00:00', '0.00', '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, 0, '', ''),
(7, 'erick', 1, '1.60', '70.00', 30, 2, 2, '04:00:00', '05:00:00', '3.00', '04:00:00', '05:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 3, 13, '', ''),
(8, 'pep', 2, '1.60', '70.00', 30, 3, 3, '04:00:00', '04:00:00', '3.00', '06:00:00', '06:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 3, 17, '', ''),
(9, 'papa', 2, '1.60', '85.00', 30, 1, 2, '06:00:00', '08:00:00', '2.00', '08:00:00', '06:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 6, 34, '', ''),
(10, 'caca', 1, '1.60', '70.00', 30, 2, 2, '05:00:00', '05:00:00', '3.00', '04:00:00', '04:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 53, 9, '', ''),
(11, 'ernesto', 1, '1.60', '104.00', 50, 3, 2, '06:00:00', '05:00:00', '4.00', '05:00:00', '04:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 51, 2, '', ''),
(12, 'roberta', 2, '1.60', '70.00', 30, 2, 2, '06:00:00', '06:00:00', '3.00', '04:00:00', '05:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 11, 6, '', ''),
(13, 'dfsdf', 1, '1.60', '70.00', 30, 3, 2, '03:00:00', '04:00:00', '4.00', '05:00:00', '05:00:00', 0, '05:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 4, 9, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile_field`
--

CREATE TABLE `profile_field` (
  `id` int(11) NOT NULL,
  `varname` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `field_type` varchar(50) NOT NULL DEFAULT '',
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` text,
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` text,
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profile_field`
--

INSERT INTO `profile_field` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(5, 'name', 'Name', 'VARCHAR', 255, 0, 1, '', '', '', '', '', '', '', 0, 1),
(12, 'gender', 'Sexo', 'INTEGER', 10, 0, 1, '', '1==Masculino;2==Femenino', '', '', '0', '', '', 10, 1),
(13, 'height', 'Altura', 'DECIMAL', 10, 0, 1, '', '', '', '', '0', '', '', 20, 1),
(14, 'weight', 'Peso', 'DECIMAL', 10, 0, 1, '', '', '', '', '0', '', '', 30, 1),
(15, 'age', 'Edad', 'INTEGER', 10, 0, 1, '', '', '', '', '0', '', '', 40, 1),
(16, 'marital_status', 'Estado civil', 'INTEGER', 10, 0, 1, '', '1==Soltero;2==Casado;3==Divorciado;4==Viudo', '', '', '0', '', '', 50, 1),
(19, 'activity_level', 'Nivel de actividad', 'INTEGER', 10, 0, 1, '', '1==Sedentario;2==Activo;3==Muy activo', '', '', '0', '', '', 75, 1),
(20, 'working_days_sleep_hours', 'Hrs. de Sueño aprox. en dias de Universidad', 'TIME', 10, 0, 1, '', '', '', '', '0', '', '', 80, 1),
(21, 'working_days_sleep_hours_desired', 'Hrs. de sueño deseadas en días de Universidad', 'TIME', 10, 0, 1, '', '', '', '', '0', '', '', 80, 1),
(22, 'working_days_sleep_quality', 'Calidad de sueño en días de Universidad', 'DECIMAL', 10, 0, 1, '', '', '', '', '0', '', '', 80, 1),
(23, 'weekend_sleep_hours', 'Horas de sueño habituales en fines de semana', 'TIME', 10, 0, 1, '', '', '', '', '0', '', '', 110, 1),
(24, 'weekend_sleep_hours_desired', 'Hrs. de sueño deseadas en fines de semana', 'TIME', 10, 0, 1, '', '', '', '', '0', '', '', 120, 1),
(25, 'weekend_sleep_quality', 'Calidad de sueño en fines de semana', 'INTEGER', 10, 0, 1, '', '', '', '', '0', '', '', 130, 1),
(26, 'working_hours', 'Hrs de Universidad Promedio(al dia)', 'TIME', 10, 0, 1, '', '', '', '', '0', '', '', 140, 1),
(27, 'exercise_hours', 'Horas de actividad física', 'TIME', 10, 0, 1, '', '', '', '', '0', '', '', 150, 1),
(28, 'recreation_hours', 'Horas de actividad recreativa', 'TIME', 10, 0, 1, '', '', '', '', '0', '', '', 160, 1),
(29, 'travel_hours', 'Horas de viaje', 'TIME', 10, 0, 1, '', '', '', '', '0', '', '', 170, 1),
(30, 'company_id', 'Empresa', 'INTEGER', 10, 0, 2, '', '', '', '', '0', 'UWrelBelongsTo', '{\"modelName\":\"Company\",\"optionName\":\"name\",\"emptyField\":\"Ninguno\",\"relationName\":\"company\"}', 0, 0),
(31, 'occupation_id', 'Carrera', 'INTEGER', 10, 0, 1, '', '', '', '', '0', 'UWrelBelongsTo', '{\"modelName\":\"Occupation\",\"optionName\":\"name\",\"relationName\":\"occupation\"}', 61, 1),
(32, 'occupation_area_id', 'Año de Carrera', 'INTEGER', 10, 0, 1, '', '', '', '', '0', 'UWrelBelongsTo', '{\"modelName\":\"OccupationArea\",\"optionName\":\"name\",\"relationName\":\"occupation_area\"}', 71, 1),
(33, 'provider', 'Proveedor', 'VARCHAR', 255, 0, 0, '', '', '', '', '', '', '', 33, 1),
(35, 'provider_id', 'Id del proveedor', 'VARCHAR', 255, 0, 0, '', '', '', '', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question`
--

CREATE TABLE `question` (
  `id` int(10) UNSIGNED NOT NULL,
  `test_id` int(10) UNSIGNED NOT NULL,
  `number` int(10) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `question_type` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `question`
--

INSERT INTO `question` (`id`, `test_id`, `number`, `text`, `question_type`) VALUES
(1, 3, 1, 'Sentado leyendo', 1),
(2, 3, 2, 'Viendo televisión', 1),
(3, 3, 3, 'Sentado, inactivo en un lugar público', 1),
(4, 3, 4, 'Como pasajero en un coche una hora seguida', 1),
(5, 3, 5, 'Descansando recostado por la tarde cuando las circunsatancias lo permiten', 1),
(6, 3, 6, 'Sentado charlando con alguien', 1),
(7, 3, 7, 'Sentado tranquilo, después de un almuerzo sin alcohol', 1),
(8, 3, 8, 'En un coche, al pararse unos minutos en el tráfico', 1),
(9, 1, 1, 'en su casa, ¿a qué hora se acuesta normalmente por la noche?', 2),
(10, 1, 2, '¿Cúanto tiempo demora en quedarse dormido en promedio?', 2),
(11, 1, 3, '¿A qué hora se levanta habitualmente por la mañana?', 2),
(12, 1, 4, '¿Cuántas horas duerme habitualmente cada noche?', 2),
(13, 1, 5, 'No poder quedarse dormido en la primera media hora', 3),
(14, 1, 6, 'Despertarse durante la noche o de madrugada', 3),
(15, 1, 7, 'Tener que levantarse para ir al baño', 3),
(16, 1, 8, 'No poder respirar bien', 3),
(17, 1, 9, 'Toser o roncar ruidosamente', 3),
(18, 1, 10, 'Sentir  frio', 3),
(19, 1, 11, 'Sentir calor', 3),
(20, 1, 12, 'Tener sueños feos o pesadillas', 3),
(21, 1, 13, 'Tener dolores', 3),
(22, 1, 14, 'Otras razones', 3),
(23, 1, 15, 'Durante el mes pasado... ¿cuántas veces ha tomado medicinas (recetadas por el medico o por su cuenta) para dormir?', 3),
(24, 1, 16, 'Durante el mes pasado... ¿cuántas veces ha tenido problemas para permanecer despierto mientras conducía, comía, trabajaba, estudiaba o desarrollaba alguna otra actividad social?', 3),
(25, 1, 17, 'Durante el último mes, ¿qué tanto problema le ha traído a usted su estado de ánimo para realizar actividades como conducir, comer, trabajar, estudiar o alguna otra actividad social?', 4),
(26, 1, 18, 'Durante el último mes, ¿cómo calificaría en conjunto la calidad de su sueño?', 5),
(27, 2, 1, 'Ronquido fuerte', 6),
(28, 2, 2, '¿Siente las piernas inquietas, como si saltaran, o que se sacuden? (En cualquier momento del día)?', 6),
(29, 2, 3, 'Dificultad para conciliar el sueño', 6),
(30, 2, 4, 'Despertares frecuentes', 6),
(31, 2, 5, '¿Tiene dificultad para respirar? ¿Respiración entrecortada? ¿Respiración ruidosa? (En cualquier momento del día)', 6),
(32, 2, 6, '¿Se siente adormecido en el trabajo? (mientras conduce)', 6),
(33, 2, 7, '¿Con frecuencia da vueltas o se sacude en la cama?', 6),
(34, 2, 8, '¿En algún momento siente que se queda sin aire? (en cualquier momento del día)', 6),
(35, 2, 9, '¿Tiene excesiva somnolencia (le da mucho sueño) durante el día?', 6),
(36, 2, 10, '¿Tiene dolores de cabeza por la mañana?', 6),
(37, 2, 11, '¿Se sintió adormecido al conducir? (Fuera de su trabajo)', 6),
(38, 2, 12, 'Se siente paralizado, incapaz de moverse por períodos cortos al dormirse o al despertar', 6),
(39, 2, 13, '¿Tiene sueños vívidos al quedarse dormido o en el momento de despertarse?', 6),
(40, 2, 14, 'Ronquido (Cualquiera; fuerte o débil)', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question_type`
--

CREATE TABLE `question_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `question_type`
--

INSERT INTO `question_type` (`id`, `name`) VALUES
(1, 'Epworth'),
(2, 'Pittsburgh - 1'),
(3, 'Pittsburgh - 2'),
(4, 'Pittsburgh - 3'),
(5, 'Pittsburgh - 4'),
(6, 'MAP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question_type_option`
--

CREATE TABLE `question_type_option` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_type_id` int(10) UNSIGNED NOT NULL,
  `value` int(10) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `question_type_option`
--

INSERT INTO `question_type_option` (`id`, `question_type_id`, `value`, `text`) VALUES
(1, 1, 0, 'Ninguna vez en el último mes'),
(2, 1, 1, 'Menos de una vez por semana'),
(3, 1, 2, 'Una o dos veces a la semana'),
(4, 1, 3, 'Tres o más veces a la semana'),
(5, 2, 0, 'Escriba la hora habitual en la que se acuesta hs/min'),
(6, 3, 0, 'Ninguna vez en el último mes'),
(7, 3, 1, 'Menos de una vez a la semana'),
(8, 3, 2, 'Una o dos veces a la semana'),
(9, 3, 3, 'Tres o más veces a la semana'),
(10, 4, 0, 'Ningún problema'),
(11, 4, 1, 'Poco problema'),
(12, 4, 2, 'Moderado problema'),
(13, 4, 3, 'Mucho problema'),
(14, 5, 0, 'Muy buena'),
(15, 5, 1, 'Bastante buena'),
(16, 5, 2, 'Bastante mala'),
(17, 5, 3, 'Muy mala'),
(18, 6, 0, 'Nunca'),
(19, 6, 1, 'Casi nunca'),
(20, 6, 2, 'A veces'),
(21, 6, 3, 'Con frecuencia'),
(22, 6, 4, 'Siempre'),
(23, 6, 5, 'No sabe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rights`
--

CREATE TABLE `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_migration`
--

CREATE TABLE `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1357784830),
('m110805_153437_installYiiUser', 1357784843),
('m110810_162301_userTimestampFix', 1357784843);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test`
--

CREATE TABLE `test` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_reaction_test` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `test`
--

INSERT INTO `test` (`id`, `name`, `is_reaction_test`) VALUES
(1, 'Calidad del sueño', 0),
(2, 'Predicción de apnea', 0),
(3, 'Escala del sueño', 0),
(4, 'Tiempo de reacción', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(128) NOT NULL DEFAULT '',
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `activkey`, `superuser`, `status`, `create_at`, `lastvisit_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'info@devonix.neto', 'ebe83c88cff438a889d3a833d6b2d9e5', 1, 1, '2013-01-10 02:27:23', '2018-03-23 19:30:51'),
(6, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@devonix.net', '2957aefeba7be834458f490d84577314', 1, 1, '2013-05-27 19:41:45', '2018-03-07 22:58:37'),
(7, 'erick', '7b55f59d034002b5fdb7eee735c8846f', 'erick.carvallo@gmail.com', '8565cc897c7706833d6a6c90b2be3d42', 0, 1, '2018-03-02 00:47:13', '2018-03-08 10:38:59'),
(8, 'pepe', '926e27eecdbc7a18858b3798ba99bddd', 'erick.damian13@gmail.com', '685bbb6368d0cc8ca2dde8774ed09015', 0, 1, '2018-03-08 12:50:16', '2018-03-08 08:50:28'),
(9, 'papa', '0ac6cd34e2fac333bf0ee3cd06bdcf96', 'papa@papa.cl', 'e204554eefea6bb2462a08d4fe997a15', 0, 1, '2018-03-16 11:20:11', '2018-03-16 07:20:22'),
(10, 'caca', 'd2104a400c7f629a197f33bb33fe80c0', 'caca@caca.cl', '64d5b5b26442c3a769e7036434580889', 0, 1, '2018-03-22 21:29:25', '2018-03-22 17:29:32'),
(11, 'erni', '5a76a93720f1c736f87b056fa958b5d1', 'ernia@pete.cl', 'cc6025da37b668f093f5054c3a9160c3', 0, 1, '2018-03-22 21:34:15', NULL),
(12, 'salame', 'e18900207d2584a1c7615316e28a2443', 'salame@salame.io', '05c7ad87a69b85817367d173025152dc', 0, 1, '2018-03-23 23:04:42', '2018-03-23 19:04:54'),
(13, 'lola', 'c7562e97ad9f883e16cbb7481d560636', 'lola1234@123.cl', 'e193dd8d41f8225cfbdeb65a54494ce4', 0, 1, '2018-03-23 23:30:31', '2018-03-23 19:30:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_reaction_test`
--

CREATE TABLE `user_reaction_test` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_test_id` int(10) UNSIGNED NOT NULL,
  `sleep_hours` int(10) UNSIGNED NOT NULL,
  `awake_hours` int(10) UNSIGNED NOT NULL,
  `time_now` decimal(10,4) UNSIGNED NOT NULL,
  `alert_level` int(10) UNSIGNED NOT NULL,
  `invalid_count` int(10) UNSIGNED NOT NULL,
  `missed_count` int(10) UNSIGNED NOT NULL,
  `crash_count` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_reaction_test`
--

INSERT INTO `user_reaction_test` (`id`, `user_test_id`, `sleep_hours`, `awake_hours`, `time_now`, `alert_level`, `invalid_count`, `missed_count`, `crash_count`) VALUES
(1, 1, 6, 5, '14.6167', 5, 5, 0, 2),
(2, 16, 4, 6, '12.3500', 5, 0, 0, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_reaction_test_measurement`
--

CREATE TABLE `user_reaction_test_measurement` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_reaction_test_id` int(10) UNSIGNED NOT NULL,
  `value` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_reaction_test_measurement`
--

INSERT INTO `user_reaction_test_measurement` (`id`, `user_reaction_test_id`, `value`) VALUES
(1, 1, '611.00'),
(2, 1, '30.00'),
(3, 1, '367.00'),
(4, 1, '332.00'),
(5, 1, '409.00'),
(6, 1, '395.00'),
(7, 1, '422.00'),
(8, 1, '337.00'),
(9, 1, '402.00'),
(10, 1, '436.00'),
(11, 1, '435.00'),
(12, 1, '426.00'),
(13, 1, '423.00'),
(14, 1, '473.00'),
(15, 1, '497.00'),
(16, 1, '425.00'),
(17, 1, '424.00'),
(18, 1, '591.00'),
(19, 1, '440.00'),
(20, 1, '402.00'),
(21, 1, '355.00'),
(22, 1, '344.00'),
(23, 1, '289.00'),
(24, 1, '309.00'),
(25, 1, '362.00'),
(26, 1, '272.00'),
(27, 1, '343.00'),
(28, 1, '269.00'),
(29, 1, '297.00'),
(30, 1, '291.00'),
(31, 2, '410.00'),
(32, 2, '373.00'),
(33, 2, '337.00'),
(34, 2, '336.00'),
(35, 2, '505.00'),
(36, 2, '338.00'),
(37, 2, '271.00'),
(38, 2, '253.00'),
(39, 2, '294.00'),
(40, 2, '446.00'),
(41, 2, '354.00'),
(42, 2, '242.00'),
(43, 2, '360.00'),
(44, 2, '422.00'),
(45, 2, '449.00'),
(46, 2, '271.00'),
(47, 2, '680.00'),
(48, 2, '394.00'),
(49, 2, '723.00'),
(50, 2, '311.00'),
(51, 2, '341.00'),
(52, 2, '276.00'),
(53, 2, '368.00'),
(54, 2, '351.00'),
(55, 2, '618.00'),
(56, 2, '336.00'),
(57, 2, '406.00'),
(58, 2, '308.00'),
(59, 2, '287.00'),
(60, 2, '260.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_test`
--

CREATE TABLE `user_test` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `test_id` int(10) UNSIGNED NOT NULL,
  `date_taken` datetime NOT NULL,
  `score` decimal(10,4) NOT NULL,
  `gender` int(10) NOT NULL DEFAULT '0',
  `height` decimal(10,2) NOT NULL DEFAULT '0.00',
  `weight` decimal(10,2) NOT NULL DEFAULT '0.00',
  `age` int(10) NOT NULL DEFAULT '0',
  `marital_status` int(10) NOT NULL DEFAULT '0',
  `occupation` varchar(255) NOT NULL DEFAULT '',
  `occupation_area` varchar(255) NOT NULL DEFAULT '',
  `activity_level` int(10) NOT NULL DEFAULT '0',
  `working_days_sleep_hours` time NOT NULL DEFAULT '00:00:00',
  `working_days_sleep_hours_desired` time NOT NULL DEFAULT '00:00:00',
  `working_days_sleep_quality` decimal(10,2) NOT NULL DEFAULT '0.00',
  `weekend_sleep_hours` time NOT NULL DEFAULT '00:00:00',
  `weekend_sleep_hours_desired` time NOT NULL DEFAULT '00:00:00',
  `weekend_sleep_quality` int(10) NOT NULL DEFAULT '0',
  `working_hours` time NOT NULL DEFAULT '00:00:00',
  `exercise_hours` time NOT NULL DEFAULT '00:00:00',
  `recreation_hours` time NOT NULL DEFAULT '00:00:00',
  `travel_hours` time NOT NULL DEFAULT '00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_test`
--

INSERT INTO `user_test` (`id`, `user_id`, `test_id`, `date_taken`, `score`, `gender`, `height`, `weight`, `age`, `marital_status`, `occupation`, `occupation_area`, `activity_level`, `working_days_sleep_hours`, `working_days_sleep_hours_desired`, `working_days_sleep_quality`, `weekend_sleep_hours`, `weekend_sleep_hours_desired`, `weekend_sleep_quality`, `working_hours`, `exercise_hours`, `recreation_hours`, `travel_hours`) VALUES
(1, 1, 4, '2018-03-02 14:41:57', '380.2667', 1, '1.80', '60.00', 0, 1, 'Empresario', 'Administración pública', 1, '00:00:00', '00:00:00', '0.00', '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(3, 8, 1, '2018-03-08 13:50:58', '11.0000', 2, '1.60', '70.00', 30, 3, 'Comerciante', 'Industria automotriz', 3, '04:00:00', '04:00:00', '3.00', '06:00:00', '06:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(4, 8, 2, '2018-03-08 13:51:16', '0.1159', 2, '1.60', '70.00', 30, 3, 'Comerciante', 'Industria automotriz', 3, '04:00:00', '04:00:00', '3.00', '06:00:00', '06:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(5, 8, 3, '2018-03-08 14:14:32', '7.0000', 2, '1.60', '70.00', 30, 3, 'Comerciante', 'Industria automotriz', 3, '04:00:00', '04:00:00', '3.00', '06:00:00', '06:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(6, 8, 1, '2018-03-08 14:16:45', '9.0000', 2, '1.60', '70.00', 30, 3, 'Comerciante', 'Industria automotriz', 3, '04:00:00', '04:00:00', '3.00', '06:00:00', '06:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(7, 1, 1, '2018-03-08 14:17:41', '14.0000', 1, '1.80', '60.00', 0, 1, 'Empresario', 'Administración pública', 1, '00:00:00', '00:00:00', '0.00', '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(8, 7, 1, '2018-03-08 14:27:55', '20.0000', 1, '1.60', '70.00', 30, 2, 'Comerciante', 'Enseñanza', 2, '04:00:00', '05:00:00', '3.00', '04:00:00', '05:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(9, 7, 2, '2018-03-08 14:28:19', '0.4017', 1, '1.60', '70.00', 30, 2, 'Comerciante', 'Enseñanza', 2, '04:00:00', '05:00:00', '3.00', '04:00:00', '05:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(10, 7, 3, '2018-03-08 14:28:53', '18.0000', 1, '1.60', '70.00', 30, 2, 'Comerciante', 'Enseñanza', 2, '04:00:00', '05:00:00', '3.00', '04:00:00', '05:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(11, 7, 1, '2018-03-08 15:39:20', '12.0000', 1, '1.60', '70.00', 30, 2, 'Comerciante', 'Enseñanza', 2, '04:00:00', '05:00:00', '3.00', '04:00:00', '05:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(12, 7, 3, '2018-03-08 15:39:36', '10.0000', 1, '1.60', '70.00', 30, 2, 'Comerciante', 'Enseñanza', 2, '04:00:00', '05:00:00', '3.00', '04:00:00', '05:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(13, 9, 1, '2018-03-16 12:20:59', '4.0000', 2, '1.60', '85.00', 30, 1, 'Jefatura', 'Universidades y educación', 2, '06:00:00', '08:00:00', '2.00', '08:00:00', '06:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(14, 9, 2, '2018-03-16 12:21:21', '0.3094', 2, '1.60', '85.00', 30, 1, 'Jefatura', 'Universidades y educación', 2, '06:00:00', '08:00:00', '2.00', '08:00:00', '06:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(15, 9, 3, '2018-03-16 12:21:36', '12.0000', 2, '1.60', '85.00', 30, 1, 'Jefatura', 'Universidades y educación', 2, '06:00:00', '08:00:00', '2.00', '08:00:00', '06:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(16, 9, 4, '2018-03-16 12:25:55', '377.3333', 2, '1.60', '85.00', 30, 1, 'Jefatura', 'Universidades y educación', 2, '06:00:00', '08:00:00', '2.00', '08:00:00', '06:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_test_answer`
--

CREATE TABLE `user_test_answer` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_test_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `question_type_option_id` int(10) UNSIGNED DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_test_answer`
--

INSERT INTO `user_test_answer` (`id`, `user_test_id`, `question_id`, `question_type_option_id`, `value`) VALUES
(5, 3, 9, NULL, '7.03'),
(6, 3, 10, NULL, '2.03'),
(7, 3, 11, NULL, '2.03'),
(8, 3, 12, NULL, NULL),
(9, 3, 13, 1, NULL),
(10, 3, 14, 2, NULL),
(11, 3, 15, 2, NULL),
(12, 3, 16, 1, NULL),
(13, 3, 17, 2, NULL),
(14, 3, 18, 1, NULL),
(15, 3, 19, 2, NULL),
(16, 3, 20, 1, NULL),
(17, 3, 21, 2, NULL),
(18, 3, 22, 1, NULL),
(19, 3, 23, 2, NULL),
(20, 3, 24, 1, NULL),
(21, 3, 25, 2, NULL),
(22, 3, 26, 1, NULL),
(23, 4, 27, 2, NULL),
(24, 4, 28, 3, NULL),
(25, 4, 29, 2, NULL),
(26, 4, 30, 3, NULL),
(27, 4, 31, 2, NULL),
(28, 4, 32, 3, NULL),
(29, 4, 33, 2, NULL),
(30, 4, 34, 3, NULL),
(31, 4, 35, 2, NULL),
(32, 4, 36, 3, NULL),
(33, 4, 37, 2, NULL),
(34, 4, 38, 3, NULL),
(35, 4, 39, 2, NULL),
(36, 4, 40, 3, NULL),
(37, 5, 1, 2, NULL),
(38, 5, 2, 3, NULL),
(39, 5, 3, 2, NULL),
(40, 5, 4, 2, NULL),
(41, 5, 5, 2, NULL),
(42, 5, 6, 2, NULL),
(43, 5, 7, 1, NULL),
(44, 5, 8, 1, NULL),
(45, 6, 9, NULL, '6.03'),
(46, 6, 10, NULL, '4.07'),
(47, 6, 11, NULL, '4.07'),
(48, 6, 12, NULL, '4.07'),
(49, 6, 13, 1, NULL),
(50, 6, 14, 1, NULL),
(51, 6, 15, 1, NULL),
(52, 6, 16, 1, NULL),
(53, 6, 17, 1, NULL),
(54, 6, 18, 1, NULL),
(55, 6, 19, 1, NULL),
(56, 6, 20, 1, NULL),
(57, 6, 21, 1, NULL),
(58, 6, 22, 1, NULL),
(59, 6, 23, 1, NULL),
(60, 6, 24, 1, NULL),
(61, 6, 25, 3, NULL),
(62, 6, 26, 1, NULL),
(63, 7, 9, NULL, '4.07'),
(64, 7, 10, NULL, '4.07'),
(65, 7, 11, NULL, '4.07'),
(66, 7, 12, NULL, '4.07'),
(67, 7, 13, 3, NULL),
(68, 7, 14, 3, NULL),
(69, 7, 15, 2, NULL),
(70, 7, 16, 2, NULL),
(71, 7, 17, 2, NULL),
(72, 7, 18, 2, NULL),
(73, 7, 19, 2, NULL),
(74, 7, 20, 2, NULL),
(75, 7, 21, 2, NULL),
(76, 7, 22, 2, NULL),
(77, 7, 23, 2, NULL),
(78, 7, 24, 2, NULL),
(79, 7, 25, 2, NULL),
(80, 7, 26, 2, NULL),
(81, 8, 9, NULL, '23.00'),
(82, 8, 10, NULL, '3.00'),
(83, 8, 11, NULL, '10.00'),
(84, 8, 12, NULL, '5.00'),
(85, 8, 13, 4, NULL),
(86, 8, 14, 4, NULL),
(87, 8, 15, 4, NULL),
(88, 8, 16, 4, NULL),
(89, 8, 17, 4, NULL),
(90, 8, 18, 4, NULL),
(91, 8, 19, 4, NULL),
(92, 8, 20, 4, NULL),
(93, 8, 21, 4, NULL),
(94, 8, 22, 4, NULL),
(95, 8, 23, 4, NULL),
(96, 8, 24, 4, NULL),
(97, 8, 25, 4, NULL),
(98, 8, 26, 4, NULL),
(99, 9, 27, 3, NULL),
(100, 9, 28, 3, NULL),
(101, 9, 29, 3, NULL),
(102, 9, 30, 3, NULL),
(103, 9, 31, 3, NULL),
(104, 9, 32, 3, NULL),
(105, 9, 33, 3, NULL),
(106, 9, 34, 3, NULL),
(107, 9, 35, 3, NULL),
(108, 9, 36, 3, NULL),
(109, 9, 37, 3, NULL),
(110, 9, 38, 3, NULL),
(111, 9, 39, 3, NULL),
(112, 9, 40, 3, NULL),
(113, 10, 1, 4, NULL),
(114, 10, 2, 4, NULL),
(115, 10, 3, 4, NULL),
(116, 10, 4, 4, NULL),
(117, 10, 5, 4, NULL),
(118, 10, 6, 1, NULL),
(119, 10, 7, 4, NULL),
(120, 10, 8, 1, NULL),
(121, 11, 9, NULL, '2.03'),
(122, 11, 10, NULL, '2.03'),
(123, 11, 11, NULL, '2.03'),
(124, 11, 12, NULL, '2.03'),
(125, 11, 13, 2, NULL),
(126, 11, 14, 2, NULL),
(127, 11, 15, 2, NULL),
(128, 11, 16, 2, NULL),
(129, 11, 17, 2, NULL),
(130, 11, 18, 2, NULL),
(131, 11, 19, 2, NULL),
(132, 11, 20, 2, NULL),
(133, 11, 21, 2, NULL),
(134, 11, 22, 2, NULL),
(135, 11, 23, 2, NULL),
(136, 11, 24, 2, NULL),
(137, 11, 25, 2, NULL),
(138, 11, 26, 2, NULL),
(139, 12, 1, 2, NULL),
(140, 12, 2, 2, NULL),
(141, 12, 3, 2, NULL),
(142, 12, 4, 2, NULL),
(143, 12, 5, 3, NULL),
(144, 12, 6, 2, NULL),
(145, 12, 7, 3, NULL),
(146, 12, 8, 2, NULL),
(147, 13, 9, NULL, '21.00'),
(148, 13, 10, NULL, '2.00'),
(149, 13, 11, NULL, '8.00'),
(150, 13, 12, NULL, '8.00'),
(151, 13, 13, 1, NULL),
(152, 13, 14, 1, NULL),
(153, 13, 15, 1, NULL),
(154, 13, 16, 1, NULL),
(155, 13, 17, 1, NULL),
(156, 13, 18, 1, NULL),
(157, 13, 19, 1, NULL),
(158, 13, 20, 1, NULL),
(159, 13, 21, 1, NULL),
(160, 13, 22, 1, NULL),
(161, 13, 23, 1, NULL),
(162, 13, 24, 1, NULL),
(163, 13, 25, 1, NULL),
(164, 13, 26, 1, NULL),
(165, 14, 27, 4, NULL),
(166, 14, 28, 4, NULL),
(167, 14, 29, 4, NULL),
(168, 14, 30, 3, NULL),
(169, 14, 31, 4, NULL),
(170, 14, 32, 3, NULL),
(171, 14, 33, 4, NULL),
(172, 14, 34, 3, NULL),
(173, 14, 35, 4, NULL),
(174, 14, 36, 3, NULL),
(175, 14, 37, 4, NULL),
(176, 14, 38, 3, NULL),
(177, 14, 39, 4, NULL),
(178, 14, 40, 3, NULL),
(179, 15, 1, 2, NULL),
(180, 15, 2, 3, NULL),
(181, 15, 3, 2, NULL),
(182, 15, 4, 3, NULL),
(183, 15, 5, 2, NULL),
(184, 15, 6, 3, NULL),
(185, 15, 7, 2, NULL),
(186, 15, 8, 3, NULL);

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
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `occupation_area`
--
ALTER TABLE `occupation_area`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `profile_field`
--
ALTER TABLE `profile_field`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indices de la tabla `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `question_type_option`
--
ALTER TABLE `question_type_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_type_id` (`question_type_id`);

--
-- Indices de la tabla `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`itemname`);

--
-- Indices de la tabla `tbl_migration`
--
ALTER TABLE `tbl_migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_username` (`username`),
  ADD UNIQUE KEY `user_email` (`email`);

--
-- Indices de la tabla `user_reaction_test`
--
ALTER TABLE `user_reaction_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_test_id` (`user_test_id`);

--
-- Indices de la tabla `user_reaction_test_measurement`
--
ALTER TABLE `user_reaction_test_measurement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_reaction_test_id` (`user_reaction_test_id`);

--
-- Indices de la tabla `user_test`
--
ALTER TABLE `user_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indices de la tabla `user_test_answer`
--
ALTER TABLE `user_test_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_test_id` (`user_test_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `question_type_option_id` (`question_type_option_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `occupation`
--
ALTER TABLE `occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT de la tabla `occupation_area`
--
ALTER TABLE `occupation_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `profile`
--
ALTER TABLE `profile`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `profile_field`
--
ALTER TABLE `profile_field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `question`
--
ALTER TABLE `question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `question_type`
--
ALTER TABLE `question_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `question_type_option`
--
ALTER TABLE `question_type_option`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `user_reaction_test`
--
ALTER TABLE `user_reaction_test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user_reaction_test_measurement`
--
ALTER TABLE `user_reaction_test_measurement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `user_test`
--
ALTER TABLE `user_test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `user_test_answer`
--
ALTER TABLE `user_test_answer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

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
-- Filtros para la tabla `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`);

--
-- Filtros para la tabla `question_type_option`
--
ALTER TABLE `question_type_option`
  ADD CONSTRAINT `question_type_option_ibfk_1` FOREIGN KEY (`question_type_id`) REFERENCES `question_type` (`id`);

--
-- Filtros para la tabla `rights`
--
ALTER TABLE `rights`
  ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_reaction_test`
--
ALTER TABLE `user_reaction_test`
  ADD CONSTRAINT `user_reaction_test_ibfk_1` FOREIGN KEY (`user_test_id`) REFERENCES `user_test` (`id`);

--
-- Filtros para la tabla `user_reaction_test_measurement`
--
ALTER TABLE `user_reaction_test_measurement`
  ADD CONSTRAINT `user_reaction_test_measurement_ibfk_3` FOREIGN KEY (`user_reaction_test_id`) REFERENCES `user_reaction_test` (`id`);

--
-- Filtros para la tabla `user_test`
--
ALTER TABLE `user_test`
  ADD CONSTRAINT `user_test_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_test_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`);

--
-- Filtros para la tabla `user_test_answer`
--
ALTER TABLE `user_test_answer`
  ADD CONSTRAINT `user_test_answer_ibfk_1` FOREIGN KEY (`user_test_id`) REFERENCES `user_test` (`id`),
  ADD CONSTRAINT `user_test_answer_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`),
  ADD CONSTRAINT `user_test_answer_ibfk_3` FOREIGN KEY (`question_type_option_id`) REFERENCES `question_type_option` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
