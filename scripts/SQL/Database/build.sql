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
 KEY `roleId` (`roleId`),
 CONSTRAINT `fk_constraint_User_On_Role` FOREIGN KEY (`roleId`) REFERENCES `PrivilegeRole` (`roleId`) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS Folder;
CREATE TABLE `Folder` (
 `folderId` int(5) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `summary` text,
 `visibility` varchar(8) NOT NULL DEFAULT 'visible',
 `ownerId` int(15) DEFAULT NULL,
 `parentId` int(5) DEFAULT NULL,
 PRIMARY KEY (`folderId`),
 KEY `parentId` (`parentId`),
 KEY `ownerId` (`ownerId`),
 CONSTRAINT `FK_CONSTRAINT_OWNER_USERID` FOREIGN KEY (`ownerId`) REFERENCES `Users` (`userId`) ON DELETE SET NULL ON UPDATE NO ACTION,
 CONSTRAINT `FK_CONSTRAINT_PARENT_FOLDER` FOREIGN KEY (`parentId`) REFERENCES `Folder` (`folderId`) ON DELETE SET NULL ON UPDATE NO ACTION
)

DROP TABLE IF EXISTS Article;
CREATE TABLE `Article` (
 `articleId` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
 `publicationDate` date DEFAULT NULL,
 `title` varchar(255) NOT NULL,
 `summary` text NOT NULL,
 `content` mediumtext NOT NULL,
 `ownerId` int(15) DEFAULT NULL,
 `folderId` int(5) DEFAULT NULL,
 PRIMARY KEY (`articleId`),
 KEY `folderId` (`folderId`),
 KEY `ownerId` (`ownerId`),
 CONSTRAINT `fk_constraint_ownerId` FOREIGN KEY (`ownerId`) REFERENCES `Users` (`userId`) ON DELETE SET NULL ON UPDATE CASCADE,
 CONSTRAINT `fk_constraint_folderId` FOREIGN KEY (`folderId`) REFERENCES `Folder` (`folderId`) ON DELETE SET NULL ON UPDATE CASCADE
) 

