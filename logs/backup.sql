INSERT INTO ArticleCategory (name, summary) VALUES ("Main_Test_001", "Testing");
INSERT INTO ArticleCategory (name, summary) VALUES ("Math", "Mathematical stuff");
INSERT INTO ArticleCategory (name, summary) VALUES ("Programming", "C++ and more");
INSERT INTO ArticleCategory (name, summary) VALUES ("Games", "About games and stuff");

INSERT INTO Articles (title, summary, content, category) VALUES ("Game1", "xxx", "zzz", 4);
INSERT INTO Articles (title, summary, content, category) VALUES ("Game2", "xxx", "zzz", 4);
INSERT INTO Articles (title, summary, content, category) VALUES ("Math1", "xxx", "zzz", 2);
INSERT INTO Articles (title, summary, content, category) VALUES ("Math2", "xxx", "zzz", 2);
INSERT INTO Articles (title, summary, content, category) VALUES ("Math3", "xxx", "zzz", 2);
INSERT INTO Articles (title, summary, content, category) VALUES ("Test1", "xxx", "zzz", 1);
INSERT INTO Articles (title, summary, content, category) VALUES ("Test2", "<a href='#'>encode/decode</a>", "zzz", 1);
INSERT INTO Articles (title, summary, content, category) VALUES ("Test3", "ovveerrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrflow", "zzz", 1);
INSERT INTO Articles (title, summary, content, category) VALUES ("Test4", "xxx", "<p>This</p><p>Tests</p><p>Auto</p><p>Sizing</p><p>!</p>", 1);

INSERT INTO PrivilegeRole VALUES (1, 'user');
INSERT INTO PrivilegeRole VALUES (2, 'admin');

INSERT INTO Users (username, password, roleId) VALUES ("root", "", 2);
INSERT INTO Articles (publicationDate, title, summary, content, category) VALUES ('2016-04-07', 'Backup Test', '...', '...
', '1');