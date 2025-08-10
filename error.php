<?
###########################################
#CONFLICT2K.COM Php ERROR script.
#Script says error when visitors get errors from your page like 404 error.
#To use it simple upload all files to your main directory.
#The most important is to upload .htaccess file. If you have already simple change there lines.(read readme for details.)
#Do not forget to upload error html pages as well.(you can make them for your choice if you want.)
#Do not forget to change html paths.
#This script is free of charge. Do not hesitate to suggest this script to your friends.
#Thanks for using this script. And Check Out CONFLICT2K.COM
###########################################

#change this to your html pages if you have changed them.
//You can use full url like http://mypage.com/404.htm
$htm_401="http://www.yoursitehere.com/401.htm";
$htm_404="http://www.yoursitehere.com/404.htm";
$htm_403="http://www.yoursitehere.com/403.htm";
$htm_500="http://www.yoursitehere.com/500.htm";

$mail=1;					//if you want to be informed about broken link.
$to='youremailhere.com';			//your email.
$subject="Error from website";	//subject of mail

#nothing else to change. Leave this section as is.

if ($QUERY_STRING == '401'){
$mailbody="There is 401 error url= $HTTP_REFERER";
header ("Location: $htm_401");
}
if ($QUERY_STRING == '403'){
$mailbody="There is 403 error url= $HTTP_REFERER";
header ("Location: $htm_403");
}
if ($QUERY_STRING == '404'){
$mailbody="There is 404 error url= $HTTP_REFERER";
header ("Location: $htm_404");
}
if ($QUERY_STRING == '500'){
$mailbody="There is 500 error url= $HTTP_REFERER";
header ("Location: $htm_500");
}
else{
print "Unknown error!";
}
if($mail==1){
mail($to,$subject,$mailbody);
}
?>