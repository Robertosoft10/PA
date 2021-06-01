-- TABLE: tb_clients
CREATE TABLE `tb_clients` (
  `clientId` int(11) NOT NULL AUTO_INCREMENT,
  `clientname` varchar(255) DEFAULT NULL,
  `clientfone` varchar(30) DEFAULT NULL,
  `clientlocal` varchar(900) DEFAULT NULL,
  `clientemail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`clientId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
INSERT INTO `tb_clients` (`clientId`, `clientname`, `clientfone`, `clientlocal`, `clientemail`) VALUES ('1', 'ERI', '', 'QUIPAPÃ', '');
INSERT INTO `tb_clients` (`clientId`, `clientname`, `clientfone`, `clientlocal`, `clientemail`) VALUES ('2', 'CLEBER', '', 'QUIPAPÃ', '');
INSERT INTO `tb_clients` (`clientId`, `clientname`, `clientfone`, `clientlocal`, `clientemail`) VALUES ('3', 'PROFESSOR SOBRA', '', 'LAGOA DOS GATOS', '');
INSERT INTO `tb_clients` (`clientId`, `clientname`, `clientfone`, `clientlocal`, `clientemail`) VALUES ('4', 'BABY', '', 'QUIPAPÃ', '');

-- TABLE: tb_ped_artes
CREATE TABLE `tb_ped_artes` (
  `pdarteId` int(11) NOT NULL AUTO_INCREMENT,
  `idClient` int(11) DEFAULT NULL,
  `arttipo` varchar(255) DEFAULT NULL,
  `artdescrition` varchar(900) DEFAULT NULL,
  `artentreg` varchar(100) DEFAULT NULL,
  `artvalue` varchar(50) DEFAULT NULL,
  `artestatus` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pdarteId`),
  KEY `idClient` (`idClient`),
  CONSTRAINT `tb_ped_artes_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `tb_clients` (`clientId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
INSERT INTO `tb_ped_artes` (`pdarteId`, `idClient`, `arttipo`, `artdescrition`, `artentreg`, `artvalue`, `artestatus`) VALUES ('1', '1', 'Impressa', 'Criar um banner para manucure e pedicure tamanho 60x40', '20/05/2021', '32', '3');
INSERT INTO `tb_ped_artes` (`pdarteId`, `idClient`, `arttipo`, `artdescrition`, `artentreg`, `artvalue`, `artestatus`) VALUES ('2', '1', 'Desenho', 'Pinturas sobre tela cavalos ', 'NÃ£o definido', '300', '1');
INSERT INTO `tb_ped_artes` (`pdarteId`, `idClient`, `arttipo`, `artdescrition`, `artentreg`, `artvalue`, `artestatus`) VALUES ('3', '2', 'Digital', 'Criar logomarca para empresa dele, gesso e um panfleto', '29/05/2021', '60', '3');
INSERT INTO `tb_ped_artes` (`pdarteId`, `idClient`, `arttipo`, `artdescrition`, `artentreg`, `artvalue`, `artestatus`) VALUES ('4', '3', 'Digital', 'Criar um arte de divulgaÃ§Ã£o para seu evento', '14/04/2021', '70', '3');
INSERT INTO `tb_ped_artes` (`pdarteId`, `idClient`, `arttipo`, `artdescrition`, `artentreg`, `artvalue`, `artestatus`) VALUES ('5', '4', 'Impressa', 'Criar um banner para lanches', '12/004/021', '32', '3');

-- TABLE: tb_users
CREATE TABLE `tb_users` (
  `useId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `useremail` varchar(255) DEFAULT NULL,
  `usernivel` int(11) DEFAULT NULL,
  `userpassword` varchar(255) DEFAULT NULL,
  `userimage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`useId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
INSERT INTO `tb_users` (`useId`, `username`, `useremail`, `usernivel`, `userpassword`, `userimage`) VALUES ('1', 'Admin', 'admin@sistemapedido.com.br', '1', 'd033e22ae348aeb5660fc2140aec35850c4da997', '0f439505ae6f7177c835647df370138e46b7e80c');
INSERT INTO `tb_users` (`useId`, `username`, `useremail`, `usernivel`, `userpassword`, `userimage`) VALUES ('2', 'Roberto', 'roberto_silva-@hotmail.com', '1', '8cb2237d0679ca88db6464eac60da96345513964', 'abc6f4af91d995fa181477ca02c428ac1238bb72.jpg');

