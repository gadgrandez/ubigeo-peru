<?php
/*
Plugin Name: Ubigeo de Per&uacute; para Woocommerce
Plugin URI: http://startapps.com.pe/
Description: Ubigeo de Per&uacute; para woocommerce - Plugin contiene los departamentos - provincias y distritos del Per&uacute;
Version: 1.0.3
Author: debugsito
Author URI: http://startapps.com.pe/
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ubigeo_install()
{
    //crear departamentos
    crearDepartamento();
    //crear provincia
    crearProvincia();
    //crear distrito
    crearDistrito();
}

function crearDepartamento()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_departamento";

    $sql = " CREATE TABLE $table_name (
  idDepa int(5) NOT NULL DEFAULT '0',
  departamento varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idDepa`)
  )ENGINE=MyISAM DEFAULT CHARSET=utf8; ";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    cargaDatosDepartamentos();
}

function cargaDatosDepartamentos()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_departamento";
    $sql = " INSERT INTO $table_name (`idDepa`, `departamento`) VALUES
              (1, 'Amazonas'),
              (2, 'Ancash'),
              (3, 'Apurimac'),
              (4, 'Arequipa'),
              (5, 'Ayacucho'),
              (6, 'Cajamarca'),
              (7, 'Callao'),
              (8, 'Cusco'),
              (9, 'Huancavelica'),
              (10, 'Huanuco'),
              (11, 'Ica'),
              (12, 'Junín'),
              (13, 'La Libertad'),
              (14, 'Lambayeque'),
              (15, 'Lima'),
              (16, 'Loreto'),
              (17, 'Madre de Dios'),
              (18, 'Moquegua'),
              (19, 'Pasco'),
              (20, 'Piura'),
              (21, 'Puno'),
              (22, 'San Martín'),
              (23, 'Tacna'),
              (24, 'Tumbes'),
              (25, 'Ucayali'); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function crearProvincia()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_provincia";

    $sql = " CREATE TABLE $table_name (
          `idProv` int(5) NOT NULL DEFAULT '0',
          `provincia` varchar(50) DEFAULT NULL,
          `idDepa` int(5) DEFAULT NULL,
          PRIMARY KEY (`idProv`)
          )ENGINE=MyISAM DEFAULT CHARSET=utf8;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    cargaDatosProvinciasUno();
    cargaDatosProvinciasDos();
    cargaDatosProvinciasTres();
}

function cargaDatosProvinciasUno()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_provincia";
    $sql = " INSERT INTO $table_name (`idProv`, `provincia`, `idDepa`) VALUES
              (1, 'Chachapoyas', 1),
			  (2, 'Bagua', 1),
              (3, 'Bongara', 1),
              (4, 'Condorcanqui', 1),
              (5, 'Luya', 1),
              (6, 'Rodriguez de Mendoza', 1),
              (7, 'Utcubamba', 1),
              (8, 'Huaraz', 2),
              (9, 'Aija', 2),
              (10, 'Antonio Raymondi', 2),
              (11, 'Asunción', 2),
              (12, 'Bolognesi', 2),
              (13, 'Carhuaz', 2),
              (14, 'Carlos Fermin Fitzcarrald', 2),
              (15, 'Casma', 2),
              (16, 'Corongo', 2),
              (17, 'Huari', 2),
              (18, 'Huarmey', 2),
              (19, 'Huaylas', 2),
              (20, 'Mariscal Luzuriaga', 2),
              (21, 'Ocros', 2),
              (22, 'Pallasca', 2),
              (23, 'Pomabamba', 2),
              (24, 'Recuay', 2),
              (25, 'Santa', 2),
              (26, 'Sihuas', 2),
              (27, 'Yungay', 2),
              (28, 'Abancay', 3),
              (29, 'Andahuaylas', 3),
              (30, 'Antabamba', 3),
              (31, 'Aymaraes', 3),
              (32, 'Cotabambas', 3),
              (33, 'Chincheros', 3),
              (34, 'Grau', 3),
              (35, 'Arequipa', 4),
              (36, 'Camana', 4),
              (37, 'Caraveli', 4),
              (38, 'Castilla', 4),
              (39, 'Caylloma', 4),
              (40, 'Condesuyos', 4),
              (41, 'Islay', 4),
              (42, 'La Union', 4),
              (43, 'Huamanga', 5),
              (44, 'Cangallo', 5),
              (45, 'Huanca Sancos', 5),
              (46, 'Huanta', 5),
              (47, 'La Mar', 5),
              (48, 'Lucanas', 5),
              (49, 'Parinacochas', 5),
              (50, 'Paucar del Sara Sara', 5),
              (51, 'Sucre', 5),
              (52, 'Victor Fajardo', 5),
              (53, 'Vilcas Huaman', 5),
              (54, 'Cajamarca', 6),
              (55, 'Cajabamba', 6),
              (56, 'Celendín', 6),
              (57, 'Chota ', 6),
              (58, 'Contumaza', 6),
              (59, 'Cutervo', 6),
              (60, 'Hualgayoc', 6),
              (61, 'Jaen', 6),
              (62, 'San Ignacio', 6),
              (63, 'San Marcos', 6),
              (64, 'San Pablo', 6),
              (65, 'Santa Cruz', 6),
              (66, 'Callao', 7),
              (67, 'Cusco', 8),
              (68, 'Acomayo', 8),
              (69, 'Anta', 8),
              (70, 'Calca', 8),
              (71, 'Canas', 8),
              (72, 'Canchis', 8),
              (73, 'Chumbivilcas', 8),
              (74, 'Espinar', 8),
              (75, 'La Convencion', 8),
              (76, 'Paruro', 8),
              (77, 'Paucartambo', 8),
              (78, 'Quispicanchi', 8),
              (79, 'Urubamba', 8),
              (80, 'Huancavelica', 9);";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosProvinciasDos()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_provincia";
    $sql = " INSERT INTO $table_name (`idProv`, `provincia`, `idDepa`) VALUES
              (81, 'Acobamba', 9),
              (82, 'Angaraes', 9),
              (83, 'Castrovirreyna', 9),
              (84, 'Churcampa', 9),
              (85, 'Huaytara', 9),
              (86, 'Tayacaja', 9),
              (87, 'Huanuco', 10),
              (88, 'Ambo', 10),
              (89, 'Dos de Mayo', 10),
              (90, 'Huacaybamba', 10),
              (91, 'Huamalies', 10),
              (92, 'Leoncio Prado', 10),
              (93, 'Marañón', 10),
              (94, 'Pachitea', 10),
              (95, 'Puerto Inca', 10),
              (96, 'Lauricocha', 10),
              (97, 'Yarowilca', 10),
              (98, 'Ica', 11),
              (99, 'Chincha', 11),
              (100, 'Nazca', 11),
              (101, 'Palpa', 11),
              (102, 'Pisco', 11),
              (103, 'Huancayo', 12),
              (104, 'Concepción', 12),
              (105, 'Chanchamayo', 12),
              (106, 'Jauja', 12),
              (107, 'Junín', 12),
              (108, 'Satipo', 12),
              (109, 'Tarma', 12),
              (110, 'Yauli', 12),
              (111, 'Chupaca', 12),
              (112, 'Trujillo', 13),
              (113, 'Ascope', 13),
              (114, 'Bolivar', 13),
              (115, 'Chepen', 13),
              (116, 'Julcan', 13),
              (117, 'Otuzco', 13),
              (118, 'Pacasmayo', 13),
              (119, 'Pataz', 13),
              (120, 'Sanchez Carrión', 13),
              (121, 'Santiago De Chuco', 13),
              (122, 'Gran Chimú', 13),
              (123, 'Virú', 13),
              (124, 'Chiclayo', 14),
              (125, 'Ferreñafe', 14),
              (126, 'Lambayeque', 14),
              (127, 'Lima', 15),
              (128, 'Barranca', 15),
              (129, 'Cajatambo', 15),
              (130, 'Canta', 15),
              (131, 'Cañete', 15),
              (132, 'Huaral', 15),
              (133, 'Huarochirí', 15),
              (134, 'Huaura', 15),
              (135, 'Oyon', 15),
              (136, 'Yauyos', 15),
              (137, 'Maynas', 16),
              (138, 'Alto Amazonas', 16),
              (139, 'Loreto', 16),
              (140, 'Mariscal Ramón Castilla', 16),
              (141, 'Requena', 16),
              (142, 'Ucayali', 16),
              (143, 'Tambopata', 17),
              (144, 'Manu', 17),
              (145, 'Tahuamanu', 17),
              (146, 'Mariscal Nieto', 18),
              (147, 'General Sanchez Cerro', 18),
              (148, 'Ilo', 18),
              (149, 'Pasco', 19),
              (150, 'Daniel Alcides Carrión', 19),
              (151, 'Oxapampa', 19),
              (152, 'Piura', 20),
              (153, 'Ayabaca', 20),
              (154, 'Huancabamba', 20),
              (155, 'Morropón', 20),
              (156, 'Paita', 20),
              (157, 'Sullana', 20),
              (158, 'Talara', 20),
              (159, 'Sechura', 20),
              (160, 'Puno', 21);";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosProvinciasTres()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_provincia";
    $sql = " INSERT INTO $table_name (`idProv`, `provincia`, `idDepa`) VALUES
              (161, 'Azángaro', 21),
              (162, 'Carabaya', 21),
              (163, 'Chucuito', 21),
              (164, 'El Collao', 21),
              (165, 'Huancané', 21),
              (166, 'Lampa', 21),
              (167, 'Melgar', 21),
              (168, 'Moho', 21),
              (169, 'San Antonio de Putina', 21),
              (170, 'San Román', 21),
              (171, 'Sandia', 21),
              (172, 'Yunguyo', 21),
              (173, 'Moyobamba', 22),
              (174, 'Bellavista', 22),
              (175, 'El Dorado', 22),
              (176, 'Huallaga', 22),
              (177, 'Lamas', 22),
              (178, 'Mariscal Cáceres', 22),
              (179, 'Picota', 22),
              (180, 'Rioja', 22),
              (181, 'San Martín', 22),
              (182, 'Tocache', 22),
              (183, 'Tacna', 23),
              (184, 'Candarave', 23),
              (185, 'Jorge Basadre', 23),
              (186, 'Tarata', 23),
              (187, 'Tumbes', 24),
              (188, 'Contralmirante Villar', 24),
              (189, 'Zarumilla', 24),
              (190, 'Coronel Portillo', 25),
              (191, 'Atalaya', 25),
              (192, 'Padre Abad', 25),
              (193, 'Purus', 25);";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function crearDistrito()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";

    $sql = " CREATE TABLE $table_name (
`idDist` int(5) NOT NULL DEFAULT '0',
`distrito` varchar(50) DEFAULT NULL,
`idProv` int(5) DEFAULT NULL,
PRIMARY KEY (`idDist`))";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    cargaDatosDistritosUno();
    cargaDatosDistritosDos();
    cargaDatosDistritosTres();
    cargaDatosDistritosCuatro();
    cargaDatosDistritosCinco();
    cargaDatosDistritosSeis();
    cargaDatosDistritosSiete();
    cargaDatosDistritosOcho();
    cargaDatosDistritosNueve();
    cargaDatosDistritosDiez();
    cargaDatosDistritosOnce();
    cargaDatosDistritosDoce();
    cargaDatosDistritosTrece();
    cargaDatosDistritosCatorce();
    cargaDatosDistritosQuince();
    cargaDatosDistritosDieciseis();
    cargaDatosDistritosDiecisiete();
    cargaDatosDistritosDieciocho();
    cargaDatosDistritosDiecinueve();
    cargaDatosDistritosViente();
    cargaDatosDistritosVeintiuno();
    cargaDatosDistritosVeintidos();
    cargaDatosDistritosVeintitres();
    cargaDatosDistritosVeinticuatro();
}

function cargaDatosDistritosUno()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
                (1, 'Chachapoyas', 1),
                (2, 'Asunción', 1),
                (3, 'Balsas', 1),
                (4, 'Cheto', 1),
                (5, 'Chiliquín', 1),
                (6, 'Chuquibamba', 1),
                (7, 'Granada', 1),
                (8, 'Huancas', 1),
                (9, 'La Jalca', 1),
                (10, 'Leimebamba', 1),
                (11, 'Levanto', 1),
                (12, 'Magdalena', 1),
                (13, 'Mariscal Castilla', 1),
                (14, 'Molinopampa', 1),
                (15, 'Montevideo', 1),
                (16, 'Olleros', 1),
                (17, 'Quinjalca', 1),
                (18, 'San Francisco de Daguas', 1),
                (19, 'San Isidro de Maino', 1),
                (20, 'Soloco', 1),
                (21, 'Sonche', 1),
                (22, 'La Peca', 2),
                (23, 'Aramango', 2),
                (24, 'Copallin', 2),
                (25, 'El Parco', 2),
                (26, 'Imaza', 2),
                (27, 'Jumbilla', 3),
                (28, 'Chisquilla', 3),
                (29, 'Churuja', 3),
                (30, 'Corosha', 3),
                (31, 'Cuispes', 3),
                (32, 'Florida', 3),
                (33, 'Jazan', 3),
                (34, 'Recta', 3),
                (35, 'San Carlos', 3),
                (36, 'Shipasbamba', 3),
                (37, 'Valera', 3),
                (38, 'Yambrasbamba', 3),
                (39, 'Nieva', 4),
                (40, 'El Cenepa', 4),
                (41, 'Rio Santiago', 4),
                (42, 'Lamud', 5),
                (43, 'Camporredondo', 5),
                (44, 'Cocabamba', 5),
                (45, 'Colcamar', 5),
                (46, 'Conila', 5),
                (47, 'Inguilpata', 5),
                (48, 'Longuita', 5),
                (49, 'Lonya Chico', 5),
                (50, 'Luya', 5),
                (51, 'Luya Viejo', 5),
                (52, 'Maria', 5),
                (53, 'Ocalli', 5),
                (54, 'Ocumal', 5),
                (55, 'Pisuquia', 5),
                (56, 'Providencia', 5),
                (57, 'San Cristobal', 5),
                (58, 'San Francisco del Yeso', 5),
                (59, 'San Jeronimo', 5),
                (60, 'San Juan De Lopecancha', 5),
                (61, 'Santa Catalina', 5),
                (62, 'Santo Tomás', 5),
                (63, 'Tingo', 5),
                (64, 'Trita', 5),
                (65, 'San Nicolás', 6),
                (66, 'Chirimoto', 6),
                (67, 'Cochamal', 6),
                (68, 'Huambo', 6),
                (69, 'Limabamba', 6),
                (70, 'Longar', 6),
                (71, 'Mariscal Benavides', 6),
                (72, 'Milpuc', 6),
                (73, 'Omia', 6),
                (74, 'Santa Rosa', 6),
                (75, 'Totora', 6),
                (76, 'Vista Alegre', 6),
                (77, 'Bagua Grande', 7),
                (78, 'Cajaruro', 7),
                (79, 'Cumba', 7),
                (80, 'El Milagro', 7); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosDos()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
                (81, 'Jamalca', 7),
                (82, 'Lonya Grande', 7),
                (83, 'Yamon', 7),
                (84, 'Huaraz', 8),
                (85, 'Cochabamba', 8),
                (86, 'Colcabamba', 8),
                (87, 'Huanchay', 8),
                (88, 'Independencia', 8),
                (89, 'Jangas', 8),
                (90, 'La Libertad', 8),
                (91, 'Olleros', 8),
                (92, 'Pampas', 8),
                (93, 'Pariacoto', 8),
                (94, 'Pira', 8),
                (95, 'Tarica', 8),
                (96, 'Aija', 9),
                (97, 'Coris', 9),
                (98, 'Huacllan', 9),
                (99, 'La Merced', 9),
                (100, 'Succha', 9),
                (101, 'Llamellin', 10),
                (102, 'Aczo', 10),
                (103, 'Chaccho', 10),
                (104, 'Chingas', 10),
                (105, 'Mirgas', 10),
                (106, 'San Juan De Rontoy', 10),
                (107, 'Chacas', 11),
                (108, 'Acochaca', 11),
                (109, 'Chiquian', 12),
                (110, 'Abelardo Pardo Lezameta', 12),
                (111, 'Antonio Raymondi', 12),
                (112, 'Aquia', 12),
                (113, 'Cajacay', 12),
                (114, 'Canis', 12),
                (115, 'Colquioc', 12),
                (116, 'Huallanca', 12),
                (117, 'Huasta', 12),
                (118, 'Huayllacayan', 12),
                (119, 'La Primavera', 12),
                (120, 'Mangas', 12),
                (121, 'Pacllon', 12),
                (122, 'San Miguel De Corpanqui', 12),
                (123, 'Ticllos', 12),
                (124, 'Carhuaz', 13),
                (125, 'Acopampa', 13),
                (126, 'Amashca', 13),
                (127, 'Anta', 13),
                (128, 'Ataquero', 13),
                (129, 'Marcara', 13),
                (130, 'Pariahuanca', 13),
                (131, 'San Miguel de Aco', 13),
                (132, 'Shilla', 13),
                (133, 'Tinco', 13),
                (134, 'Yungar', 13),
                (135, 'San Luis', 14),
                (136, 'San Nicolas', 14),
                (137, 'Yauya', 14),
                (138, 'Casma', 15),
                (139, 'Buena Vista Alta', 15),
                (140, 'Comandante Noel', 15),
                (141, 'Yautan', 15),
                (142, 'Corongo', 16),
                (143, 'Aco', 16),
                (144, 'Bambas', 16),
                (145, 'Cusca', 16),
                (146, 'La Pampa', 16),
                (147, 'Yanac', 16),
                (148, 'Yupan', 16),
                (149, 'Huari', 17),
                (150, 'Anra', 17),
                (151, 'Cajay', 17),
                (152, 'Chavín De Huantar', 17),
                (153, 'Huacachi', 17),
                (154, 'Huacchis', 17),
                (155, 'Huachis', 17),
                (156, 'Huantar', 17),
                (157, 'Masin', 17),
                (158, 'Paucas', 17),
                (159, 'Ponto', 17),
                (160, 'Rahuapampa', 17); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosTres()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
                (161, 'Rapayan', 17),
                (162, 'San Marcos', 17),
                (163, 'San Pedro de Chana', 17),
                (164, 'Uco', 17),
                (165, 'Huarmey', 18),
                (166, 'Cochapeti', 18),
                (167, 'Culebras', 18),
                (168, 'Huayan', 18),
                (169, 'Malvas', 18),
                (170, 'Caraz', 19),
                (171, 'Huallanca', 26),
                (172, 'Huata', 26),
                (173, 'Huaylas', 26),
                (174, 'Mato', 26),
                (175, 'Pamparomas', 26),
                (176, 'Pueblo Libre', 26),
                (177, 'Santa Cruz', 26),
                (178, 'Santo Toribio', 26),
                (179, 'Yuracmarca', 26),
                (180, 'Piscobamba', 27),
                (181, 'Casca', 27),
                (182, 'Eleazar Guzman Barron', 27),
                (183, 'Fidel Olivas Escudero', 27),
                (184, 'Llama', 27),
                (185, 'Llumpa', 27),
                (186, 'Lucma', 27),
                (187, 'Musga', 27),
                (188, 'Ocros', 21),
                (189, 'Acas', 21),
                (190, 'Cajamarquilla', 21),
                (191, 'Carhuapampa', 21),
                (192, 'Cochas', 21),
                (193, 'Congas', 21),
                (194, 'Llipa', 21),
                (195, 'San Cristobal de Rajan', 21),
                (196, 'San Pedro', 21),
                (197, 'Santiago de Chilcas', 21),
                (198, 'Cabana', 22),
                (199, 'Bolognesi', 22),
                (200, 'Conchucos', 22),
                (201, 'Huacaschuque', 22),
                (202, 'Huandoval', 22),
                (203, 'Lacabamba', 22),
                (204, 'Llapo', 22),
                (205, 'Pallasca', 22),
                (206, 'Pampas', 22),
                (207, 'Santa Rosa', 22),
                (208, 'Tauca', 22),
                (209, 'Pomabamba', 23),
                (210, 'Huayllan', 23),
                (211, 'Parobamba', 23),
                (212, 'Quinuabamba', 23),
                (213, 'Recuay', 24),
                (214, 'Catac', 24),
                (215, 'Cotaparaco', 24),
                (216, 'Huayllapampa', 24),
                (217, 'Llacllin', 24),
                (218, 'Marca', 24),
                (219, 'Pampas Chico', 24),
                (220, 'Pararin', 24),
                (221, 'Tapacocha', 24),
                (222, 'Ticapampa', 24),
                (223, 'Chimbote', 25),
                (224, 'Caceres del Perú', 25),
                (225, 'Coishco', 25),
                (226, 'Macate', 25),
                (227, 'Moro', 25),
                (228, 'NepeÑA', 25),
                (229, 'Samanco', 25),
                (230, 'Santa', 25),
                (231, 'Nuevo Chimbote', 25),
                (232, 'Sihuas', 26),
                (233, 'Acobamba', 26),
                (234, 'Alfonso Ugarte', 26),
                (235, 'Cashapampa', 26),
                (236, 'Chingalpo', 26),
                (237, 'Huayllabamba', 26),
                (238, 'Quiches', 26),
                (239, 'Ragash', 26),
                (240, 'San Juan', 26); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosCuatro()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
                (241, 'Sicsibamba', 26),
                (242, 'Yungay', 27),
                (243, 'Cascapara', 27),
                (244, 'Mancos', 27),
                (245, 'Matacoto', 27),
                (246, 'Quillo', 27),
                (247, 'Ranrahirca', 27),
                (248, 'Shupluy', 27),
                (249, 'Yanama', 27),
                (250, 'Abancay', 28),
                (251, 'Chacoche', 28),
                (252, 'Circa', 28),
                (253, 'Curahuasi', 28),
                (254, 'Huanipaca', 28),
                (255, 'Lambrama', 28),
                (256, 'Pichirhua', 28),
                (257, 'San Pedro de Cachora', 28),
                (258, 'Tamburco', 28),
                (259, 'Andahuaylas', 29),
                (260, 'Andarapa', 29),
                (261, 'Chiara', 29),
                (262, 'Huancarama', 29),
                (263, 'Huancaray', 29),
                (264, 'Huayana', 29),
                (265, 'Kishuara', 29),
                (266, 'Pacobamba', 29),
                (267, 'Pacucha', 29),
                (268, 'Pampachiri', 29),
                (269, 'Pomacocha', 29),
                (270, 'San Antonio de Cachi', 29),
                (271, 'San Jeronimo', 29),
                (272, 'San Miguel de Chaccrampa', 29),
                (273, 'Santa Maria de Chicmo', 29),
                (274, 'Talavera', 29),
                (275, 'Tumay Huaraca', 29),
                (276, 'Turpo', 29),
                (277, 'Kaquiabamba', 29),
                (278, 'Antabamba', 30),
                (279, 'El Oro', 30),
                (280, 'Huaquirca', 30),
                (281, 'Juan Espinoza Medrano', 30),
                (282, 'Oropesa', 30),
                (283, 'Pachaconas', 30),
                (284, 'Sabaino', 30),
                (285, 'Chalhuanca', 31),
                (286, 'Capaya', 31),
                (287, 'Caraybamba', 31),
                (288, 'Chapimarca', 31),
                (289, 'Colcabamba', 31),
                (290, 'Cotaruse', 31),
                (291, 'Huayllo', 31),
                (292, 'Justo Apu Sahuaraura', 31),
                (293, 'Lucre', 31),
                (294, 'Pocohuanca', 31),
                (295, 'San Juan De Chacña', 31),
                (296, 'Sañayca', 31),
                (297, 'Soraya', 31),
                (298, 'Tapairihua', 31),
                (299, 'Tintay', 31),
                (300, 'Toraya', 31),
                (301, 'Yanaca', 31),
                (302, 'Tambobamba', 32),
                (303, 'Cotabambas', 32),
                (304, 'Coyllurqui', 32),
                (305, 'Haquira', 32),
                (306, 'Mara', 32),
                (307, 'Challhuahuacho', 32),
                (308, 'Chincheros', 33),
                (309, 'Anco-Huallo', 33),
                (310, 'Cocharcas', 33),
                (311, 'Huaccana', 33),
                (312, 'Ocobamba', 33),
                (313, 'Ongoy', 33),
                (314, 'Uranmarca', 33),
                (315, 'Ranracancha', 33),
                (316, 'Chuquibambilla', 34),
                (317, 'Curpahuasi', 34),
                (318, 'Gamarra', 34),
                (319, 'Huayllati', 34),
                (320, 'Mamara', 34); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosCinco()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
                (321, 'Micaela Bastidas', 34),
                (322, 'Pataypampa', 34),
                (323, 'Progreso', 34),
                (324, 'San Antonio', 34),
                (325, 'Santa Rosa', 34),
                (326, 'Turpay', 34),
                (327, 'Vilcabamba', 34),
                (328, 'Virundo', 34),
                (329, 'Curasco', 34),
                (330, 'Arequipa', 35),
                (331, 'Alto Selva Alegre', 35),
                (332, 'Cayma', 35),
                (333, 'Cerro Colorado', 35),
                (334, 'Characato', 35),
                (335, 'Chiguata', 35),
                (336, 'Jacobo Hunter', 35),
                (337, 'La Joya', 35),
                (338, 'Mariano Melgar', 35),
                (339, 'Miraflores', 35),
                (340, 'Mollebaya', 35),
                (341, 'Paucarpata', 35),
                (342, 'Pocsi', 35),
                (343, 'Polobaya', 35),
                (344, 'Quequeña', 35),
                (345, 'Sabandia', 35),
                (346, 'Sachaca', 35),
                (347, 'San Juan de Siguas', 35),
                (348, 'San Juan de Tarucani', 35),
                (349, 'Santa Isabel de Siguas', 35),
                (350, 'Santa Rita de Siguas', 35),
                (351, 'Socabaya', 35),
                (352, 'Tiabaya', 35),
                (353, 'Uchumayo', 35),
                (354, 'Vitor', 35),
                (355, 'Yanahuara', 35),
                (356, 'Yarabamba', 35),
                (357, 'Yura', 35),
                (358, 'Jose Luis Bustamante y Rivero', 35),
                (359, 'Camana', 36),
                (360, 'Jose Maria Quimper', 36),
                (361, 'Mariano Nicolas Valcarcel', 36),
                (362, 'Mariscal Caceres', 36),
                (363, 'Nicolas De Pierola', 36),
                (364, 'Ocoña', 36),
                (365, 'Quilca', 36),
                (366, 'Samuel Pastor', 36),
                (367, 'Caraveli', 37),
                (368, 'Acari', 37),
                (369, 'Atico', 37),
                (370, 'Atiquipa', 37),
                (371, 'Bella Union', 37),
                (372, 'Cahuacho', 37),
                (373, 'Chala', 37),
                (374, 'Chaparra', 37),
                (375, 'Huanuhuanu', 37),
                (376, 'Jaqui', 37),
                (377, 'Lomas', 37),
                (378, 'Quicacha', 37),
                (379, 'Yauca', 37),
                (380, 'Aplao', 38),
                (381, 'Andagua', 38),
                (382, 'Ayo', 38),
                (383, 'Chachas', 38),
                (384, 'Chilcaymarca', 38),
                (385, 'Choco', 38),
                (386, 'Huancarqui', 38),
                (387, 'Machaguay', 38),
                (388, 'Orcopampa', 38),
                (389, 'Pampacolca', 38),
                (390, 'Tipan', 38),
                (391, 'Uñón', 38),
                (392, 'Uraca', 38),
                (393, 'Viraco', 38),
                (394, 'Chivay', 39),
                (395, 'Achoma', 39),
                (396, 'Cabanaconde', 39),
                (397, 'Callalli', 39),
                (398, 'Caylloma', 39),
                (399, 'Coporaque', 39),
                (400, 'Huambo', 39); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosSeis()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (401, 'Huanca', 39),
(402, 'Ichupampa', 39),
(403, 'Lari', 39),
(404, 'Lluta', 39),
(405, 'Maca', 39),
(406, 'Madrigal', 39),
(407, 'San Antonio de Chuca', 39),
(408, 'Sibayo', 39),
(409, 'Tapay', 39),
(410, 'Tisco', 39),
(411, 'Tuti', 39),
(412, 'Yanque', 39),
(413, 'Majes', 39),
(414, 'Chuquibamba', 40),
(415, 'Andaray', 40),
(416, 'Cayarani', 40),
(417, 'Chichas', 40),
(418, 'Iray', 40),
(419, 'Rio Grande', 40),
(420, 'Salamanca', 40),
(421, 'Yanaquihua', 40),
(422, 'Mollendo', 41),
(423, 'Cocachacra', 41),
(424, 'Dean Valdivia', 41),
(425, 'Islay', 41),
(426, 'Mejia', 41),
(427, 'Punta de Bombon', 41),
(428, 'Cotahuasi', 42),
(429, 'Alca', 42),
(430, 'Charcana', 42),
(431, 'Huaynacotas', 42),
(432, 'Pampamarca', 42),
(433, 'Puyca', 42),
(434, 'Quechualla', 42),
(435, 'Sayla', 42),
(436, 'Tauria', 42),
(437, 'Tomepampa', 42),
(438, 'Toro', 42),
(439, 'Ayacucho', 43),
(440, 'Acocro', 43),
(441, 'Acos Vinchos', 43),
(442, 'Carmen Alto', 43),
(443, 'Chiara', 43),
(444, 'Ocros', 43),
(445, 'Pacaycasa', 43),
(446, 'Quinua', 43),
(447, 'San Jose de Ticllas', 43),
(448, 'San Juan Bautista', 43),
(449, 'Santiago de Pischa', 43),
(450, 'Socos', 43),
(451, 'Tambillo', 43),
(452, 'Vinchos', 43),
(453, 'Jesus Nazareno', 43),
(454, 'Cangallo', 44),
(455, 'Chuschi', 44),
(456, 'Los Morochucos', 44),
(457, 'Maria Parado de Bellido', 44),
(458, 'Paras', 44),
(459, 'Totos', 44),
(460, 'Sancos', 45),
(461, 'Carapo', 45),
(462, 'Sacsamarca', 45),
(463, 'Santiago de Lucanamarca', 45),
(464, 'Huanta', 46),
(465, 'Ayahuanco', 46),
(466, 'Huamanguilla', 46),
(467, 'Iguain', 46),
(468, 'Luricocha', 46),
(469, 'Santillana', 46),
(470, 'Sivia', 46),
(471, 'Llochegua', 46),
(472, 'San Miguel', 47),
(473, 'Anco', 47),
(474, 'Ayna', 47),
(475, 'Chilcas', 47),
(476, 'Chungui', 47),
(477, 'Luis Carranza', 47),
(478, 'Santa Rosa', 47),
(479, 'Tambo', 47),
(480, 'Puquio', 48); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosSiete()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (481, 'Aucara', 48),
(482, 'Cabana', 48),
(483, 'Carmen Salcedo', 48),
(484, 'Chaviña', 48),
(485, 'Chipao', 48),
(486, 'Huac-Huas', 48),
(487, 'Laramate', 48),
(488, 'Leoncio Prado', 48),
(489, 'Llauta', 48),
(490, 'Lucanas', 48),
(491, 'OcaÑA', 48),
(492, 'Otoca', 48),
(493, 'Saisa', 48),
(494, 'San Cristobal', 48),
(495, 'San Juan', 48),
(496, 'San Pedro', 48),
(497, 'San Pedro De Palco', 48),
(498, 'Sancos', 48),
(499, 'Santa Ana De Huaycahuacho', 48),
(500, 'Santa Lucia', 48),
(501, 'Coracora', 49),
(502, 'Chumpi', 49),
(503, 'Coronel Castañeda', 49),
(504, 'Pacapausa', 49),
(505, 'Pullo', 49),
(506, 'Puyusca', 49),
(507, 'San Francisco de Ravacayco', 49),
(508, 'Upahuacho', 49),
(509, 'Pausa', 50),
(510, 'Colta', 50),
(511, 'Corculla', 50),
(512, 'Lampa', 50),
(513, 'Marcabamba', 50),
(514, 'Oyolo', 50),
(515, 'Pararca', 50),
(516, 'San Javier de Alpabamba', 50),
(517, 'San Jose de Ushua', 50),
(518, 'Sara Sara', 50),
(519, 'Querobamba', 51),
(520, 'Belen', 51),
(521, 'Chalcos', 51),
(522, 'Chilcayoc', 51),
(523, 'Huacaña', 51),
(524, 'Morcolla', 51),
(525, 'Paico', 51),
(526, 'San Pedro de Larcay', 51),
(527, 'San Salvador de Quije', 51),
(528, 'Santiago de Paucaray', 51),
(529, 'Soras', 51),
(530, 'Huancapi', 52),
(531, 'Alcamenca', 52),
(532, 'Apongo', 52),
(533, 'Asquipata', 52),
(534, 'Canaria', 52),
(535, 'Cayara', 52),
(536, 'Colca', 52),
(537, 'Huamanquiquia', 52),
(538, 'Huancaraylla', 52),
(539, 'Huaya', 52),
(540, 'Sarhua', 52),
(541, 'Vilcanchos', 52),
(542, 'Vilcas Huaman', 53),
(543, 'Accomarca', 53),
(544, 'Carhuanca', 53),
(545, 'Concepcion', 53),
(546, 'Huambalpa', 53),
(547, 'Independencia', 53),
(548, 'Saurama', 53),
(549, 'Vischongo', 53),
(550, 'Cajamarca', 54),
(552, 'Asuncion', 54),
(553, 'Chetilla', 54),
(554, 'Cospan', 54),
(555, 'Encañada', 54),
(556, 'Jesus', 54),
(557, 'Llacanora', 54),
(558, 'Los Baños del Inca', 54),
(559, 'Magdalena', 54),
(560, 'Matara', 54); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosOcho()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (561, 'Namora', 54),
(562, 'San Juan', 54),
(563, 'Cajabamba', 55),
(564, 'Cachachi', 55),
(565, 'Condebamba', 55),
(566, 'Sitacocha', 55),
(567, 'Celendin', 56),
(568, 'Chumuch', 56),
(569, 'Cortegana', 56),
(570, 'Huasmin', 56),
(571, 'Jorge Chavez', 56),
(572, 'Jose Galvez', 56),
(573, 'Miguel Iglesias', 56),
(574, 'Oxamarca', 56),
(575, 'Sorochuco', 56),
(576, 'Sucre', 56),
(577, 'Utco', 56),
(578, 'La Libertad de Pallan', 56),
(579, 'Chota', 57),
(580, 'Anguia', 57),
(581, 'Chadin', 57),
(582, 'Chiguirip', 57),
(583, 'Chimban', 57),
(584, 'Choropampa', 57),
(585, 'Cochabamba', 57),
(586, 'Conchan', 57),
(587, 'Huambos', 57),
(588, 'Lajas', 57),
(589, 'Llama', 57),
(590, 'Miracosta', 57),
(591, 'Paccha', 57),
(592, 'Pion', 57),
(593, 'Querocoto', 57),
(594, 'San Juan de Licupis', 57),
(595, 'Tacabamba', 57),
(596, 'Tocmoche', 57),
(597, 'Chalamarca', 57),
(598, 'Contumaza', 58),
(599, 'Chilete', 58),
(600, 'Cupisnique', 58),
(601, 'Guzmango', 58),
(602, 'San Benito', 58),
(603, 'Santa Cruz de Toled', 58),
(604, 'Tantarica', 58),
(605, 'Yonan', 58),
(606, 'Cutervo', 59),
(607, 'Callayuc', 59),
(608, 'Choros', 59),
(609, 'Cujillo', 59),
(610, 'La Ramada', 59),
(611, 'Pimpingos', 59),
(612, 'Querocotillo', 59),
(613, 'San Andres de Cutervo', 59),
(614, 'San Juan de Cutervo', 59),
(615, 'San Luis de Lucma', 59),
(616, 'Santa Cruz', 59),
(617, 'Santo Domingo de la Capilla', 59),
(618, 'Santo Tomas', 59),
(619, 'Socota', 59),
(620, 'Toribio Casanova', 59),
(621, 'Bambamarca', 60),
(622, 'Chugur', 60),
(623, 'Hualgayoc', 60),
(624, 'Jaen', 61),
(625, 'Bellavista', 61),
(626, 'Chontali', 61),
(627, 'Colasay', 61),
(628, 'Huabal', 61),
(629, 'Las Pirias', 61),
(630, 'Pomahuaca', 61),
(631, 'Pucara', 61),
(632, 'Sallique', 61),
(633, 'San Felipe', 61),
(634, 'San Jose del Alto', 61),
(635, 'Santa Rosa', 61),
(636, 'San Ignacio', 62),
(637, 'Chirinos', 62),
(638, 'Huarango', 62),
(639, 'La Coipa', 62),
(640, 'Namballe', 62); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosNueve()
{
    /*
     * (650, 'SAN MIGUEL', 64),

(651, 'SAN MIGUEL', 64),
(652, 'BOLIVAR', 64),
(653, 'CALQUIS', 64),
(654, 'CATILLUC', 64),
(655, 'EL PRADO', 64),
(656, 'LA FLORIDA', 64),
(657, 'LLAPA', 64),
(658, 'NANCHOC', 64),
(659, 'NIEPOS', 64),
(660, 'SAN GREGORIO', 64),
(661, 'SAN SILVESTRE DE COCHAN', 64),
(662, 'TONGOD', 64),
(663, 'UNION AGUA BLANCA', 64),
     */
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (641, 'San Jose de Lourdes', 62),
(642, 'Tabaconas', 62),
(643, 'Pedro Galvez', 63),
(644, 'Chancay', 63),
(645, 'Eduardo Villanueva', 63),
(646, 'Gregorio Pita', 63),
(647, 'Ichocan', 63),
(648, 'Jose Manuel Quiroz', 63),
(649, 'Jose Sabogal', 63),



