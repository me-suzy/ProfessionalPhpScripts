#
# Structure de la table `mclinkscounter`
#

CREATE TABLE mclinkscounter (
  id int(3) NOT NULL auto_increment,
  nom varchar(30) NOT NULL default '',
  cat varchar(20) NOT NULL default '',
  url varchar(50) NOT NULL default '',
  target varchar(20) NOT NULL default '',
  clic int(5) NOT NULL default '0',
  PRIMARY KEY  (id)
) TYPE=MyISAM;



#
# Structure de la table `mclinkscounter_detail`
#

CREATE TABLE mclinkscounter_detail (
  id varchar(20) NOT NULL default '',
  agent varchar(100) NOT NULL default '-',
  ip varchar(20) NOT NULL default '-',
  date varchar(25) NOT NULL default '',
  KEY id (id)
) TYPE=MyISAM;