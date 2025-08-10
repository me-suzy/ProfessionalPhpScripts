<?php
include("../conf.php");
if ($c_pwd==1) {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<HTML>
<HEAD><TITLE>Add User To Banner Network</TITLE></HEAD>
<BODY TEXT="#000000" BGCOLOR="#FFFFFF">
<?php
$newuser = "<?php user( \"$username\", \"$bannerurl\", \"$clicksto\", \"$password\", \"$email\");?>";
?>
<table width=50%><tr><td>
<?php
echo"Opening users.txt<!-- Error:";
$fp = fopen("users.txt", "a");
?>--></td><td>
<?php
if(!$fp) die ("<font color=\"#ff0000\">Failed</font></td></tr></table>");
else echo"<font color=\"#00ff00\">Done</font><br>";
?></td></tr><tr><td>
<?php
echo"Writing to users.txt<!--Error:";
fwrite($fp, $newuser);
?>--></td><td>
<?php
echo "<font color=\"#00ff00\">Done</font><br>";
?></td></tr><tr><td>
<?php
echo"Closing users.txt<!--Error:";
fclose ($fp);
?>--></td><td>
<?php
echo"<font color=\"#00ff00\">Done</font><br>";

//mail("riscos@myrealbox.com","Banner Network Installation","Someone has installed the banner network.");

?>
</body>
</html>
<?php
}else{
?>
<html>
<body>
Access Denied
</body>
</html>
<?php
}