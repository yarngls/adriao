-- BASE DE DADOS
-- CREATE DATABASE ORCADB;

-- -- -- USAR A BASE DE DADOS
-- USE ORCADB;

-- USER
/*CREATE TABLE TBLUser (
	userid 	   INT(2)      NOT NULL,
	username   VARCHAR(30) NOT NULL, 
	password   VARCHAR(20) NOT NULL,
	firstname  VARCHAR(20) NOT NULL,
	lastname   VARCHAR(20) NOT NULL,
	sex        VARCHAR(1)  NOT NULL,
	email      VARCHAR(99),
	usertype   INT(1)      NOT NULL,
	userstate  INT(1)      NOT NULL DEFAULT 1,
	photo      VARCHAR(30),
	PRIMARY KEY(userid)
)ENGINE=InnoDB;

-- PRODUTO
CREATE TABLE TBLProduto (
	produtoid        INT(11)      NOT NULL,
	produtobarcode   BLOB,
	produtoname      VARCHAR(60)  NOT NULL,
	produtocategorie VARCHAR(60)  NOT NULL,
	produtoype       INT(2) NOT   NULL,
	produtoprecounit DECIMAL(10,2)NOT NULL DEFAULT 0,
	produtoIVA       DECIMAL(4,2) NOT NULL DEFAULT 0,
	PRIMARY KEY(produtoid)
)ENGINE=InnoDB;

-- CLIENTE
CREATE TABLE TBLCliente (
	clienteid     INT(11)     NOT NULL,
	clientename   VARCHAR(60) NOT NULL,
	clientemorada VARCHAR(60),
	clientephone  VARCHAR(20),
	clientemail   VARCHAR(60),
	clienteNIF    INT(20)     NOT NULL,
	clientetype   INT(2)      DEFAULT 1,
	PRIMARY KEY(clienteid)
)ENGINE=InnoDB;
-- OBS: Clientetype: 1-Particular e 2-Estado

-- FACTURA
CREATE TABLE TBLFactura (
	facturaid     INT(11)      NOT NULL,
	clienteid     INT(11)      NOT NULL,
	facturadata	  DATETIME     NOT NULL,
	facturano     INT(11)      NOT NULL,
	facturaserie  INT(11)      NOT NULL,
	facturatype   INT(2) NOT   NULL DEFAULT 1,
	facturaestado INT(2) NOT   NULL DEFAULT 1,	
	facturadesc   DECIMAL(5,3) NOT NULL DEFAULT 0,	
	facturavalor  DECIMAL(10,2)NOT NULL DEFAULT 0,
	userid 	      INT(2)       NOT NULL,
	PRIMARY KEY(facturaid),
	FOREIGN KEY(clienteid)REFERENCES TBLCliente(clienteid),
	FOREIGN KEY(userid)REFERENCES TBLUser(userid)
)ENGINE=InnoDB;

-- LINHA FACTURA OBS: Os Artigos da Factura
CREATE TABLE TBLFacturaLinha (
	facturalinhaid INT(11)      NOT NULL,
	facturaid      INT(11)      NOT NULL,
	produtoid      INT(11)      NOT NULL,
	quantidade     INT(3)       NOT NULL,
	desconto       DECIMAL(5,3) NOT NULL DEFAULT 0,
	total          DECIMAL(10,2)NOT NULL DEFAULT 0,
	PRIMARY KEY(facturalinhaid),
	FOREIGN KEY(facturaid)REFERENCES TBLFactura(facturaid),
	FOREIGN KEY(produtoid)REFERENCES TBLProduto(produtoid)
)ENGINE=InnoDB;