(664, 'San Pablo', 64),
(665, 'San Bernardino', 64),
(666, 'San Luis', 64),
(667, 'Tumbaden', 64),

(668, 'Santa Cruz', 65),
(669, 'Andabamba', 65),
(670, 'Catache', 65),
(671, 'Chancaybaños', 65),
(672, 'La Esperanza', 65),
(673, 'Ninabamba', 65),
(674, 'Pulan', 65),
(675, 'Saucepampa', 65),
(676, 'Sexi', 65),
(677, 'Uticyacu', 65),
(678, 'Yauyucan', 65),
(679, 'Callao', 66),
(680, 'Bellavista', 66),
(681, 'Carmen de la Legua Reynoso', 66),
(682, 'La Perla', 66),
(683, 'La Punta', 66),
(684, 'Ventanilla', 66),
(685, 'Cusco', 67),
(686, 'Ccorca', 67),
(687, 'Poroy', 67),
(688, 'San Jeronimo', 67),
(689, 'San Sebastian', 67),
(690, 'Santiago', 67),
(691, 'Saylla', 67),
(692, 'Wanchaq', 67),
(693, 'Acomayo', 68),
(694, 'Acopia', 68),
(695, 'Acos', 68),
(696, 'Mosoc Llacta', 68),
(697, 'Pomacanchi', 68),
(698, 'Rondocan', 68),
(699, 'Sangarara', 68),
(700, 'Anta', 69),
(701, 'Ancahuasi', 69),
(702, 'Cachimayo', 69),
(703, 'Chinchaypujio', 69),
(704, 'Huarocondo', 69),
(705, 'Limatambo', 69),
(706, 'Mollepata', 69),
(707, 'Pucyura', 69),
(708, 'Zurite', 69),
(709, 'Calca', 70),
(710, 'Coya', 70),
(711, 'Lamay', 70),
(712, 'Lares', 70),
(713, 'Pisac', 70),
(714, 'San Salvador', 70),
(715, 'Taray', 70),
(716, 'Yanatile', 70),
(717, 'Yanaoca', 71),
(718, 'Checca', 71),
(719, 'Kunturkanki', 71),
(720, 'Langui', 71); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosDiez()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (721, 'Layo', 71),
(722, 'Pampamarca', 71),
(723, 'Quehue', 71),
(724, 'Tupac Amaru', 71),
(725, 'Sicuani', 72),
(726, 'Checacupe', 72),
(727, 'Combapata', 72),
(728, 'Marangani', 72),
(729, 'Pitumarca', 72),
(730, 'San Pablo', 72),
(731, 'San Pedro', 72),
(732, 'Tinta', 72),
(733, 'Santo Tomas', 73),
(734, 'Capacmarca', 73),
(735, 'Chamaca', 73),
(736, 'Colquemarca', 73),
(737, 'Livitaca', 73),
(738, 'Llusco', 73),
(739, 'Quiñota', 73),
(740, 'Velille', 73),
(741, 'Espinar', 74),
(742, 'Condoroma', 74),
(743, 'Coporaque', 74),
(744, 'Ocoruro', 74),
(745, 'Pallpata', 74),
(746, 'Pichigua', 74),
(747, 'Suyckutambo', 74),
(748, 'Alto Pichigua', 74),
(749, 'Santa Ana', 75),
(750, 'Echarate', 75),
(751, 'Huayopata', 75),
(752, 'Maranura', 75),
(753, 'Ocobamba', 75),
(754, 'Quellouno', 75),
(755, 'Kimbiri', 75),
(756, 'Santa Teresa', 75),
(757, 'Vilcabamba', 75),
(758, 'Pichari', 75),
(759, 'Paruro', 76),
(760, 'Accha', 76),
(761, 'Ccapi', 76),
(762, 'Colcha', 76),
(763, 'Huanoquite', 76),
(764, 'Omacha', 76),
(765, 'Paccaritambo', 76),
(766, 'Pillpinto', 76),
(767, 'Yaurisque', 76),
(768, 'Paucartambo', 77),
(769, 'Caicay', 77),
(770, 'Challabamba', 77),
(771, 'Colquepata', 77),
(772, 'Huancarani', 77),
(773, 'KosÑIpata', 77),
(774, 'Urcos', 78),
(775, 'Andahuaylillas', 78),
(776, 'Camanti', 78),
(777, 'Ccarhuayo', 78),
(778, 'Ccatca', 78),
(779, 'Cusipata', 78),
(780, 'Huaro', 78),
(781, 'Lucre', 78),
(782, 'Marcapata', 78),
(783, 'Ocongate', 78),
(784, 'Oropesa', 78),
(785, 'Quiquijana', 78),
(786, 'Urubamba', 79),
(787, 'Chinchero', 79),
(788, 'Huayllabamba', 79),
(789, 'Machupicchu', 79),
(790, 'Maras', 79),
(791, 'Ollantaytambo', 79),
(792, 'Yucay', 79),
(793, 'Huancavelica', 80),
(794, 'Acobambilla', 80),
(795, 'Acoria', 80),
(796, 'Conayca', 80),
(797, 'Cuenca', 80),
(798, 'Huachocolpa', 80),
(799, 'Huayllahuara', 80),
(800, 'Izcuchaca', 80); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosOnce()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (801, 'Laria', 80),
(802, 'Manta', 80),
(803, 'Mariscal Caceres', 80),
(804, 'Moya', 80),
(805, 'Nuevo Occoro', 80),
(806, 'Palca', 80),
(807, 'Pilchaca', 80),
(808, 'Vilca', 80),
(809, 'Yauli', 80),
(810, 'Ascension', 80),
(811, 'Huando', 80),
(812, 'Acobamba', 81),
(813, 'Andabamba', 81),
(814, 'Anta', 81),
(815, 'Caja', 81),
(816, 'Marcas', 81),
(817, 'Paucara', 81),
(818, 'Pomacocha', 81),
(819, 'Rosario', 81),
(820, 'Lircay', 82),
(821, 'Anchonga', 82),
(822, 'Callanmarca', 82),
(823, 'Ccochaccasa', 82),
(824, 'Chincho', 82),
(825, 'Congalla', 82),
(826, 'Huanca-Huanca', 82),
(827, 'Huayllay Grande', 82),
(828, 'Julcamarca', 82),
(829, 'San Antonio de Antaparco', 82),
(830, 'Santo Tomas de Pata', 82),
(831, 'Secclla', 82),
(832, 'Castrovirreyna', 83),
(833, 'Arma', 83),
(834, 'Aurahua', 83),
(835, 'Capillas', 83),
(836, 'Chupamarca', 83),
(837, 'Cocas', 83),
(838, 'Huachos', 83),
(839, 'Huamatambo', 83),
(840, 'Mollepampa', 83),
(841, 'San Juan', 83),
(842, 'Santa Ana', 83),
(843, 'Tantara', 83),
(844, 'Ticrapo', 83),
(845, 'Churcampa', 84),
(846, 'Anco', 84),
(847, 'Chinchihuasi', 84),
(848, 'El Carmen', 84),
(849, 'La Merced', 84),
(850, 'Locroja', 84),
(851, 'Paucarbamba', 84),
(852, 'San Miguel de Mayocc', 84),
(853, 'San Pedro de Coris', 84),
(854, 'Pachamarca', 84),
(855, 'Huaytara', 85),
(856, 'Ayavi', 85),
(857, 'Cordova', 85),
(858, 'Huayacundo Arma', 85),
(859, 'Laramarca', 85),
(860, 'Ocoyo', 85),
(861, 'Pilpichaca', 85),
(862, 'Querco', 85),
(863, 'Quito-Arma', 85),
(864, 'San Antonio de Cusicancha', 85),
(865, 'San Francisco de Sangayaico', 85),
(866, 'San Isidro', 85),
(867, 'Santiago de Chocorvos', 85),
(868, 'Santiago de Quirahuara', 85),
(869, 'Santo Domingo de Capillas', 85),
(870, 'Tambo', 85),
(871, 'Pampas', 86),
(872, 'Acostambo', 86),
(873, 'Acraquia', 86),
(874, 'Ahuaycha', 86),
(875, 'Colcabamba', 86),
(876, 'Daniel Hernandez', 86),
(877, 'Huachocolpa', 86),
(878, 'Huaribamba', 86),
(879, 'Ñahuimpuquio', 86),
(880, 'Pazos', 86); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosDoce()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (881, 'Quishuar', 86),
(882, 'Salcabamba', 86),
(883, 'Salcahuasi', 86),
(884, 'San Marcos de Rocchac', 86),
(885, 'Surcubamba', 86),
(886, 'Tintay Puncu', 86),
(887, 'Huanuco', 87),
(888, 'Amarilis', 87),
(889, 'Chinchao', 87),
(890, 'Churubamba', 87),
(891, 'Margos', 87),
(892, 'Quisqui', 87),
(893, 'San Francisco de Cayran', 87),
(894, 'San Pedro de Chaulan', 87),
(895, 'Santa Maria del Valle', 87),
(896, 'Yarumayo', 87),
(897, 'Pillco Marca', 87),
(898, 'Ambo', 88),
(899, 'Cayna', 88),
(900, 'Colpas', 88),
(901, 'Conchamarca', 88),
(902, 'Huacar', 88),
(903, 'San Francisco', 88),
(904, 'San Rafael', 88),
(905, 'Tomay Kichwa', 88),
(906, 'La Union', 89),
(907, 'Chuquis', 89),
(908, 'Marias', 89),
(909, 'Pachas', 89),
(910, 'Quivilla', 89),
(911, 'Ripan', 89),
(912, 'Shunqui', 89),
(913, 'Sillapata', 89),
(914, 'Yanas', 89),
(915, 'Huacaybamba', 90),
(916, 'Canchabamba', 90),
(917, 'Cochabamba', 90),
(918, 'Pinra', 90),
(919, 'Llata', 91),
(920, 'Arancay', 91),
(921, 'Chavin de Pariarca', 91),
(922, 'Jacas Grande', 91),
(923, 'Jircan', 91),
(924, 'Miraflores', 91),
(925, 'Monzon', 91),
(926, 'Punchao', 91),
(927, 'Puños', 91),
(928, 'Singa', 91),
(929, 'Tantamayo', 91),
(930, 'Rupa-Rupa', 92),
(931, 'Daniel Alomia Robles', 92),
(932, 'Hermilio Valdizan', 92),
(933, 'Jose Crespo y Castillo', 92),
(934, 'Luyando', 92),
(935, 'Mariano Damaso Beraun', 92),
(936, 'Huacrachuco', 93),
(937, 'Cholon', 93),
(938, 'San Buenaventura', 93),
(939, 'Panao', 94),
(940, 'Chaglla', 94),
(941, 'Molino', 94),
(942, 'Umari', 94),
(943, 'Puerto Inca', 95),
(944, 'Codo del Pozuzo', 95),
(945, 'Honoria', 95),
(946, 'Tournavista', 95),
(947, 'Yuyapichis', 95),
(948, 'Jesus', 96),
(949, 'Baños', 96),
(950, 'Jivia', 96),
(951, 'Queropalca', 96),
(952, 'Rondos', 96),
(953, 'San Francisco de Asis', 96),
(954, 'San Miguel de Cauri', 96),
(955, 'Chavinillo', 97),
(956, 'Cahuac', 97),
(957, 'Chacabamba', 97),
(958, 'Aparicio Pomares', 97),
(959, 'Jacas Chico', 97),
(960, 'Obas', 97); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosTrece()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (961, 'Pampamarca', 97),
(962, 'Choras', 97),
(963, 'Ica', 98),
(964, 'La Tinguiña', 98),
(965, 'Los Aquijes', 98),
(966, 'Ocucaje', 98),
(967, 'Pachacutec', 98),
(968, 'Parcona', 98),
(969, 'Pueblo Nuevo', 98),
(970, 'Salas', 98),
(971, 'San Jose de los Molinos', 98),
(972, 'San Juan Bautista', 98),
(973, 'Santiago', 98),
(974, 'Subtanjalla', 98),
(975, 'Tate', 98),
(976, 'Yauca del Rosario', 98),
(977, 'Chincha Alta', 99),
(978, 'Alto Laran', 99),
(979, 'Chavin', 99),
(980, 'Chincha Baja', 99),
(981, 'El Carmen', 99),
(982, 'Grocio Prado', 99),
(983, 'Pueblo Nuevo', 99),
(984, 'San Juan de Yanac', 99),
(985, 'San Pedro de Huacarpana', 99),
(986, 'Sunampe', 99),
(987, 'Tambo De Mora', 99),
(988, 'Nazca', 100),
(989, 'Changuillo', 100),
(990, 'El Ingenio', 100),
(991, 'Marcona', 100),
(992, 'Vista Alegre', 100),
(993, 'Palpa', 101),
(994, 'Llipata', 101),
(995, 'Rio Grande', 101),
(996, 'Santa Cruz', 101),
(997, 'Tibillo', 101),
(998, 'Pisco', 102),
(999, 'Huancano', 102),
(1000, 'Humay', 102),
(1001, 'Independencia', 102),
(1002, 'Paracas', 102),
(1003, 'San Andres', 102),
(1004, 'San Clemente', 102),
(1005, 'Tupac Amaru Inca', 102),
(1006, 'Huancayo', 103),
(1007, 'Carhuacallanga', 103),
(1008, 'Chacapampa', 103),
(1009, 'Chicche', 103),
(1010, 'Chilca', 103),
(1011, 'Chongos Alto', 103),
(1012, 'Chupuro', 103),
(1013, 'Colca', 103),
(1014, 'Cullhuas', 103),
(1015, 'El Tambo', 103),
(1016, 'Huacrapuquio', 103),
(1017, 'Hualhuas', 103),
(1018, 'Huancan', 103),
(1019, 'Huasicancha', 103),
(1020, 'Huayucachi', 103),
(1021, 'Ingenio', 103),
(1022, 'Pariahuanca', 103),
(1023, 'Pilcomayo', 103),
(1024, 'Pucara', 103),
(1025, 'Quichuay', 103),
(1026, 'Quilcas', 103),
(1027, 'San Agustin', 103),
(1028, 'San Jeronimo de Tunan', 103),
(1029, 'Saño', 103),
(1030, 'Sapallanga', 103),
(1031, 'Sicaya', 103),
(1032, 'Santo Domingo de Acobamba', 103),
(1033, 'Viques', 103),
(1034, 'Concepcion', 104),
(1035, 'Aco', 104),
(1036, 'Andamarca', 104),
(1037, 'Chambara', 104),
(1038, 'Cochas', 104),
(1039, 'Comas', 104),
(1040, 'Heroinas Toledo', 104); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosCatorce()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (1041, 'Manzanares', 104),
(1042, 'Mariscal Castilla', 104),
(1043, 'Matahuasi', 104),
(1044, 'Mito', 104),
(1045, 'Nueve De Julio', 104),
(1046, 'Orcotuna', 104),
(1047, 'San Jose de Quero', 104),
(1048, 'Santa Rosa de Ocopa', 104),
(1049, 'Chanchamayo', 105),
(1050, 'Perene', 105),
(1051, 'Pichanaqui', 105),
(1052, 'San Luis de Shuaro', 105),
(1053, 'San Ramon', 105),
(1054, 'Vitoc', 105),
(1055, 'Jauja', 106),
(1056, 'Acolla', 106),
(1057, 'Apata', 106),
(1058, 'Ataura', 106),
(1059, 'Canchayllo', 106),
(1060, 'Curicaca', 106),
(1061, 'El Mantaro', 106),
(1062, 'Huamali', 106),
(1063, 'Huaripampa', 106),
(1064, 'Huertas', 106),
(1065, 'Janjaillo', 106),
(1066, 'Julcan', 106),
(1067, 'Leonor Ordoñez', 106),
(1068, 'Llocllapampa', 106),
(1069, 'Marco', 106),
(1070, 'Masma', 106),
(1071, 'Masma Chicche', 106),
(1072, 'Molinos', 106),
(1073, 'Monobamba', 106),
(1074, 'Muqui', 106),
(1075, 'Muquiyauyo', 106),
(1076, 'Paca', 106),
(1077, 'Paccha', 106),
(1078, 'Pancan', 106),
(1079, 'Parco', 106),
(1080, 'Pomacancha', 106),
(1081, 'Ricran', 106),
(1082, 'San Lorenzo', 106),
(1083, 'San Pedro De Chunan', 106),
(1084, 'Sausa', 106),
(1085, 'Sincos', 106),
(1086, 'Tunan Marca', 106),
(1087, 'Yauli', 106),
(1088, 'Yauyos', 106),
(1089, 'Junin', 107),
(1090, 'Carhuamayo', 107),
(1091, 'Ondores', 107),
(1092, 'Ulcumayo', 107),
(1093, 'Satipo', 108),
(1094, 'Coviriali', 108),
(1095, 'Llaylla', 108),
(1096, 'Mazamari', 108),
(1097, 'Pampa Hermosa', 108),
(1098, 'Pangoa', 108),
(1099, 'Rio Negro', 108),
(1100, 'Rio Tambo', 108),
(1101, 'Tarma', 109),
(1102, 'Acobamba', 109),
(1103, 'Huaricolca', 109),
(1104, 'Huasahuasi', 109),
(1105, 'La Union', 109),
(1106, 'Palca', 109),
(1107, 'Palcamayo', 109),
(1108, 'San Pedro de Cajas', 109),
(1109, 'Tapo', 109),
(1110, 'La Oroya', 110),
(1111, 'Chacapalpa', 110),
(1112, 'Huay-Huay', 110),
(1113, 'Marcapomacocha', 110),
(1114, 'Morococha', 110),
(1115, 'Paccha', 110),
(1116, 'Santa Barbara de Carhuacayan', 110),
(1117, 'Santa Rosa De Sacco', 110),
(1118, 'Suitucancha', 110),
(1119, 'Yauli', 110),
(1120, 'Chupaca', 111); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosQuince()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (1121, 'Ahuac', 111),
(1122, 'Chongos Bajo', 111),
(1123, 'Huachac', 111),
(1124, 'Huamancaca Chico', 111),
(1125, 'San Juan de Iscos', 111),
(1126, 'San Juan de Jarpa', 111),
(1127, 'Tres de Diciembre', 111),
(1128, 'Yanacancha', 111),
(1129, 'Trujillo', 112),
(1130, 'El Porvenir', 112),
(1131, 'Florencia de Mora', 112),
(1132, 'Huanchaco', 112),
(1133, 'La Esperanza', 112),
(1134, 'Laredo', 112),
(1135, 'Moche', 112),
(1136, 'Poroto', 112),
(1137, 'Salaverry', 112),
(1138, 'Simbal', 112),
(1139, 'Victor Larco Herrera', 112),
(1140, 'Ascope', 113),
(1141, 'Chicama', 113),
(1142, 'Chocope', 113),
(1143, 'Magdalena de Cao', 113),
(1144, 'Paijan', 113),
(1145, 'Razuri', 113),
(1146, 'Santiago de Cao', 113),
(1147, 'Casa Grande', 113),
(1148, 'Bolivar', 114),
(1149, 'Bambamarca', 114),
(1150, 'Condormarca', 114),
(1151, 'Longotea', 114),
(1152, 'Uchumarca', 114),
(1153, 'Ucuncha', 114),
(1154, 'Chepen', 115),
(1155, 'Pacanga', 115),
(1156, 'Pueblo Nuevo', 115),
(1157, 'Julcan', 116),
(1158, 'Calamarca', 116),
(1159, 'Carabamba', 116),
(1160, 'Huaso', 116),
(1161, 'Otuzco', 117),
(1162, 'Agallpampa', 117),
(1163, 'Charat', 117),
(1164, 'Huaranchal', 117),
(1165, 'La Cuesta', 117),
(1166, 'Mache', 117),
(1167, 'Paranday', 117),
(1168, 'Salpo', 117),
(1169, 'Sinsicap', 117),
(1170, 'Usquil', 117),
(1171, 'San Pedro De Lloc', 118),
(1172, 'Guadalupe', 118),
(1173, 'Jequetepeque', 118),
(1174, 'Pacasmayo', 118),
(1175, 'San Jose', 118),
(1176, 'Tayabamba', 119),
(1177, 'Buldibuyo', 119),
(1178, 'Chillia', 119),
(1179, 'Huancaspata', 119),
(1180, 'Huaylillas', 119),
(1181, 'Huayo', 119),
(1182, 'Ongon', 119),
(1183, 'Parcoy', 119),
(1184, 'Pataz', 119),
(1185, 'Pias', 119),
(1186, 'Santiago de Challas', 119),
(1187, 'Taurija', 119),
(1188, 'Urpay', 119),
(1189, 'Huamachuco', 120),
(1190, 'Chugay', 120),
(1191, 'Cochorco', 120),
(1192, 'Curgos', 120),
(1193, 'Marcabal', 120),
(1194, 'Sanagoran', 120),
(1195, 'Sarin', 120),
(1196, 'Sartimbamba', 120),
(1197, 'Santiago De Chuco', 121),
(1198, 'Angasmarca', 121),
(1199, 'Cachicadan', 121),
(1200, 'Mollebamba', 121); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosDieciseis()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (1201, 'Mollepata', 121),
(1202, 'Quiruvilca', 121),
(1203, 'Santa Cruz De Chuca', 121),
(1204, 'Sitabamba', 121),
(1205, 'Gran Chimu', 122),
(1206, 'Cascas', 122),
(1207, 'Lucma', 122),
(1208, 'Marmot', 122),
(1209, 'Sayapullo', 122),
(1210, 'Viru', 123),
(1211, 'Chao', 123),
(1212, 'Guadalupito', 123),
(1213, 'Chiclayo', 124),
(1214, 'Chongoyape', 124),
(1215, 'Eten', 124),
(1216, 'Eten Puerto', 124),
(1217, 'Jose Leonardo Ortiz', 124),
(1218, 'La Victoria', 124),
(1219, 'Lagunas', 124),
(1220, 'Monsefu', 124),
(1221, 'Nueva Arica', 124),
(1222, 'Oyotun', 124),
(1223, 'Picsi', 124),
(1224, 'Pimentel', 124),
(1225, 'Reque', 124),
(1226, 'Santa Rosa', 124),
(1227, 'SaÑA', 124),
(1228, 'Cayalti', 124),
(1229, 'Patapo', 124),
(1230, 'Pomalca', 124),
(1231, 'Pucala', 124),
(1232, 'Tuman', 124),
(1233, 'FerreÑAfe', 125),
(1234, 'CaÑAris', 125),
(1235, 'Incahuasi', 125),
(1236, 'Manuel Antonio Mesones Muro', 125),
(1237, 'Pitipo', 125),
(1238, 'Pueblo Nuevo', 125),
(1239, 'Lambayeque', 126),
(1240, 'Chochope', 126),
(1241, 'Illimo', 126),
(1242, 'Jayanca', 126),
(1243, 'Mochumi', 126),
(1244, 'Morrope', 126),
(1245, 'Motupe', 126),
(1246, 'Olmos', 126),
(1247, 'Pacora', 126),
(1248, 'Salas', 126),
(1249, 'San Jose', 126),
(1250, 'Tucume', 126),
(1251, 'Lima', 127),
(1252, 'Ancon', 127),
(1253, 'Ate', 127),
(1254, 'Barranco', 127),
(1255, 'Breña', 127),
(1256, 'Carabayllo', 127),
(1257, 'Chaclacayo', 127),
(1258, 'Chorrillos', 127),
(1259, 'Cieneguilla', 127),
(1260, 'Comas', 127),
(1261, 'El Agustino', 127),
(1262, 'Independencia', 127),
(1263, 'Jesus Maria', 127),
(1264, 'La Molina', 127),
(1265, 'La Victoria', 127),
(1266, 'Lince', 127),
(1267, 'Los Olivos', 127),
(1268, 'Lurigancho', 127),
(1269, 'Lurin', 127),
(1270, 'Magdalena del Mar', 127),
(1271, 'Miraflores', 127),
(1272, 'Pachacamac', 127),
(1273, 'Pucusana', 127),
(1274, 'Pueblo Libre', 127),
(1275, 'Puente Piedra', 127),
(1276, 'Punta Hermosa', 127),
(1277, 'Punta Negra', 127),
(1278, 'Rimac', 127),
(1279, 'San Bartolo', 127),
(1280, 'San Borja', 127); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosDiecisiete()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (1281, 'San Isidro', 127),
(1282, 'San Juan de Lurigancho', 127),
(1283, 'San Juan de Miraflores', 127),
(1284, 'San Luis', 127),
(1285, 'San Martin de Porres', 127),
(1286, 'San Miguel', 127),
(1287, 'Santa Anita', 127),
(1288, 'Santa Maria del Mar', 127),
(1289, 'Santa Rosa', 127),
(1290, 'Santiago de Surco', 127),
(1291, 'Surquillo', 127),
(1292, 'Villa El Salvador', 127),
(1293, 'Villa Maria del Triunfo', 127),
(1294, 'Barranca', 128),
(1295, 'Paramonga', 128),
(1296, 'Pativilca', 128),
(1297, 'Supe', 128),
(1298, 'Supe Puerto', 128),
(1299, 'Cajatambo', 129),
(1300, 'Copa', 129),
(1301, 'Gorgor', 129),
(1302, 'Huancapon', 129),
(1303, 'Manas', 129),
(1304, 'Canta', 130),
(1305, 'Arahuay', 130),
(1306, 'Huamantanga', 130),
(1307, 'Huaros', 130),
(1308, 'Lachaqui', 130),
(1309, 'San Buenaventura', 130),
(1310, 'Santa Rosa de Quives', 130),
(1311, 'San Vicente de Cañete', 131),
(1312, 'Asia', 131),
(1313, 'Calango', 131),
(1314, 'Cerro Azul', 131),
(1315, 'Chilca', 131),
(1316, 'Coayllo', 131),
(1317, 'Imperial', 131),
(1318, 'Lunahuana', 131),
(1319, 'Mala', 131),
(1320, 'Nuevo Imperial', 131),
(1321, 'Pacaran', 131),
(1322, 'Quilmana', 131),
(1323, 'San Antonio', 131),
(1324, 'San Luis', 131),
(1325, 'Santa Cruz de Flores', 131),
(1326, 'Zuñiga', 131),
(1327, 'Huaral', 132),
(1328, 'Atavillos Alto', 132),
(1329, 'Atavillos Bajo', 132),
(1330, 'Aucallama', 132),
(1331, 'Chancay', 132),
(1332, 'Ihuari', 132),
(1333, 'Lampian', 132),
(1334, 'Pacaraos', 132),
(1335, 'San Miguel de Acos', 132),
(1336, 'Santa Cruz de Andamarca', 132),
(1337, 'Sumbilca', 132),
(1338, 'Veintisiete de Noviembre', 132),
(1339, 'Matucana', 133),
(1340, 'Antioquia', 133),
(1341, 'Callahuanca', 133),
(1342, 'Carampoma', 133),
(1343, 'Chicla', 133),
(1344, 'Cuenca', 133),
(1345, 'Huachupampa', 133),
(1346, 'Huanza', 133),
(1347, 'Huarochiri', 133),
(1348, 'Lahuaytambo', 133),
(1349, 'Langa', 133),
(1350, 'Laraos', 133),
(1351, 'Mariatana', 133),
(1352, 'Ricardo Palma', 133),
(1353, 'San Andres de Tupicocha', 133),
(1354, 'San Antonio', 133),
(1355, 'San Bartolome', 133),
(1356, 'San Damian', 133),
(1357, 'San Juan de Iris', 133),
(1358, 'San Juan de Tantaranche', 133),
(1359, 'San Lorenzo de Quinti', 133),
(1360, 'San Mateo', 133); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosDieciocho()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (1361, 'San Mateo De Otao', 133),
(1362, 'San Pedro de Casta', 133),
(1363, 'San Pedro de Huancayre', 133),
(1364, 'Sangallaya', 133),
(1365, 'Santa Cruz de Cocachacra', 133),
(1366, 'Santa Eulalia', 133),
(1367, 'Santiago de Anchucaya', 133),
(1368, 'Santiago de Tuna', 133),
(1369, 'Santo Domingo de los Olleros', 133),
(1370, 'Surco', 133),
(1371, 'Huacho', 134),
(1372, 'Ambar', 134),
(1373, 'Caleta de Carquin', 134),
(1374, 'Checras', 134),
(1375, 'Hualmay', 134),
(1376, 'Huaura', 134),
(1377, 'Leoncio Prado', 134),
(1378, 'Paccho', 134),
(1379, 'Santa Leonor', 134),
(1380, 'Santa Maria', 134),
(1381, 'Sayan', 134),
(1382, 'Vegueta', 134),
(1383, 'Oyon', 135),
(1384, 'Andajes', 135),
(1385, 'Caujul', 135),
(1386, 'Cochamarca', 135),
(1387, 'Navan', 135),
(1388, 'Pachangara', 135),
(1389, 'Yauyos', 136),
(1390, 'Alis', 136),
(1391, 'Ayauca', 136),
(1392, 'Ayaviri', 136),
(1393, 'Azangaro', 136),
(1394, 'Cacra', 136),
(1395, 'Carania', 136),
(1396, 'Catahuasi', 136),
(1397, 'Chocos', 136),
(1398, 'Cochas', 136),
(1399, 'Colonia', 136),
(1400, 'Hongos', 136),
(1401, 'Huampara', 136),
(1402, 'Huancaya', 136),
(1403, 'Huangascar', 136),
(1404, 'Huantan', 136),
(1405, 'Huañec', 136),
(1406, 'Laraos', 136),
(1407, 'Lincha', 136),
(1408, 'Madean', 136),
(1409, 'Miraflores', 136),
(1410, 'Omas', 136),
(1411, 'Putinza', 136),
(1412, 'Quinches', 136),
(1413, 'Quinocay', 136),
(1414, 'San Joaquin', 136),
(1415, 'San Pedro de Pilas', 136),
(1416, 'Tanta', 136),
(1417, 'Tauripampa', 136),
(1418, 'Tomas', 136),
(1419, 'Tupe', 136),
(1420, 'Viñac', 136); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosDiecinueve()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (1421, 'Vitis', 136),
(1422, 'Iquitos', 137),
(1423, 'Alto Nanay', 137),
(1424, 'Fernando Lores', 137),
(1425, 'Indiana', 137),
(1426, 'Las Amazonas', 137),
(1427, 'Mazan', 137),
(1428, 'Napo', 137),
(1429, 'Punchana', 137),
(1430, 'Putumayo', 137),
(1431, 'Torres Causana', 137),
(1432, 'Belen', 137),
(1433, 'San Juan Bautista', 137),
(1434, 'Yurimaguas', 138),
(1435, 'Balsapuerto', 138),
(1436, 'Barranca', 138),
(1437, 'Cahuapanas', 138),
(1438, 'Jeberos', 138),
(1439, 'Lagunas', 138),
(1440, 'Manseriche', 138),
(1441, 'Morona', 138),
(1442, 'Pastaza', 138),
(1443, 'Santa Cruz', 138),
(1444, 'Teniente Cesar Lopez Rojas', 138),
(1445, 'Nauta', 139),
(1446, 'Parinari', 139),
(1447, 'Tigre', 139),
(1448, 'Trompeteros', 139),
(1449, 'Urarinas', 139),
(1450, 'Ramon Castilla', 140),
(1451, 'Pebas', 140),
(1452, 'Yavari', 140),
(1453, 'San Pablo', 140),
(1454, 'Requena', 141),
(1455, 'Alto Tapiche', 141),
(1456, 'Capelo', 141),
(1457, 'Emilio San Martin', 141),
(1458, 'Maquia', 141),
(1459, 'Puinahua', 141),
(1460, 'Saquena', 141),
(1461, 'Soplin', 141),
(1462, 'Tapiche', 141),
(1463, 'Jenaro Herrera', 141),
(1464, 'Yaquerana', 141),
(1465, 'Contamana', 142),
(1466, 'Inahuaya', 142),
(1467, 'Padre Marquez', 142),
(1468, 'Pampa Hermosa', 142),
(1469, 'Sarayacu', 142),
(1470, 'Vargas Guerra', 142),
(1471, 'Tambopata', 143),
(1472, 'Inambari', 143),
(1473, 'Las Piedras', 143),
(1474, 'Laberinto', 143),
(1475, 'Manu', 144),
(1476, 'Fitzcarrald', 144),
(1477, 'Madre de Dios', 144),
(1478, 'Huepetuhe', 144),
(1479, 'IÑApari', 145),
(1480, 'Iberia', 145),
(1481, 'Tahuamanu', 145),
(1482, 'Moquegua', 146),
(1483, 'Carumas', 146),
(1484, 'Cuchumbaya', 146),
(1485, 'Samegua', 146),
(1486, 'San Cristobal', 146),
(1487, 'Torata', 146),
(1488, 'Omate', 147),
(1489, 'Chojata', 147),
(1490, 'Coalaque', 147),
(1491, 'IchuÑA', 147),
(1492, 'La Capilla', 147),
(1493, 'Lloque', 147),
(1494, 'Matalaque', 147),
(1495, 'Puquina', 147),
(1496, 'Quinistaquillas', 147),
(1497, 'Ubinas', 147),
(1498, 'Yunga', 147),
(1499, 'Ilo', 148),
(1500, 'El Algarrobal', 148); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosViente()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (1501, 'Pacocha', 148),
(1502, 'Chaupimarca', 149),
(1503, 'Huachon', 149),
(1504, 'Huariaca', 149),
(1505, 'Huayllay', 149),
(1506, 'Ninacaca', 149),
(1507, 'Pallanchacra', 149),
(1508, 'Paucartambo', 149),
(1509, 'San Fco. de Asis de Yarusyacan', 149),
(1510, 'Simon Bolivar', 149),
(1511, 'Ticlacayan', 149),
(1512, 'Tinyahuarco', 149),
(1513, 'Vicco', 149),
(1514, 'Yanacancha', 149),
(1515, 'Yanahuanca', 150),
(1516, 'Chacayan', 150),
(1517, 'Goyllarisquizga', 150),
(1518, 'Paucar', 150),
(1519, 'San Pedro de Pillao', 150),
(1520, 'Santa Ana de Tusi', 150),
(1521, 'Tapuc', 150),
(1522, 'Vilcabamba', 150),
(1523, 'Oxapampa', 151),
(1524, 'Chontabamba', 151),
(1525, 'Huancabamba', 151),
(1526, 'Palcazu', 151),
(1527, 'Pozuzo', 151),
(1528, 'Puerto Bermudez', 151),
(1529, 'Villa Rica', 151),
(1530, 'Piura', 152),
(1531, 'Castilla', 152),
(1532, 'Catacaos', 152),
(1533, 'Cura Mori', 152),
(1534, 'El Tallan', 152),
(1535, 'La Arena', 152),
(1536, 'La Union', 152),
(1537, 'Las Lomas', 152),
(1538, 'Tambo Grande', 152),
(1539, 'Ayabaca', 153),
(1540, 'Frias', 153),
(1541, 'Jilili', 153),
(1542, 'Lagunas', 153),
(1543, 'Montero', 153),
(1544, 'Pacaipampa', 153),
(1545, 'Paimas', 153),
(1546, 'Sapillica', 153),
(1547, 'Sicchez', 153),
(1548, 'Suyo', 153),
(1549, 'Huancabamba', 154),
(1550, 'Canchaque', 154),
(1551, 'El Carmen de La Frontera', 154),
(1552, 'Huarmaca', 154),
(1553, 'Lalaquiz', 154),
(1554, 'San Miguel de el Faique', 154),
(1555, 'Sondor', 154),
(1556, 'Sondorillo', 154),
(1557, 'Chulucanas', 155),
(1558, 'Buenos Aires', 155),
(1559, 'Chalaco', 155),
(1560, 'La Matanza', 155),
(1561, 'Morropon', 155),
(1562, 'Salitral', 155),
(1563, 'San Juan de Bigote', 155),
(1564, 'Santa Catalina de Mossa', 155),
(1565, 'Santo Domingo', 155),
(1566, 'Yamango', 155),
(1567, 'Paita', 156),
(1568, 'Amotape', 156),
(1569, 'Arenal', 156),
(1570, 'Colan', 156),
(1571, 'La Huaca', 156),
(1572, 'Tamarindo', 156),
(1573, 'Vichayal', 156),
(1574, 'Sullana', 157),
(1575, 'Bellavista', 157),
(1576, 'Ignacio Escudero', 157),
(1577, 'Lancones', 157),
(1578, 'Marcavelica', 157),
(1579, 'Miguel Checa', 157),
(1580, 'Querecotillo', 157); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosVeintiuno()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (1581, 'Salitral', 157),
(1582, 'Pariñas', 158),
(1583, 'El Alto', 158),
(1584, 'La Brea', 158),
(1585, 'Lobitos', 158),
(1586, 'Los Organos', 158),
(1587, 'Mancora', 158),
(1588, 'Sechura', 159),
(1589, 'Bellavista de La Union', 159),
(1590, 'Bernal', 159),
(1591, 'Cristo Nos Valga', 159),
(1592, 'Vice', 159),
(1593, 'Rinconada Llicuar', 159),
(1594, 'Puno', 160),
(1595, 'Acora', 160),
(1596, 'Amantani', 160),
(1597, 'Atuncolla', 160),
(1598, 'Capachica', 160),
(1599, 'Chucuito', 160),
(1600, 'Coata', 160),
(1601, 'Huata', 160),
(1602, 'MaÑAzo', 160),
(1603, 'Paucarcolla', 160),
(1604, 'Pichacani', 160),
(1605, 'Plateria', 160),
(1606, 'San Antonio', 160),
(1607, 'Tiquillaca', 160),
(1608, 'Vilque', 160),
(1609, 'Azangaro', 161),
(1610, 'Achaya', 161),
(1611, 'Arapa', 161),
(1612, 'Asillo', 161),
(1613, 'Caminaca', 161),
(1614, 'Chupa', 161),
(1615, 'Jose Domingo Choquehuanca', 161),
(1616, 'Muñani', 161),
(1617, 'Potoni', 161),
(1618, 'Saman', 161),
(1619, 'San Anton', 161),
(1620, 'San Jose', 161),
(1621, 'San Juan de Salinas', 161),
(1622, 'Santiago de Pupuja', 161),
(1623, 'Tirapata', 161),
(1624, 'Macusani', 162),
(1625, 'Ajoyani', 162),
(1626, 'Ayapata', 162),
(1627, 'Coasa', 162),
(1628, 'Corani', 162),
(1629, 'Crucero', 162),
(1630, 'Ituata', 162),
(1631, 'Ollachea', 162),
(1632, 'San Gaban', 162),
(1633, 'Usicayos', 162),
(1634, 'Juli', 163),
(1635, 'Desaguadero', 163),
(1636, 'Huacullani', 163),
(1637, 'Kelluyo', 163),
(1638, 'Pisacoma', 163),
(1639, 'Pomata', 163),
(1640, 'Zepita', 163); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosVeintidos()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (1641, 'Ilave', 164),
(1642, 'Capazo', 164),
(1643, 'Pilcuyo', 164),
(1644, 'Santa Rosa', 164),
(1645, 'Conduriri', 164),
(1646, 'Huancane', 165),
(1647, 'Cojata', 165),
(1648, 'Huatasani', 165),
(1649, 'Inchupalla', 165),
(1650, 'Pusi', 165),
(1651, 'Rosaspata', 165),
(1652, 'Taraco', 165),
(1653, 'Vilque Chico', 165),
(1654, 'Lampa', 166),
(1655, 'Cabanilla', 166),
(1656, 'Calapuja', 166),
(1657, 'Nicasio', 166),
(1658, 'Ocuviri', 166),
(1659, 'Palca', 166),
(1660, 'Paratia', 166),
(1661, 'Pucara', 166),
(1662, 'Santa Lucia', 166),
(1663, 'Vilavila', 166),
(1664, 'Ayaviri', 167),
(1665, 'Antauta', 167),
(1666, 'Cupi', 167),
(1667, 'Llalli', 167),
(1668, 'Macari', 167),
(1669, 'NuÑOa', 167),
(1670, 'Orurillo', 167),
(1671, 'Santa Rosa', 167),
(1672, 'Umachiri', 167),
(1673, 'Moho', 168),
(1674, 'Conima', 168),
(1675, 'Huayrapata', 168),
(1676, 'Tilali', 168),
(1677, 'Putina', 169),
(1678, 'Ananea', 169),
(1679, 'Pedro Vilca Apaza', 169),
(1680, 'Quilcapuncu', 169),
(1681, 'Sina', 169),
(1682, 'Juliaca', 170),
(1683, 'Cabana', 170),
(1684, 'Cabanillas', 170),
(1685, 'Caracoto', 170),
(1686, 'Sandia', 171),
(1687, 'Cuyocuyo', 171),
(1688, 'Limbani', 171),
(1689, 'Patambuco', 171),
(1690, 'Phara', 171),
(1691, 'Quiaca', 171),
(1692, 'San Juan del Oro', 171),
(1693, 'Yanahuaya', 171),
(1694, 'Alto Inambari', 171),
(1695, 'Yunguyo', 172),
(1696, 'Anapia', 172),
(1697, 'Copani', 172),
(1698, 'Cuturapi', 172),
(1699, 'Ollaraya', 172),
(1700, 'Tinicachi', 172),
(1701, 'Unicachi', 172),
(1702, 'Moyobamba', 173),
(1703, 'Calzada', 173),
(1704, 'Habana', 173),
(1705, 'Jepelacio', 173),
(1706, 'Soritor', 173),
(1707, 'Yantalo', 173),
(1708, 'Bellavista', 174),
(1709, 'Alto Biavo', 174),
(1710, 'Bajo Biavo', 174),
(1711, 'Huallaga', 174),
(1712, 'San Pablo', 174),
(1713, 'San Rafael', 174),
(1714, 'San Jose De Sisa', 175),
(1715, 'Agua Blanca', 175),
(1716, 'San Martin', 175),
(1717, 'Santa Rosa', 175),
(1718, 'Shatoja', 175),
(1719, 'Saposoa', 176),
(1720, 'Alto Saposoa', 176); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosVeintitres()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (1721, 'El Eslabon', 176),
(1722, 'Piscoyacu', 176),
(1723, 'Sacanche', 176),
(1724, 'Tingo De Saposoa', 176),
(1725, 'Lamas', 177),
(1726, 'Alonso de Alvarado', 177),
(1727, 'Barranquita', 177),
(1728, 'Caynarachi', 177),
(1729, 'Cuñumbuqui', 177),
(1730, 'Pinto Recodo', 177),
(1731, 'Rumisapa', 177),
(1732, 'San Roque de Cumbaza', 177),
(1733, 'Shanao', 177),
(1734, 'Tabalosos', 177),
(1735, 'Zapatero', 177),
(1736, 'Juanjui', 178),
(1737, 'Campanilla', 178),
(1738, 'Huicungo', 178),
(1739, 'Pachiza', 178),
(1740, 'Pajarillo', 178),
(1741, 'Picota', 179),
(1742, 'Buenos Aires', 179),
(1743, 'Caspisapa', 179),
(1744, 'Pilluana', 179),
(1745, 'Pucacaca', 179),
(1746, 'San Cristobal', 179),
(1747, 'San Hilarion', 179),
(1748, 'Shamboyacu', 179),
(1749, 'Tingo de Ponasa', 179),
(1750, 'Tres Unidos', 179),
(1751, 'Rioja', 180),
(1752, 'Awajun', 180),
(1753, 'Elias Soplin Vargas', 180),
(1754, 'Nueva Cajamarca', 180),
(1755, 'Pardo Miguel', 180),
(1756, 'Posic', 180),
(1757, 'San Fernando', 180),
(1758, 'Yorongos', 180),
(1759, 'Yuracyacu', 180),
(1760, 'Tarapoto', 181),
(1761, 'Alberto Leveau', 181),
(1762, 'Cacatachi', 181),
(1763, 'Chazuta', 181),
(1764, 'Chipurana', 181),
(1765, 'El Porvenir', 181),
(1766, 'Huimbayoc', 181),
(1767, 'Juan Guerra', 181),
(1768, 'La Banda de Shilcayo', 181),
(1769, 'Morales', 181),
(1770, 'Papaplaya', 181),
(1771, 'San Antonio', 181),
(1772, 'Sauce', 181),
(1773, 'Shapaja', 181),
(1774, 'Tocache', 182),
(1775, 'Nuevo Progreso', 182),
(1776, 'Polvora', 182),
(1777, 'Shunte', 182),
(1778, 'Uchiza', 182),
(1779, 'Tacna', 183),
(1780, 'Alto de la Alianza', 183),
(1781, 'Calana', 183),
(1782, 'Ciudad Nueva', 183),
(1783, 'Inclan', 183),
(1784, 'Pachia', 183),
(1785, 'Palca', 183),
(1786, 'Pocollay', 183),
(1787, 'Sama', 183),
(1788, 'Coronel Gregorio Albarracin Lanchipa', 183),
(1789, 'Candarave', 184),
(1790, 'Cairani', 184),
(1791, 'Camilaca', 184),
(1792, 'Curibaya', 184),
(1793, 'Huanuara', 184),
(1794, 'Quilahuani', 184),
(1795, 'Locumba', 185),
(1796, 'Ilabaya', 185),
(1797, 'Ite', 185),
(1798, 'Tarata', 186),
(1799, 'Chucatamani', 186),
(1800, 'Estique', 186); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function cargaDatosDistritosVeinticuatro()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $sql = " INSERT INTO $table_name (`idDist`, `distrito`, `idProv`) VALUES
    (1801, 'Estique-Pampa', 186),
