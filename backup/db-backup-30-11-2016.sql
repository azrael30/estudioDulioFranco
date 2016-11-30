SET FOREIGN_KEY_CHECKS = 0;

-- 
-- Dumping data for table `banco` 
-- 

INSERT INTO `banco` (`idBanco`, `descripcion`, `direccion`) VALUES ('BP9496','BAPRO 9496 PAUNERO','PAUNERO Y CHILE'),
 ('ED','ESTUDIO DULIO',''),
 ('EDENOR','EDENOR','J C PAZ'),
 ('MJCP','MUNICIP.JOSE C. PAZ',''),
 ('MMA','MUNICIPALIDAD M.ARGENTINAS',''),
 ('MSM','MUNICIPALIDAD DE SAN MIGUEL',''),
 ('NACGB','NACION G BOURG','GRAND BOURG'),
 ('PF4759','P FACIL 4759 Ruta 197','RUTA 197 y TRIUNVIRATO'),
 ('RP8631','RAPIPAGO 8631  PERON y CHILE','PERON Y CHILE'),
 ('RP990395','RAPIPAGO MUÑOZ y CHILE','FARMACIA'),
 ('Z AJUSTE','AJUSTE','');

-- --------------------------------------------------------

-- 
-- Dumping data for table `cliente` 
-- 

INSERT INTO `cliente` (`idCliente`, `nombre`, `apellido`, `CUIT`, `fechaNacimiento`, `nacionalidad`, `mail`, `celular`, `companiaCelular`, `telefonoFijo`, `habilitado`, `honorarioBase`) VALUES ('BALCLA','CLAUDIA','BALESTRERO','27172831465','0000-00-00','Argentino','','','','','1','0'),
 ('BERADR','ADRIANA','BERGES','27926679339','0000-00-00','Argentino','','','','','1','0'),
 ('BLACAR','CARLOS ENRIQUE','BLANDINI','23128020039','0000-00-00','Argentino','','','','','1','0'),
 ('CALVO','SRL','CALVO HNOS ','30606877400','0000-00-00','','','','','','1','0'),
 ('CAMJUL','JULIO','CAMINOS','20101174272','0000-00-00','Argentino','','','','','1','0'),
 ('CATCAR','CARLOS','CATERINA','20043068416','0000-00-00','Argentino','','','','','1','0'),
 ('CILJOR','JORGE ','CILIA ','20082470167','0000-00-00','Argentino','','','','','1','0'),
 ('CONEMI','EMILIO','CONDE','20168490381','0000-00-00','Argentino','','','','','1','0'),
 ('CRINOR','NORBERTO','CRISTOFANETTI','20144613075','0000-00-00','Argentino','','','','','1','0'),
 ('DACMAU','MAURICIO','DACHILLE','20244628177','0000-00-00','Argentino','','','','','1','0'),
 ('DULALE','ALEJANDRA','DULIO','27320133292','0000-00-00','Argentina','','','','','1','0'),
 ('DULDUL','DULIO MARCELO','DULIO RAUL','20045743722','0000-00-00','','','','','','1','0'),
 ('DULMAR','MARCELO','DULIO','20126469404','0000-00-00','Argentino','','','','','1','120'),
 ('DULNIC','NICOLAS','DULIO','20373686779','1993-02-17','ARGENTINO','nico_n44@hotmail.com','01169571792','CLARO','','1','0'),
 ('DULRAU','RAUL','DULIO','20101115659','0000-00-00','Argentino','','','','','1','0'),
 ('DULSUS','SUSANA','DULIO','27163808523','0000-00-00','Argentina','','','','','1','0'),
 ('ESCMAR','MARIA TERESA','ESCALANTE','27165223328','0000-00-00','Argentina','gadel_piano@hotmail.com','11-4035-1598','movistar','02320-664050','1','0'),
 ('ESTDUL','DULIO','ESTUDIO','20100000000','0000-00-00','','','','','','1','150'),
 ('FERANG','ANGELICA','FERRARI','27057757391','0000-00-00','ARGENTINA','','','','','1','0'),
 ('FERCLA','CLAUDIO JOSE','FERNANDEZ','20125495738','1960-01-01','ARGENTINO','','','','','0','0'),
 ('FIGPAO','PAOLA','FIGUEROA','27256582983','0000-00-00','ARGENTINA','','','','','1','0'),
 ('FLOPAB','PABLO','FLORIAN','20172834230','0000-00-00','Argentino','','','','','1','0'),
 ('GRALUI','LUIS','GRAU','20202417125','0000-00-00','Argentino','','','','','1','0'),
 ('LOBLEA','LEANDRO','LOBO','20263661770','0000-00-00','Argentino','','','','','1','0'),
 ('MAHJOS','JOSE','MAHON','20046962576','0000-00-00','Argentino','','','','','1','0'),
 ('MARMAR','MARIO','MARTELOTTO','20181361450','0000-00-00','Argentino','','','','','1','0'),
 ('MARSAI','SAIBENE  SOC HECHO','MARTELOTTO','30708834706','0000-00-00','','','','','','1','0'),
 ('MAZMAR','MARIANA','MAZZEI','27299620870','0000-00-00','Argentina','','','','','1','0'),
 ('MOLPAT','PATRICIA','MOLLICA','27148339029','0000-00-00','Argentina','','','','','1','0'),
 ('P1','1','Prueba','12345678998','0000-00-00','','','','','','1','0'),
 ('PEREDU','EDUARDO DARIO','PEREZ','23141400029','0000-00-00','Argentino','','','','','1','0'),
 ('PERFLO','FLORENCIA','PEREZ ','23343790244','0000-00-00','Argentina','','','','','1','0'),
 ('PERGUI','GUILLERMO','PEREZ','20144866976','0000-00-00','Argentino','','','','','1','0'),
 ('PERMAR','MARIANA','PEREZ','27322788431','0000-00-00','Argentina','','','','','1','0'),
 ('RUIGUI','GUILLERMO','RUIZ DIAZ','23184908859','0000-00-00','Argentino','guilleruizdiaz2015@gmail.com','15-3491-1696','PERSONAL','','1','0'),
 ('SAIEDU','EDUARDO','SAIBENE','23164344509','0000-00-00','Argentino','','','','','1','0'),
 ('SINMIG','MIGUEL','SINISI','20934451466','0000-00-00','Italiano','','','','','1','0'),
 ('STEJUA','JUAN','STEFANINI','20082362887','0000-00-00','Argentino','','','','','1','0'),
 ('T1','Francisco','Tusa','20107543164','0000-00-00','','','','','','1','0'),
 ('TORROD','RODOLFO','TORRES','23106000999','0000-00-00','Argentino','','','','','1','0'),
 ('UGAMYR','MYRIAM','UGALDEA','27210953855','0000-00-00','Argentina','','','','','1','0'),
 ('VALYAN','YANINA','VALLEJOS','27300344890','0000-00-00','Argentina','','','','','1','0');

