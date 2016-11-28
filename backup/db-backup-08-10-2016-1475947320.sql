DROP TABLE banco;

CREATE TABLE `banco` (
  `idBanco` varchar(10) NOT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `direccion` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`idBanco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO banco VALUES("BP9496","BAPRO 9496 PAUNERO","PAUNERO Y CHILE");
INSERT INTO banco VALUES("ED","ESTUDIO DULIO","");
INSERT INTO banco VALUES("EDENOR","EDENOR","J C PAZ");
INSERT INTO banco VALUES("MJCP","MUNICIP.JOSE C. PAZ","");
INSERT INTO banco VALUES("MMA","MUNICIPALIDAD M.ARGENTINAS","");
INSERT INTO banco VALUES("MSM","MUNICIPALIDAD DE SAN MIGUEL","");
INSERT INTO banco VALUES("NACGB","NACION G BOURG","GRAND BOURG");
INSERT INTO banco VALUES("PF4759","P FACIL 4759 Ruta 197","RUTA 197 y TRIUNVIRATO");
INSERT INTO banco VALUES("RP8631","RAPIPAGO 8631  PERON y CHILE","PERON Y CHILE");
INSERT INTO banco VALUES("RP990395","RAPIPAGO MUÑOZ y CHILE","FARMACIA");
INSERT INTO banco VALUES("Z AJUSTE","AJUSTE","");



DROP TABLE categoria;

CREATE TABLE `categoria` (
  `idCategoria` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `valor` float NOT NULL,
  `idObligacion` varchar(4) NOT NULL,
  PRIMARY KEY (`idCategoria`,`idObligacion`),
  KEY `fk_categoria_obligacion_idx` (`idObligacion`),
  CONSTRAINT `fk_categoria_obligacion` FOREIGN KEY (`idObligacion`) REFERENCES `obligacion` (`idObligacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE cliente;

CREATE TABLE `cliente` (
  `idCliente` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `CUIT` varchar(11) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `nacionalidad` varchar(100) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `celular` varchar(40) DEFAULT NULL,
  `companiaCelular` varchar(50) DEFAULT NULL,
  `telefonoFijo` varchar(40) DEFAULT NULL,
  `habilitado` tinyint(1) NOT NULL DEFAULT '1',
  `honorarioBase` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO cliente VALUES("BALCLA","CLAUDIA","BALESTRERO","27172831465","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("BERADR","ADRIANA","BERGES","27926679339","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("BLACAR","CARLOS ENRIQUE","BLANDINI","23128020039","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("CALVO","SRL","CALVO HNOS ","30606877400","0000-00-00","","","","","","1","0");
INSERT INTO cliente VALUES("CAMJUL","JULIO","CAMINOS","20101174272","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("CATCAR","CARLOS","CATERINA","20043068416","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("CILJOR","JORGE ","CILIA ","20082470167","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("CONEMI","EMILIO","CONDE","20168490381","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("CRINOR","NORBERTO","CRISTOFANETTI","20144613075","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("DACMAU","MAURICIO","DACHILLE","20244628177","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("DULALE","ALEJANDRA","DULIO","27320133292","0000-00-00","Argentina","","","","","1","0");
INSERT INTO cliente VALUES("DULDUL","DULIO MARCELO","DULIO RAUL","20045743722","0000-00-00","","","","","","1","0");
INSERT INTO cliente VALUES("DULMAR","MARCELO","DULIO","20126469404","0000-00-00","Argentino","","","","","1","120");
INSERT INTO cliente VALUES("DULNIC","NICOLAS","DULIO","20373686779","1993-02-17","ARGENTINO","nico_n44@hotmail.com","01169571792","CLARO","","1","0");
INSERT INTO cliente VALUES("DULRAU","RAUL","DULIO","20101115659","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("DULSUS","SUSANA","DULIO","27163808523","0000-00-00","Argentina","","","","","1","0");
INSERT INTO cliente VALUES("ESCMAR","MARIA TERESA","ESCALANTE","27165223328","0000-00-00","Argentina","gadel_piano@hotmail.com","11-4035-1598","movistar","02320-664050","1","0");
INSERT INTO cliente VALUES("ESTDUL","DULIO","ESTUDIO","20100000000","0000-00-00","","","","","","1","150");
INSERT INTO cliente VALUES("FERANG","ANGELICA","FERRARI","27057757391","0000-00-00","ARGENTINA","","","","","1","0");
INSERT INTO cliente VALUES("FERCLA","CLAUDIO JOSE","FERNANDEZ","20125495738","1960-01-01","ARGENTINO","","","","","0","0");
INSERT INTO cliente VALUES("FIGPAO","PAOLA","FIGUEROA","27256582983","0000-00-00","ARGENTINA","","","","","1","0");
INSERT INTO cliente VALUES("FLOPAB","PABLO","FLORIAN","20172834230","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("GRALUI","LUIS","GRAU","20202417125","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("LOBLEA","LEANDRO","LOBO","20263661770","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("MAHJOS","JOSE","MAHON","20046962576","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("MARMAR","MARIO","MARTELOTTO","20181361450","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("MARSAI","SAIBENE  SOC HECHO","MARTELOTTO","30708834706","0000-00-00","","","","","","1","0");
INSERT INTO cliente VALUES("MAZMAR","MARIANA","MAZZEI","27299620870","0000-00-00","Argentina","","","","","1","0");
INSERT INTO cliente VALUES("MOLPAT","PATRICIA","MOLLICA","27148339029","0000-00-00","Argentina","","","","","1","0");
INSERT INTO cliente VALUES("PEREDU","EDUARDO DARIO","PEREZ","23141400029","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("PERFLO","FLORENCIA","PEREZ ","23343790244","0000-00-00","Argentina","","","","","1","0");
INSERT INTO cliente VALUES("PERGUI","GUILLERMO","PEREZ","20144866976","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("PERMAR","MARIANA","PEREZ","27322788431","0000-00-00","Argentina","","","","","1","0");
INSERT INTO cliente VALUES("RUIGUI","GUILLERMO","RUIZ DIAZ","23184908859","0000-00-00","Argentino","guilleruizdiaz2015@gmail.com","15-3491-1696","PERSONAL","","1","0");
INSERT INTO cliente VALUES("SAIEDU","EDUARDO","SAIBENE","23164344509","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("SINMIG","MIGUEL","SINISI","20934451466","0000-00-00","Italiano","","","","","1","0");
INSERT INTO cliente VALUES("STEJUA","JUAN","STEFANINI","20082362887","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("TORROD","RODOLFO","TORRES","23106000999","0000-00-00","Argentino","","","","","1","0");
INSERT INTO cliente VALUES("UGAMYR","MYRIAM","UGALDEA","27210953855","0000-00-00","Argentina","","","","","1","0");
INSERT INTO cliente VALUES("VALYAN","YANINA","VALLEJOS","27300344890","0000-00-00","Argentina","","","","","1","0");



DROP TABLE clientehonorarioperiodo;

CREATE TABLE `clientehonorarioperiodo` (
  `idPeriodo` varchar(4) NOT NULL,
  `idCliente` varchar(10) NOT NULL,
  `base` float NOT NULL,
  `saldado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPeriodo`,`idCliente`),
  KEY `fk_clientehonorarioperiodo_cliente1_idx` (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO clientehonorarioperiodo VALUES("0816","DULMAR","120","0");
INSERT INTO clientehonorarioperiodo VALUES("0816","ESTDUL","150","0");



DROP TABLE cobro;

CREATE TABLE `cobro` (
  `idCobro` int(11) NOT NULL AUTO_INCREMENT,
  `valor` float NOT NULL,
  `idPeriodo` varchar(4) NOT NULL,
  `idObligacion` varchar(4) NOT NULL,
  `idCliente` varchar(10) NOT NULL,
  `nroRecibo` int(11) NOT NULL,
  PRIMARY KEY (`idCobro`,`idPeriodo`,`idObligacion`,`idCliente`,`nroRecibo`),
  KEY `fk_cobro_OCCPeriodo1_idx` (`idPeriodo`,`idObligacion`,`idCliente`),
  KEY `fk_cobro_recibo1_idx` (`nroRecibo`),
  CONSTRAINT `fk_cobro_OCCPeriodo1` FOREIGN KEY (`idPeriodo`, `idObligacion`, `idCliente`) REFERENCES `occperiodo` (`idPeriodo`, `idObligacion`, `idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8;

INSERT INTO cobro VALUES("147","1782.9","0316","IBR","FERANG","16");
INSERT INTO cobro VALUES("148","115.23","0316","SEGU","FERANG","16");
INSERT INTO cobro VALUES("149","2170.4","0416","IBR","FERANG","16");
INSERT INTO cobro VALUES("150","115","0416","SEGU","FERANG","16");
INSERT INTO cobro VALUES("151","2056.3","0516","IBR","FERANG","16");
INSERT INTO cobro VALUES("152","100","1016","MJCP","DULMAR","17");
INSERT INTO cobro VALUES("153","200","1016","IBR","DULMAR","17");
INSERT INTO cobro VALUES("166","100","0816","IBR","PERMAR","20");
INSERT INTO cobro VALUES("167","20","0816","IBR","PERMAR","20");
INSERT INTO cobro VALUES("168","30","0816","IBR","PERMAR","20");
INSERT INTO cobro VALUES("169","40","0816","IBR","PERMAR","20");
INSERT INTO cobro VALUES("170","50","0816","IBR","PERMAR","20");
INSERT INTO cobro VALUES("171","60","0816","IBR","PERMAR","20");
INSERT INTO cobro VALUES("172","70","0816","IBR","PERMAR","20");
INSERT INTO cobro VALUES("173","80","0816","IBR","PERMAR","20");
INSERT INTO cobro VALUES("174","90","0816","IBR","PERMAR","20");
INSERT INTO cobro VALUES("175","100","0816","IBR","PERMAR","20");
INSERT INTO cobro VALUES("176","99.95","1016","EDEN","DULSUS","21");
INSERT INTO cobro VALUES("177","0.9","1016","IBR","DULSUS","22");
INSERT INTO cobro VALUES("178","149","1216","EDEN","DULSUS","22");
INSERT INTO cobro VALUES("179","1200","1216","PATE","DULSUS","22");
INSERT INTO cobro VALUES("180","499","1216","SEGU","DULSUS","22");
INSERT INTO cobro VALUES("181","0.9","1016","CLAR","DULALE","23");
INSERT INTO cobro VALUES("182","1","1116","CLAR","DULALE","23");



DROP TABLE cobrohonorario;

CREATE TABLE `cobrohonorario` (
  `idCobroHonorario` int(11) NOT NULL AUTO_INCREMENT,
  `monto` float NOT NULL,
  `fecha` date DEFAULT NULL,
  `idCliente` varchar(10) NOT NULL,
  `idPeriodo` varchar(4) NOT NULL,
  `nroRecibo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCobroHonorario`,`idCliente`,`idPeriodo`),
  KEY `fk_cobrohonorario_clientehonorarioperiodo1_idx` (`idCliente`,`idPeriodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE cobroprovisorio;

CREATE TABLE `cobroprovisorio` (
  `valor` float NOT NULL,
  `idPeriodo` varchar(4) NOT NULL,
  `idObligacion` varchar(4) NOT NULL,
  `idCliente` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `idCobroProvisorio` int(11) NOT NULL AUTO_INCREMENT,
  `saldado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idCobroProvisorio`,`idPeriodo`,`idObligacion`,`idCliente`,`username`),
  KEY `fk_cobro_OCCPeriodo1_idx` (`idPeriodo`,`idObligacion`,`idCliente`),
  KEY `fk_cobroprovisorio_usuario1_idx` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;




DROP TABLE extrahonorario;

CREATE TABLE `extrahonorario` (
  `idCliente` varchar(10) NOT NULL,
  `idPeriodo` varchar(4) NOT NULL,
  `monto` float NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `idExtraHonorario` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idExtraHonorario`,`idCliente`,`idPeriodo`),
  KEY `fk_extrahonorario_clientehonorarioperiodo1_idx` (`idCliente`,`idPeriodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE obligacion;

CREATE TABLE `obligacion` (
  `idObligacion` varchar(4) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `categorizar` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idObligacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO obligacion VALUES("ANBP","Anticipo Bs Ps","0");
INSERT INTO obligacion VALUES("ANGA","Anticipo Ganancias","0");
INSERT INTO obligacion VALUES("AUT","Autonomos","0");
INSERT INTO obligacion VALUES("BSPS","Bienes Personales","0");
INSERT INTO obligacion VALUES("CLAR","CLARO","0");
INSERT INTO obligacion VALUES("CPBA","CPCEPBA","0");
INSERT INTO obligacion VALUES("CSO","Cargas Sociales","0");
INSERT INTO obligacion VALUES("EDEN","Edenor","0");
INSERT INTO obligacion VALUES("GAN","Ganancias","0");
INSERT INTO obligacion VALUES("GAS","Gas Natural","0");
INSERT INTO obligacion VALUES("IBR","Ingresos Brutos","0");
INSERT INTO obligacion VALUES("IVA","IVA","0");
INSERT INTO obligacion VALUES("MAFI","Moratoria AFIP","0");
INSERT INTO obligacion VALUES("MIB","Moratoria Ing Brutos","0");
INSERT INTO obligacion VALUES("MJCP","MUNICIP.JOSE C. PAZ","0");
INSERT INTO obligacion VALUES("MONO","Monotributo","0");
INSERT INTO obligacion VALUES("OSDE","OSDE","0");
INSERT INTO obligacion VALUES("PATE","PATENTE","0");
INSERT INTO obligacion VALUES("SDOM","Servicio Domestico","0");
INSERT INTO obligacion VALUES("SEGU","Seguros","0");
INSERT INTO obligacion VALUES("SHIG","Seg e Higiene","0");
INSERT INTO obligacion VALUES("TELE","TELEFONO","0");
INSERT INTO obligacion VALUES("TRED","TELERED","0");



DROP TABLE obligacioncliente;

CREATE TABLE `obligacioncliente` (
  `idObligacion` varchar(4) NOT NULL,
  `idCliente` varchar(10) NOT NULL,
  `idCategoria` varchar(50) DEFAULT NULL,
  `habilitado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idObligacion`,`idCliente`),
  KEY `fk_obligacionCliente_cliente1_idx` (`idCliente`),
  KEY `fk_obligacionCliente_categoria1_idx` (`idCategoria`),
  CONSTRAINT `fk_obligacionCliente_categoria1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_obligacionCliente_cliente1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_obligacionCliente_obligacion1` FOREIGN KEY (`idObligacion`) REFERENCES `obligacion` (`idObligacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO obligacioncliente VALUES("ANBP","BALCLA","","1");
INSERT INTO obligacioncliente VALUES("ANBP","DULMAR","","1");
INSERT INTO obligacioncliente VALUES("ANBP","TORROD","","1");
INSERT INTO obligacioncliente VALUES("ANGA","DULMAR","","1");
INSERT INTO obligacioncliente VALUES("ANGA","TORROD","","1");
INSERT INTO obligacioncliente VALUES("BSPS","BALCLA","","1");
INSERT INTO obligacioncliente VALUES("BSPS","DULMAR","","1");
INSERT INTO obligacioncliente VALUES("CLAR","DULALE","","1");
INSERT INTO obligacioncliente VALUES("CLAR","DULNIC","","1");
INSERT INTO obligacioncliente VALUES("CPBA","DULRAU","","1");
INSERT INTO obligacioncliente VALUES("CSO","CALVO","","1");
INSERT INTO obligacioncliente VALUES("CSO","DACMAU","","1");
INSERT INTO obligacioncliente VALUES("CSO","FERANG","","1");
INSERT INTO obligacioncliente VALUES("CSO","MOLPAT","","1");
INSERT INTO obligacioncliente VALUES("CSO","PEREDU","","1");
INSERT INTO obligacioncliente VALUES("CSO","PERGUI","","1");
INSERT INTO obligacioncliente VALUES("CSO","PERMAR","","1");
INSERT INTO obligacioncliente VALUES("CSO","SINMIG","","1");
INSERT INTO obligacioncliente VALUES("EDEN","DULDUL","","1");
INSERT INTO obligacioncliente VALUES("EDEN","DULMAR","","1");
INSERT INTO obligacioncliente VALUES("EDEN","DULSUS","","1");
INSERT INTO obligacioncliente VALUES("EDEN","ESTDUL","","1");
INSERT INTO obligacioncliente VALUES("GAN","DULMAR","","1");
INSERT INTO obligacioncliente VALUES("IBR","BALCLA","","1");
INSERT INTO obligacioncliente VALUES("IBR","BERADR","","1");
INSERT INTO obligacioncliente VALUES("IBR","CAMJUL","","1");
INSERT INTO obligacioncliente VALUES("IBR","DULDUL","","1");
INSERT INTO obligacioncliente VALUES("IBR","DULMAR","","1");
INSERT INTO obligacioncliente VALUES("IBR","DULSUS","","1");
INSERT INTO obligacioncliente VALUES("IBR","FERANG","","1");
INSERT INTO obligacioncliente VALUES("IBR","FLOPAB","","1");
INSERT INTO obligacioncliente VALUES("IBR","GRALUI","","1");
INSERT INTO obligacioncliente VALUES("IBR","LOBLEA","","1");
INSERT INTO obligacioncliente VALUES("IBR","MAHJOS","","1");
INSERT INTO obligacioncliente VALUES("IBR","MARSAI","","1");
INSERT INTO obligacioncliente VALUES("IBR","MAZMAR","","1");
INSERT INTO obligacioncliente VALUES("IBR","PERFLO","","1");
INSERT INTO obligacioncliente VALUES("IBR","PERGUI","","1");
INSERT INTO obligacioncliente VALUES("IBR","PERMAR","","1");
INSERT INTO obligacioncliente VALUES("IBR","UGAMYR","","1");
INSERT INTO obligacioncliente VALUES("IBR","VALYAN","","1");
INSERT INTO obligacioncliente VALUES("IVA","CATCAR","","1");
INSERT INTO obligacioncliente VALUES("IVA","DULDUL","","1");
INSERT INTO obligacioncliente VALUES("IVA","FERCLA","","0");
INSERT INTO obligacioncliente VALUES("MAFI","ESCMAR","","1");
INSERT INTO obligacioncliente VALUES("MIB","CONEMI","","1");
INSERT INTO obligacioncliente VALUES("MJCP","DULMAR","","1");
INSERT INTO obligacioncliente VALUES("MONO","BALCLA","","1");
INSERT INTO obligacioncliente VALUES("MONO","BERADR","","1");
INSERT INTO obligacioncliente VALUES("MONO","DULMAR","","1");
INSERT INTO obligacioncliente VALUES("MONO","DULNIC","","1");
INSERT INTO obligacioncliente VALUES("MONO","DULSUS","","1");
INSERT INTO obligacioncliente VALUES("MONO","FLOPAB","","1");
INSERT INTO obligacioncliente VALUES("MONO","GRALUI","","1");
INSERT INTO obligacioncliente VALUES("MONO","MAHJOS","","1");
INSERT INTO obligacioncliente VALUES("MONO","MARMAR","","1");
INSERT INTO obligacioncliente VALUES("MONO","MARSAI","","1");
INSERT INTO obligacioncliente VALUES("MONO","SAIEDU","","1");
INSERT INTO obligacioncliente VALUES("MONO","UGAMYR","","1");
INSERT INTO obligacioncliente VALUES("OSDE","DULALE","","1");
INSERT INTO obligacioncliente VALUES("PATE","DULMAR","","1");
INSERT INTO obligacioncliente VALUES("PATE","DULSUS","","1");
INSERT INTO obligacioncliente VALUES("SDOM","FIGPAO","","1");
INSERT INTO obligacioncliente VALUES("SDOM","PERGUI","","1");
INSERT INTO obligacioncliente VALUES("SEGU","CRINOR","","1");
INSERT INTO obligacioncliente VALUES("SEGU","DULMAR","","1");
INSERT INTO obligacioncliente VALUES("SEGU","DULSUS","","1");
INSERT INTO obligacioncliente VALUES("SEGU","ESTDUL","","1");
INSERT INTO obligacioncliente VALUES("SEGU","FERANG","","1");
INSERT INTO obligacioncliente VALUES("SEGU","MOLPAT","","1");
INSERT INTO obligacioncliente VALUES("SEGU","SINMIG","","1");
INSERT INTO obligacioncliente VALUES("SHIG","BLACAR","","1");
INSERT INTO obligacioncliente VALUES("SHIG","CALVO","","1");
INSERT INTO obligacioncliente VALUES("SHIG","CILJOR","","1");
INSERT INTO obligacioncliente VALUES("SHIG","DULSUS","","1");
INSERT INTO obligacioncliente VALUES("SHIG","FERANG","","1");
INSERT INTO obligacioncliente VALUES("SHIG","MAHJOS","","1");
INSERT INTO obligacioncliente VALUES("SHIG","PERGUI","","1");
INSERT INTO obligacioncliente VALUES("SHIG","PERMAR","","1");
INSERT INTO obligacioncliente VALUES("SHIG","STEJUA","","1");
INSERT INTO obligacioncliente VALUES("SHIG","TORROD","","1");
INSERT INTO obligacioncliente VALUES("SHIG","VALYAN","","1");
INSERT INTO obligacioncliente VALUES("TELE","ESTDUL","","1");
INSERT INTO obligacioncliente VALUES("TRED","DULMAR","","1");
INSERT INTO obligacioncliente VALUES("TRED","ESTDUL","","1");



DROP TABLE occperiodo;

CREATE TABLE `occperiodo` (
  `idPeriodo` varchar(4) NOT NULL,
  `valor` float NOT NULL DEFAULT '1',
  `impuesto` float DEFAULT NULL,
  `vencimiento` date NOT NULL,
  `idObligacion` varchar(4) NOT NULL,
  `idCliente` varchar(10) NOT NULL,
  `saldado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPeriodo`,`idObligacion`,`idCliente`),
  KEY `fk_OCCPeriodo_obligacionCliente1_idx` (`idObligacion`,`idCliente`),
  CONSTRAINT `fk_OCCPeriodo_obligacionCliente1` FOREIGN KEY (`idObligacion`, `idCliente`) REFERENCES `obligacioncliente` (`idObligacion`, `idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO occperiodo VALUES("0115","335.79","0","0000-00-00","ANBP","TORROD","0");
INSERT INTO occperiodo VALUES("0115","1037.51","0","0000-00-00","ANGA","TORROD","0");
INSERT INTO occperiodo VALUES("0116","391.5","0","0000-00-00","IBR","GRALUI","0");
INSERT INTO occperiodo VALUES("0215","335.79","0","0000-00-00","ANBP","TORROD","0");
INSERT INTO occperiodo VALUES("0215","1037.51","0","0000-00-00","ANGA","TORROD","0");
INSERT INTO occperiodo VALUES("0216","831.22","0","0000-00-00","CSO","FERANG","1");
INSERT INTO occperiodo VALUES("0216","1","0","0000-00-00","IBR","GRALUI","1");
INSERT INTO occperiodo VALUES("0216","481.34","0","0000-00-00","SHIG","FERANG","1");
INSERT INTO occperiodo VALUES("0216","84.27","0","0000-00-00","SHIG","TORROD","1");
INSERT INTO occperiodo VALUES("0316","887.45","0","0000-00-00","CSO","FERANG","1");
INSERT INTO occperiodo VALUES("0316","1782.9","0","0000-00-00","IBR","FERANG","0");
INSERT INTO occperiodo VALUES("0316","377.3","0","0000-00-00","IBR","GRALUI","0");
INSERT INTO occperiodo VALUES("0316","115.23","0","0000-00-00","SEGU","FERANG","0");
INSERT INTO occperiodo VALUES("0316","833.6","0","0000-00-00","SHIG","FERANG","1");
INSERT INTO occperiodo VALUES("0416","834.6","0","0000-00-00","CSO","FERANG","1");
INSERT INTO occperiodo VALUES("0416","2170.4","0","0000-00-00","IBR","FERANG","0");
INSERT INTO occperiodo VALUES("0416","378.9","0","0000-00-00","IBR","GRALUI","0");
INSERT INTO occperiodo VALUES("0416","115","0","0000-00-00","SEGU","FERANG","0");
INSERT INTO occperiodo VALUES("0416","1","0","0000-00-00","SHIG","CALVO","0");
INSERT INTO occperiodo VALUES("0416","1","0","0000-00-00","SHIG","CILJOR","0");
INSERT INTO occperiodo VALUES("0416","848.88","0","0000-00-00","SHIG","FERANG","1");
INSERT INTO occperiodo VALUES("0416","382.8","0","0000-00-00","SHIG","TORROD","1");
INSERT INTO occperiodo VALUES("0416","1273.44","0","0000-00-00","SHIG","VALYAN","1");
INSERT INTO occperiodo VALUES("0516","834.6","0","0000-00-00","CSO","FERANG","1");
INSERT INTO occperiodo VALUES("0516","2056.3","0","0000-00-00","IBR","FERANG","0");
INSERT INTO occperiodo VALUES("0516","116","0","0000-00-00","SEGU","FERANG","0");
INSERT INTO occperiodo VALUES("0516","463.56","0","0000-00-00","SHIG","FERANG","1");
INSERT INTO occperiodo VALUES("0516","459.24","0","0000-00-00","SHIG","TORROD","1");
INSERT INTO occperiodo VALUES("0616","1648.72","0","0000-00-00","CSO","FERANG","1");
INSERT INTO occperiodo VALUES("0616","1180.9","0","0000-00-00","IBR","FERANG","0");
INSERT INTO occperiodo VALUES("0616","116","0","0000-00-00","IBR","MAZMAR","1");
INSERT INTO occperiodo VALUES("0616","704","0","0000-00-00","MONO","GRALUI","0");
INSERT INTO occperiodo VALUES("0616","111","0","0000-00-00","SEGU","FERANG","0");
INSERT INTO occperiodo VALUES("0616","1006.06","0","0000-00-00","SHIG","FERANG","1");
INSERT INTO occperiodo VALUES("0616","451.59","0","0000-00-00","SHIG","TORROD","1");
INSERT INTO occperiodo VALUES("0716","2357.03","0","0000-00-00","CSO","CALVO","1");
INSERT INTO occperiodo VALUES("0716","1","0","0000-00-00","CSO","DACMAU","0");
INSERT INTO occperiodo VALUES("0716","1","0","0000-00-00","CSO","FERANG","0");
INSERT INTO occperiodo VALUES("0716","204.94","0","0000-00-00","CSO","MOLPAT","1");
INSERT INTO occperiodo VALUES("0716","1","0","0000-00-00","CSO","PEREDU","0");
INSERT INTO occperiodo VALUES("0716","1225.69","0","0000-00-00","CSO","PERGUI","1");
INSERT INTO occperiodo VALUES("0716","556.16","0","0000-00-00","CSO","SINMIG","1");
INSERT INTO occperiodo VALUES("0716","760","0","0000-00-00","IBR","BALCLA","1");
INSERT INTO occperiodo VALUES("0716","147.4","0","0000-00-00","IBR","BERADR","0");
INSERT INTO occperiodo VALUES("0716","352.9","0","0000-00-00","IBR","DULDUL","1");
INSERT INTO occperiodo VALUES("0716","757.4","0","0000-00-00","IBR","DULMAR","1");
INSERT INTO occperiodo VALUES("0716","1","0","0000-00-00","IBR","DULSUS","0");
INSERT INTO occperiodo VALUES("0716","414.8","0","0000-00-00","IBR","FERANG","1");
INSERT INTO occperiodo VALUES("0716","551.9","0","0000-00-00","IBR","FLOPAB","1");
INSERT INTO occperiodo VALUES("0716","1","0","0000-00-00","IBR","GRALUI","0");
INSERT INTO occperiodo VALUES("0716","132.4","0","0000-00-00","IBR","LOBLEA","1");
INSERT INTO occperiodo VALUES("0716","1","0","0000-00-00","IBR","MAHJOS","0");
INSERT INTO occperiodo VALUES("0716","1","0","0000-00-00","IBR","MARSAI","0");
INSERT INTO occperiodo VALUES("0716","1","0","0000-00-00","IBR","MAZMAR","0");
INSERT INTO occperiodo VALUES("0716","7.08","0","0000-00-00","IBR","PERFLO","0");
INSERT INTO occperiodo VALUES("0716","1.17","0","0000-00-00","IBR","PERMAR","1");
INSERT INTO occperiodo VALUES("0716","343.1","0","0000-00-00","IBR","UGAMYR","1");
INSERT INTO occperiodo VALUES("0716","704","0","0000-00-00","MONO","GRALUI","0");
INSERT INTO occperiodo VALUES("0716","981","0","0000-00-00","MONO","MAHJOS","0");
INSERT INTO occperiodo VALUES("0716","684","0","0000-00-00","SDOM","FIGPAO","0");
INSERT INTO occperiodo VALUES("0716","684","0","0000-00-00","SDOM","PERGUI","0");
INSERT INTO occperiodo VALUES("0716","111","0","0000-00-00","SEGU","FERANG","0");
INSERT INTO occperiodo VALUES("0716","2359.5","0","0000-00-00","SHIG","BLACAR","1");
INSERT INTO occperiodo VALUES("0716","2359.5","0","0000-00-00","SHIG","CALVO","1");
INSERT INTO occperiodo VALUES("0716","920.01","0","0000-00-00","SHIG","FERANG","1");
INSERT INTO occperiodo VALUES("0716","243.6","0","0000-00-00","SHIG","MAHJOS","1");
INSERT INTO occperiodo VALUES("0716","245.39","0","0000-00-00","SHIG","STEJUA","1");
INSERT INTO occperiodo VALUES("0716","443.93","0","0000-00-00","SHIG","TORROD","1");
INSERT INTO occperiodo VALUES("0816","1","0","0000-00-00","CSO","CALVO","0");
INSERT INTO occperiodo VALUES("0816","1","0","0000-00-00","CSO","DACMAU","0");
INSERT INTO occperiodo VALUES("0816","1036","0","0000-00-00","CSO","FERANG","1");
INSERT INTO occperiodo VALUES("0816","1","0","0000-00-00","CSO","MOLPAT","0");
INSERT INTO occperiodo VALUES("0816","1","0","0000-00-00","CSO","PEREDU","0");
INSERT INTO occperiodo VALUES("0816","1","0","0000-00-00","CSO","PERGUI","0");
INSERT INTO occperiodo VALUES("0816","1","0","0000-00-00","CSO","SINMIG","0");
INSERT INTO occperiodo VALUES("0816","115.23","0","0000-00-00","EDEN","DULDUL","1");
INSERT INTO occperiodo VALUES("0816","256.4","0","0000-00-00","EDEN","DULSUS","1");
INSERT INTO occperiodo VALUES("0816","150.13","0","0000-00-00","EDEN","ESTDUL","1");
INSERT INTO occperiodo VALUES("0816","764.6","0","0000-00-00","IBR","BALCLA","1");
INSERT INTO occperiodo VALUES("0816","1","0","0000-00-00","IBR","BERADR","0");
INSERT INTO occperiodo VALUES("0816","288","0","0000-00-00","IBR","CAMJUL","0");
INSERT INTO occperiodo VALUES("0816","349.9","0","0000-00-00","IBR","DULDUL","1");
INSERT INTO occperiodo VALUES("0816","723","0","0000-00-00","IBR","DULMAR","1");
INSERT INTO occperiodo VALUES("0816","1","0","0000-00-00","IBR","DULSUS","0");
INSERT INTO occperiodo VALUES("0816","396","0","0000-00-00","IBR","FERANG","0");
INSERT INTO occperiodo VALUES("0816","774.1","0","0000-00-00","IBR","FLOPAB","1");
INSERT INTO occperiodo VALUES("0816","1","0","0000-00-00","IBR","GRALUI","0");
INSERT INTO occperiodo VALUES("0816","135.2","0","0000-00-00","IBR","LOBLEA","1");
INSERT INTO occperiodo VALUES("0816","1","0","0000-00-00","IBR","MAHJOS","0");
INSERT INTO occperiodo VALUES("0816","1","0","0000-00-00","IBR","MARSAI","0");
INSERT INTO occperiodo VALUES("0816","1","0","0000-00-00","IBR","PERFLO","0");
INSERT INTO occperiodo VALUES("0816","1","0","0000-00-00","IBR","PERMAR","0");
INSERT INTO occperiodo VALUES("0816","322.9","0","0000-00-00","IBR","UGAMYR","1");
INSERT INTO occperiodo VALUES("0816","2850.5","0","0000-00-00","IVA","CATCAR","1");
INSERT INTO occperiodo VALUES("0816","630","0","0000-00-00","MAFI","ESCMAR","0");
INSERT INTO occperiodo VALUES("0816","1.7","0","0000-00-00","MIB","CONEMI","1");
INSERT INTO occperiodo VALUES("0816","550","0","0000-00-00","MONO","BALCLA","0");
INSERT INTO occperiodo VALUES("0816","1","0","0000-00-00","MONO","BERADR","0");
INSERT INTO occperiodo VALUES("0816","1126","0","0000-00-00","MONO","DULMAR","1");
INSERT INTO occperiodo VALUES("0816","651","0","0000-00-00","MONO","DULSUS","1");
INSERT INTO occperiodo VALUES("0816","1","0","0000-00-00","MONO","FLOPAB","0");
INSERT INTO occperiodo VALUES("0816","981","0","0000-00-00","MONO","MAHJOS","0");
INSERT INTO occperiodo VALUES("0816","1","0","0000-00-00","MONO","MARMAR","0");
INSERT INTO occperiodo VALUES("0816","434","0","0000-00-00","MONO","MARSAI","0");
INSERT INTO occperiodo VALUES("0816","1","0","0000-00-00","MONO","SAIEDU","0");
INSERT INTO occperiodo VALUES("0816","1","0","0000-00-00","MONO","UGAMYR","0");
INSERT INTO occperiodo VALUES("0816","684","0","0000-00-00","SDOM","FIGPAO","0");
INSERT INTO occperiodo VALUES("0816","684","0","0000-00-00","SDOM","PERGUI","0");
INSERT INTO occperiodo VALUES("0816","260","0","0000-00-00","SEGU","CRINOR","0");
INSERT INTO occperiodo VALUES("0816","111","0","0000-00-00","SEGU","FERANG","1");
INSERT INTO occperiodo VALUES("0816","92","0","0000-00-00","SEGU","MOLPAT","1");
INSERT INTO occperiodo VALUES("0816","2554.55","0","0000-00-00","SHIG","BLACAR","1");
INSERT INTO occperiodo VALUES("0816","2359.5","0","0000-00-00","SHIG","CALVO","1");
INSERT INTO occperiodo VALUES("0816","972.18","0","0000-00-00","SHIG","FERANG","1");
INSERT INTO occperiodo VALUES("0816","239.4","0","0000-00-00","SHIG","MAHJOS","1");
INSERT INTO occperiodo VALUES("0816","1481","0","0000-00-00","SHIG","PERGUI","0");
INSERT INTO occperiodo VALUES("0816","250.3","0","0000-00-00","SHIG","STEJUA","1");
INSERT INTO occperiodo VALUES("0816","436.28","0","0000-00-00","SHIG","TORROD","1");
INSERT INTO occperiodo VALUES("0916","297.37","0","0000-00-00","CLAR","DULALE","1");
INSERT INTO occperiodo VALUES("0916","1379.7","0","0000-00-00","CPBA","DULRAU","1");
INSERT INTO occperiodo VALUES("0916","100.48","0","0000-00-00","EDEN","DULDUL","1");
INSERT INTO occperiodo VALUES("0916","55.41","0","0000-00-00","EDEN","DULMAR","1");
INSERT INTO occperiodo VALUES("0916","235.04","0","0000-00-00","EDEN","DULSUS","1");
INSERT INTO occperiodo VALUES("0916","142.88","0","0000-00-00","EDEN","ESTDUL","0");
INSERT INTO occperiodo VALUES("0916","171","0","0000-00-00","MJCP","DULMAR","1");
INSERT INTO occperiodo VALUES("0916","1","0","0000-00-00","MONO","BALCLA","0");
INSERT INTO occperiodo VALUES("0916","615","0","0000-00-00","MONO","BERADR","0");
INSERT INTO occperiodo VALUES("0916","1126","0","0000-00-00","MONO","DULMAR","1");
INSERT INTO occperiodo VALUES("0916","651","0","0000-00-00","MONO","DULSUS","1");
INSERT INTO occperiodo VALUES("0916","1545","0","0000-00-00","MONO","FLOPAB","0");
INSERT INTO occperiodo VALUES("0916","1","0","0000-00-00","MONO","GRALUI","0");
INSERT INTO occperiodo VALUES("0916","1","0","0000-00-00","MONO","MAHJOS","0");
INSERT INTO occperiodo VALUES("0916","1","0","0000-00-00","MONO","MARMAR","0");
INSERT INTO occperiodo VALUES("0916","1","0","0000-00-00","MONO","MARSAI","0");
INSERT INTO occperiodo VALUES("0916","1","0","0000-00-00","MONO","SAIEDU","0");
INSERT INTO occperiodo VALUES("0916","1","0","0000-00-00","MONO","UGAMYR","0");
INSERT INTO occperiodo VALUES("0916","2437","0","0000-00-00","OSDE","DULALE","1");
INSERT INTO occperiodo VALUES("0916","1006.4","0","0000-00-00","PATE","DULMAR","1");
INSERT INTO occperiodo VALUES("0916","907.6","0","0000-00-00","PATE","DULSUS","1");
INSERT INTO occperiodo VALUES("0916","115","0","0000-00-00","SEGU","FERANG","0");
INSERT INTO occperiodo VALUES("0916","92","0","0000-00-00","SEGU","MOLPAT","0");
INSERT INTO occperiodo VALUES("0916","1564.2","0","0000-00-00","SHIG","DULSUS","1");
INSERT INTO occperiodo VALUES("0916","394.03","0","0000-00-00","SHIG","FERANG","1");
INSERT INTO occperiodo VALUES("0916","214.2","0","0000-00-00","SHIG","MAHJOS","0");
INSERT INTO occperiodo VALUES("0916","1","0","0000-00-00","SHIG","PERGUI","0");
INSERT INTO occperiodo VALUES("0916","390.35","0","0000-00-00","SHIG","TORROD","1");
INSERT INTO occperiodo VALUES("0916","565.43","0","0000-00-00","TELE","ESTDUL","0");
INSERT INTO occperiodo VALUES("0916","837.4","0","0000-00-00","TRED","DULMAR","1");
INSERT INTO occperiodo VALUES("0916","379","0","0000-00-00","TRED","ESTDUL","1");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","ANBP","BALCLA","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","ANBP","DULMAR","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","ANBP","TORROD","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","ANGA","DULMAR","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","ANGA","TORROD","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","BSPS","BALCLA","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","BSPS","DULMAR","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","CLAR","DULALE","1");
INSERT INTO occperiodo VALUES("1016","0","0","0000-00-00","CSO","CALVO","0");
INSERT INTO occperiodo VALUES("1016","0","0","0000-00-00","CSO","SINMIG","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","EDEN","DULDUL","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","EDEN","DULMAR","0");
INSERT INTO occperiodo VALUES("1016","100","0","0000-00-00","EDEN","DULSUS","1");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","IBR","BALCLA","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","IBR","BERADR","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","IBR","CAMJUL","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","IBR","DULDUL","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","IBR","DULMAR","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","IBR","DULSUS","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","IBR","FERANG","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","IBR","FLOPAB","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","IBR","GRALUI","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","IBR","LOBLEA","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","IBR","MAHJOS","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","IBR","MARSAI","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","IBR","MAZMAR","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","IBR","PERFLO","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","IBR","PERGUI","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","IBR","PERMAR","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","IBR","UGAMYR","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","IBR","VALYAN","0");
INSERT INTO occperiodo VALUES("1016","0","0","0000-00-00","IVA","CATCAR","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","MJCP","DULMAR","0");
INSERT INTO occperiodo VALUES("1016","400","0","0000-00-00","MONO","DULMAR","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","PATE","DULSUS","0");
INSERT INTO occperiodo VALUES("1016","100","0","0000-00-00","SEGU","SINMIG","0");
INSERT INTO occperiodo VALUES("1016","1","0","0000-00-00","TELE","ESTDUL","0");
INSERT INTO occperiodo VALUES("1115","898.53","0","0000-00-00","CSO","MOLPAT","0");
INSERT INTO occperiodo VALUES("1116","1000","0","0000-00-00","ANBP","DULMAR","0");
INSERT INTO occperiodo VALUES("1116","2000","0","0000-00-00","ANGA","DULMAR","0");
INSERT INTO occperiodo VALUES("1116","1","0","0000-00-00","CLAR","DULALE","0");
INSERT INTO occperiodo VALUES("1116","1000","0","0000-00-00","IBR","DULMAR","0");
INSERT INTO occperiodo VALUES("1116","2000","0","0000-00-00","MONO","DULMAR","0");
INSERT INTO occperiodo VALUES("1116","3000","0","0000-00-00","PATE","DULMAR","0");
INSERT INTO occperiodo VALUES("1116","0","0","0000-00-00","SEGU","DULMAR","0");
INSERT INTO occperiodo VALUES("1216","1000","0","0000-00-00","ANBP","DULMAR","0");
INSERT INTO occperiodo VALUES("1216","2000","0","0000-00-00","BSPS","DULMAR","0");
INSERT INTO occperiodo VALUES("1216","150","0","0000-00-00","EDEN","DULSUS","0");
INSERT INTO occperiodo VALUES("1216","0","0","0000-00-00","GAN","DULMAR","0");
INSERT INTO occperiodo VALUES("1216","0","0","0000-00-00","MJCP","DULMAR","0");
INSERT INTO occperiodo VALUES("1216","1200","0","0000-00-00","PATE","DULSUS","0");
INSERT INTO occperiodo VALUES("1216","500","0","0000-00-00","SEGU","DULSUS","0");



DROP TABLE pago;

CREATE TABLE `pago` (
  `idPago` int(11) NOT NULL AUTO_INCREMENT,
  `valor` float NOT NULL,
  `fecha` date NOT NULL,
  `idPeriodo` varchar(4) NOT NULL,
  `idObligacion` varchar(4) NOT NULL,
  `idCliente` varchar(10) NOT NULL,
  `idBanco` varchar(10) NOT NULL,
  PRIMARY KEY (`idPago`,`idPeriodo`,`idObligacion`,`idCliente`,`idBanco`),
  KEY `fk_pago_OCCPeriodo1_idx` (`idPeriodo`,`idObligacion`,`idCliente`),
  KEY `fk_pago_banco1_idx` (`idBanco`),
  CONSTRAINT `fk_pago_OCCPeriodo1` FOREIGN KEY (`idPeriodo`, `idObligacion`, `idCliente`) REFERENCES `occperiodo` (`idPeriodo`, `idObligacion`, `idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pago_banco1` FOREIGN KEY (`idBanco`) REFERENCES `banco` (`idBanco`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=utf8;

INSERT INTO pago VALUES("24","434","2016-08-22","0816","MONO","MARSAI","RP8631");
INSERT INTO pago VALUES("25","995","2016-08-22","0816","MONO","MARMAR","RP8631");
INSERT INTO pago VALUES("26","576","2016-08-22","0816","MONO","SAIEDU","RP8631");
INSERT INTO pago VALUES("27","615","2016-08-22","0816","MONO","BERADR","RP8631");
INSERT INTO pago VALUES("28","550","2016-08-22","0816","MONO","BALCLA","RP8631");
INSERT INTO pago VALUES("29","1964","2016-08-22","0816","MONO","FLOPAB","RP8631");
INSERT INTO pago VALUES("30","651","2016-08-22","0816","MONO","DULSUS","RP8631");
INSERT INTO pago VALUES("31","1126","2016-08-22","0816","MONO","DULMAR","RP8631");
INSERT INTO pago VALUES("32","1126","2016-08-22","0816","MONO","UGAMYR","RP8631");
INSERT INTO pago VALUES("33","256.4","2016-08-22","0816","EDEN","DULSUS","RP8631");
INSERT INTO pago VALUES("34","150.13","2016-08-22","0816","EDEN","ESTDUL","RP8631");
INSERT INTO pago VALUES("35","36.96","2016-08-22","0816","EDEN","DULDUL","RP8631");
INSERT INTO pago VALUES("36","78.27","2016-08-22","0816","EDEN","DULDUL","RP8631");
INSERT INTO pago VALUES("38","2359.5","2016-08-17","0716","SHIG","BLACAR","MSM");
INSERT INTO pago VALUES("39","245.39","2016-08-17","0716","SHIG","STEJUA","MSM");
INSERT INTO pago VALUES("40","704","2016-08-09","0716","MONO","GRALUI","RP8631");
INSERT INTO pago VALUES("42","335.79","2016-08-04","0115","ANBP","TORROD","RP8631");
INSERT INTO pago VALUES("43","335.79","2016-08-04","0215","ANBP","TORROD","RP8631");
INSERT INTO pago VALUES("44","1037.51","2016-08-04","0115","ANGA","TORROD","RP8631");
INSERT INTO pago VALUES("45","1037.51","2016-08-04","0215","ANGA","TORROD","RP8631");
INSERT INTO pago VALUES("46","704","2016-08-09","0616","MONO","GRALUI","RP8631");
INSERT INTO pago VALUES("47","1782.9","2016-08-05","0316","IBR","FERANG","BP9496");
INSERT INTO pago VALUES("48","2170.4","2016-08-05","0416","IBR","FERANG","BP9496");
INSERT INTO pago VALUES("49","2056.3","2016-08-05","0516","IBR","FERANG","BP9496");
INSERT INTO pago VALUES("50","1180.9","2016-08-05","0616","IBR","FERANG","BP9496");
INSERT INTO pago VALUES("51","684","2016-08-03","0716","SDOM","PERGUI","PF4759");
INSERT INTO pago VALUES("52","684","2016-08-03","0716","SDOM","FIGPAO","PF4759");
INSERT INTO pago VALUES("53","96.44","2016-08-04","0816","SEGU","MOLPAT","ED");
INSERT INTO pago VALUES("54","204.94","2016-08-24","0716","CSO","MOLPAT","NACGB");
INSERT INTO pago VALUES("55","2357.03","2016-08-24","0716","CSO","CALVO","NACGB");
INSERT INTO pago VALUES("56","831.22","2016-08-24","0216","CSO","FERANG","NACGB");
INSERT INTO pago VALUES("57","887.45","2016-08-24","0316","CSO","FERANG","NACGB");
INSERT INTO pago VALUES("58","834.6","2016-08-24","0416","CSO","FERANG","NACGB");
INSERT INTO pago VALUES("59","834.6","2016-08-24","0516","CSO","FERANG","NACGB");
INSERT INTO pago VALUES("60","1648.72","2016-08-24","0616","CSO","FERANG","NACGB");
INSERT INTO pago VALUES("61","471.9","2016-08-17","0716","SHIG","FERANG","MSM");
INSERT INTO pago VALUES("62","111","2016-08-04","0816","SEGU","FERANG","ED");
INSERT INTO pago VALUES("63","260","2016-08-04","0816","SEGU","CRINOR","ED");
INSERT INTO pago VALUES("64","352.26","2016-04-30","0316","SHIG","FERANG","MMA");
INSERT INTO pago VALUES("65","481.34","2016-03-21","0216","SHIG","FERANG","MSM");
INSERT INTO pago VALUES("66","481.34","2016-04-20","0316","SHIG","FERANG","MSM");
INSERT INTO pago VALUES("67","471.9","2016-05-19","0416","SHIG","FERANG","MSM");
INSERT INTO pago VALUES("68","111","2016-07-10","0716","SEGU","FERANG","ED");
INSERT INTO pago VALUES("69","111","2016-06-10","0616","SEGU","FERANG","ED");
INSERT INTO pago VALUES("70","116","2016-05-10","0516","SEGU","FERANG","ED");
INSERT INTO pago VALUES("71","115","2016-04-10","0416","SEGU","FERANG","ED");
INSERT INTO pago VALUES("72","115","2016-03-10","0316","SEGU","FERANG","ED");
INSERT INTO pago VALUES("73","1225.69","2016-08-29","0716","CSO","PERGUI","RP8631");
INSERT INTO pago VALUES("74","556.16","2016-08-29","0716","CSO","SINMIG","RP8631");
INSERT INTO pago VALUES("75","343.1","2016-08-29","0716","IBR","UGAMYR","BP9496");
INSERT INTO pago VALUES("77","754.7","2016-08-29","0716","IBR","BALCLA","BP9496");
INSERT INTO pago VALUES("78","551.9","2016-08-29","0716","IBR","FLOPAB","BP9496");
INSERT INTO pago VALUES("79","7.08","2016-08-29","0716","IBR","PERFLO","BP9496");
INSERT INTO pago VALUES("80","981","2016-08-29","0716","MONO","MAHJOS","RP8631");
INSERT INTO pago VALUES("81","132.4","2016-08-29","0716","IBR","LOBLEA","BP9496");
INSERT INTO pago VALUES("82","352.9","2016-08-29","0716","IBR","DULDUL","BP9496");
INSERT INTO pago VALUES("83","757.4","2016-08-29","0716","IBR","DULMAR","BP9496");
INSERT INTO pago VALUES("84","1.7","2016-08-29","0816","MIB","CONEMI","BP9496");
INSERT INTO pago VALUES("85","391.5","2016-08-09","0116","IBR","GRALUI","RP8631");
INSERT INTO pago VALUES("86","377.3","2016-08-09","0316","IBR","GRALUI","RP8631");
INSERT INTO pago VALUES("87","378.9","2016-08-09","0416","IBR","GRALUI","RP8631");
INSERT INTO pago VALUES("88","121.9","2016-08-29","0616","IBR","MAZMAR","BP9496");
INSERT INTO pago VALUES("89","113.84","2016-08-29","0716","CSO","SINMIG","Z AJUSTE");
INSERT INTO pago VALUES("90","147.4","2016-09-02","0716","IBR","BERADR","BP9496");
INSERT INTO pago VALUES("91","171","2016-09-02","0916","MJCP","DULMAR","BP9496");
INSERT INTO pago VALUES("92","1.17","2016-09-02","0716","IBR","PERMAR","BP9496");
INSERT INTO pago VALUES("93","684","2016-09-06","0816","SDOM","FIGPAO","RP8631");
INSERT INTO pago VALUES("94","684","2016-09-06","0816","SDOM","PERGUI","RP8631");
INSERT INTO pago VALUES("95","1006.4","2016-09-09","0916","PATE","DULMAR","BP9496");
INSERT INTO pago VALUES("96","907.6","2016-09-09","0916","PATE","DULSUS","BP9496");
INSERT INTO pago VALUES("97","704","2016-09-09","0916","CPBA","DULRAU","BP9496");
INSERT INTO pago VALUES("98","675.7","2016-09-09","0916","CPBA","DULRAU","BP9496");
INSERT INTO pago VALUES("99","837.4","2016-09-16","0916","TRED","DULMAR","RP990395");
INSERT INTO pago VALUES("100","379","2016-09-16","0916","TRED","ESTDUL","RP990395");
INSERT INTO pago VALUES("101","55.41","2016-09-16","0916","EDEN","DULMAR","EDENOR");
INSERT INTO pago VALUES("102","33809.9","2016-09-16","0416","SHIG","CILJOR","MMA");
INSERT INTO pago VALUES("103","2210","2016-09-16","0416","SHIG","CALVO","MMA");
INSERT INTO pago VALUES("104","952.13","2016-09-16","0416","SHIG","CALVO","MMA");
INSERT INTO pago VALUES("105","214.2","2016-09-16","0916","SHIG","DULSUS","MMA");
INSERT INTO pago VALUES("106","1350","2016-09-16","0916","SHIG","DULSUS","MMA");
INSERT INTO pago VALUES("107","376.98","2016-09-16","0416","SHIG","FERANG","MMA");
INSERT INTO pago VALUES("108","463.56","2016-09-16","0516","SHIG","FERANG","MMA");
INSERT INTO pago VALUES("109","455.83","2016-09-16","0616","SHIG","FERANG","MMA");
INSERT INTO pago VALUES("110","448.11","2016-09-16","0716","SHIG","FERANG","MMA");
INSERT INTO pago VALUES("111","440.38","2016-09-16","0816","SHIG","FERANG","MMA");
INSERT INTO pago VALUES("112","394.03","2016-09-16","0916","SHIG","FERANG","MMA");
INSERT INTO pago VALUES("113","243.6","2016-09-16","0716","SHIG","MAHJOS","MMA");
INSERT INTO pago VALUES("114","239.4","2016-09-16","0816","SHIG","MAHJOS","MMA");
INSERT INTO pago VALUES("115","214.2","2016-09-16","0916","SHIG","MAHJOS","MMA");
INSERT INTO pago VALUES("116","84.27","2016-09-16","0216","SHIG","TORROD","MMA");
INSERT INTO pago VALUES("117","155.04","2016-09-16","0516","SHIG","TORROD","MMA");
INSERT INTO pago VALUES("118","152.46","2016-09-16","0616","SHIG","TORROD","MMA");
INSERT INTO pago VALUES("119","149.87","2016-09-16","0716","SHIG","TORROD","MMA");
INSERT INTO pago VALUES("120","147.29","2016-09-16","0816","SHIG","TORROD","MMA");
INSERT INTO pago VALUES("121","131.78","2016-09-16","0916","SHIG","TORROD","MMA");
INSERT INTO pago VALUES("122","247.42","2016-09-16","0416","SHIG","TORROD","MMA");
INSERT INTO pago VALUES("123","304.2","2016-09-16","0516","SHIG","TORROD","MMA");
INSERT INTO pago VALUES("124","299.13","2016-09-16","0616","SHIG","TORROD","MMA");
INSERT INTO pago VALUES("125","294.06","2016-09-16","0716","SHIG","TORROD","MMA");
INSERT INTO pago VALUES("126","288.99","2016-09-16","0816","SHIG","TORROD","MMA");
INSERT INTO pago VALUES("127","258.57","2016-09-16","0916","SHIG","TORROD","MMA");
INSERT INTO pago VALUES("128","576","2016-09-20","0916","MONO","SAIEDU","RP8631");
INSERT INTO pago VALUES("129","434","2016-09-20","0916","MONO","MARSAI","RP8631");
INSERT INTO pago VALUES("130","995","2016-09-20","0916","MONO","MARMAR","RP8631");
INSERT INTO pago VALUES("131","1126","2016-09-20","0916","MONO","UGAMYR","RP8631");
INSERT INTO pago VALUES("132","651","2016-09-20","0916","MONO","DULSUS","RP8631");
INSERT INTO pago VALUES("133","1126","2016-09-20","0916","MONO","DULMAR","RP8631");
INSERT INTO pago VALUES("134","981","2016-09-20","0916","MONO","MAHJOS","RP8631");
INSERT INTO pago VALUES("135","615","2016-09-20","0916","MONO","BERADR","RP8631");
INSERT INTO pago VALUES("136","322.9","2016-09-21","0816","IBR","UGAMYR","BP9496");
INSERT INTO pago VALUES("137","288","2016-09-21","0816","IBR","CAMJUL","BP9496");
INSERT INTO pago VALUES("138","723","2016-09-21","0816","IBR","DULMAR","BP9496");
INSERT INTO pago VALUES("139","135.2","2016-09-21","0816","IBR","LOBLEA","BP9496");
INSERT INTO pago VALUES("140","349.9","2016-09-21","0816","IBR","DULDUL","BP9496");
INSERT INTO pago VALUES("141","2359.5","2016-08-17","0716","SHIG","CALVO","MSM");
INSERT INTO pago VALUES("142","550.23","2016-09-21","0616","SHIG","FERANG","MSM");
INSERT INTO pago VALUES("143","531.8","2016-09-21","0816","SHIG","FERANG","MSM");
INSERT INTO pago VALUES("144","250.3","2016-09-21","0816","SHIG","STEJUA","MSM");
INSERT INTO pago VALUES("145","2554.55","2016-09-21","0816","SHIG","BLACAR","MSM");
INSERT INTO pago VALUES("147","2850.8","2016-09-21","0816","IVA","CATCAR","RP8631");
INSERT INTO pago VALUES("148","981","2016-09-21","0816","MONO","MAHJOS","RP8631");
INSERT INTO pago VALUES("149","297.37","2016-09-21","0916","CLAR","DULALE","RP8631");
INSERT INTO pago VALUES("150","2437","2016-09-21","0916","OSDE","DULALE","RP8631");
INSERT INTO pago VALUES("151","142.88","2016-09-21","0916","EDEN","ESTDUL","RP8631");
INSERT INTO pago VALUES("152","235.04","2016-09-21","0916","EDEN","DULSUS","RP8631");
INSERT INTO pago VALUES("153","68.43","2016-09-21","0916","EDEN","DULDUL","RP8631");
INSERT INTO pago VALUES("154","32.05","2016-09-21","0916","EDEN","DULDUL","RP8631");
INSERT INTO pago VALUES("155","1964","2016-09-22","0916","MONO","FLOPAB","RP8631");
INSERT INTO pago VALUES("156","550","2016-09-22","0916","MONO","BALCLA","RP8631");
INSERT INTO pago VALUES("157","90","2016-09-22","0916","SHIG","DULSUS","MMA");
INSERT INTO pago VALUES("158","1273.44","2016-09-22","0416","SHIG","VALYAN","MMA");
INSERT INTO pago VALUES("159","414.8","2016-09-22","0716","IBR","FERANG","BP9496");
INSERT INTO pago VALUES("160","774.1","2016-09-22","0816","IBR","FLOPAB","BP9496");
INSERT INTO pago VALUES("161","764.6","2016-09-22","0816","IBR","BALCLA","BP9496");
INSERT INTO pago VALUES("162","8","2016-09-22","0816","IBR","PERFLO","BP9496");
INSERT INTO pago VALUES("163","0.9","2016-09-22","0816","IBR","PERMAR","BP9496");
INSERT INTO pago VALUES("164","2.7","2016-09-22","0816","IBR","PERMAR","BP9496");
INSERT INTO pago VALUES("165","2359.5","2016-09-21","0816","SHIG","CALVO","MSM");
INSERT INTO pago VALUES("166","565.43","2016-09-23","0916","TELE","ESTDUL","RP8631");
INSERT INTO pago VALUES("167","898.53","2016-09-23","1115","CSO","MOLPAT","RP8631");
INSERT INTO pago VALUES("168","200","2016-10-03","1016","MJCP","DULMAR","ED");
INSERT INTO pago VALUES("169","100","2016-10-05","1016","EDEN","DULSUS","PF4759");



DROP TABLE recibo;

CREATE TABLE `recibo` (
  `nroRecibo` int(11) NOT NULL AUTO_INCREMENT,
  `anulado` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`nroRecibo`,`username`),
  KEY `fk_recibo_usuario1_idx` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

INSERT INTO recibo VALUES("15","1","nicolas","2016-10-03");
INSERT INTO recibo VALUES("16","0","nicolas","2016-10-03");
INSERT INTO recibo VALUES("17","0","nicolas","2016-10-03");
INSERT INTO recibo VALUES("18","1","empleado","2016-10-03");
INSERT INTO recibo VALUES("19","1","nicolas","2016-10-05");
INSERT INTO recibo VALUES("20","0","nicolas","2016-10-05");
INSERT INTO recibo VALUES("21","0","nicolas","2016-10-05");
INSERT INTO recibo VALUES("22","0","nicolas","2016-10-07");
INSERT INTO recibo VALUES("23","0","nicolas","2016-10-07");



DROP TABLE usuario;

CREATE TABLE `usuario` (
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipoUsuario` varchar(1) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO usuario VALUES("empleado","088ef99bff55c67dc863f83980a66a9b","3");
INSERT INTO usuario VALUES("marcelo","fbc8c69cb6ee8ae8f9c134b4c8478f49","0");
INSERT INTO usuario VALUES("nicolas","a6bd9e1db71dc726909e68c69b7f3697","0");



