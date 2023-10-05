-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.27-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema dbcadastro
--

CREATE DATABASE IF NOT EXISTS dbcadastro;
USE dbcadastro;

--
-- Definition of table `tbartesart`
--

DROP TABLE IF EXISTS `tbartesart`;
CREATE TABLE `tbartesart` (
  `idartesArt` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idvendedor` int(10) unsigned NOT NULL,
  `imgArte` varchar(50) NOT NULL,
  `titulo` varchar(240) NOT NULL,
  `descArte` longtext NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idartesArt`,`idvendedor`) USING BTREE,
  KEY `FK_tbartesart_tbvendedor` (`idvendedor`),
  CONSTRAINT `FK_tbartesart_tbvendedor` FOREIGN KEY (`idvendedor`) REFERENCES `tbvendedor` (`idvendedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbartesart`
--

/*!40000 ALTER TABLE `tbartesart` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbartesart` ENABLE KEYS */;


--
-- Definition of table `tbartesvend`
--

DROP TABLE IF EXISTS `tbartesvend`;
CREATE TABLE `tbartesvend` (
  `idartesvend` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idvendedor` int(10) unsigned NOT NULL,
  `imgarte` text NOT NULL,
  `titulo` text NOT NULL,
  `descricao` longtext NOT NULL,
  `valor` double NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `copias` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idartesvend`,`idvendedor`),
  KEY `FK_tbartesvend_tbvendedor` (`idvendedor`),
  CONSTRAINT `FK_tbartesvend_tbvendedor` FOREIGN KEY (`idvendedor`) REFERENCES `tbvendedor` (`idvendedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbartesvend`
--

/*!40000 ALTER TABLE `tbartesvend` DISABLE KEYS */;
INSERT INTO `tbartesvend` (`idartesvend`,`idvendedor`,`imgarte`,`titulo`,`descricao`,`valor`,`ativo`,`copias`) VALUES 
 (1,1,'zashye/arte1.jpg','OC','Estou começando a vender minhas artes online, então comecei com um OC!',68,'A',89),
 (2,2,'jov/arte1.png','Dio  Brando','Desenho feito para uma collab no instagram de \"Personagnes Preferidos\"',76,'A',45),
 (3,3,'felps/arte1.png','Felps','Desenhinho do liver Felps que foi feito como presentinho de aniversário :D',35,'A',4),
 (4,4,'moss/arte1.png','OC','Um dos muitos e muitos redraws do meu OC/Icon eba eba eba :]',0,'A',78),
 (5,2,'jov/arte2.png','Hanako','Desenho feito a mão do Hanako de \"Jibaku Shounen Hanako-Kun\". Demorei séculos pra fazêlo.',67,'A',56),
 (6,2,'jov/arte3.png','Miruko','Desenho da Miruko de \"Boku no Hero Academia\". Ficou esquecido no baú por um tempo.',94,'A',87),
 (7,4,'moss/arte2.png','felps (?)','Fursona do felps feito puramente na brincadeirinha kkkkkkk por que não? (socorro)',34,'A',45),
 (8,4,'moss/arte3.jpg','Paulo Ventura','Personagem do felps no rpg \"OrdemNormal\" feito pelo André Felipe 61 MeiaUm',59,'A',84);
/*!40000 ALTER TABLE `tbartesvend` ENABLE KEYS */;


--
-- Definition of table `tbcarrinho`
--

DROP TABLE IF EXISTS `tbcarrinho`;
CREATE TABLE `tbcarrinho` (
  `idcarrinho` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idusuario` int(10) unsigned NOT NULL,
  `idartesvend` int(10) unsigned NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `qtdd` int(10) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`idcarrinho`,`idusuario`,`idartesvend`),
  KEY `FK_tbcarrinho_tbusuario` (`idusuario`),
  KEY `FK_tbcarrinho_tbartesvend` (`idartesvend`),
  CONSTRAINT `FK_tbcarrinho_tbartesvend` FOREIGN KEY (`idartesvend`) REFERENCES `tbartesvend` (`idartesvend`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbcarrinho_tbusuario` FOREIGN KEY (`idusuario`) REFERENCES `tbusuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbcarrinho`
--

/*!40000 ALTER TABLE `tbcarrinho` DISABLE KEYS */;
INSERT INTO `tbcarrinho` (`idcarrinho`,`idusuario`,`idartesvend`,`ativo`,`qtdd`) VALUES 
 (8,2,3,'A',1);
/*!40000 ALTER TABLE `tbcarrinho` ENABLE KEYS */;


--
-- Definition of table `tbpagamento`
--

DROP TABLE IF EXISTS `tbpagamento`;
CREATE TABLE `tbpagamento` (
  `idpagamento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idtipopag` int(10) unsigned NOT NULL,
  `valor` double NOT NULL,
  `numCard` varchar(45) DEFAULT NULL,
  `numCardT` varchar(45) DEFAULT NULL,
  `vencimento` varchar(45) DEFAULT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idpagamento`,`idtipopag`) USING BTREE,
  KEY `FK_tbpagamento_1` (`idtipopag`),
  CONSTRAINT `FK_tbpagamento_1` FOREIGN KEY (`idtipopag`) REFERENCES `tbtipopag` (`idtipopag`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbpagamento`
--

/*!40000 ALTER TABLE `tbpagamento` DISABLE KEYS */;
INSERT INTO `tbpagamento` (`idpagamento`,`idtipopag`,`valor`,`numCard`,`numCardT`,`vencimento`,`ativo`) VALUES 
 (1,3,50,NULL,NULL,NULL,'A'),
 (2,1,68,NULL,NULL,NULL,'A');
/*!40000 ALTER TABLE `tbpagamento` ENABLE KEYS */;


--
-- Definition of table `tbpedidos`
--

DROP TABLE IF EXISTS `tbpedidos`;
CREATE TABLE `tbpedidos` (
  `idpedidos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idusuario` int(10) unsigned NOT NULL,
  `idvendedor` int(10) unsigned NOT NULL,
  `idpagamento` int(10) unsigned NOT NULL,
  `prodEsc` varchar(25) NOT NULL,
  `descricao` longtext NOT NULL,
  `statu` char(1) NOT NULL DEFAULT 'P',
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idpedidos`,`idusuario`,`idvendedor`,`idpagamento`) USING BTREE,
  KEY `FK_tbpedidos_1` (`idusuario`),
  KEY `FK_tbpedidos_2` (`idvendedor`,`idusuario`),
  KEY `FK_tbpedidos_3` (`idpagamento`),
  CONSTRAINT `FK_tbpedidos_1` FOREIGN KEY (`idusuario`) REFERENCES `tbusuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbpedidos_2` FOREIGN KEY (`idvendedor`) REFERENCES `tbvendedor` (`idvendedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbpedidos_3` FOREIGN KEY (`idpagamento`) REFERENCES `tbpagamento` (`idpagamento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbpedidos`
--

/*!40000 ALTER TABLE `tbpedidos` DISABLE KEYS */;
INSERT INTO `tbpedidos` (`idpedidos`,`idusuario`,`idvendedor`,`idpagamento`,`prodEsc`,`descricao`,`statu`,`ativo`) VALUES 
 (1,1,1,1,'Busto','Quero um desenho do personagem Albedo do jogo Genshin Impact. Pode ter total liberdade para fazer o estilo que quiser, amo seu traço de qualquer jeito.','P','A');
/*!40000 ALTER TABLE `tbpedidos` ENABLE KEYS */;


--
-- Definition of table `tbpedidosarte`
--

DROP TABLE IF EXISTS `tbpedidosarte`;
CREATE TABLE `tbpedidosarte` (
  `idpedidosarte` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idartesvend` int(10) unsigned NOT NULL,
  `idpagamento` int(10) unsigned NOT NULL,
  `descPedido` longtext NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `idusuario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idpedidosarte`,`idartesvend`,`idpagamento`,`idusuario`) USING BTREE,
  KEY `FK_tbpedidosarte_tbartesvend` (`idartesvend`),
  KEY `FK_tbpedidosarte_tbpagamento` (`idpagamento`),
  KEY `FK_tbpedidosarte_tbusuario` (`idusuario`),
  CONSTRAINT `FK_tbpedidosarte_tbartesvend` FOREIGN KEY (`idartesvend`) REFERENCES `tbartesvend` (`idartesvend`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbpedidosarte_tbpagamento` FOREIGN KEY (`idpagamento`) REFERENCES `tbpagamento` (`idpagamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbpedidosarte_tbusuario` FOREIGN KEY (`idusuario`) REFERENCES `tbusuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbpedidosarte`
--

/*!40000 ALTER TABLE `tbpedidosarte` DISABLE KEYS */;
INSERT INTO `tbpedidosarte` (`idpedidosarte`,`idartesvend`,`idpagamento`,`descPedido`,`ativo`,`idusuario`) VALUES 
 (1,1,2,'Amo seus desenhos demais mwah mwah mwah toma meu dinheiro','A',4);
/*!40000 ALTER TABLE `tbpedidosarte` ENABLE KEYS */;


--
-- Definition of table `tbtipopag`
--

DROP TABLE IF EXISTS `tbtipopag`;
CREATE TABLE `tbtipopag` (
  `idtipopag` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipopag` varchar(45) NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idtipopag`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbtipopag`
--

/*!40000 ALTER TABLE `tbtipopag` DISABLE KEYS */;
INSERT INTO `tbtipopag` (`idtipopag`,`tipopag`,`ativo`) VALUES 
 (1,'Pix','A'),
 (2,'Débito','A'),
 (3,'Crédito','A'),
 (4,'Boleto','A');
/*!40000 ALTER TABLE `tbtipopag` ENABLE KEYS */;


--
-- Definition of table `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
CREATE TABLE `tbusuario` (
  `idusuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `senha` varchar(25) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(60) NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbusuario`
--

/*!40000 ALTER TABLE `tbusuario` DISABLE KEYS */;
INSERT INTO `tbusuario` (`idusuario`,`nome`,`senha`,`cpf`,`email`,`ativo`) VALUES 
 (1,'felpstired','felps@428','405.198.684-34','felpstired@gmail.com','A'),
 (2,'Zashye','Zash@Artist0315','265.194.266-97','zashyeartist@gmail.com','A'),
 (4,'ana','1234','123.123.123-12','analu@gmail.com','A'),
 (5,'jov','gio1234','432.232.855-34','giojov@gmail.com','A'),
 (6,'thwmoss','thwmoss@felps','124.653.973-90','mossthw@gmail.com','A');
/*!40000 ALTER TABLE `tbusuario` ENABLE KEYS */;


--
-- Definition of table `tbvendedor`
--

DROP TABLE IF EXISTS `tbvendedor`;
CREATE TABLE `tbvendedor` (
  `idvendedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idusuario` int(10) unsigned NOT NULL,
  `totalCom` int(10) unsigned NOT NULL,
  `totalAval` int(10) unsigned NOT NULL,
  `mediaAval` double NOT NULL,
  `fotoVend` text NOT NULL,
  `descVend` longtext NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idvendedor`,`idusuario`) USING BTREE,
  KEY `FK_tbvendedor_1` (`idusuario`),
  CONSTRAINT `FK_tbvendedor_1` FOREIGN KEY (`idusuario`) REFERENCES `tbusuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbvendedor`
--

/*!40000 ALTER TABLE `tbvendedor` DISABLE KEYS */;
INSERT INTO `tbvendedor` (`idvendedor`,`idusuario`,`totalCom`,`totalAval`,`mediaAval`,`fotoVend`,`descVend`,`ativo`) VALUES 
 (1,2,346,163,5,'zashye/logo.png','₊‧° 21yo artist | BR / EN °‧₊<br><br>Illustrations | Icons | Emotes | Overlays | Live2D Models','A'),
 (2,5,226,78,4.9,'jov/logo.png','₊‧° 17yo artist | BR °‧₊<br><br>Desenhos manuais e digitais feitos com bastante cuidado e carinho! ','A'),
 (3,1,46,12,3,'felps/logo.png','₊‧° 18yo artist | BR °‧₊<br><br>Eu tento desenhar de vez em quando.','A'),
 (4,6,297,217,4.9,'moss/logo.jpg','₊‧° 20yo artist | BR °‧₊<br><br>Ilustradora digital e freelancer :)<br>a/ela/-a','A');
/*!40000 ALTER TABLE `tbvendedor` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
