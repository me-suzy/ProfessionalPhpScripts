<?
// mcLinksCounter 1.2 - Marc Cagninacci - marc@phpforums.net - http://www.phpforums.net

function EnvoieCookie ($user,$pwd){
SetCookie("mcLinksCounter", "$user:$pwd");
}
include "mclc.php";
include "$langfile";
$connect= mysql_connect($host,$login,$pass);
mysql_select_db($base, $connect);

        if(isset($posted)){

if(($user==$admin_login) && ($pwd==$admin_pass)):
            EnvoieCookie($user,$pwd);
?>
<script language="JavaScript">
      document.location.replace("<? echo $path.""; ?>");
</script>
<?
        elseif($user!=$admin_login):
        $msg1=$lErreur.$lLogin;
        elseif($pwd!=$admin_pass):
        $msg2=$lErreur.$lPass;
        endif;        }


if(isset($msg1)){
echo '<div align="right"><font color="red" size="2" face="Arial"><b>'.$msg1.'</b></font></div>';
}
if(isset($msg2)){
echo '<div align="right"><font color="red" size="2" face="Arial"><b>'.$msg2.'</b></font></div>';
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>mcLinksCounter Login</title>
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

<form action="login.php" method="get">
  <table align="right">
    <tr>
      <td width="92"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b>
      <? echo $lLogin; ?> : </b></font>
      </td>
      <td width="128"> <font face="Arial, Helvetica, sans-serif" size="2">
        <input type="text" name="user" value="<?echo $user;?>">
        </font>
      </td>
    </tr>
    <tr>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b><? echo $lPass; ?> :</b></font>
      </td>
      <td><font face="Arial, Helvetica, sans-serif" size="2">
        <input type="password" name="pwd">
        </font>
      </td>
    </tr>
    <tr>
      <td>&nbsp;
      </td>
      <td> <font face="Arial, Helvetica, sans-serif" size="2">
        <input type="submit" name="Submit" value="<? echo $lValider; ?>">
        <input type="hidden" name="posted" value="1">
        <input type="hidden" name="path" value="<?echo $path;?>">
        </font>
      </td>
     </tr>
  </table>

</form>

</body>
</html>