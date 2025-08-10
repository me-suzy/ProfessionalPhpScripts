<?php
include("conf.php");
$mnum = getnum($f_mname, $f_pass);
if ($mnum) {
  $lin = rawurlencode("Logged in!");
  header("location: ./?message=$lin");
  setcookie ("c_mname","$f_mname",time()+1800);
  setcookie ("c_pwd","$f_pass",time()+1800);
} else {
  //nasty
  $lin = rawurlencode("Incorrect user/password $mname $mnum $pass");
  header("location: ./?message=$lin");
}
?>
