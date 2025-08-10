<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>mcLinksCounter Erase</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="Expires" CONTENT="Fri, Jan 01 1900 00:00:00 GMT">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
<style type="text/css">
<!--
a:actif {  font-family: Verdana; color: black; text-decoration: none}
a:link {  font-family: Verdana; color: white; text-decoration: none}
a:visited {  font-family: Verdana; color: white; text-decoration: none}
a:hover {  font-family: Verdana; color: black; text-decoration: none}
-&nbsp;
</style>
</head>
<body bgcolor="#C0C0C0" text="black">
<p align="right"><font face="verdana" size="5" color="black">mcLinksCounter 1.2</font></p><hr>



<?php
// mcLinksCounter 1.2 - Marc Cagninacci - marc@phpforums.net - http://www.phpforums.net


include "mclc.php";
include "$langfile";
$mysql_link = mysql_connect($host,$login,$pass);
mysql_select_db($base, $mysql_link);

$jour = date("d/m/Y");
$hier= date("d/m/Y", mktime(0,0,0,date("m"),date("d") - 1 , date("Y")));
$query= "delete from mclinkscounter_detail where date not like '$hier%' and date not like'$jour%'";
mysql_query($query);
echo '<center><br><br><font face="verdana" size="2">'.$lFait.'.<br><a href="stats.php">'.$lRetour.'</a></font></center>';

?>
<p align="center"><a href="http://www.phpforums.net/index.php?dir=dld" target="_blank"><img src="mclc.gif" border="0" alt="Download mcLinksCounter"></a></p>
</body>
</html>