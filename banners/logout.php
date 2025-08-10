<?php
$lin = rawurlencode("Logged out!");
header("location: ./?message=$lin");
setcookie ("c_mname");
setcookie ("c_pwd");
?>