(1802, 'Sitajara', 186),
(1803, 'Susapaya', 186),
(1804, 'Tarucachi', 186),
(1805, 'Ticaco', 186),
(1806, 'Tumbes', 187),
(1807, 'Corrales', 187),
(1808, 'La Cruz', 187),
(1809, 'Pampas de Hospital', 187),
(1810, 'San Jacinto', 187),
(1811, 'San Juan de la Virgen', 187),
(1812, 'Zorritos', 188),
(1813, 'Casitas', 188),
(1814, 'Zarumilla', 189),
(1815, 'Aguas Verdes', 189),
(1816, 'Matapalo', 189),
(1817, 'Papayal', 189),
(1818, 'Calleria', 190),
(1819, 'Campoverde', 190),
(1820, 'Iparia', 190),
(1821, 'Masisea', 190),
(1822, 'Yarinacocha', 190),
(1823, 'Nueva Requena', 190),
(1824, 'Raymondi', 191),
(1825, 'Sepahua', 191),
(1826, 'Tahuania', 191),
(1827, 'Yurua', 191),
(1828, 'Padre Abad', 192),
(1829, 'Irazola', 192),
(1830, 'Curimana', 192),
(1831, 'Purus', 193); ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

register_activation_hook(__FILE__,'ubigeo_install');

