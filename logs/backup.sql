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
