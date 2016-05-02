INSERT INTO Article (publicationDate, title, summary, content, visibility, ownerId, folderId) VALUES ('2016-05-02', 'test', 'test', 'test
', 'visible', '1', '5');
INSERT INTO Folder (name, summary, visibility, ownerId, parentId) VALUES ('sub1', 'test', 'visible', '1', '5');
DELETE FROM Folder WHERE folderId='24';
DELETE FROM Article WHERE articleId='16' ;