function ubigeo_uninstall()
{
    delete_tabla("ubigeo_departamento");
    delete_tabla("ubigeo_provincia");
    delete_tabla("ubigeo_distrito");
}

function delete_tabla($tabla)
{
    global $wpdb;
    $table_name = $wpdb->prefix . $tabla;

    $sql = "DROP TABLE $table_name";
    $wpdb->query($sql);
}

register_deactivation_hook(__FILE__,'ubigeo_uninstall');

add_action('admin_menu', 'ubigeo_menu');

function ubigeo_panel()
{
    include('panel.php');
}

function ubigeo_menu()
{
    // Extraemos el directorio en el que estamos para ir us�ndolo luego
    $pluginDir = pathinfo( __FILE__ );
    $pluginDir = $pluginDir['dirname'];
    // titulo de la nueva sección:
    $page_title = "Ubigeo Perú";
    // titulo en el menú
    $menu_title = "Ubigeo Perú";
    // nivel necesario para poder ver el menú (admin:10, editores:8)
    // + info en: http://codex.wordpress.org/User_Levels
    $access_level = "edit_posts";
    // la página que se cargaré al clickar en el menú
    $content_file = $pluginDir . '/panel.php';
    // Función para cargar dentro de la página incluida para generar el menú
    // Si no se indica, se asume que al incluir el fichero ya se ha generado todo el
    // contenido necesario.
    $content_function = null;
    // url del icono para el menú
    $menu_icon_url = null;
    add_menu_page($page_title, $menu_title, $access_level, $content_file, $content_function, $menu_icon_url);
    // Declaramos también como primer submenú la misma página con los mismos datos
    add_submenu_page($content_file,$page_title, $menu_title, $access_level, $content_file, 'ubigeo_panel');

}