-- --------------------------------------------------------

-- 
-- Dumping data for table `clientehonorarioperiodo` 
-- 

INSERT INTO `clientehonorarioperiodo` (`idPeriodo`, `idCliente`, `base`, `saldado`) VALUES ('0816','DULMAR','120','0'),
 ('0816','ESTDUL','150','0');

-- --------------------------------------------------------

-- 
-- Dumping data for table `cobro` 
-- 

INSERT INTO `cobro` (`idCobro`, `valor`, `idPeriodo`, `idObligacion`, `idCliente`, `nroRecibo`) VALUES ('147','1782.9','0316','IBR','FERANG','16'),
 ('148','115.23','0316','SEGU','FERANG','16'),
 ('149','2170.4','0416','IBR','FERANG','16'),
 ('150','115','0416','SEGU','FERANG','16'),
 ('151','2056.3','0516','IBR','FERANG','16'),
 ('152','100','1016','MJCP','DULMAR','17'),
 ('153','200','1016','IBR','DULMAR','17'),
 ('166','100','0816','IBR','PERMAR','20'),
 ('167','20','0816','IBR','PERMAR','20'),
 ('168','30','0816','IBR','PERMAR','20'),
 ('169','40','0816','IBR','PERMAR','20'),
 ('170','50','0816','IBR','PERMAR','20'),
 ('171','60','0816','IBR','PERMAR','20'),
 ('172','70','0816','IBR','PERMAR','20'),
 ('173','80','0816','IBR','PERMAR','20'),
 ('174','90','0816','IBR','PERMAR','20'),
 ('175','100','0816','IBR','PERMAR','20'),
 ('176','99.95','1016','EDEN','DULSUS','21'),
 ('177','0.9','1016','IBR','DULSUS','22'),
 ('178','149','1216','EDEN','DULSUS','22'),
 ('179','1200','1216','PATE','DULSUS','22'),
 ('180','499','1216','SEGU','DULSUS','22'),
 ('181','0.9','1016','CLAR','DULALE','23'),
 ('182','1','1116','CLAR','DULALE','23'),
 ('183','500','0916','EDEN','ESTDUL','24'),
 ('184','500','1016','ANBP','T1','25'),
 ('185','400','1116','ANGA','T1','25'),
 ('186','500','1116','AUT','T1','25'),
 ('187','1000','1016','ANBP','T1','26'),
 ('188','200','1016','ANGA','T1','26'),
 ('189','1000','1016','AUT','T1','26'),
 ('190','50','1016','IVA','T1','26'),
 ('191','500','1116','ANBP','T1','26'),
 ('192','100','1116','AUT','T1','26'),
 ('193','4000','1116','CSO','T1','26'),
 ('194','1800','1116','IBR','T1','26'),
 ('195','800','1116','IVA','T1','26'),
 ('196','100','1116','SHIG','T1','26'),
 ('197','100','1116','ANBP','P1','27'),
 ('198','100','1116','ANBP','P1','28'),
 ('199','100','1116','AUT','P1','28'),
 ('200','300','1116','CLAR','P1','28'),
 ('201','1300','1116','OSDE','P1','28'),
 ('202','100','1116','ANBP','P1','29'),
 ('203','0','1116','AUT','P1','29'),
 ('204','0','1116','CLAR','P1','29'),
 ('205','0','1116','OSDE','P1','29'),
 ('206','-200','1116','ANBP','P1','30'),
 ('207','100','1216','ANBP','P1','31'),
 ('208','100','1216','AUT','P1','31'),
 ('209','150','1216','CLAR','P1','31'),
 ('210','200','1216','GAS','P1','31'),
 ('211','1300','1216','OSDE','P1','31');

-- --------------------------------------------------------

-- 
-- Dumping data for table `obligacion` 
-- 

INSERT INTO `obligacion` (`idObligacion`, `descripcion`, `categorizar`) VALUES ('ANBP','Anticipo Bs Ps','0'),
 ('ANGA','Anticipo Ganancias','0'),
 ('AUT','Autonomos','0'),
 ('BSPS','Bienes Personales','0'),
 ('CLAR','CLARO','0'),
 ('CPBA','CPCEPBA','0'),
 ('CSO','Cargas Sociales','0'),
 ('EDEN','Edenor','0'),
 ('GAN','Ganancias','0'),
 ('GAS','Gas Natural','0'),
 ('IBR','Ingresos Brutos','0'),
 ('IVA','IVA','0'),
 ('MAFI','Moratoria AFIP','0'),
 ('MIB','Moratoria Ing Brutos','0'),
 ('MJCP','MUNICIP.JOSE C. PAZ','0'),
 ('MONO','Monotributo','0'),
 ('OSDE','OSDE','0'),
 ('PATE','PATENTE','0'),
 ('SDOM','Servicio Domestico','0'),
 ('SEGU','Seguros','0'),
 ('SHIG','Seg e Higiene','0'),
 ('TELE','TELEFONO','0'),
 ('TRED','TELERED','0');

-- --------------------------------------------------------

-- 
-- Dumping data for table `obligacioncliente` 
-- 

