CREATE DATABASE db_ped_arte;
USE db_ped_arte;


CREATE TABLE tb_users(
	useId   int not null auto_increment primary key,
	username varchar (100),
	useremail varchar(255),
	usernivel int,
	userpassword varchar(255),
	userimage varchar(255)
);
CREATE TABLE tb_clients(
	clientId  int not null auto_increment primary key,
	clientname varchar (255),
	clientfone varchar(30),
	clientlocal varchar(900),
	clientemail varchar(255)
);
CREATE TABLE tb_ped_artes(
	pdarteId int not null auto_increment primary key,
	idClient int,
	arttipo varchar (255),
	artdescrition varchar(900),
	artentreg varchar(100),
	artvalue varchar(50),
	artestatus varchar(20),
    FOREIGN KEY (idClient) REFERENCES tb_clients (clientId)
);