function add_checkout_script() { ?>

    <script type="text/javascript">
      (function($) {
        var country = $("select[name*='deptoCode']");
        var state = $("select[name*='billing_city']");

        if (country.length) {
          country.change(function() {

            var $this = $(this);
            get_states($(this).val(), function(response) {

              var obj = JSON.parse(response);
              var len = obj.length;
              var $stateValues = '';

              $("select[name*='billing_city']").empty();
              $("select[name*='distCode']").empty();
              for (i = 0; i < len; i++) {
                var mystate = obj[i];
                $stateValues += '<option value="' + mystate.idProv +'-'+mystate.provincia+'">' + mystate.provincia +
                  '</option>';
              }
              $("select[name*='billing_city']").append($stateValues);

            });
            /* JSON populate Region/State Listbox */
          });
        }

        if (state.length) {
          state.change(function() {

            var $this = $(this);
            get_cities($(this).val(), function(response) {
              var obj = JSON.parse(response);
              var len = obj.length;
              var $cityValues = '';

              $("select[name*='distCode']").empty();
              for (i = 0; i < len; i++) {
                var mycity = obj[i];
                $cityValues += '<option value="' + mycity.id + '">' + mycity.city_name +
                  '</option>';
              }
              $("select[name*='distCode']").append($cityValues);

            });

          });
          /* JSON populate Cities Listbox */
        }

        function get_states(deptoCode, callback) {
          var data = {
            action: 'get_states_call',
            country_code: deptoCode
          };
          $.post(ajaxurl, data, function(response) {
            callback(response);
          });
        }

        function get_cities(rowCODE, callback) {
          var data = {
            action: 'get_cities_call',
            row_code: rowCODE
          };
          $.post(ajaxurl, data, function(response) {
            callback(response);
          });
        }
      })(jQuery);
    </script>
    <?php
}
add_action( 'woocommerce_after_checkout_form', 'add_checkout_script' );

