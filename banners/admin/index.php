<?php
include("../conf.php");
if ($pass == $adminpass)
{
setcookie ("c_pwd","$pass",time()+1800);
?>
<html><body>
Logged In
</body></html>
<?php
} else {
?>
<html>
<body background="../img/bg.gif">
<?php
echo"$message";
?>
<h1>Not in use in 0.03</h1>
enter password:
<form action="" method="post">
<input type="password" name="pass">
<input type="hidden" name="message" value="Incorrect Password<br>">
</form>
</body>
</html>
<?php
}
?>