<?php
include("conf.php");
include("templates/$template/header.php");
$failed = 1;
if (!empty($name)) {
  //mail it
  $no = getnumn($name);
  if (!empty($email[$no])) {
    mail("$email[$no]","$sitename Password","Password for user $name is $password[$no].","From: $sitename <$adminemail>\r\nX-Mailer: SloopMailer/0.02");
    $lin = rawurlencode("Password for $name emailed");
    header("Location: ./?message=$lin");
    $failed = 0;
  } else {
    echo "<P>Unknown user!</P>";
  }
}
if ($failed) {
?>
  <P>Fill in your user name and click send, and the password will be emailed to the registered email address.</P>
  <form action="" method="post">
  User name: <input name="name" type="text">
  <input type="submit" value="Send">
  </form>
<?php
}
include("templates/$template/footer.php");
?>