/**
 * Set admin-ajax.php on the front side (by default it is available only for Backend)
 */
add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl() {
    ?>
    <script type="text/javascript">
      var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <?php
}

add_action('wp_ajax_get_states_call', 'get_states_call');
add_action('wp_ajax_nopriv_get_states_call', 'get_states_call');
add_action('wp_ajax_get_cities_call', 'get_cities_call');
add_action('wp_ajax_nopriv_get_cities_call', 'get_cities_call');



add_filter( 'woocommerce_checkout_fields', 'rt_remove_fields', 9999 );

function rt_remove_fields( $woo_checkout_fields_array ) {
    unset( $woo_checkout_fields_array['billing']['billing_city'] );
    unset( $woo_checkout_fields_array['billing']['billing_state'] ); // remove state field
    unset( $woo_checkout_fields_array['billing']['billing_postcode'] ); // remove zip code field
    return $woo_checkout_fields_array;
}

add_action( 'woocommerce_after_checkout_shipping_form', 'rt_select_field_deptoCode' );
function rt_select_field_deptoCode( $checkout ){
    woocommerce_form_field( 'deptoCode', array(
        'type'          => 'select', // text, textarea, select, radio, checkbox, password, about custom validation a little later
        'required'	=> true, // actually this parameter just adds "*" to the field
        'class'         => array('rt-field', 'form-row-wide'), // array only, read more about classes and styling in the previous step
        'label'         => 'Departamento',
        'label_class'   => 'rt-label', // sometimes you need to customize labels, both string and arrays are supported
        'options'	=> departamento_select()
    ), $checkout->get_value( 'deptoCode' ) );
}

