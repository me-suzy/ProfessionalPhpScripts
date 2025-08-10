<?php
include("conf.php");
if ($sitename=="")
{
header("Location: install.html");
} else {
include("templates/$template/header.php");
?>
<table>
 <tr>
  <td valign="top">
   <?php
   if (empty($c_mname)) {
   ?>
    <CENTER>
     Log in to <? echo"$sitename"; ?><BR>
     <form method="POST" action="login.php">
      User name:<BR><input type=text name=f_mname><BR>
      Password:<BR><input type=password name=f_pass><BR>
      <input type="image" src="img/login.gif" width="122" height="27" value="Submit Login">
     </form>
     <BR>
     <font size=1><A href="forgot.php">Forgot Password?</a></font><br>
     <small>If you get can see this message when you are logged in then cookies may be turned off.<br>
     Cookies are required to log in.</small><br>
     <a href="dispall.php">View all banners</a><br>
    </CENTER>
    <hr>
    <CENTER>
     Not a member?<br>
     <A HREF="signup.php"><IMG ALT="Join Now!" width="122" height="27" border="0" SRC="img/join.gif"></A>
    </CENTER>
    <?php
   } else {
     $mnum = getnum($c_mname, $c_pwd);
     if ($mnum) {
      ?>
      <h5>Welcome <?php echo "$c_mname"; ?></h5>
      <a href="dispall.php">View all banners</a><br>
      <a href="signup.php?change=yes">Change details</a><br>
      <a href="mailcode.php">Get code</a><br>
      <a href="logout.php">Log out</a><br><br>
      <?php
      echo "<table width=\"100%\"><tr><td>User&nbsp;banner&nbsp;displays:&nbsp;</td><td align=\"right\">";
      if (file_exists("counters/disp$mnum.txt")) include("counters/disp$mnum.txt"); else echo "0";
      echo "</td></tr><tr><td>User&nbsp;banner&nbsp;clicks:&nbsp;</td><td align=\"right\">";
      if (file_exists("counters/redir$mnum.txt")) include("counters/redir$mnum.txt"); else echo "0";
      echo "</td></tr><tr><td>Banners&nbsp;displayed&nbsp;by&nbsp;you:&nbsp;</td><td align=\"right\">";
      if (file_exists("counters/dispby$mnum.txt")) include("counters/dispby$mnum.txt"); else echo "0";
      echo "</td></tr></table>";
     } else {
       ?>
       <H3>User data inaccessible</H3>
       <a href="logout.php">Log out</a>
       <?php
     }
   }
  ?>
  <HR>
  <CENTER>
   Do you need a banner?<br>
   <A HREF="http://www.addesigner.com/"><IMG ALT="Create Banner" width="122" height="27" border="0" SRC="img/create.gif"></A>
  </CENTER>
 </td><td valign="top">
  <?php
  if (empty($c_mname)) {
   ?>
  <CENTER>
    <TABLE WIDTH="468" BORDER="0" CELLPADDING="0" CELLSPACING="0">
 <TR><TD>
  <A HREF="<? echo"$bannerscript"; ?>?action=redirect">
   <IMG BORDER="0" WIDTH="468" HEIGHT="60" ALT="<? echo"$sitename"; ?>" SRC="<? echo"$bannerscript"; ?>?action=image&amp;site=<?php echo "$username[1]"; ?>">
  </A>
 </TD></TR>
 <TR><TD>
  <A HREF="<? echo"$bannerscript"; ?>">
   <IMG ALIGN="RIGHT" BORDER="0" WIDTH="124" HEIGHT="11" ALT="<? echo"$sitename"; ?>" SRC="<? echo"$bannerscript"; ?>?action=logo">
  </A>
 </TD></TR>
</TABLE>
  </CENTER>
  <HR>

<?php echo "$welcometext"; } else { ?>

<!--<font size="4" color="#ff0000">News</font><br>-->

<font size="4"><b>01.01.1901</b></font><br>
<font size="2"><i>You Can Put News Here You Can Put News Here You Can Put News Here You Can Put News Here You Can Put News Here You Can Put News Here You Can Put News Here </i></font><hr>

<?php } ?>

</td>
</tr>
</table>
<?php
include("templates/$template/footer.php");
}
?>
