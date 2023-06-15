-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2023 a las 18:21:34
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `insecta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abdomen`
--

CREATE TABLE `abdomen` (
  `id_parte` int(11) UNSIGNED NOT NULL,
  `nombre_abdomen` varchar(50) NOT NULL,
  `fkid_categoria` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `abdomen`
--

INSERT INTO `abdomen` (`id_parte`, `nombre_abdomen`, `fkid_categoria`) VALUES
(34, 'Abdomen globoso', 7),
(35, 'Abdomen alargado', 7),
(36, 'Sin cercos', 6),
(37, 'Con cercos', 6),
(38, 'Con apéndice ovopositor', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabeza`
--

CREATE TABLE `cabeza` (
  `id_parte` int(11) UNSIGNED NOT NULL,
  `nombre_cabeza` varchar(50) NOT NULL,
  `fkid_categoria` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cabeza`
--

INSERT INTO `cabeza` (`id_parte`, `nombre_cabeza`, `fkid_categoria`) VALUES
(1, 'Ojos simples', 1),
(2, 'Ojos compuestos', 1),
(3, 'Hipognato (hacia abajo)', 3),
(4, 'Prognatos (hacia adelante)', 3),
(5, 'Opistognatos (hacia atrás)', 3),
(6, 'Mandibulado:', 3),
(7, 'Chupador:', 3),
(8, 'Setaceas', 2),
(9, 'Filiforme', 2),
(10, 'Monofiliforme', 2),
(11, 'Pectinadas', 2),
(12, 'Aristada', 2),
(13, 'Estilada', 2),
(14, 'Plumosa', 2),
(15, 'Geniculada o acodada', 2),
(16, 'Capitada', 2),
(17, 'Lamelada', 2),
(18, 'Aserrada', 2),
(19, 'Flabeladas', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) UNSIGNED NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'ojos'),
(2, 'antenas'),
(3, 'aparato_bucal'),
(4, 'alas'),
(5, 'patas'),
(6, 'cola'),
(7, 'forma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuerpo`
--

CREATE TABLE `cuerpo` (
  `id_parte` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `ruta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuerpo`
--

INSERT INTO `cuerpo` (`id_parte`, `nombre`, `descripcion`, `ruta`) VALUES
(1, 'Ojos simples', 'Muchos insectos poseen uno o tres ojos simples que están ubicados entre los ojos compuestos. Los utilizan para mantenerse estables en el vuelo', 'assets/images/ojos_simples.jpg'),
(2, 'Ojos compuestos', 'Están formados por numerosas celdas independientes dotadas de una lente individual. Los ojos compuestos perciben mejor los movimientos rápidos', 'assets/images/ojos_compuestos.jpg'),
(3, 'Hipognato (hacia abajo)', 'Las piezas que forman las piezas bucales están orientadas hacia abajo. Ejemplo: las hormigas (Hymenoptera)', 'assets/images/mandibula_hipognato.jpg'),
(4, 'Prognatos (hacia adelante)', 'Las piezas que forman el aparato bucal quedan orientadas hacia delante. Ejemplo: termita (Isoptera)', 'assets/images/abdomen_concerco.jpg'),
(5, 'Opistognatos (hacia atrás)', 'Las piezas que forman las piezas bucales están orientadas hacia abajo y en paralelo. Ejemplo: heterópteros (Heteroptera)', 'assets/images/mandibula_opistognato.jpg'),
(6, 'Mandibulado', ' La gran mayoría de los insectos tienen un APARATO BUCAL MANDIBULADO  o alguna modificación de este tipo. Es usado para agarrar o masticar comida o como defensa, cortejo y construcción', 'assets/images/mandibulado.jpg'),
(7, 'Chupador', 'El tipo de APARATO BUCAL CHUPADOR lo poseen muchos insectos herbívoros de importancia económica. Las piezas tienen forma de tubo para chupar líquidos.', 'assets/images/chupador.jpg'),
(8, 'Setaceas', ' Pequeñas con forma de pelo, y con las piezas mas delgadas hacia el final. Ej:  chicharras', 'assets/images/antenas_setaceas.jpg'),
(9, 'Filiforme', 'Son largas, cilíndrica y con todas sus piezas de tamaño uniforme. Ej: langostas', 'assets/images/antena_filiforme.jpg'),
(10, 'Monofiliforme', 'Se asemejan a una cadena de cuentas. Ej: las termitas', 'assets/images/antena_monofiliforme.jpg'),
(11, 'Pectinadas', 'Estas antenas presentan forma de peine ya que las piezas son mas largas de un lado que de otro obteniendo esta apariencia. Ej: escarabajos', 'assets/images/antena_pectinada.jpg'),
(12, 'Aristada', 'Compacta y con la última pieza agrandada y que de la que parte una especie de pelo. Ej: mosca domestica', 'assets/images/antena_aristada.jpg'),
(13, 'Estilada', 'Compacta y en la última pieza se observa una protuberancia en forma de dedo. Ej: mosca ladrona', 'assets/images/antena_estilada.jpg'),
(14, 'Plumosa', 'Parecida a una filiforme, pero las piezas tienen pelos largos. Ej: algunos lepidópteros', 'assets/images/antena_plumosa.jpg'),
(15, 'Geniculada o acodada', 'Con el la parte principal larga, y con su base corta que produce una forma angulosa. Ej: microhymenópteros, curculionidos', 'assets/images/antena_geniculada.jpg'),
(16, 'Capitada', 'Largas y delgadas, pero con los piezas finales agrandadas formando una especie de cabeza. Ej: algunos lepidópteros', 'assets/images/antena_capitada.jpg'),
(17, 'Lamelada', 'Poseen las piezas finales expandidas a los lados formando un lóbulo redondeado u oval. Ej: algunos coleópteros', 'assets/images/antena_lamelada.jpg'),
(18, 'Aserrada', 'Las piezas de estas antenas tienen uno de los lados angulado, pareciéndose a una sierra. Ej: algunos escarabajos', 'assets/images/antena_aserrada.jpg'),
(19, 'Flabeladas', 'Estas antenas tienen forma de abanicos, pues presentan lóbulos paralelos enfrentados unos contra otros. Ej: escarabajos, mariposas', 'assets/images/antena-flabelada.jpg'),
(20, 'Alas membranosas', 'Alas constituidas por una fina membrana semitransparente en las que se ven las venas con forma de celdas. Ej: libélulas', 'assets/images/alas_membranosas.jpg'),
(21, 'Elitros', 'Son unas alas duras que sirven para proteger y camuflar a las alas posteriores encerrándolas debajo de ellas. Ej: primer par de alas de coleópteros', 'assets/images/alas_elitros.jpg'),
(22, 'Hemiélitros', 'Alas endurecidas al inicio y membranosas hacia su final. Ej: primer par de alas de algunos hemípteros', 'assets/images/alas_hemielitros.jpg'),
(23, 'Halterios', 'Alas pequeñas, con forma de mazo, asociadas al equilibrio. Ej: dípteros', 'assets/images/alas_alterios.jpg'),
(24, 'Tegminas', 'Alas anteriores de algunos insectos algo más endurecidas que las membranosas, se distinguen las venas, y que suelen ser más estrechas que las posteriores', 'assets/images/alas_tegminas.jpg'),
(25, 'Alas con flecos', 'Alas con pelos  o flecos por los bordes. Ej: trips', 'assets/images/alas_flecos.jpg'),
(26, 'Alas con escamas', 'Son membranosas y cubiertas de escamas con colores característicos. Ej: mariposas', 'assets/images/alas_escamas.jpg'),
(27, 'Patas marchadoras', 'En ellas el fémur está agrandado y contiene grandes músculos. En insectos saltadores suelen ser las patas posteriores', 'assets/images/patas_marchadoras.jpg'),
(28, 'Patas saltadoras', 'Este tipo de patas posee el fémur            agrandado y contiene grandes músculos. En insectos saltadores generalmente corresponde a las patas posteriores', 'assets/images/patas_saltadoras.jpg'),
(29, 'Patas cavadoras', 'Corresponden al primer par de patas de los insectos que viven en el suelo y cavan galerías. El segmento tibial de estas patas está ensanchado y posee un extremo dentado', 'assets/images/patas_cavadoras.jpg'),
(30, 'Patas raptoras o prensoras', 'Estas patas son usada para sujetar y atrapar a otros insectos u objetos. Suelen ser patas grandes y ubicadas en la parte anterior del cuerpo', 'assets/images/patas_prensoras.jpg'),
(31, 'Patas colectoras', 'Patas que poseen en himenópteros para transportar el polen que recogen cuando visitan las flores. Posen partes como la tibia y el tercer tarso de las última patas ensanchados y con muchos pelos ', 'assets/images/patas_colectoras.jpg'),
(32, 'Patas nadadora', 'Suelen ser las patas posteriores de los insectos acuáticos. La tibia y tarso se amplia en forma de una paleta, generalmente llena de pelos', 'assets/images/patas_nadadoras.jpg'),
(33, 'Patas colgantes', 'Suelen presentarlas insectos ectoparásitos (parásitos externos), como piojos y pulgas, y las usan para agarrarse de los pelos de su hospedador. En estos insectos la parte final de los tarsos actúan como una garra al moverse hacia el segmento tibial.', 'assets/images/patas_colgantes.jpg'),
(34, 'Abdomen globoso', 'De tamaño es al menos dos veces más ancho que largo ', 'assets/images/abdomen_globoso.jpg'),
(35, 'Abdomen alargado', 'De tamaño es dos veces más largo que ancho', 'assets/images/abdomen_alargado.jpg'),
(36, 'Sin cercos', 'en el abdomen no se observa cola terminal', 'assets/images/abdomen_sincerco.jpg'),
(37, 'Con cercos', 'el abdomen presenta dos apéndices en la cola terminal ', 'assets/images/abdomen_concerco.jpg'),
(38, 'Con apéndice ovopositor', 'en el abdomen se observa de manera visible el aparato sexual', 'assets/images/abdomen_ovopositor.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metamorfosis`
--

CREATE TABLE `metamorfosis` (
  `id_metamorfosis` int(11) NOT NULL,
  `p_metamorfosis` varchar(50) NOT NULL,
  `d_metamorfosis` varchar(500) NOT NULL,
  `i_metamorfosis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metamorfosis`
--

INSERT INTO `metamorfosis` (`id_metamorfosis`, `p_metamorfosis`, `d_metamorfosis`, `i_metamorfosis`) VALUES
(1, 'Insectos ametábolos:', 'son aquellos insectos cuya forma juvenil aparentemente es igual a la forma adulta a excepción de tener un menor tamaño y ser sexualmente inmaduros. Son insectos primitivos y carecen de alas en su forma adulta', 'assets/images/metamorfosis_ametabola.jpg'),
(2, 'Insectos hemimetábolos:', 'sufren una serie de cambios graduales en ciertas partes como puede ser la aparición de las alas de forma progresiva. A las etapas juveniles se les llama ninfas', 'assets/images/metamorfosis_hemimetabola.jpg'),
(3, 'Insectos holometábolos:', 'estos insectos son los más avanzados y sufren una metamorfosis completa, en los que el individuo juvenil (llamado larva) no se parece en nada al adulto', 'assets/images/metamorfosis_holometabolo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id_orden` int(11) NOT NULL,
  `n_orden` varchar(50) NOT NULL,
  `d_orden` varchar(500) NOT NULL,
  `r_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id_orden`, `n_orden`, `d_orden`, `r_img`) VALUES
(1, 'Archaeognatha', 'Llamados también pececillos de cobre, son insectos primitivos que no tienen alas y presentan en la parte final del abdomen tres cercos, presentando también piezas bucales visibles y un cuerpo alargado cubierto de escamas que producen reflejos metalizados.', 'assets/images/Archaeognatha.jpg'),
(2, 'Blattodea', 'Conocidos también como cucarachas es un orden de insectos hemimetábolos. Con color que va del pardo al oscuro presentando un cuerpo ovalado y aplastado. Presentan una protección en su cabeza con una estructura en forma de escudo que cubre la cabeza . En la parte final del abdomen se observa un par de cercos laterales', 'assets/images/Blattodea.jpg'),
(3, 'Caloneurodea', 'Son un orden extinto de insectos. Poseían antenas largas con múltiples segmentos, patas con tarsos de cinco piezas y dos pares de alas de forma y grosor similares, con un patrón de venas muy marcadas. Las alas eran rectas, con nerviaciones sin paralelas, sin fusionarse. ', 'assets/images/Caloneurodea.jpg'),
(4, 'Cnemidolestodea', 'Orden extinto de insectos. Eran relativamente pequeños cabeza hacia delante con grandes ojos doblados y vacíos. Tiene el contorno de un cuadrado o un rectángulo alargado. Tenían piernas  con un artejo grande y sin almohadilla. Las alas delanteras se caracterizaban por la ausencia de un estructura rígida ', 'assets/images/Cnemidolestodea.jpg'),
(5, 'Coleoptera', 'Conocidos como escarabajos, son un orden de insectos de mas de trescientas mil especies descritas. Los coleópteros presentan una enorme variedad morfológica y están presentes en cualquier hábitat. Suelen ser herbívoros. Presentan piezas bucales de tipo masticador, y las alas delanteras son estructuras rígidas, llamadas élitros, que protegen la parte posterior del tórax, además del segundo par de alas, y el abdomen  ', 'assets/images/Coleoptera2.jpg'),
(6, 'Dermaptera', 'Son un orden de insectos conocidos como tijeretas, aludiendo a la forma de los cercos que se asemeja a una pinza, tenaza o tijera que estos insectos tienen en el extremo final del cuerpo. Si poseen alas anteriores funcionan como élitros y recubren al resto.', 'assets/images/Dermaptera.jpg'),
(7, 'Diaphanopterodea', 'Son un orden extinto de insectos del paleozoicos que presentaban un gran tamaño. Incluían algunos de los insectos voladores más antiguos conocidos y eran capaces de plegar sus alas.', 'assets/images/Diaphanopterodea.jpg'),
(8, 'Diptera', 'Son un orden de insectos neópteros cuyas sus alas posteriores se han reducido a halterios, por lo que sólo tienen dos alas membranosas y no cuatro como la mayoría de los insectos. Los halterios funcionan como giróscopos, usados para estabilizarse durante el vuelo. Este orden incluye insectos tan conocidos como las moscas, mosquitos, tábanos y muchos otros menos conocidos', 'assets/images/Diptera.jpg'),
(9, 'Embioptera', 'Se caracterizan por tener patas con fémures gruesos, lo que les da un aspecto de tener gran musculatura. Estos fémures ayudan al insecto a caminar adelante y atrás en los túneles que construyen; tienen los tarsos anteriores modificados y con glándulas que fabrican seda. Las hembras no poseen alas, y los machos pueden tenerlas o no. Presentan dos pares de alas semejantes en cuanto a forma y tamaño, y su rigidez varía en ellas', 'assets/images/Embioptera.jpg'),
(10, 'Eoblattida', 'Orden fósil que incluye un total de 17 familias extintas pertenecientes al paleozoico', 'assets/images/Eoblattida.jpg'),
(11, 'Ephemeroptera', 'Conocidos normalmente como efímeras son un orden de insectos hemimetábolos acuáticos. Existen mas de tres mil especies, repartidas en cuarenta y dos familias y cuatrocientos géneros. Son insectos primitivos, con una serie de rasgos que ya estaban presentes en los primeros insectos voladores, como colas largas y alas que no se pliegan', 'assets/images/Ephemeroptera.jpg'),
(12, 'Glosselytrodea', 'Glosselytrodea es un orden extinto de insectos, que posee una treintena de especies. Datan del Pérmico y se distribuye por Eurasia, América y Australia. Puede estar estrechamente relacionada con Neuropterida u Orthoptera', 'assets/images/Glosselytrodea.jpg'),
(13, 'Grylloblattodea', 'Los grilloblatodeos son insectos extremófilos y que carecen de alas que viven en zonas frías de alta montaña. Su apariencia es curiosa ya que posee el aspecto de cucaracha y grillo y (una clase de insectos con dos largas colas). Muchos son nocturnos. Tienen largas antenas (con mas de 20 segmentos) y largos cercos (5-8 segmentos) ', 'assets/images/Grylloblattodea.jpg'),
(14, 'Hemiptera', 'Poseen un aparato bucal chupador que utilizan para succionar savia (hemolinfa) o fluidos de animales (sangre). Entre los hemípteros más conocidos están los pulgones y poseen alas seccionadas con una parte membranosa y otra no.', 'assets/images/Hemiptera.jpg'),
(15, 'Hymenoptera', 'Los himenópteros representan uno de los órdenes con mayor número de insectos. Entre otros se encuentran las abejas, abejorros, avispas y hormigas. El nombre proviene de sus alas membranosas. Los himenópteros poseen dos pares de alas membranosas y en las hormigas nos las encontramos en las reinas y machos reproductores. Las alas posteriores son más pequeñas. ', 'assets/images/Hymenoptera.jpg'),
(16, 'Hypoperlida', 'Orden de insectos fósiles del pérmico que vivió en el noreste de Europa', 'assets/images/Hypoperlida.jpg'),
(17, 'Lepidoptera', 'Son en su mayoría voladores, y suelen llamarse coloquialmente mariposas. Eexisten dos grandes grupos que son las mariposas diurnas y la mayoría de las especies que son nocturnas. Sus larvas llamadas orugas se alimentan de materia vegetal. Otras son polinizadoras de plantas y cultivos ', 'assets/images/Lepidoptera.jpg'),
(18, 'Mantodea', 'Los mantodeos son un orden de insectos conocidos como mantis. Se conocen mas de dos mil especies repartidas por todo el mundo, especialmente en los trópicos. Poseen unas patas delanteras muy características y llamativas ya que están muy modificadas para la captura de presas. La mayoría vive entre la vegetación, entre la cual se camufla', 'assets/images/Mantodea.jpg'),
(19, 'Mantophasmatodea', 'Sus descubridores les llamaron gladiadores . Se trata de insectos que se alimentan de carne y habitan en el oeste de Sudáfrica. Los miembros de este suborden carecen de alas. Parecen una mezcla entre mantis e insecto palo', 'assets/images/Mantophasmatodea.jpg'),
(20, 'Mecoptera', 'Los mecópteros poseen el cuerpo tubuliforme y unas piezas bucales largas que forman un pico . Los órganos reproductores masculinos son parecidos a los que presentan los escorpiones, de ahí que también se les llame moscas escorpión. Son inofensivos a pesar de su apariencia. Viven generalmente en zonas boscosas húmedas', 'assets/images/Mecoptera.jpg'),
(21, 'Megaloptera', 'Son una orden de las más primitivas con metamorfosis completa . Las larvas viven en el agua, y son depredadoras. Insectos de grandes alas cuyas larvas son grandes. ', 'assets/images/Megaloptera.jpg'),
(22, 'Meganisoptera', 'Es un orden extinta de insectos muy grandes. Inicialmente llamada Protodonata por su similitud en apariencia a los odonatos (libélulas). Vivieron en el Paleozoico.', 'assets/images/Meganisoptera.jpg'),
(23, 'Megasecoptera', 'Insectos fósiles con grandes piezas bucales con las que agujereaban las plantas y extraían las esporas y polen. ', 'assets/images/Megasecoptera.jpg'),
(24, 'Miomoptera', 'Los miomópteros son un orden extinto de insectos  Eran insectos pequeños con piezas bucales masticadoras muy simples y con cercos abdominales cortos. Poseían dos pares de alas de igual tamaño, con nerviación simple', 'assets/images/Miomoptera.jpg'),
(25, 'Neuroptera', 'Los neurópteros son un orden de insectos con metamorfosis completa; los adultos tienen dos pares de alas con muchas nervaduras que formando celdillas. Los adultos tienen una cabeza dirigida hacia abajo con piezas bucales para masticar, pueden ser muy reducidas. Las antenas son estructuras alargadas y filiformes, y están formadas por muchos artejos o segmentos. Poseen grandes ojos compuestos y pueden presentar ocelos. Tienen dos pares de alas membrana', 'assets/images/Neuroptera.jpg'),
(26, 'Odonata', 'En esta orden se encuentran las libelulas y caballitos del diablo. Poseen cuatro alas membranosas sobre un cuerpo alargado. Viven asociados a ambientes acuáticos, que son necesarios para el desarrollo de sus etapas juveniles; no tienen fase de pupa y por tanto su metamorfosis es simple', 'assets/images/Odonata.jpg'),
(27, 'Orthoptera', 'Son insectos con la cabeza por lo general grande y redonda, bastante móvil con un robusto aparato masticador. Los palpos maxilares están constituidos por cinco segmentos, los labiales por tres. Los ojos compuestos son hemisféricos. A menudo están presentes tres ocelos. Las antenas, ubicadas entre los ojos, son filiformes, rara vez son pectinadas. Las alas anteriores conocidas como tegminas son estrechas y alargadas', 'assets/images/Orthoptera.jpg'),
(28, 'Palaeodictyoptera', 'Son un orden extinto de insectos de tamaño variable, caracterizados por mandíbulas picudas, alas anteriores y posteriores similares.  Poseen las alas muy marcadas por nervios, e incluso pueden observarse patrones de coloración. Algunos alcanzaron grandes tamaños con una envergadura de 55 cm', 'assets/images/Palaeodictyoptera.jpg'),
(29, 'Paoliida', 'Insectos fósiles del Paleozoico', 'assets/images/Paoliida.jpg'),
(30, 'Phasmida', 'Son conocidos como insectos palo. Poseen tres aspectos diferentes: Insectos palo (alargados, pueden tener alas y son similares a pequeñas ramitas), insectos hoja (poseen alas, de cuerpo ancho, aplanado dorso ventralmente, con protuberancias semejantes a corteza y hojas.', 'assets/images/Phasmida.jpg'),
(31, 'Plecoptera', 'Los plecópteros son insectos que habitan terrenos cercanos a lagos o vertientes. Sufren una metamorfosis incompleta donde los estadios ninfales son acuáticos y los adultos voladores. En estado de ninfa su cuerpo es aplanado y presenta un aparato bucal masticador con antenas y cercos en la parte final de su abdomen. Las fases adultas son grandes y poseen cuatro alas membranosas que en reposo se pueden plegar sobre el abdomen. Los adultos también poseen cercos y antenas largas', 'assets/images/Plecoptera.jpg'),
(32, 'Protocoleoptera', 'Los protocoleópteros son insectos fósiles del Pérmico. Es un grupo formado por varias familias y entre ellas se encuentra el ancestro de los coleópteros actuales. Poseian élitros con numerosas venas transversales. Como los coleópteros actuales poseían 13 artejos antenales. Las alas anteriores tenían todas las venas principales', 'assets/images/Protocoleoptera.jpg'),
(33, 'Protorthoptera', 'Son insectos extintos del Paleozoico. Son los insectos mas antiguos que aparecieron con alas.', 'assets/images/Protorthoptera.jpg'),
(34, 'Psocodea', 'Engloban a distintos tipos de piojos. son pequeños insectos carroñeros cuya alimentación es muy variada que va desde hongos a detritos orgánicos en la naturaleza, pero también se sabe que se alimentan de artículos domésticos como libros. Tienen mandíbulas para masticar, y el lóbulo central del maxilar está modifica', 'assets/images/Psocodea.jpg'),
(35, 'Raphidioptera', 'Conocidos como moscas serpiente son un orden de insectos holometábolos, con alas transparentes y profusa nerviación; los adultos se caracterizan por su protórax alargado. Su aparato bucal se dirige hacia delante, y las hembras tienen un aparato ovipositor alargado. Existen en el registro fósil desde el Pérmico.', 'assets/images/Raphidioptera.jpg'),
(36, 'Reculoidea', 'Existen en el registro fósil desde el Carbonífero al Jurásico', 'assets/images/Reculoidea.jpg'),
(37, 'Siphonaptera', ' Los sifonápteros son un orden de pequeños insectos sin alas, conocidos como pulgas. Las pulgas son parásitos externos que se alimentan de sanagre de diversos animales y humanos, y pueden ejecutar saltos largos, pudiendo así alcanzar fácilmente a nuevos huéspedes, igual que otros insectos como saltamontes y langostas', 'assets/images/Siphonaptera.jpg'),
(38, 'Strepsiptera', 'Son un orden de insectos diminutos, que son parásitos de otros insectos. Los machos viven libremente con alas anteriores muy reducidas parecidas a los halterios de los dípteros; las alas posteriores son grandes y membranosas. Las hembras tienen forma de larva y son parásitas. Destacan su función como parasitoides de insectos que pueden generar plagas, por lo que son criados en cautividad y utilizados para eliminar las plagas', 'assets/images/Strepsiptera.jpg'),
(39, 'Thysanoptera', 'Son insectos muy pequeños conocidos como trips. Tienen color oscuro y se alimentan de hongos.', 'assets/images/Thysanoptera.jpg'),
(40, 'Titanoptera', 'Son un orden extinto de insectos del periodo Triásico, relacionados con los actuales ortópteros pero de mayor tamaño y con patas posteriores que no les permitían saltar. Tenían una longitud de ala de cerca de 50 cm, con patas anteriores prensoras y mandíbulas alargadas.', 'assets/images/Titanoptera.jpg'),
(41, 'Trichoptera', 'Los tricópteros son insectos con metamorfosis completa, familiar de mariposas y polillas, cuyas larvas y pupas viven en el agua dentro de pequeños estructuras de forma tubular que fabrican con seda a la que pegan granos de arena y otros elementos. Cuando son adultos tienen alas y un par ellas está cubierta de pelo.', 'assets/images/Trichoptera.jpg'),
(42, 'Zoraptera', 'Los zorápteros son un orden de insectos de tamaño muy pequeño (menos de 3 mm). Habitan especialmente regiones tropicales. Son insectos hemimetábolos, con antenas filiformes, piezas bucales masticadoras, con las seis patas marchadoras. El abdomen acaba en un par de cercos. Viven en el suelo, madera podrida, humus etc. Son gregarios ', 'assets/images/Zoraptera.jpg'),
(43, 'Zygentoma', 'Incluyen insectos primitivo sin alas con filamentos al final del abdomen. ', 'assets/images/Zygentoma.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torax`
--

CREATE TABLE `torax` (
  `id_parte` int(11) UNSIGNED NOT NULL,
  `nombre_torax` varchar(50) NOT NULL,
  `fkid_categoria` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `torax`
--

INSERT INTO `torax` (`id_parte`, `nombre_torax`, `fkid_categoria`) VALUES
(20, 'Alas membranosas', 4),
(21, 'Elitros', 4),
(22, 'Hemiélitros', 4),
(23, 'Halterios', 4),
(24, 'Tegminas', 4),
(25, 'Alas con flecos', 4),
(26, 'Alas con escamas', 4),
(27, 'Patas marchadoras', 5),
(28, 'Patas saltadoras', 5),
(29, 'Patas cavadoras', 5),
(30, 'Patas raptoras o prensoras', 5),
(31, 'Patas colectoras', 5),
(32, 'Patas nadadoras', 5),
(33, 'Patas colgantes', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id_video` int(11) NOT NULL,
  `p_video` varchar(50) NOT NULL,
  `d_video` varchar(500) NOT NULL,
  `i_video` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id_video`, `p_video`, `d_video`, `i_video`) VALUES
(1, 'video1', 'En este video podemos observar como una mantis religiosa está limpiando sus patas de restos de comida.', 'assets/video/mantis.mp4'),
(2, 'video2', 'En este video observamos como una mariposa sufre una metamorfosis y sale de su capullo ya en su fase adulta.', 'assets/video/metamorfosis_mariposa_monarca.mp4'),
(3, 'subtitulos2', 'Descripción con subtitulos vtt del video de la metamorfosis de la mariposa monarca', 'assets/video/subtitulos.vtt');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abdomen`
--
ALTER TABLE `abdomen`
  ADD PRIMARY KEY (`id_parte`),
  ADD KEY `fkid_categoria` (`fkid_categoria`) USING BTREE;

--
-- Indices de la tabla `cabeza`
--
ALTER TABLE `cabeza`
  ADD PRIMARY KEY (`id_parte`),
  ADD KEY `fkid_categoria` (`fkid_categoria`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cuerpo`
--
ALTER TABLE `cuerpo`
  ADD PRIMARY KEY (`id_parte`);

--
-- Indices de la tabla `torax`
--
ALTER TABLE `torax`
  ADD PRIMARY KEY (`id_parte`),
  ADD KEY `fkid_categoria` (`fkid_categoria`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuerpo`
--
ALTER TABLE `cuerpo`
  MODIFY `id_parte` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abdomen`
--
ALTER TABLE `abdomen`
  ADD CONSTRAINT `abdomen_ibfk_1` FOREIGN KEY (`id_parte`) REFERENCES `cuerpo` (`id_parte`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkid_categor` FOREIGN KEY (`fkid_categoria`) REFERENCES `categoria` (`id_categoria`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cabeza`
--
ALTER TABLE `cabeza`
  ADD CONSTRAINT `cabeza_ibfk_1` FOREIGN KEY (`id_parte`) REFERENCES `cuerpo` (`id_parte`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkid_categoria` FOREIGN KEY (`fkid_categoria`) REFERENCES `categoria` (`id_categoria`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `torax`
--
ALTER TABLE `torax`
  ADD CONSTRAINT `fkid_cate` FOREIGN KEY (`fkid_categoria`) REFERENCES `categoria` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `torax_ibfk_1` FOREIGN KEY (`id_parte`) REFERENCES `cuerpo` (`id_parte`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