/*add_action( 'woocommerce_after_checkout_shipping_form', 'rt_select_field_deptoCode_s' );
function rt_select_field_deptoCode_s( $checkout ){
	woocommerce_form_field( 'deptoCode_s', array(
		'type'          => 'select', // text, textarea, select, radio, checkbox, password, about custom validation a little later
		'required'	=> true, // actually this parameter just adds "*" to the field
		'class'         => array('rt-field_s', 'form-row-wide'), // array only, read more about classes and styling in the previous step
		'label'         => 'Departamento',
		'label_class'   => 'rt-label', // sometimes you need to customize labels, both string and arrays are supported
		'options'	=> departamento_select()
		), $checkout->get_value( 'deptoCode_s' ) );
}*/

add_action( 'woocommerce_after_checkout_shipping_form', 'rt_select_field_billing_city' );
function rt_select_field_billing_city( $checkout ){
    woocommerce_form_field( 'billing_city', array(
        'type'          => 'select', // text, textarea, select, radio, checkbox, password, about custom validation a little later
        'required'	=> true, // actually this parameter just adds "*" to the field
        'class'         => array('billing_city', 'form-row-wide'), // array only, read more about classes and styling in the previous step
        'label'         => 'Provincia',
        'label_class'   => 'rt-label', // sometimes you need to customize labels, both string and arrays are supported
        'options'	=> array(''=> 'Seleccione')
    ), $checkout->get_value( 'billing_city' ) );
}

