<?php
//This redirects to the banner or to the destination url, depending
//whether action=image or redirect
include("conf.php");

function rnd($min, $max) {
  $num = time();
  $range = ($max - $min + 1);
  $num = ($num % $range) + $min;
  return($num);
}
function addhit($leaf) {
  $counter_file = "./counters/$leaf.txt";
  if ((file_exists($counter_file)) and ($fp = fopen($counter_file, "r"))) {
    $counter = (int) fread($fp, 20);
    fclose($fp);
  } else
    $counter = 0;

  $counter++;

  if (!($fp = fopen( $counter_file, "w"))) die;
  fwrite( $fp, $counter);
  fclose($fp);
  chmod($counter_file, 438);
}

if ($action == "image") {
  $dispby = getnumn($site);
  $bannum = $dispby;

  while ( ($bannum != 1) && ($bannum == $dispby) ) {
    $bannum = rnd(1,($num == 1) ? 1 : ($num - 1));
    if (($dispby > 1) && ($bannum >= $dispby)) $bannum++;
    if (!empty($disallow)) {
      $dis = explode( ",", $disallow );
      for( $i = 0 ; !empty($dis[$i]) ; $i++ ) {
        if (( $bannum == (int)$dis[$i] ) and ($bannum != 1))
          $bannum = $dispby;
      }
    }
  }

  setcookie("bannum",$bannum,0);
  //echo("banner $bannum $banner[$bannum]</html>");
  header("Location: $banner[$bannum]");
  addhit("disp$bannum");
  addhit("dispby$dispby");
} else

if ($action == "redirect" and ($bannum)) {
  header("Location: $url[$bannum]");
  addhit("redir$bannum");
} else

if ($action == "logo") {
  header("Location: img/robn.gif");
} else

if ($action == "dispall") {
  header("Location: dispall.php");
} else

{
  //they've done neither
  header("Location: $url[1]");
}
?>
