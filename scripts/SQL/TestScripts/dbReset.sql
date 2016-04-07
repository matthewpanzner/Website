INSERT INTO PrivilegeRole VALUES (1, 'user');
INSERT INTO PrivilegeRole VALUES (2, 'admin');

INSERT INTO Users (username, password, roleId) VALUES ("root", "", 2);