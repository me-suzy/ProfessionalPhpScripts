<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<HTML>
<HEAD><TITLE>Install Banner Network</TITLE></HEAD>
<BODY TEXT="#000000" BGCOLOR="#FFFFFF">
<?php
$conf = "<?php
include(\"common.php\");
// changable stuff
\$template = \"$ins_template\";
\$bannerscript = \"$ins_bannerscript\"; //this is where banner.php is
\$sitename = \"$ins_sitename\";
\$adminemail = \"$ins_adminemail\";
\$welcometext=\"$ins_welcometext\";
\$adminpass=\"$ins_adminpass\";
user( \"$ins_adminuser\", \"$ins_defaultbanner\", \"$ins_defaultURL\", \"$ins_adminpass\", \"$ins_adminemail\");
//user( username, imageURL, siteURL, pass, email );
include(\"users.php\");?>";
?>
<table width=50%><tr><td>
<?php
echo"Opening conf.php<!-- Error:";
$fp = fopen("conf.php", "w");
?>--></td><td>
<?php
if(!$fp) die ("<font color=\"#ff0000\">Failed</font></td></tr></table>");
else echo"<font color=\"#00ff00\">Done</font><br>";
?></td></tr><tr><td>
<?php
echo"Writing to conf.php<!--Error:";
fwrite($fp, $conf);

echo "--><code><br>$ins_bannerscript<br>$ins_sitename<br>$ins_adminemail<br>$ins_welcometext<br></code>";
?></td><td>
<?php
echo "<font color=\"#00ff00\">Done</font><br>";
?></td></tr><tr><td>
<?php
echo"Closing conf.php<!--Error:";
fclose ($fp);
?>--></td><td>
<?php
echo"<font color=\"#00ff00\">Done</font><br>";

//mail("riscos@myrealbox.com","Banner Network Installation","Someone has installed the banner network.");

?>
</body>
</html>