INSERT INTO `obligacioncliente` (`idObligacion`, `idCliente`, `idCategoria`, `habilitado`, `valor`) VALUES ('ANBP','BALCLA',NULL,'1',NULL),
 ('ANBP','DULMAR',NULL,'1',NULL),
 ('ANBP','P1',NULL,'1','100'),
 ('ANBP','T1',NULL,'1',NULL),
 ('ANBP','TORROD',NULL,'1',NULL),
 ('ANGA','DULMAR',NULL,'1',NULL),
 ('ANGA','T1',NULL,'1',NULL),
 ('ANGA','TORROD',NULL,'1',NULL),
 ('AUT','P1',NULL,'1','100'),
 ('AUT','T1',NULL,'1',NULL),
 ('BSPS','BALCLA',NULL,'1',NULL),
 ('BSPS','DULMAR',NULL,'1',NULL),
 ('CLAR','DULALE',NULL,'1',NULL),
 ('CLAR','DULNIC',NULL,'1',NULL),
 ('CLAR','P1',NULL,'1','150'),
 ('CPBA','DULRAU',NULL,'1',NULL),
 ('CSO','CALVO',NULL,'1',NULL),
 ('CSO','DACMAU',NULL,'1',NULL),
 ('CSO','FERANG',NULL,'1',NULL),
 ('CSO','MOLPAT',NULL,'1',NULL),
 ('CSO','PEREDU',NULL,'1',NULL),
 ('CSO','PERGUI',NULL,'1',NULL),
 ('CSO','PERMAR',NULL,'1',NULL),
 ('CSO','SINMIG',NULL,'1',NULL),
 ('CSO','T1',NULL,'1',NULL),
 ('EDEN','DULDUL',NULL,'1',NULL),
 ('EDEN','DULMAR',NULL,'1',NULL),
 ('EDEN','DULSUS',NULL,'1',NULL),
 ('EDEN','ESTDUL',NULL,'1',NULL),
 ('GAN','DULMAR',NULL,'1',NULL),
 ('GAN','P1',NULL,'1',NULL),
 ('GAS','P1',NULL,'1','200'),
 ('IBR','BALCLA',NULL,'1',NULL),
 ('IBR','BERADR',NULL,'1',NULL),
 ('IBR','CAMJUL',NULL,'1',NULL),
 ('IBR','DULDUL',NULL,'1',NULL),
 ('IBR','DULMAR',NULL,'1',NULL),
 ('IBR','DULSUS',NULL,'1',NULL),
 ('IBR','FERANG',NULL,'1',NULL),
 ('IBR','FLOPAB',NULL,'1',NULL),
 ('IBR','GRALUI',NULL,'1',NULL),
 ('IBR','LOBLEA',NULL,'1',NULL),
 ('IBR','MAHJOS',NULL,'1',NULL),
 ('IBR','MARSAI',NULL,'1',NULL),
 ('IBR','MAZMAR',NULL,'1',NULL),
 ('IBR','PERFLO',NULL,'1',NULL),
 ('IBR','PERGUI',NULL,'1',NULL),
 ('IBR','PERMAR',NULL,'1',NULL),
 ('IBR','T1',NULL,'1',NULL),
 ('IBR','UGAMYR',NULL,'1',NULL),
 ('IBR','VALYAN',NULL,'1',NULL),
 ('IVA','CATCAR',NULL,'1',NULL),
 ('IVA','DULDUL',NULL,'1',NULL),
 ('IVA','FERCLA',NULL,'0',NULL),
 ('IVA','P1',NULL,'1',NULL),
 ('IVA','T1',NULL,'1',NULL),
 ('MAFI','ESCMAR',NULL,'1',NULL),
 ('MIB','CONEMI',NULL,'1',NULL),
 ('MJCP','DULMAR',NULL,'1',NULL),
 ('MONO','BALCLA',NULL,'1',NULL),
 ('MONO','BERADR',NULL,'1',NULL),
 ('MONO','DULMAR',NULL,'1',NULL),
 ('MONO','DULNIC',NULL,'1',NULL),
 ('MONO','DULSUS',NULL,'1',NULL),
 ('MONO','FLOPAB',NULL,'1',NULL),
 ('MONO','GRALUI',NULL,'1',NULL),
 ('MONO','MAHJOS',NULL,'1',NULL),
 ('MONO','MARMAR',NULL,'1',NULL),
 ('MONO','MARSAI',NULL,'1',NULL),
 ('MONO','SAIEDU',NULL,'1',NULL),
 ('MONO','UGAMYR',NULL,'1',NULL),
 ('OSDE','DULALE',NULL,'1',NULL),
 ('OSDE','P1',NULL,'1','1300'),
 ('PATE','DULMAR',NULL,'1',NULL),
 ('PATE','DULSUS',NULL,'1',NULL),
 ('SDOM','FIGPAO',NULL,'1',NULL),
 ('SDOM','PERGUI',NULL,'1',NULL),
 ('SEGU','CRINOR',NULL,'1',NULL),
 ('SEGU','DULMAR',NULL,'1',NULL),
 ('SEGU','DULSUS',NULL,'1',NULL),
 ('SEGU','ESTDUL',NULL,'1',NULL),
 ('SEGU','FERANG',NULL,'1',NULL),
 ('SEGU','MOLPAT',NULL,'1',NULL),
 ('SEGU','SINMIG',NULL,'1',NULL),
 ('SHIG','BLACAR',NULL,'1',NULL),
 ('SHIG','CALVO',NULL,'1',NULL),
 ('SHIG','CILJOR',NULL,'1',NULL),
 ('SHIG','DULSUS',NULL,'1',NULL),
 ('SHIG','FERANG',NULL,'1',NULL),
 ('SHIG','MAHJOS',NULL,'1',NULL),
 ('SHIG','PERGUI',NULL,'1',NULL),
 ('SHIG','PERMAR',NULL,'1',NULL),
 ('SHIG','STEJUA',NULL,'1',NULL),
 ('SHIG','T1',NULL,'1',NULL),
 ('SHIG','TORROD',NULL,'1',NULL),
 ('SHIG','VALYAN',NULL,'1',NULL),
 ('TELE','ESTDUL',NULL,'1',NULL),
 ('TRED','DULMAR',NULL,'1',NULL),
 ('TRED','ESTDUL',NULL,'1',NULL);

-- --------------------------------------------------------

-- 
-- Dumping data for table `occperiodo` 
-- 

