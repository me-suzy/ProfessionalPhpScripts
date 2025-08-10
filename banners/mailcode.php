<?php include "conf.php";
include("templates/$template/header.php");
?>

<?php
if (empty($c_mname)) {
  echo "<h2>Not logged in!</h2>";
  die;
}
?>
Please place the code below into your web site, preferably somewhere prominent.  It should be on the page pointed to by the URL supplied.<br>
These details have been emailed to you<br>
<?php
$body = "Here is the code which you should place in your page:\n" .
        "\n" .
        "<TABLE WIDTH=\"468\" BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\">
 <TR><TD>
  <A HREF=\"$bannerscript?action=redirect\">
   <IMG BORDER=\"0\" WIDTH=\"468\" HEIGHT=\"60\" ALT=\"$sitename\" SRC=\"$bannerscript?action=image&amp;site=$c_mname\">
  </A>
 </TD></TR>
 <TR><TD>
  <A HREF=\"$bannerscript\">
   <IMG ALIGN=\"RIGHT\" BORDER=\"0\" WIDTH=\"124\" HEIGHT=\"11\" ALT=\"$sitename\" SRC=\"$bannerscript?action=logo\">
  </A>
 </TD></TR>
</TABLE>
" .
          "\n" .
          "User name: $c_mname\n" .
          "Banner network site: http://rbn.cjb.net/\n";
mail($email[getnum($c_mname,$c_pwd)],$sitename,$body,"From: $sitename <robn@rbn.cjb.net>");
?>
    <form>
    <textarea cols="80" rows="15" wrap="soft"><TABLE WIDTH="468" BORDER="0" CELLPADDING="0" CELLSPACING="0">
 <TR><TD>
  <A HREF="<?php echo "$bannerscript"; ?>?action=redirect">
   <IMG BORDER="0" WIDTH="468" HEIGHT="60" ALT="<? echo"$sitename"; ?>" SRC="<?php echo "$bannerscript"; ?>?action=image&amp;amp;site=<?php echo "$c_mname"; ?>">
  </A>
 </TD></TR>
 <TR><TD>
  <A HREF="<?php echo "$bannerscript"; ?>">
   <IMG ALIGN="RIGHT" BORDER="0" WIDTH="124" HEIGHT="11" ALT="<? echo"$sitename"; ?>" SRC="<?php echo "$bannerscript"; ?>?action=logo">
  </A>
 </TD></TR>
</TABLE>
</textarea>
</form><br>
<a href="./">Index</a>
<?php
include("templates/$template/footer.php");
?>