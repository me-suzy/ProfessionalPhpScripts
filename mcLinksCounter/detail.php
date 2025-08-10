<?php
// mcLinksCounter 1.2 - Marc Cagninacci - marc@phpforums.net - http://www.phpforums.net

include "mclc.php";
include "$langfile";
$auth = explode(":",$HTTP_COOKIE_VARS["mcLinksCounter"]);
if(empty($auth[0])){
?> <script language="JavaScript">
   document.location.replace("login.php?path=<? echo("detail.php"); ?>");
   </script>
<?
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>mcLinksCounter Detail</title>
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
<body bgcolor="#C0C0C0" text="white">
<p align="right"><font face="verdana" size="5" color="black">mcLinksCounter 1.2</font></p><hr>


<?
$connect = mysql_connect($host,$login,$pass);
mysql_select_db($base, $connect);
echo '<table border="0" cellspacing="1" cellpadding="2" align="center"><tr><td bgcolor="#333333" colspan="3"><font face="verdana" color="white" size="1">';
if ($langfile=="french.php") $jour = date("d/m/Y");
else  $jour = date("Y/m/d");
$query= "select ip from mclinkscounter_detail where id='$det' and date like '$jour%'";
$spy= mysql_query($query);
$nb= mysql_num_rows($spy);
if($langfile=="french.php")
{
$hier= date("d/m/Y", mktime(0,0,0,date("m"),date("d") - 1 , date("Y")));
}
else
{
$hier= date("Y/m/d", mktime(0,0,0,date("m"),date("d") - 1 , date("Y")));
}
$query= "select ip from mclinkscounter_detail where id='$det' and date like '$hier%'";
$spy= mysql_query($query);
$nbh= mysql_num_rows($spy);
$query= "select * from mclinkscounter_detail where id='$det' and date >= '$jour' order by date desc";
$spy= mysql_query($query);
echo '<a href="stats.php">'.$lRetour.'</a>&nbsp;- &nbsp;<a href="erase.php">'.$lNettoyage.'</a></font></td></tr>';
echo '<tr><td bgcolor="#666666"><font face="verdana" size="2">'.$link.'</font></td><td align="right" bgcolor="#666666" colspan="2"><font face="verdana" color="white" size="1">'.$lToday.': '.$nb.' '.$lClics.', '.$lHier.': '.$nbh.'</font></td></tr>';
echo '<tr><td bgcolor="#666666"><font face="verdana" size="1">'.$lAgent.'</font></td></td><td bgcolor="#666666"><font face="verdana" color="white" size="1">'.$lIp.'</font><td bgcolor="#666666"><font face="verdana" color="white" size="1">'.$lHeure.'</font></td></td></tr>';
while ($row=mysql_fetch_array($spy))
{
$row[date]=substr($row[date], 13);
echo '<tr><td bgcolor="#999999"><font face="verdana" size="1">'.$row[agent].'</font></td><td bgcolor="#999999"><font face="verdana" size="1">'.$row[ip].'</font></td><td bgcolor="#999999"><font face="verdana" size="1">'.$row[date].'</font></td></tr>';
}

echo '</table>';
?>
<p align="center"><a href="http://www.phpforums.net/index.php?dir=dld" target="_blank"><img src="mclc.gif" border="0" alt="Download mcLinksCounter"></a></p>
</body>
</html>