INSERT INTO `occperiodo` (`idPeriodo`, `valor`, `impuesto`, `vencimiento`, `idObligacion`, `idCliente`, `saldado`) VALUES ('0115','335.79','0','0000-00-00','ANBP','TORROD','0'),
 ('0115','1037.51','0','0000-00-00','ANGA','TORROD','0'),
 ('0116','391.5','0','0000-00-00','IBR','GRALUI','0'),
 ('0215','335.79','0','0000-00-00','ANBP','TORROD','0'),
 ('0215','1037.51','0','0000-00-00','ANGA','TORROD','0'),
 ('0216','831.22','0','0000-00-00','CSO','FERANG','1'),
 ('0216','1','0','0000-00-00','IBR','GRALUI','1'),
 ('0216','481.34','0','0000-00-00','SHIG','FERANG','1'),
 ('0216','84.27','0','0000-00-00','SHIG','TORROD','1'),
 ('0316','887.45','0','0000-00-00','CSO','FERANG','1'),
 ('0316','1782.9','0','0000-00-00','IBR','FERANG','0'),
 ('0316','377.3','0','0000-00-00','IBR','GRALUI','0'),
 ('0316','115.23','0','0000-00-00','SEGU','FERANG','0'),
 ('0316','833.6','0','0000-00-00','SHIG','FERANG','1'),
 ('0416','834.6','0','0000-00-00','CSO','FERANG','1'),
 ('0416','2170.4','0','0000-00-00','IBR','FERANG','0'),
 ('0416','378.9','0','0000-00-00','IBR','GRALUI','0'),
 ('0416','115','0','0000-00-00','SEGU','FERANG','0'),
 ('0416','1','0','0000-00-00','SHIG','CALVO','0'),
 ('0416','1','0','0000-00-00','SHIG','CILJOR','0'),
 ('0416','848.88','0','0000-00-00','SHIG','FERANG','1'),
 ('0416','382.8','0','0000-00-00','SHIG','TORROD','1'),
 ('0416','1273.44','0','0000-00-00','SHIG','VALYAN','1'),
 ('0516','834.6','0','0000-00-00','CSO','FERANG','1'),
 ('0516','2056.3','0','0000-00-00','IBR','FERANG','0'),
 ('0516','116','0','0000-00-00','SEGU','FERANG','0'),
 ('0516','463.56','0','0000-00-00','SHIG','FERANG','1'),
 ('0516','459.24','0','0000-00-00','SHIG','TORROD','1'),
 ('0616','1648.72','0','0000-00-00','CSO','FERANG','1'),
 ('0616','1180.9','0','0000-00-00','IBR','FERANG','0'),
 ('0616','116','0','0000-00-00','IBR','MAZMAR','1'),
 ('0616','704','0','0000-00-00','MONO','GRALUI','0'),
 ('0616','111','0','0000-00-00','SEGU','FERANG','0'),
 ('0616','1006.06','0','0000-00-00','SHIG','FERANG','1'),
 ('0616','451.59','0','0000-00-00','SHIG','TORROD','1'),
 ('0716','2357.03','0','0000-00-00','CSO','CALVO','1'),
 ('0716','1','0','0000-00-00','CSO','DACMAU','0'),
 ('0716','1','0','0000-00-00','CSO','FERANG','0'),
 ('0716','204.94','0','0000-00-00','CSO','MOLPAT','1'),
 ('0716','1','0','0000-00-00','CSO','PEREDU','0'),
 ('0716','1225.69','0','0000-00-00','CSO','PERGUI','1'),
 ('0716','556.16','0','0000-00-00','CSO','SINMIG','1'),
 ('0716','760','0','0000-00-00','IBR','BALCLA','1'),
 ('0716','147.4','0','0000-00-00','IBR','BERADR','0'),
 ('0716','352.9','0','0000-00-00','IBR','DULDUL','1'),
 ('0716','757.4','0','0000-00-00','IBR','DULMAR','1'),
 ('0716','1','0','0000-00-00','IBR','DULSUS','0'),
 ('0716','414.8','0','0000-00-00','IBR','FERANG','1'),
 ('0716','551.9','0','0000-00-00','IBR','FLOPAB','1'),
 ('0716','1','0','0000-00-00','IBR','GRALUI','0'),
 ('0716','132.4','0','0000-00-00','IBR','LOBLEA','1'),
 ('0716','1','0','0000-00-00','IBR','MAHJOS','0'),
 ('0716','1','0','0000-00-00','IBR','MARSAI','0'),
 ('0716','1','0','0000-00-00','IBR','MAZMAR','0'),
 ('0716','7.08','0','0000-00-00','IBR','PERFLO','0'),
 ('0716','1.17','0','0000-00-00','IBR','PERMAR','1'),
 ('0716','343.1','0','0000-00-00','IBR','UGAMYR','1'),
 ('0716','704','0','0000-00-00','MONO','GRALUI','0'),
 ('0716','981','0','0000-00-00','MONO','MAHJOS','0'),
 ('0716','684','0','0000-00-00','SDOM','FIGPAO','0'),
 ('0716','684','0','0000-00-00','SDOM','PERGUI','0'),
 ('0716','111','0','0000-00-00','SEGU','FERANG','0'),
 ('0716','2359.5','0','0000-00-00','SHIG','BLACAR','1'),
 ('0716','2359.5','0','0000-00-00','SHIG','CALVO','1'),
 ('0716','920.01','0','0000-00-00','SHIG','FERANG','1'),
 ('0716','243.6','0','0000-00-00','SHIG','MAHJOS','1'),
 ('0716','245.39','0','0000-00-00','SHIG','STEJUA','1'),
 ('0716','443.93','0','0000-00-00','SHIG','TORROD','1'),
 ('0816','1','0','0000-00-00','CSO','CALVO','0'),
 ('0816','1','0','0000-00-00','CSO','DACMAU','0'),
 ('0816','1036','0','0000-00-00','CSO','FERANG','1'),
 ('0816','1','0','0000-00-00','CSO','MOLPAT','0'),
 ('0816','1','0','0000-00-00','CSO','PEREDU','0'),
 ('0816','1','0','0000-00-00','CSO','PERGUI','0'),
 ('0816','1','0','0000-00-00','CSO','SINMIG','0'),
 ('0816','115.23','0','0000-00-00','EDEN','DULDUL','1'),
 ('0816','256.4','0','0000-00-00','EDEN','DULSUS','1'),
 ('0816','150.13','0','0000-00-00','EDEN','ESTDUL','1'),
 ('0816','764.6','0','0000-00-00','IBR','BALCLA','1'),
 ('0816','1','0','0000-00-00','IBR','BERADR','0'),
 ('0816','288','0','0000-00-00','IBR','CAMJUL','0'),
 ('0816','349.9','0','0000-00-00','IBR','DULDUL','1'),
 ('0816','723','0','0000-00-00','IBR','DULMAR','1'),
 ('0816','1','0','0000-00-00','IBR','DULSUS','0'),
 ('0816','396','0','0000-00-00','IBR','FERANG','0'),
 ('0816','774.1','0','0000-00-00','IBR','FLOPAB','1'),
 ('0816','1','0','0000-00-00','IBR','GRALUI','0'),
 ('0816','135.2','0','0000-00-00','IBR','LOBLEA','1'),
 ('0816','1','0','0000-00-00','IBR','MAHJOS','0'),
 ('0816','1','0','0000-00-00','IBR','MARSAI','0'),
 ('0816','1','0','0000-00-00','IBR','PERFLO','0'),
 ('0816','1','0','0000-00-00','IBR','PERMAR','0'),
 ('0816','322.9','0','0000-00-00','IBR','UGAMYR','1'),
 ('0816','2850.5','0','0000-00-00','IVA','CATCAR','1'),
 ('0816','630','0','0000-00-00','MAFI','ESCMAR','0'),
 ('0816','1.7','0','0000-00-00','MIB','CONEMI','1'),
 ('0816','550','0','0000-00-00','MONO','BALCLA','0'),
 ('0816','1','0','0000-00-00','MONO','BERADR','0'),
 ('0816','1126','0','0000-00-00','MONO','DULMAR','1'),
 ('0816','651','0','0000-00-00','MONO','DULSUS','1'),
 ('0816','1','0','0000-00-00','MONO','FLOPAB','0'),
 ('0816','981','0','0000-00-00','MONO','MAHJOS','0'),
 ('0816','1','0','0000-00-00','MONO','MARMAR','0'),
 ('0816','434','0','0000-00-00','MONO','MARSAI','0'),
 ('0816','1','0','0000-00-00','MONO','SAIEDU','0'),
 ('0816','1','0','0000-00-00','MONO','UGAMYR','0'),
 ('0816','684','0','0000-00-00','SDOM','FIGPAO','0'),
 ('0816','684','0','0000-00-00','SDOM','PERGUI','0'),
 ('0816','260','0','0000-00-00','SEGU','CRINOR','0'),
 ('0816','111','0','0000-00-00','SEGU','FERANG','1'),
 ('0816','92','0','0000-00-00','SEGU','MOLPAT','1'),
 ('0816','2554.55','0','0000-00-00','SHIG','BLACAR','1'),
 ('0816','2359.5','0','0000-00-00','SHIG','CALVO','1'),
 ('0816','972.18','0','0000-00-00','SHIG','FERANG','1'),
 ('0816','239.4','0','0000-00-00','SHIG','MAHJOS','1'),
 ('0816','1481','0','0000-00-00','SHIG','PERGUI','0'),
 ('0816','250.3','0','0000-00-00','SHIG','STEJUA','1'),
 ('0816','436.28','0','0000-00-00','SHIG','TORROD','1'),
 ('0916','297.37','0','0000-00-00','CLAR','DULALE','1'),
 ('0916','1379.7','0','0000-00-00','CPBA','DULRAU','1'),
 ('0916','100.48','0','0000-00-00','EDEN','DULDUL','1'),
 ('0916','55.41','0','0000-00-00','EDEN','DULMAR','1'),
 ('0916','235.04','0','0000-00-00','EDEN','DULSUS','1'),
 ('0916','142.88','0','0000-00-00','EDEN','ESTDUL','0'),
 ('0916','171','0','0000-00-00','MJCP','DULMAR','1'),
 ('0916','1','0','0000-00-00','MONO','BALCLA','0'),
 ('0916','615','0','0000-00-00','MONO','BERADR','0'),
 ('0916','1126','0','0000-00-00','MONO','DULMAR','1'),
 ('0916','651','0','0000-00-00','MONO','DULSUS','1'),
 ('0916','1545','0','0000-00-00','MONO','FLOPAB','0'),
 ('0916','1','0','0000-00-00','MONO','GRALUI','0'),
 ('0916','1','0','0000-00-00','MONO','MAHJOS','0'),
 ('0916','1','0','0000-00-00','MONO','MARMAR','0'),
 ('0916','1','0','0000-00-00','MONO','MARSAI','0'),
 ('0916','1','0','0000-00-00','MONO','SAIEDU','0'),
 ('0916','1','0','0000-00-00','MONO','UGAMYR','0'),
 ('0916','2437','0','0000-00-00','OSDE','DULALE','1'),
 ('0916','1006.4','0','0000-00-00','PATE','DULMAR','1'),
 ('0916','907.6','0','0000-00-00','PATE','DULSUS','1'),
 ('0916','115','0','0000-00-00','SEGU','FERANG','0'),
 ('0916','92','0','0000-00-00','SEGU','MOLPAT','0'),
 ('0916','1564.2','0','0000-00-00','SHIG','DULSUS','1'),
 ('0916','394.03','0','0000-00-00','SHIG','FERANG','1'),
 ('0916','214.2','0','0000-00-00','SHIG','MAHJOS','0'),
 ('0916','1','0','0000-00-00','SHIG','PERGUI','0'),
 ('0916','390.35','0','0000-00-00','SHIG','TORROD','1'),
 ('0916','565.43','0','0000-00-00','TELE','ESTDUL','0'),
 ('0916','837.4','0','0000-00-00','TRED','DULMAR','1'),
 ('0916','379','0','0000-00-00','TRED','ESTDUL','1'),
 ('1016','1','0','0000-00-00','ANBP','BALCLA','0'),
 ('1016','1','0','0000-00-00','ANBP','DULMAR','0'),
 ('1016','1500','0','0000-00-00','ANBP','T1','0'),
 ('1016','1','0','0000-00-00','ANBP','TORROD','0'),
 ('1016','1','0','0000-00-00','ANGA','DULMAR','0'),
 ('1016','200','0','0000-00-00','ANGA','T1','0'),
 ('1016','1','0','0000-00-00','ANGA','TORROD','0'),
 ('1016','1000','0','0000-00-00','AUT','T1','0'),
 ('1016','1','0','0000-00-00','BSPS','BALCLA','0'),
 ('1016','1','0','0000-00-00','BSPS','DULMAR','0'),
 ('1016','1','0','0000-00-00','CLAR','DULALE','1'),
 ('1016','0','0','0000-00-00','CSO','CALVO','0'),
 ('1016','0','0','0000-00-00','CSO','SINMIG','0'),
 ('1016','1','0','0000-00-00','EDEN','DULDUL','0'),
 ('1016','1','0','0000-00-00','EDEN','DULMAR','0'),
 ('1016','100','0','0000-00-00','EDEN','DULSUS','1'),
 ('1016','1','0','0000-00-00','IBR','BALCLA','0'),
 ('1016','1','0','0000-00-00','IBR','BERADR','0'),
 ('1016','1','0','0000-00-00','IBR','CAMJUL','0'),
 ('1016','1','0','0000-00-00','IBR','DULDUL','0'),
 ('1016','1','0','0000-00-00','IBR','DULMAR','0'),
 ('1016','1','0','0000-00-00','IBR','DULSUS','0'),
 ('1016','1','0','0000-00-00','IBR','FERANG','0'),
 ('1016','1','0','0000-00-00','IBR','FLOPAB','0'),
 ('1016','1','0','0000-00-00','IBR','GRALUI','0'),
 ('1016','1','0','0000-00-00','IBR','LOBLEA','0'),
 ('1016','1','0','0000-00-00','IBR','MAHJOS','0'),
 ('1016','1','0','0000-00-00','IBR','MARSAI','0'),
 ('1016','1','0','0000-00-00','IBR','MAZMAR','0'),
 ('1016','1','0','0000-00-00','IBR','PERFLO','0'),
 ('1016','1','0','0000-00-00','IBR','PERGUI','0'),
 ('1016','1','0','0000-00-00','IBR','PERMAR','0'),
 ('1016','1','0','0000-00-00','IBR','UGAMYR','0'),
 ('1016','1','0','0000-00-00','IBR','VALYAN','0'),
 ('1016','0','0','0000-00-00','IVA','CATCAR','0'),
 ('1016','50','0','0000-00-00','IVA','T1','0'),
 ('1016','1','0','0000-00-00','MJCP','DULMAR','0'),
 ('1016','400','0','0000-00-00','MONO','DULMAR','0'),
 ('1016','2000','0','0000-00-00','MONO','DULSUS','0'),
 ('1016','1','0','0000-00-00','PATE','DULSUS','0'),
 ('1016','100','0','0000-00-00','SEGU','SINMIG','0'),
 ('1016','400','0','0000-00-00','SHIG','DULSUS','0'),
 ('1016','1','0','0000-00-00','TELE','ESTDUL','0'),
 ('1115','898.53','0','0000-00-00','CSO','MOLPAT','0'),
 ('1116','1000','0','0000-00-00','ANBP','DULMAR','0'),
 ('1116','100','0','2016-11-21','ANBP','P1','0'),
 ('1116','500','0','0000-00-00','ANBP','T1','0'),
 ('1116','2000','0','0000-00-00','ANGA','DULMAR','0'),
 ('1116','400','0','0000-00-00','ANGA','T1','0'),
 ('1116','100','0','2016-11-21','AUT','P1','0'),
 ('1116','600','0','0000-00-00','AUT','T1','0'),
 ('1116','1','0','0000-00-00','CLAR','DULALE','0'),
 ('1116','300','0','2016-11-21','CLAR','P1','0'),
 ('1116','4000','0','0000-00-00','CSO','T1','0'),
 ('1116','1000','0','0000-00-00','IBR','DULMAR','0'),
 ('1116','100','0','2016-11-29','IBR','DULSUS','0'),
 ('1116','1800','0','0000-00-00','IBR','T1','0'),
 ('1116','800','0','0000-00-00','IVA','T1','0'),
 ('1116','2000','0','0000-00-00','MONO','DULMAR','0'),
 ('1116','200','0','2016-11-29','MONO','DULSUS','0'),
 ('1116','1300','0','2016-11-21','OSDE','P1','0'),
 ('1116','3000','0','0000-00-00','PATE','DULMAR','0'),
 ('1116','0','0','0000-00-00','SEGU','DULMAR','0'),
 ('1116','100','0','0000-00-00','SHIG','T1','0'),
 ('1216','1000','0','0000-00-00','ANBP','DULMAR','0'),
 ('1216','100','0','2016-11-21','ANBP','P1','0'),
 ('1216','100','0','2016-11-21','AUT','P1','0'),
 ('1216','2000','0','0000-00-00','BSPS','DULMAR','0'),
 ('1216','150','0','2016-11-21','CLAR','P1','0'),
 ('1216','150','0','0000-00-00','EDEN','DULSUS','0'),
 ('1216','0','0','0000-00-00','GAN','DULMAR','0'),
 ('1216','200','0','2016-11-21','GAS','P1','0'),
 ('1216','0','0','0000-00-00','MJCP','DULMAR','0'),
 ('1216','1300','0','2016-11-21','OSDE','P1','0'),
 ('1216','1200','0','0000-00-00','PATE','DULSUS','0'),
 ('1216','500','0','0000-00-00','SEGU','DULSUS','0');

