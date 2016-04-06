DROP DATABASE IF EXISTS Website;
CREATE DATABASE Website;

use Website;

DROP TABLE IF EXISTS PrivilegeRole;
CREATE TABLE PrivilegeRole (
 `roleId` int(15) NOT NULL AUTO_INCREMENT,
 `role` varchar(31) NOT NULL,
 PRIMARY KEY (`roleId`),
 UNIQUE KEY `role` (`role`)
);

DROP TABLE IF EXISTS Users;
CREATE TABLE Users (
 `userId` int(15) NOT NULL AUTO_INCREMENT,
 `username` varchar(65) NOT NULL,
 `password` varchar(65) NOT NULL,
 `joinDate` datetime DEFAULT NULL,
 `roleId` int(15) NOT NULL DEFAULT '2',
 PRIMARY KEY (`userId`),
 UNIQUE KEY `username` (`username`),
 KEY `role` (`roleId`),
 KEY `role_2` (`roleId`),
 KEY `roleId` (`roleId`),
 CONSTRAINT `fk_constraint_User_On_Role` FOREIGN KEY (`roleId`) REFERENCES `PrivilegeRole` (`roleId`) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS ArticleCategory;
CREATE TABLE ArticleCategory (
 `id` int(5) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `summary` text,
 PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS Articles;
CREATE TABLE Articles (
 `articleId` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
 `publicationDate` date DEFAULT NULL,
 `title` varchar(255) NOT NULL,
 `summary` text NOT NULL,
 `content` mediumtext NOT NULL,
 `category` int(5) DEFAULT NULL,
 PRIMARY KEY (`articleId`),
 KEY `category` (`category`),
 CONSTRAINT `fk_constraint_categoryId` FOREIGN KEY (`category`) REFERENCES `ArticleCategory` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
);

