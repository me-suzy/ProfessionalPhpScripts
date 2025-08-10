<?php

function getnum($name,$pass) {
  global $num, $username, $password;
  $name = strtolower($name);
  $locnum = 1;
  while (($locnum < $num) and ($name != $username[$locnum])) {
    $locnum++;
  }
  if ($locnum <= $num)
    if ($username[$locnum] == $name)
      if ($password[$locnum] == $pass)
        return($locnum);
  return(0);
}
function getnumn($name) {
  global $num, $username;
  $name = strtolower($name);
  $locnum = 1;
  while (($locnum < $num) and ($name != $username[$locnum])) {
    $locnum++;
  }
  if ($name == $username[$locnum])
    return($locnum);
  return(0);
}

function user($name, $ban, $desturl, $pass, $addr) {
  global $num, $username, $banner, $url, $password, $email;
  $num++;
  $username[$num] = $name;
  $banner[$num] = $ban;
  $url[$num] = $desturl;
  $password[$num] = $pass;
  $email[$num] = $addr;
}
$num = 0; //don't change this
?>
