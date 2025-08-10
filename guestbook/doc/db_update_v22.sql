# MySQL dump 8.14
#
# Host: localhost    Database: AdvancedGuestbook
#--------------------------------------------------------
# Server version	3.23.38

#
# Current Database: AdvancedGuestbook
#

#
# Table structure for table 'book_smilies'
#

CREATE TABLE book_smilies (
  id int(11) NOT NULL auto_increment,
  s_code varchar(20) NOT NULL default '',
  s_filename varchar(60) NOT NULL default '',
  s_emotion varchar(60) NOT NULL default '',
  width smallint(6) NOT NULL default '0',
  height smallint(6) NOT NULL default '0',
  PRIMARY KEY  (id)
) TYPE=MyISAM;

#
# Dumping data for table 'book_smilies'
#

INSERT INTO book_smilies VALUES (1,':-)','a1.gif','smile',15,15);
INSERT INTO book_smilies VALUES (2,':-(','a2.gif','frown',15,15);
INSERT INTO book_smilies VALUES (3,';-)','a3.gif','wink',15,15);
INSERT INTO book_smilies VALUES (4,':o','a4.gif','embarrassment',15,15);
INSERT INTO book_smilies VALUES (5,':D','a5.gif','big grin',15,15);
INSERT INTO book_smilies VALUES (6,':p','a6.gif','razz (stick out tongue)',15,15);
INSERT INTO book_smilies VALUES (7,':cool:','a7.gif','cool',21,15);
INSERT INTO book_smilies VALUES (8,':rolleyes:','a8.gif','roll eyes (sarcastic)',15,15);
INSERT INTO book_smilies VALUES (9,':mad:','a9.gif','#@*%!',15,15);
INSERT INTO book_smilies VALUES (10,':eek:','a10.gif','eek!',15,15);
INSERT INTO book_smilies VALUES (11,':confused:','a11.gif','confused',15,22);
