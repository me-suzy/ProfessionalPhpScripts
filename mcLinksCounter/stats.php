<?
// mcLinksCounter 1.2 - Marc Cagninacci - marc@phpforums.net - http://www.phpforums.net

include "mclc.php";
include "$langfile";
$auth = explode(":",$HTTP_COOKIE_VARS["mcLinksCounter"]);
if(empty($auth[0])){
?> <script language="JavaScript">
   document.location.replace("login.php?path=<? echo("stats.php"); ?>");
   </script>
<?
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>mcLinksCounter Stats</title>
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
<table width="95%" align="center" border="0">
<tr><td valign="top">

<?

 $connect= mysql_connect($host,$login,$pass);
 mysql_select_db($base, $connect);
 $query = "select sum(clic) from mclinkscounter";
 $res = mysql_query($query, $connect);
 $total = mysql_fetch_array($res);
 ?>
 <table border="0" cellspacing="1" cellpadding="2">
 <tr><td bgcolor="#333333" colspan="2"><font face="verdana" size="2" color="white"><? echo $lTotal; ?></font>
 </td>
 <td bgcolor="#333333" colspan="5"><font face="verdana" size="2" color="white"><? echo $total[0].' '.$lClics; ?></font>
 </td></tr>
 <?
 $query = "select cat, sum(clic) from mclinkscounter group by cat order by cat";
 $res = mysql_query($query, $connect);
 while ($categ = mysql_fetch_array($res))
 {
 $avcat=@ceil($categ[1]/$total[0]*100);
 echo '<tr><td bgcolor="#666666" colspan="2"><font face="verdana" size="2" color="white"><b>'.$categ[0].'</b></font></td>';
 echo '<td bgcolor="#666666" align="right"><font face="verdana" size="1" color="white">'.$categ[1].' '.$lClics.'</font></td>';
 echo '<td bgcolor="#333333" align="right"><font face="verdana" size="1" color="white">'.$avcat.' %</font></td>';
 echo '<td bgcolor="#666666" colspan="3"><font face="verdana" size="1" color="white">&nbsp;</font></td></tr>';
 $query = "select * from mclinkscounter where cat='$categ[0]' order by nom";
 $result = mysql_query($query, $connect);
  while ($lien = mysql_fetch_array($result))
  {
  $avlien=@ceil($lien[5]/$categ[1]*100);
  $avtot=@ceil($lien[5]/$total[0]*100);
  echo '<tr><td bgcolor="#999999"><font face="verdana" size="2" color="white"><a href="detail.php?det='.$lien[0].'&link='.$lien[1].'">'.$lien[1].'</a></font></td>';
  echo '<td bgcolor="#999999"><font face="verdana" size="1" color="white">'.$lien[3].'</font></td>';
  echo '<td bgcolor="#999999" align="right"><font face="verdana" size="2" color="white"><b>'.$lien[5].'</b></font></td>';
  echo '<td bgcolor="#666666" align="right"><font face="verdana" size="1" color="white">'.$avlien.' %</font></td>';
  echo '<td bgcolor="#333333" align="right"><font face="verdana" size="1" color="white">'.$avtot.' %</font></td>';
  echo '<td bgcolor="#999999"><font face="verdana" size="1" color="white"><a href="stats.php?modif='.$lien[0].'">'.$lModifier.'</a></font></td>';
  echo '<td bgcolor="#999999"><font face="verdana" size="1" color="white"><a href="stats.php?suppr='.$lien[0].'">'.$lSupprimer.'</a>';
                                                                                                         if ($suppr==$lien[0]) echo '&nbsp;<a href="stats.php?suppr='.$lien[0].'&ok=ok">'.$lConfSuppr.'</a>';
                                                                                                         echo '</font></td>';

  }
 }
?>
 </td></tr>
 </table>
</td><td valign="top">
<?
if(!$modif && !$suppr)
{
?>
 <form method="post" action="stats.php">
 <table border="0" cellspacing="1" cellpadding="5">
 <tr><td bgcolor="#333333" colspan="2"><font face="verdana" size="2" color="white"><? echo $lNouveau; ?></font>
 </td></tr>
 <tr><td bgcolor="#999999"><font face="verdana" size="1" color="white"><? echo $lNom; ?></font>
 </td>
 <td bgcolor="#999999"><input type="text" name="nom"><font face="verdana" size="2" color="red"><b>&nbsp;*</b></font>
 </td></tr>
  <tr><td bgcolor="#999999"><font face="verdana" size="1" color="white"><? echo $lCat; ?></font>
 </td>
 <td bgcolor="#999999"><input type="text" name="cat"><font face="verdana" size="2" color="red"><b>&nbsp;*</b></font>
 </td></tr>
  <tr><td bgcolor="#999999"><font face="verdana" size="1" color="white"><? echo $lUrl; ?></font>
 </td>
 <td bgcolor="#999999"><input type="text" name="url"><font face="verdana" size="2" color="red"><b>&nbsp;*</b></font>
 </td></tr>
  <tr><td bgcolor="#999999"><font face="verdana" size="1" color="white"><? echo $lTarget; ?></font>
 </td>
 <td bgcolor="#999999"><select name="target" >
          <option value=""></option>
          <option value="_self">_self</option>
          <option value="_top">_top</option>
          <option value="_blank">_blank</option>
          </select>
          <font face="verdana" size="1" color="white"><? echo $lCadre; ?>:</font>
          <input type="text" name="targetF">
 </td></tr>
  <tr><td bgcolor="#999999"><font face="verdana" size="1" color="white"><? echo $lClics; ?></font>
 </td>
 <td bgcolor="#999999"><input type="text" name="clic" size="5">
 </td></tr>
 <tr><td bgcolor="#999999"><font face="verdana" size="1" color="white">&nbsp;</font>
 </td>
 <td bgcolor="#999999"><input type="submit" name="submit" value="<? echo $lValider; ?>"><font face="verdana" size="1" color="red"><b>&nbsp;*</b> <? echo $lOblig; ?></font>
 </td></tr>
 </table>
 </form>
<?
if (isset($submit))
{
echo $cat;
if ($targetF)  $target=$targetF;
$query = "insert into mclinkscounter values('', '$nom', '$cat', '$url', '$target', '$clic')";
mysql_query($query, $connect);
?>
   <script language="JavaScript">
   document.location.replace("stats.php");
   </script>
<?

}
}
if (isset($modif))
{
$query = "select * from mclinkscounter where id=$modif";
$result = mysql_query($query, $connect);
$lien = mysql_fetch_array($result);

?>
<form method="post" action="stats.php">
 <table border="0" cellspacing="1" cellpadding="5">
 <tr><td bgcolor="#333333" colspan="2"><font face="verdana" size="2" color="white"><? echo $lModifLien; ?></font>
 </td></tr>
 <tr><td bgcolor="#999999"><font face="verdana" size="1" color="white"><? echo $lNom; ?></font>
 </td>
 <td bgcolor="#999999"><input type="text" name="nom2" value="<? echo $lien[nom]; ?>"><font face="verdana" size="2" color="red"><b>&nbsp;*</b></font>
 </td></tr>
  <tr><td bgcolor="#999999"><font face="verdana" size="1" color="white"><? echo $lCat; ?></font>
 </td>
 <td bgcolor="#999999"><input type="text" name="cat2" value="<? echo $lien[cat]; ?>"><font face="verdana" size="2" color="red"><b>&nbsp;*</b></font>
 </td></tr>
  <tr><td bgcolor="#999999"><font face="verdana" size="1" color="white"><? echo $lUrl; ?></font>
 </td>
 <td bgcolor="#999999"><input type="text" name="url2" value="<? echo $lien[url]; ?>"><font face="verdana" size="2" color="red"><b>&nbsp;*</b></font>
 </td></tr>
  <tr><td bgcolor="#999999"><font face="verdana" size="1" color="white"><? echo $lTarget; ?></font>
 </td>
 <td bgcolor="#999999"><select name="target2" >
          <option value=""></option>
          <option value="_self">_self</option>
          <option value="_top">_top</option>
          <option value="_blank">_blank</option>
          <option value="-------">------</option>
          <option value="<? echo $lien[target]; ?>" selected><? echo $lien[target]; ?></option>
          </select>
          <font face="verdana" size="1" color="white"><? echo $lCadre; ?>:</font>
          <input type="text" name="targetF2">
 </td></tr>
  <tr><td bgcolor="#999999"><font face="verdana" size="1" color="white"><? echo $lClics; ?></font>
 </td>
 <td bgcolor="#999999"><input type="text" name="clic2" size="5" value="<? echo $lien[clic]; ?>">
 </td></tr>
 <tr><td bgcolor="#999999"><font face="verdana" size="1" color="white">&nbsp;</font>
 </td>
 <td bgcolor="#999999"><input type="submit" name="submitm" value="Valider"><font face="verdana" size="1" color="red"><b>&nbsp;*</b> <? echo $lOblig; ?></font>
                       <input type="hidden" name="id2" value=<? echo $lien[id]; ?>">
 </td></tr>
 </table>
 </form>
<?
}

if (isset($submitm))
{
if ($targetF2)  $target2=$targetF2;
$query = "update mclinkscounter set nom='$nom2', cat='$cat2', url='$url2', target='$target2', clic='$clic2' where id='$id2'";
mysql_query($query, $connect);
?>
   <script language="JavaScript">
   document.location.replace("stats.php");
   </script>
<?
}

if (isset($suppr)&&($ok=="ok"))
{
echo $lien[0];
$query = "delete from mclinkscounter where id='$suppr'";
mysql_query($query, $connect);
?>
   <script language="JavaScript">
   document.location.replace("stats.php");
   </script>
<?
}
?>

</td></tr>
</table>
<p align="center"><a href="http://www.phpforums.net/index.php?dir=dld" target="_blank"><img src="mclc.gif" border="0" alt="Download mcLinksCounter"></a></p>
</body>
</html>