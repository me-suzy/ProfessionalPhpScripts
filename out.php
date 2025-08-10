<?

include('connect.inc');

if(isset($id))
{
$query = "update affiliates set affilclicks=affilclicks+1 where affilid = $id";
$result = mysql_query($query);
$query2 = "select affilurl from affiliates where affilid = $id";
$result2 = mysql_query($query2);
$geturl = mysql_fetch_array($result2);
header ("location: $geturl[affilurl]");
}
elseif(isset($url))
{
$query = "select * from links where linkurl='$url'";
$result = mysql_query($query);
if (mysql_num_rows($result)>0)
{
$query2 = "update links set linkclicks = linkclicks + 1 where linkurl = '$url'";
$result = mysql_query($query2);
header ("location: $url");
}
else
{
$insert = "INSERT INTO links (linkid, linkurl, linkclicks) VALUES ('', '$url', '1')";
$result= mysql_query($insert);
header ("location: $url");
}
}
else
{
echo"Nothing defined";
}
?>