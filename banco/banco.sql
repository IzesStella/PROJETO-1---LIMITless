
CREATE DATABASE `sistema_limitless`;

USE `sistema_limitless`;

CREATE TABLE `usuarios` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(100) NOT NULL,
  `EMAIL` VARCHAR(100) NOT NULL,
  `TELEFONE` VARCHAR(14) NOT NULL,
  `BAIRRO` VARCHAR(100) NOT NULL,
  `USER` VARCHAR(100) NOT NULL,
  `SENHA` VARCHAR(100) NOT NULL,
  `PATH_USUARIO` VARCHAR(255),
  PRIMARY KEY (`ID`)
);

CREATE TABLE `produtos` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(100) NOT NULL,
  `TAMANHO` VARCHAR(10) NOT NULL, 
  `COR` VARCHAR(20) NOT NULL,
  `ESTADO_PROD` VARCHAR(20) NOT NULL,
  `USUARIO_ID` INT,
  `PATH_PRODUTO` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`ID`),
  FOREIGN KEY (USUARIO_ID) REFERENCES USUARIOS(ID)
);

