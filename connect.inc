<?

$database = "localhost";
$dbname = "affils";
$dbuser = "root";
$dbpass = "";

mysql_connect($database, $dbuser, $dbpass) or die ("Couldn't connect to database.");
mysql_select_db($dbname) or die ("Couldn't select databse");

?>