-- --------------------------------------------------------

-- 
-- Dumping data for table `pago` 
-- 

INSERT INTO `pago` (`idPago`, `valor`, `fecha`, `idPeriodo`, `idObligacion`, `idCliente`, `idBanco`) VALUES ('24','434','2016-08-22','0816','MONO','MARSAI','RP8631'),
 ('25','995','2016-08-22','0816','MONO','MARMAR','RP8631'),
 ('26','576','2016-08-22','0816','MONO','SAIEDU','RP8631'),
 ('27','615','2016-08-22','0816','MONO','BERADR','RP8631'),
 ('28','550','2016-08-22','0816','MONO','BALCLA','RP8631'),
 ('29','1964','2016-08-22','0816','MONO','FLOPAB','RP8631'),
 ('30','651','2016-08-22','0816','MONO','DULSUS','RP8631'),
 ('31','1126','2016-08-22','0816','MONO','DULMAR','RP8631'),
 ('32','1126','2016-08-22','0816','MONO','UGAMYR','RP8631'),
 ('33','256.4','2016-08-22','0816','EDEN','DULSUS','RP8631'),
 ('34','150.13','2016-08-22','0816','EDEN','ESTDUL','RP8631'),
 ('35','36.96','2016-08-22','0816','EDEN','DULDUL','RP8631'),
 ('36','78.27','2016-08-22','0816','EDEN','DULDUL','RP8631'),
 ('38','2359.5','2016-08-17','0716','SHIG','BLACAR','MSM'),
 ('39','245.39','2016-08-17','0716','SHIG','STEJUA','MSM'),
 ('40','704','2016-08-09','0716','MONO','GRALUI','RP8631'),
 ('42','335.79','2016-08-04','0115','ANBP','TORROD','RP8631'),
 ('43','335.79','2016-08-04','0215','ANBP','TORROD','RP8631'),
 ('44','1037.51','2016-08-04','0115','ANGA','TORROD','RP8631'),
 ('45','1037.51','2016-08-04','0215','ANGA','TORROD','RP8631'),
 ('46','704','2016-08-09','0616','MONO','GRALUI','RP8631'),
 ('47','1782.9','2016-08-05','0316','IBR','FERANG','BP9496'),
 ('48','2170.4','2016-08-05','0416','IBR','FERANG','BP9496'),
 ('49','2056.3','2016-08-05','0516','IBR','FERANG','BP9496'),
 ('50','1180.9','2016-08-05','0616','IBR','FERANG','BP9496'),
 ('51','684','2016-08-03','0716','SDOM','PERGUI','PF4759'),
 ('52','684','2016-08-03','0716','SDOM','FIGPAO','PF4759'),
 ('53','96.44','2016-08-04','0816','SEGU','MOLPAT','ED'),
 ('54','204.94','2016-08-24','0716','CSO','MOLPAT','NACGB'),
 ('55','2357.03','2016-08-24','0716','CSO','CALVO','NACGB'),
 ('56','831.22','2016-08-24','0216','CSO','FERANG','NACGB'),
 ('57','887.45','2016-08-24','0316','CSO','FERANG','NACGB'),
 ('58','834.6','2016-08-24','0416','CSO','FERANG','NACGB'),
 ('59','834.6','2016-08-24','0516','CSO','FERANG','NACGB'),
 ('60','1648.72','2016-08-24','0616','CSO','FERANG','NACGB'),
 ('61','471.9','2016-08-17','0716','SHIG','FERANG','MSM'),
 ('62','111','2016-08-04','0816','SEGU','FERANG','ED'),
 ('63','260','2016-08-04','0816','SEGU','CRINOR','ED'),
 ('64','352.26','2016-04-30','0316','SHIG','FERANG','MMA'),
 ('65','481.34','2016-03-21','0216','SHIG','FERANG','MSM'),
 ('66','481.34','2016-04-20','0316','SHIG','FERANG','MSM'),
 ('67','471.9','2016-05-19','0416','SHIG','FERANG','MSM'),
 ('68','111','2016-07-10','0716','SEGU','FERANG','ED'),
 ('69','111','2016-06-10','0616','SEGU','FERANG','ED'),
 ('70','116','2016-05-10','0516','SEGU','FERANG','ED'),
 ('71','115','2016-04-10','0416','SEGU','FERANG','ED'),
 ('72','115','2016-03-10','0316','SEGU','FERANG','ED'),
 ('73','1225.69','2016-08-29','0716','CSO','PERGUI','RP8631'),
 ('74','556.16','2016-08-29','0716','CSO','SINMIG','RP8631'),
 ('75','343.1','2016-08-29','0716','IBR','UGAMYR','BP9496'),
 ('77','754.7','2016-08-29','0716','IBR','BALCLA','BP9496'),
 ('78','551.9','2016-08-29','0716','IBR','FLOPAB','BP9496'),
 ('79','7.08','2016-08-29','0716','IBR','PERFLO','BP9496'),
 ('80','981','2016-08-29','0716','MONO','MAHJOS','RP8631'),
 ('81','132.4','2016-08-29','0716','IBR','LOBLEA','BP9496'),
 ('82','352.9','2016-08-29','0716','IBR','DULDUL','BP9496'),
 ('83','757.4','2016-08-29','0716','IBR','DULMAR','BP9496'),
 ('84','1.7','2016-08-29','0816','MIB','CONEMI','BP9496'),
 ('85','391.5','2016-08-09','0116','IBR','GRALUI','RP8631'),
 ('86','377.3','2016-08-09','0316','IBR','GRALUI','RP8631'),
 ('87','378.9','2016-08-09','0416','IBR','GRALUI','RP8631'),
 ('88','121.9','2016-08-29','0616','IBR','MAZMAR','BP9496'),
 ('89','113.84','2016-08-29','0716','CSO','SINMIG','Z AJUSTE'),
 ('90','147.4','2016-09-02','0716','IBR','BERADR','BP9496'),
 ('91','171','2016-09-02','0916','MJCP','DULMAR','BP9496'),
 ('92','1.17','2016-09-02','0716','IBR','PERMAR','BP9496'),
 ('93','684','2016-09-06','0816','SDOM','FIGPAO','RP8631'),
 ('94','684','2016-09-06','0816','SDOM','PERGUI','RP8631'),
 ('95','1006.4','2016-09-09','0916','PATE','DULMAR','BP9496'),
 ('96','907.6','2016-09-09','0916','PATE','DULSUS','BP9496'),
 ('97','704','2016-09-09','0916','CPBA','DULRAU','BP9496'),
 ('98','675.7','2016-09-09','0916','CPBA','DULRAU','BP9496'),
 ('99','837.4','2016-09-16','0916','TRED','DULMAR','RP990395'),
 ('100','379','2016-09-16','0916','TRED','ESTDUL','RP990395'),
 ('101','55.41','2016-09-16','0916','EDEN','DULMAR','EDENOR'),
 ('102','33809.9','2016-09-16','0416','SHIG','CILJOR','MMA'),
 ('103','2210','2016-09-16','0416','SHIG','CALVO','MMA'),
 ('104','952.13','2016-09-16','0416','SHIG','CALVO','MMA'),
 ('105','214.2','2016-09-16','0916','SHIG','DULSUS','MMA'),
 ('106','1350','2016-09-16','0916','SHIG','DULSUS','MMA'),
 ('107','376.98','2016-09-16','0416','SHIG','FERANG','MMA'),
 ('108','463.56','2016-09-16','0516','SHIG','FERANG','MMA'),
 ('109','455.83','2016-09-16','0616','SHIG','FERANG','MMA'),
 ('110','448.11','2016-09-16','0716','SHIG','FERANG','MMA'),
 ('111','440.38','2016-09-16','0816','SHIG','FERANG','MMA'),
 ('112','394.03','2016-09-16','0916','SHIG','FERANG','MMA'),
 ('113','243.6','2016-09-16','0716','SHIG','MAHJOS','MMA'),
 ('114','239.4','2016-09-16','0816','SHIG','MAHJOS','MMA'),
 ('115','214.2','2016-09-16','0916','SHIG','MAHJOS','MMA'),
 ('116','84.27','2016-09-16','0216','SHIG','TORROD','MMA'),
 ('117','155.04','2016-09-16','0516','SHIG','TORROD','MMA'),
 ('118','152.46','2016-09-16','0616','SHIG','TORROD','MMA'),
 ('119','149.87','2016-09-16','0716','SHIG','TORROD','MMA'),
 ('120','147.29','2016-09-16','0816','SHIG','TORROD','MMA'),
 ('121','131.78','2016-09-16','0916','SHIG','TORROD','MMA'),
 ('122','247.42','2016-09-16','0416','SHIG','TORROD','MMA'),
 ('123','304.2','2016-09-16','0516','SHIG','TORROD','MMA'),
 ('124','299.13','2016-09-16','0616','SHIG','TORROD','MMA'),
 ('125','294.06','2016-09-16','0716','SHIG','TORROD','MMA'),
 ('126','288.99','2016-09-16','0816','SHIG','TORROD','MMA'),
 ('127','258.57','2016-09-16','0916','SHIG','TORROD','MMA'),
 ('128','576','2016-09-20','0916','MONO','SAIEDU','RP8631'),
 ('129','434','2016-09-20','0916','MONO','MARSAI','RP8631'),
 ('130','995','2016-09-20','0916','MONO','MARMAR','RP8631'),
 ('131','1126','2016-09-20','0916','MONO','UGAMYR','RP8631'),
 ('132','651','2016-09-20','0916','MONO','DULSUS','RP8631'),
 ('133','1126','2016-09-20','0916','MONO','DULMAR','RP8631'),
 ('134','981','2016-09-20','0916','MONO','MAHJOS','RP8631'),
 ('135','615','2016-09-20','0916','MONO','BERADR','RP8631'),
 ('136','322.9','2016-09-21','0816','IBR','UGAMYR','BP9496'),
 ('137','288','2016-09-21','0816','IBR','CAMJUL','BP9496'),
 ('138','723','2016-09-21','0816','IBR','DULMAR','BP9496'),
 ('139','135.2','2016-09-21','0816','IBR','LOBLEA','BP9496'),
 ('140','349.9','2016-09-21','0816','IBR','DULDUL','BP9496'),
 ('141','2359.5','2016-08-17','0716','SHIG','CALVO','MSM'),
 ('142','550.23','2016-09-21','0616','SHIG','FERANG','MSM'),
 ('143','531.8','2016-09-21','0816','SHIG','FERANG','MSM'),
 ('144','250.3','2016-09-21','0816','SHIG','STEJUA','MSM'),
 ('145','2554.55','2016-09-21','0816','SHIG','BLACAR','MSM'),
 ('147','2850.8','2016-09-21','0816','IVA','CATCAR','RP8631'),
 ('148','981','2016-09-21','0816','MONO','MAHJOS','RP8631'),
 ('149','297.37','2016-09-21','0916','CLAR','DULALE','RP8631'),
 ('150','2437','2016-09-21','0916','OSDE','DULALE','RP8631'),
 ('151','142.88','2016-09-21','0916','EDEN','ESTDUL','RP8631'),
 ('152','235.04','2016-09-21','0916','EDEN','DULSUS','RP8631'),
 ('153','68.43','2016-09-21','0916','EDEN','DULDUL','RP8631'),
 ('154','32.05','2016-09-21','0916','EDEN','DULDUL','RP8631'),
 ('155','1964','2016-09-22','0916','MONO','FLOPAB','RP8631'),
 ('156','550','2016-09-22','0916','MONO','BALCLA','RP8631'),
 ('157','90','2016-09-22','0916','SHIG','DULSUS','MMA'),
 ('158','1273.44','2016-09-22','0416','SHIG','VALYAN','MMA'),
 ('159','414.8','2016-09-22','0716','IBR','FERANG','BP9496'),
 ('160','774.1','2016-09-22','0816','IBR','FLOPAB','BP9496'),
 ('161','764.6','2016-09-22','0816','IBR','BALCLA','BP9496'),
 ('162','8','2016-09-22','0816','IBR','PERFLO','BP9496'),
 ('163','0.9','2016-09-22','0816','IBR','PERMAR','BP9496'),
 ('164','2.7','2016-09-22','0816','IBR','PERMAR','BP9496'),
 ('165','2359.5','2016-09-21','0816','SHIG','CALVO','MSM'),
 ('166','565.43','2016-09-23','0916','TELE','ESTDUL','RP8631'),
 ('167','898.53','2016-09-23','1115','CSO','MOLPAT','RP8631'),
 ('168','200','2016-10-03','1016','MJCP','DULMAR','ED'),
 ('169','100','2016-10-05','1016','EDEN','DULSUS','PF4759');

