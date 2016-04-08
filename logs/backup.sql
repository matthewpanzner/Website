INSERT INTO PrivilegeRole VALUES (1, 'user');
INSERT INTO PrivilegeRole VALUES (2, 'admin');

INSERT INTO Users (username, password, roleId) VALUES ("root", "", 2);
INSERT INTO ArticleCategory (name, summary) VALUES ('Mathematics', 'All my standalone Math activities.');
INSERT INTO ArticleCategory (name, summary) VALUES ('Programming', 'My programming adventures');
INSERT INTO ArticleCategory (name, summary) VALUES ('Misc.', 'Random Stuff');
INSERT INTO Articles (publicationDate, title, summary, content, category) VALUES ('2016-04-07', 'First Article', 'This is the first article that I&#039;m writing using an alpha version of this web app.', '&lt;h3&gt;How I implemented it&lt;/h3&gt;

&lt;p&gt;This website was implemented by using an MVC type of framework.  It&#039;s not entirely an MVC, but I built it how I felt would get the job done effectively.  The idea was to have a site to put my resume and showcase a little bit of my portfolio, or a portfolio itself.  Currently there are many things in which need to be done.

  &lt;ul&gt;
    &lt;li&gt;Sub-Categories&lt;/li&gt;
    &lt;li&gt;About Page and special layout for it&lt;/li&gt;
    &lt;li&gt;More Security&lt;/li&gt;
    &lt;li&gt;More robust article system/parser&lt;/li&gt;
    &lt;li&gt;Edit and Delete article information in admin&lt;/li&gt;
    &lt;li&gt;Contact information&lt;/li&gt;
    &lt;li&gt;Adding javascript to articles&lt;/li&gt;
    &lt;li&gt;And a lot more boring stuff&lt;/li&gt;
    &lt;li&gt;Source code clean up (back-end and front-end)&lt;/li&gt;
    &lt;li&gt;Added comments&lt;/li&gt;
  &lt;/ul&gt;

So there&#039;s much more to be done for the web application, and hopefully I can get to them over the next few months.&lt;/p&gt;

&lt;p&gt;However, I also need to add actual content.  Content I wish to discuss on this includes:

  &lt;ul&gt;
    &lt;li&gt;Math tutorials and exploration&lt;/li&gt;
    &lt;li&gt;Programming tutorials from beginner to advanced&lt;/li&gt;
    &lt;li&gt;Possibly language-oriented things&lt;/li&gt;
    &lt;li&gt;Hardware implementations&lt;/li&gt;
  &lt;/ul&gt;

Hopefully I can get to these soon since I have a working model.&lt;/p&gt;

&lt;p&gt;For now that is all.  This article is to test the basics.  It requires the use of html tags, and I used rudimentary ones to get a feel for it.  If all goes well, everything encoded and decoded properly.&lt;/p&gt;

&lt;p&gt;Anddd for the sake of testing, &lt;a href=&quot;index.php&quot;&gt;this&lt;/a&gt; should take you to the home page.

-Matthew Panzner 
', '3');
INSERT INTO Articles (publicationDate, title, summary, content, category) VALUES ('2016-04-07', 'Test', '&lt;a href=&quot;#&quot;&gt;Works?&lt;/a&gt;', '...
', '3');
INSERT INTO Articles (publicationDate, title, summary, content, category) VALUES ('2016-04-07', '&lt;a href=&#039;#&#039;&gt;Test2&lt;/a&gt;', '...', '...', '1');
INSERT INTO Users (Username, Password) VALUES ('user','');
DELETE FROM Articles WHERE articleId='3' ;
DELETE FROM Articles WHERE articleId='2' ;
INSERT INTO Articles (publicationDate, title, summary, content, category) VALUES ('2016-04-08', 'First Article', 'First Article', '&lt;h3&gt;How I implemented it&lt;/h3&gt;

&lt;p&gt;This website was implemented by using an MVC type of framework.  It&amp;#039;s not entirely an MVC, but I built it how I felt would get the job done effectively.  The idea was to have a site to put my resume and showcase a little bit of my portfolio, or a portfolio itself.  Currently there are many things in which need to be done.

  &lt;ul&gt;
    &lt;li&gt;Sub-Categories&lt;/li&gt;
    &lt;li&gt;About Page and special layout for it&lt;/li&gt;
    &lt;li&gt;More Security&lt;/li&gt;
    &lt;li&gt;More robust article system/parser&lt;/li&gt;
    &lt;li&gt;Edit and Delete article information in admin&lt;/li&gt;
    &lt;li&gt;Contact information&lt;/li&gt;
    &lt;li&gt;Adding javascript to articles&lt;/li&gt;
    &lt;li&gt;And a lot more boring stuff&lt;/li&gt;
    &lt;li&gt;Source code clean up (back-end and front-end)&lt;/li&gt;
    &lt;li&gt;Added comments&lt;/li&gt;
  &lt;/ul&gt;

So there&amp;#039;s much more to be done for the web application, and hopefully I can get to them over the next few months.&lt;/p&gt;

&lt;p&gt;However, I also need to add actual content.  Content I wish to discuss on this includes:

  &lt;ul&gt;
    &lt;li&gt;Math tutorials and exploration&lt;/li&gt;
    &lt;li&gt;Programming tutorials from beginner to advanced&lt;/li&gt;
    &lt;li&gt;Possibly language-oriented things&lt;/li&gt;
    &lt;li&gt;Hardware implementations&lt;/li&gt;
  &lt;/ul&gt;

Hopefully I can get to these soon since I have a working model.&lt;/p&gt;

&lt;p&gt;For now that is all.  This article is to test the basics.  It requires the use of html tags, and I used rudimentary ones to get a feel for it.  If all goes well, everything encoded and decoded properly.&lt;/p&gt;

&lt;p&gt;Anddd for the sake of testing, &lt;a href=&quot;index.php&quot;&gt;this&lt;/a&gt; should take you to the home page.

edited
-Matthew Panzner 
', '1');
DELETE FROM Articles WHERE articleId='2' ;
UPDATE Articles SET publicationDate='2016-04-07',title='First Article',summary='This is the first article that I&amp;#039;m writing using an alpha version of this web app.',content='&lt;h3&gt;How I implemented it&lt;/h3&gt;

&lt;p&gt;This website was implemented by using an MVC type of framework.  It&amp;#039;s not entirely an MVC, but I built it how I felt would get the job done effectively.  The idea was to have a site to put my resume and showcase a little bit of my portfolio, or a portfolio itself.  Currently there are many things in which need to be done.

  &lt;ul&gt;
    &lt;li&gt;Sub-Categories&lt;/li&gt;
    &lt;li&gt;About Page and special layout for it&lt;/li&gt;
    &lt;li&gt;More Security&lt;/li&gt;
    &lt;li&gt;More robust article system/parser&lt;/li&gt;
    &lt;li&gt;Edit and Delete article information in admin&lt;/li&gt;
    &lt;li&gt;Contact information&lt;/li&gt;
    &lt;li&gt;Adding javascript to articles&lt;/li&gt;
    &lt;li&gt;And a lot more boring stuff&lt;/li&gt;
    &lt;li&gt;Source code clean up (back-end and front-end)&lt;/li&gt;
    &lt;li&gt;Added comments&lt;/li&gt;
  &lt;/ul&gt;

So there&amp;#039;s much more to be done for the web application, and hopefully I can get to them over the next few months.&lt;/p&gt;

&lt;p&gt;However, I also need to add actual content.  Content I wish to discuss on this includes:

  &lt;ul&gt;
    &lt;li&gt;Math tutorials and exploration&lt;/li&gt;
    &lt;li&gt;Programming tutorials from beginner to advanced&lt;/li&gt;
    &lt;li&gt;Possibly language-oriented things&lt;/li&gt;
    &lt;li&gt;Hardware implementations&lt;/li&gt;
  &lt;/ul&gt;

Hopefully I can get to these soon since I have a working model.&lt;/p&gt;

&lt;p&gt;For now that is all.  This article is to test the basics.  It requires the use of html tags, and I used rudimentary ones to get a feel for it.  If all goes well, everything encoded and decoded properly.&lt;/p&gt;

&lt;p&gt;Anddd for the sake of testing, &lt;a href=&quot;index.php&quot;&gt;this&lt;/a&gt; should take you to the home page.

-Matthew Panzner 
',category='3' WHERE articleId='1';
UPDATE Articles SET publicationDate='2016-04-07',title='First Article',summary='This is the first article that I&amp;#039;m writing using an alpha version of this web app.',content='&lt;h3&gt;How I implemented it&lt;/h3&gt;

&lt;p&gt;This website was implemented by using an MVC type of framework.  It&amp;#039;s not entirely an MVC, but I built it how I felt would get the job done effectively.  The idea was to have a site to put my resume and showcase a little bit of my portfolio, or a portfolio itself.  Currently there are many things in which need to be done.

  &lt;ul&gt;
    &lt;li&gt;Sub-Categories&lt;/li&gt;
    &lt;li&gt;About Page and special layout for it&lt;/li&gt;
    &lt;li&gt;More Security&lt;/li&gt;
    &lt;li&gt;More robust article system/parser&lt;/li&gt;
    &lt;li&gt;Edit and Delete article information in admin&lt;/li&gt;
    &lt;li&gt;Contact information&lt;/li&gt;
    &lt;li&gt;Adding javascript to articles&lt;/li&gt;
    &lt;li&gt;And a lot more boring stuff&lt;/li&gt;
    &lt;li&gt;Source code clean up (back-end and front-end)&lt;/li&gt;
    &lt;li&gt;Added comments&lt;/li&gt;
  &lt;/ul&gt;

So there&amp;#039;s much more to be done for the web application, and hopefully I can get to them over the next few months.&lt;/p&gt;

&lt;p&gt;However, I also need to add actual content.  Content I wish to discuss on this includes:

  &lt;ul&gt;
    &lt;li&gt;Math tutorials and exploration&lt;/li&gt;
    &lt;li&gt;Programming tutorials from beginner to advanced&lt;/li&gt;
    &lt;li&gt;Possibly language-oriented things&lt;/li&gt;
    &lt;li&gt;Hardware implementations&lt;/li&gt;
  &lt;/ul&gt;

Hopefully I can get to these soon since I have a working model.&lt;/p&gt;

&lt;p&gt;For now that is all.  This article is to test the basics.  It requires the use of html tags, and I used rudimentary ones to get a feel for it.  If all goes well, everything encoded and decoded properly.&lt;/p&gt;

&lt;p&gt;Anddd for the sake of testing, &lt;a href=&quot;index.php&quot;&gt;this&lt;/a&gt; should take you to the home page.

-Matthew Panzner 
',category='3' WHERE articleId='1';
UPDATE Articles SET publicationDate='2016-04-07',title='First Article',summary='First Article',content='<h3>How I implemented it</h3>

<p>This website was implemented by using an MVC type of framework.  It&#039;s not entirely an MVC, but I built it how I felt would get the job done effectively.  The idea was to have a site to put my resume and showcase a little bit of my portfolio, or a portfolio itself.  Currently there are many things in which need to be done.

  <ul>
    <li>Sub-Categories</li>
    <li>About Page and special layout for it</li>
    <li>More Security</li>
    <li>More robust article system/parser</li>
    <li>Edit and Delete article information in admin</li>
    <li>Contact information</li>
    <li>Adding javascript to articles</li>
    <li>And a lot more boring stuff</li>
    <li>Source code clean up (back-end and front-end)</li>
    <li>Added comments</li>
  </ul>

So there&#039;s much more to be done for the web application, and hopefully I can get to them over the next few months.</p>

<p>However, I also need to add actual content.  Content I wish to discuss on this includes:

  <ul>
    <li>Math tutorials and exploration</li>
    <li>Programming tutorials from beginner to advanced</li>
    <li>Possibly language-oriented things</li>
    <li>Hardware implementations</li>
  </ul>

Hopefully I can get to these soon since I have a working model.</p>

<p>For now that is all.  This article is to test the basics.  It requires the use of html tags, and I used rudimentary ones to get a feel for it.  If all goes well, everything encoded and decoded properly.</p>

<p>Anddd for the sake of testing, <a href="index.php">this</a> should take you to the home page.</p>

edited

-Matthew Panzner 
',category='3' WHERE articleId='1';
DELETE FROM Articles WHERE articleId='1' ;
INSERT INTO Articles (publicationDate, title, summary, content, category) VALUES ('2016-04-08', 'One', 'one', 'one
', '3');
INSERT INTO Articles (publicationDate, title, summary, content, category) VALUES ('2016-04-08', 'two', 'two', 'two
', '3');
INSERT INTO Articles (publicationDate, title, summary, content, category) VALUES ('2016-04-08', 'three', 'three', 'three', '3');
DELETE FROM Articles WHERE articleId='3' ;
DELETE FROM Articles WHERE articleId='5' ;
DELETE FROM Articles WHERE articleId='4' ;
INSERT INTO ArticleCategory (name, summary) VALUES ('Dummy', 'dummy');
DELETE FROM ArticleCategory WHERE id='4';
INSERT INTO ArticleCategory (name, summary) VALUES ('dummy', 'dummy');
INSERT INTO Articles (publicationDate, title, summary, content, category) VALUES ('2016-04-08', 'dummpost', '...', '..
', '5');
DELETE FROM ArticleCategory WHERE id='5';
INSERT INTO ArticleCategory (name, summary) VALUES ('dummy', 'dummy');
DELETE FROM ArticleCategory WHERE id='6';
INSERT INTO ArticleCategory (name, summary) VALUES ('dummy', 'dummy');
INSERT INTO Articles (publicationDate, title, summary, content, category) VALUES ('2016-04-08', 'dummy', 'dummy', 'dummy', '7');
DELETE FROM Articles WHERE articleId='8' ;
DELETE FROM ArticleCategory WHERE id='7';
INSERT INTO ArticleCategory (name, summary) VALUES ('Test', 'test');
DELETE FROM ArticleCategory WHERE id='8';
INSERT INTO ArticleCategory (name, summary) VALUES ('test', 'test');
DELETE FROM ArticleCategory WHERE id='9';
INSERT INTO ArticleCategory (name, summary) VALUES ('test', 'test');
DELETE FROM ArticleCategory WHERE id='10';
INSERT INTO ArticleCategory (name, summary) VALUES ('Test', 'test');
INSERT INTO ArticleCategory (name, summary) VALUES ('test2', 'test2');
INSERT INTO ArticleCategory (name, summary) VALUES ('test3', 'test3');
INSERT INTO ArticleCategory (name, summary) VALUES ('article4', '3');
INSERT INTO ArticleCategory (name, summary) VALUES ('anoter', '..');
DELETE FROM ArticleCategory WHERE id='15';
DELETE FROM ArticleCategory WHERE id='13';
DELETE FROM ArticleCategory WHERE id='13';
DELETE FROM ArticleCategory WHERE id='11';
DELETE FROM ArticleCategory WHERE id='12';
DELETE FROM ArticleCategory WHERE id='14';
INSERT INTO ArticleCategory (name, summary) VALUES ('dummy', 'dummy');
DELETE FROM ArticleCategory WHERE id='16';
INSERT INTO ArticleCategory (name, summary) VALUES ('d', 'k');
DELETE FROM ArticleCategory WHERE id='17';
DELETE FROM ArticleCategory WHERE id='1';
