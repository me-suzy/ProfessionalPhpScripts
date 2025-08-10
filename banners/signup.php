<?php include "conf.php";
include("templates/$template/header.php");
?>

<?php
$f_membername = strtolower($f_membername);
$signedup = 0;
if ($f_s == "s") {
  if (empty($f_email) or empty($f_membername) or empty($f_memberpass) or empty($f_url) or empty($f_banner))
    echo "<font color=\"red\">Not all the fields were filled in, Please try again.</font><br>";
  else if ((getnumn($f_membername)) and !($change == "yes"))
    echo "<font color=\"red\">User name already in use</font><br>";
  else if ($f_memberpass != $f_memberpassr)
    echo "<font color=\"red\">Passwords do not match</font><br>";
  else if (($change == "yes") and ($f_memberpasso != $password[(getnumn($c_mname))]))
    echo "<font color=\"red\">Password is not correct</font><br>";
  else $signedup = 1;
}
if ($signedup) {
  //print out the details
  if ($change == "yes") $newormod = "modification of member $c_mname";
  else $newormod = "new member";
  $subject = "Banner network: $newormod";
  $body = "Banner Network: $newormod\n" .
          "\n" .
          "Email address: $f_email\n" .
          "User name:     $f_membername\n" .
          "Password:      $f_memberpass\n" .
          "URL:           $f_url\n" .
          "Banner:        $f_banner\n" .
          "\n" .
          "If this is a new user, please vist adduser.html to add them.  Otherwise open users.php and edit the users details\n" .
          "\n" .
          "This is the code for users.php:\n" .
          "\n" .
          "user( \"$f_membername\", \"$f_banner\", \"$f_url\", \"$f_memberpassr\", \"$f_email\" );\n" .
          "";
  mail("$adminemail","$subject","$body");
  if ($change != "yes") {
    ?>
    <h3>Sign Up Complete</h3><br>
    You should be added within the next few days or contacted with a reason why not.<br>Please place the code below into your web site, preferably somewhere prominent.  It should be on the page pointed to by the URL supplied.<br>
    <?php
  } else {
    ?>
    <h3>Edit Complete</h3><br>
    The records should be updated within the next few days or you should contacted with a reason why not.<br>
    If you are changing your user name you will need to use the updated banner code below, if accepted.<br>
    <?php
  }
  echo "These details have been emailed to you<br>";
  $body = "Here is the code which you should place in your page:\n" .
          "\n" .
          "<TABLE WIDTH=\"468\" BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\">
 <TR><TD>
  <A HREF=\"$bannerscript?action=redirect\">
   <IMG BORDER=\"0\" WIDTH=\"468\" HEIGHT=\"60\" ALT=\"$sitename\" SRC=\"$bannerscript?action=image&site=$f_membername\">
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
          "User name: $f_membername\n" .
          "Banner network site: http://rbn.cjb.net/\n";
  mail($f_email,"$sitename",$body);
  ?>
    <form>
    <textarea cols="80" rows="15" wrap="soft"><TABLE WIDTH="468" BORDER="0" CELLPADDING="0" CELLSPACING="0">
 <TR><TD>
  <A HREF="<?php echo "$bannerscript"; ?>?action=redirect">
   <IMG BORDER="0" WIDTH="468" HEIGHT="60" ALT="<? echo"$sitename"; ?>" SRC="<?php echo "$bannerscript"; ?>?action=image&site=<?php echo "$f_membername"; ?>">
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
} else {
  ?>
  Fill out the form below to
  <?php
  if ($change == "yes") {
    echo "submit changes to your details";
    $mnum = getnum($c_mname, $c_pwd);
    $f_email = $email[$mnum];
    $f_membername = $username[$mnum];
    $f_url = $url[$mnum];
    $f_banner = $banner[$mnum];
  } else
    echo "Join The $sitename";
  ?>
  <BR>

  <form method="POST" action="">
  <input type=hidden name=f_s value=s>
  <table>
  <tr><td>
  Your Email Address:
  </td><td>
  <input size="20" type=text name=f_email value="<?php echo "$f_email"; ?>">
  </td></tr>
  <tr><td>
  Desired Username:
  </td><td>
  <input size="20" type=text name=f_membername value="<?php echo "$f_membername"; ?>">
  </td></tr>
  <?php
  if ($change == "yes") {
    ?>
    <tr><td>
    Old Password:
    </td><td>
    <input size="20" type=password name=f_memberpasso value="">
    </td></tr>
    <?php
  }
  ?>
  <tr><td>
  Desired Password:
  </td><td>
  <input size="20" type=password name=f_memberpass value="">
  </td></tr>
  <tr><td>
  Repeat Password:
  </td><td>
  <input size="20" type=password name=f_memberpassr value="">
  </td></tr>
  <tr><td>
  URL to send clicks to:
  </td><td>
  <input size="20" type=text name=f_url value="<?php if (!$f_url) echo "http://"; else echo "$f_url"; ?>">
  </td></tr>
  <tr><td>
  Default banner image URL:
  </td><td>
  <input size="20" type=text name="f_banner" value="<?php if (!$f_banner) echo "http://"; else echo "$f_banner"; ?>">
  </td></tr></table>
  <input type=submit value="Send details"></form></body>
  </html>
<?php
}
include("templates/$template/footer.php");
?>
