<?php
include "conf.php";
include("templates/$template/header.php");
?>
<p>If you do not want certain banners on your site, add onto the image url after your user name an allow attribute, with the numbers of the banners which you will not allow, e.g. <tt><?php echo"$bannerscript"; ?>?action=image&amp;amp;site=robn&amp;amp;disallow=2,4</tt><br></p>
<form action="save.php" method="post">
<table border="0" width="99%" align="center">
<tr><th align="center">User number</th><th align="center">Banner</th></tr>
<?php
  $uno = getnum($c_mname, $c_pwd);
  if (file_exists("allow/allow$uno.txt"))
    $line = file("allow/allow$uno.txt"); //y=allow, n=don't, o=other user blocked it, b=both
  else
    $line[0] = "y";
  $ptr = 0;
  while ($ptr < $num) {
    $ptr++;
    if ($uno) {
      if (empty($line[$ptr])) $a = 0; else $a = $ptr;
      switch ($line[$a][0]) {
        case 'y': $onoff = "<input type=\"checkbox\" name=\"allow[$ptr]\" checked>"; break;
        case 'n': $onoff = "<input type=\"checkbox\" name=\"allow[$ptr]\">"; break;
        case 'b': $onoff = "<input type=\"checkbox\" name=\"allow[$ptr]\">" .
                           "<br>This user has blocked your banners"; break;
        case 'o': $onoff = "<input type=\"checkbox\" name=\"allow[$ptr]\" checked>" .
                           "<br>This user has blocked your banners"; break;
      }
    }
    echo "<tr>" .
         //"<td align=\"center\">" .
         //  "$onoff" .
         //"</td>" .
         "<td align=\"center\">$ptr</td>" .
         "<td align=\"center\"><a href=\"$url[$ptr]\">".
           "<img alt=\"Banner #$ptr\" height=\"60\" width=\"468\" border=\"0\" src=\"$banner[$ptr]\">" .
         "</a></td>" .
         "</tr>\n";
  }
?></table>
<?php if ($uno) { ?>
<!--<p>Display banners as soon as they are added, if you havent specified any preference:
  <input type="checkbox" name="default"<?php if ($line[0][0] == 'y') echo " checked"; ?>></p>-->
<!--<input type="submit" value="Save">--><a href="./">Index</a>
<?php } ?>
</form>
<?php if ($uno) { ?>
<p>Blocking a banner causes it not to be displayed on your site, but your banner will still be displayed on their site.</p>
<p>It is not possible to guarantee the reliability of this service, and the administrators cannot be held responsible if an incorrect banner is displayed.</p>
<p>It is not necessary to block your own banner, as it will not appear anyway.</p>
<p>When a user is deleted, the user numbers will be preserved, so disallow variables will still be valid.</p>
<?php }
include("templates/$template/footer.php");
?>
</body>
</html>
