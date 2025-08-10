<?php
//$allow<n> set up from 1 to $num
$default = "on";
//$default set up
include "conf.php";
$uno = getnum($c_mname, $c_pwd);
if (!$uno) die;
if (file_exists("allow/allow$uno.txt"))
  $lines = file("allow/allow$uno.txt");
$fp = fopen("allow/allow$uno.txt","w");
if ($default == "on") $yn = "y"; else $yn = "n";
fwrite( $fp, "$yn\n" );
$ptr = 0;
while ($ptr < $num) {
  $ptr++;
  if (empty($lines[$ptr])) $lines[$ptr] = "y";
  switch ($lines[$ptr][0]) {
    case 'y': case 'n':
      if ( $allow[$ptr] == "on" )
        $yn = "y";
      else $yn = "n";
      break;
    case 'o': case 'b':
      if ( $allow[$ptr] == "on" )
        $yn = "o";
      else $yn = "b";
      break;
  }
  fwrite( $fp, "$yn\n" );
}
//our file is up to date, now we need to update the others' files
for ($i = 1; $i <= $num; $i++) {
  if ($i != $uno) {
  if (file_exists("allow/allow$i.txt"))
    $lines = file("allow/allow$i.txt");
  $fp = fopen("allow/allow$i.txt","w");
  //we've opened file number $i into $fp
  if ($lines[0] == "") $lines[0] = "y";
  for ($j = 0; $j <= $num; $j++) {
    if ($lines[$j] == "") $lines[$j] = "$lines[0]";
    if ($j != $uno)
      fwrite( $fp, $lines[$j][0] . "\n" );
    else {
      //ours!!!!
      switch ($lines[$j][0]) {
        case 'y': case 'o':
          if ( $allow[$i] == "on" )
            $yn = "y";
          else $yn = "o";
          break;
        case 'n': case 'b':
          if ( $allow[$i] == "on" )
            $yn = "n";
          else $yn = "b";
          break;
      }
      fwrite( $fp, "$yn\n" );
    }
  }
  }
}
header("location: ./dispall.php");
?>