-- --------------------------------------------------------

-- 
-- Dumping data for table `recibo` 
-- 

INSERT INTO `recibo` (`nroRecibo`, `anulado`, `username`, `fecha`, `comentario`) VALUES ('15','1','nicolas','2016-10-03',' '),
 ('16','0','nicolas','2016-10-03',' '),
 ('17','0','nicolas','2016-10-03',' '),
 ('18','1','empleado','2016-10-03',' '),
 ('19','1','nicolas','2016-10-05',' '),
 ('20','0','nicolas','2016-10-05',' '),
 ('21','0','nicolas','2016-10-05',' '),
 ('22','0','nicolas','2016-10-07',' '),
 ('23','0','nicolas','2016-10-07',' '),
 ('24','0','nicolas','2016-10-08',' '),
 ('25','0','nicolas','2016-11-19',' '),
 ('26','0','nicolas','2016-11-19',' '),
 ('27','0','nicolas','2016-11-21',' '),
 ('28','0','nicolas','2016-11-21',' '),
 ('29','0','nicolas','2016-11-21',' '),
 ('30','0','nicolas','2016-11-21','0123456789 0123456789 0123456789 0123456789 0123456789 0123456789 0123456789 0123456789 0123456789 0123456789 0123456789 0123456789 0123456789 0123456789 0123456789 0123456789 0123456789 0123456789 01'),
 ('31','0','nicolas','2016-11-21','Mi comentario');

-- --------------------------------------------------------

-- 
-- Dumping data for table `usuario` 
-- 

INSERT INTO `usuario` (`username`, `password`, `tipoUsuario`) VALUES ('empleado','088ef99bff55c67dc863f83980a66a9b','3'),
 ('marcelo','fbc8c69cb6ee8ae8f9c134b4c8478f49','0'),
 ('nicolas','a6bd9e1db71dc726909e68c69b7f3697','0');

-- --------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 1;

-- ------------
-- FOREIGN KEYS
-- ------------
SET FOREIGN_KEY_CHECKS = 0;

SET FOREIGN_KEY_CHECKS = 1;
