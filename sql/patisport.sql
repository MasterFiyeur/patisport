DROP DATABASE IF EXISTS `patisport`;
CREATE DATABASE `patisport`;
USE `patisport`;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(64) NOT NULL,
  `label` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `produits`;
CREATE TABLE `produits` ( 
  `ref` VARCHAR(5) NOT NULL,
  `img` VARCHAR(128),
  `stock` INT(9), 
  `label` VARCHAR(128), 
  `prix` FLOAT(5,2), 
  `categorie` VARCHAR(128),
  PRIMARY KEY (`ref`),
  FOREIGN KEY (categorie) REFERENCES categories(categorie)
);