/*add_action( 'woocommerce_after_checkout_shipping_form', 'rt_select_field_billing_city_s' );
function rt_select_field_billing_city_s( $checkout ){
	woocommerce_form_field( 'billing_city_s', array(
		'type'          => 'select', // text, textarea, select, radio, checkbox, password, about custom validation a little later
		'required'	=> true, // actually this parameter just adds "*" to the field
		'class'         => array('billing_city_s', 'form-row-wide'), // array only, read more about classes and styling in the previous step
		'label'         => 'Provincia',
		'label_class'   => 'rt-label', // sometimes you need to customize labels, both string and arrays are supported
		'options'	=> array(''=> 'Seleccione')
		), $checkout->get_value( 'billing_city_s' ) );
}*/

add_action( 'woocommerce_after_checkout_shipping_form', 'rt_select_field_distCode' );
function rt_select_field_distCode( $checkout ){
    woocommerce_form_field( 'distCode', array(
        'type'          => 'select', // text, textarea, select, radio, checkbox, password, about custom validation a little later
        'required'	=> true, // actually this parameter just adds "*" to the field
        'class'         => array('distCode', 'form-row-wide'), // array only, read more about classes and styling in the previous step
        'label'         => 'Distrito',
        'label_class'   => 'rt-label', // sometimes you need to customize labels, both string and arrays are supported
        'options'	=> array(''=> 'Distrito')
    ), $checkout->get_value( 'distCode' ) );
}

/*add_action( 'woocommerce_after_checkout_shipping_form', 'rt_select_field_distCode_s' );
function rt_select_field_distCode_s( $checkout ){
	woocommerce_form_field( 'distCode_s', array(
		'type'          => 'select', // text, textarea, select, radio, checkbox, password, about custom validation a little later
		'required'	=> true, // actually this parameter just adds "*" to the field
		'class'         => array('distCode_s', 'form-row-wide'), // array only, read more about classes and styling in the previous step
		'label'         => 'Distrito',
		'label_class'   => 'rt-label', // sometimes you need to customize labels, both string and arrays are supported
		'options'	=> array(''=> 'Distrito')
		), $checkout->get_value( 'distCode_s' ) );
}*/

// save fields to order meta
add_action( 'woocommerce_checkout_update_order_meta', 'save_ubigeo_peru' );

// save field values
function save_ubigeo_peru( $order_id ){

    if( !empty( $_POST['deptoCode'] ) ){
        $dto=getDepartamentoByidDepa($_POST['deptoCode']);
        update_post_meta( $order_id, 'departamento', sanitize_text_field( $dto ) );
        update_post_meta( $order_id, 'departamento_id', $_POST['deptoCode'] );
    }

    if( !empty( $_POST['billing_city'] ) ){
        $codes = explode('-', $_POST['billing_city']);
        $city_code = $codes[0];
        $prov = getProvinciaByidProv( $city_code);
        update_post_meta( $order_id, 'provincia', sanitize_text_field( $prov ) );
        update_post_meta( $order_id, 'provincia_id', $city_code );
    }

    if( !empty( $_POST['distCode'] ) ){
        $dist = getDistritoByidDist($_POST['distCode']);
        update_post_meta( $order_id, 'distrito', sanitize_text_field( $dist ) );
        update_post_meta( $order_id, 'distrito_id', $_POST['distCode'] );
    }
}

add_action('woocommerce_checkout_process', 'check_if_selected');

function check_if_selected() {

    if ( empty( $_POST['deptoCode'] ) )
        wc_add_notice( 'Por favor selecciona un Departamento.', 'error');

    if ( empty( $_POST['billing_city'] ) )
        wc_add_notice( 'Por favor selecciona un Provincia.', 'error');

    if ( empty( $_POST['distCode'] ) )
        wc_add_notice( 'Por favor selecciona un Distrito.', 'error');

}

/**
 * Mostrar los valores de los campos personalizados adicionales en la vista de la orden en el administrador
 */
function show_custom_fields_order($order){
    echo '<p><strong>'.__('Departamento').':</strong> ' . get_post_meta( $order->id, 'departamento', true ) . '</p>';
    echo '<p><strong>'.__('Provincia').':</strong> ' . get_post_meta( $order->id, 'provincia', true ) . '</p>';
    echo '<p><strong>'.__('Distrito').':</strong> ' . get_post_meta( $order->id, 'distrito', true ) . '</p>';
}
add_action('woocommerce_admin_order_data_after_billing_address','show_custom_fields_order');
add_action('woocommerce_admin_order_data_after_shipping_address','show_custom_fields_order');

/**
 * Mostrar los valores de los campos personalizados adicionales en la vista de la orden en la página de gracias y en la página de Orden en la página "Mi cuenta" del usuario
 */
function show_custom_fields_thankyou($order){
    echo '<p><strong>'.__('Departamento').':</strong> ' . get_post_meta( $order, 'departamento', true ) . '</p>';
    echo '<p><strong>'.__('Provincia').':</strong> ' . get_post_meta( $order, 'provincia', true ) . '</p>';
    echo '<p><strong>'.__('Distrito').':</strong> ' . get_post_meta( $order, 'distrito', true ) . '</p>';
}
add_action('woocommerce_thankyou','show_custom_fields_thankyou', 20);
add_action('woocommerce_view_order','show_custom_fields_thankyou', 20);

/**
 * Mostrar los valores de los campos personalizados adicionales en los correos electrónicos
 */
function show_custom_fields_emails($orden, $sent_to_admin, $order){
    echo '<p><strong>'.__('Departamento').':</strong> ' . get_post_meta( $order->id, 'departamento', true ) . '</p>';
    echo '<p><strong>'.__('Provincia').':</strong> ' . get_post_meta( $order->id, 'provincia', true ) . '</p>';
    echo '<p><strong>'.__('Distrito').':</strong> ' . get_post_meta( $order->id, 'distrito', true ) . '</p>';
}
add_action('woocommerce_email_order_meta_fields','show_custom_fields_emails', 10, 3);


function rearrange_checkout_fields($fields){
    //para mover el orden de los elementos del array, debemos asignar una propiedad de prioridad a cada campo, en nuestro ejemplo le dimos una prioridad menor al email, entonces colocará este campo al principio de nuestra forma
    /*$fields['billing']['billing_email']['priority'] = 10;
    $fields['billing']['billing_first_name']['priority'] = 20;
    $fields['billing']['billing_last_name']['priority'] = 30;
    $fields['billing']['billing_company']['priority'] = 40;
    $fields['billing']['billing_address_1']['priority'] = 50;
    $fields['billing']['billing_address_2']['priority'] = 60;
    $fields['billing']['billing_postcode']['priority'] = 70;
    $fields['billing']['billing_country']['priority'] = 100;
    $fields['billing']['billing_state']['priority'] = 90;
    $fields['billing']['billing_phone']['priority'] = 80;
    //Podemos hacer lo mismo para los campos de envío. En este ejemplo cambiamos el orden de los campos de Nombre y apellido con el apellido primero
    $fields['shipping']['shipping_first_name']['priority'] = 20;
    $fields['shipping']['shipping_last_name']['priority'] = 10;
    $fields['shipping']['shipping_company']['priority'] = 30;
    $fields['shipping']['shipping_address_1']['priority'] = 40;
    $fields['shipping']['shipping_address_2']['priority'] = 50;
    $fields['shipping']['shipping_postcode']['priority'] = 60;
    $fields['shipping']['shipping_country']['priority'] = 70;
    $fields['shipping']['shipping_city']['priority'] = 80;
    $fields['shipping']['shipping_state']['priority'] = 90;*/
    return $fields;
}
add_filter('woocommerce_checkout_fields','rearrange_checkout_fields');


add_filter( 'woocommerce_default_address_fields' , 'rename_city', 9999 );

function rename_city( $fields ) {
    $fields['city']['label'] = 'Provincia';
    return $fields;
}


include('functions.php');
