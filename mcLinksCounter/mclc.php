<?
// mcLinksCounter 1.2 - Marc Cagninacci - marc@phpforums.net - http://www.phpforums.net

// COMPLETER LES VARIABLES CI-DESSOUS--------------------------
// FILL THE VARIABLES BELOW -----------------------------------

         // MySQL
         $host="";
         $login="";
         $pass="";
         $base="";
         // mcLinksCounter
         $langfile="french.php";
         $admin_login="";
         $admin_pass="";

// FIN DE LA ZONE A MODIFIER ----------------------------------
// END OF THE MODIFICATION AREA--------------------------------


 $mclcOS['Win98']   = 'Win 98';
    $mclcOS['WinNT']   = 'Win NT';
    $mclcOS['Win95']   = 'Win 95';
    $mclcOS['WinMe']   = 'Win Me';
    $mclcOS['WinXP']   = 'Win XP';
    $mclcOS['Win2000'] = 'Win 2000';
    $mclcOS['Linux']   = 'Linux';
    $mclcOS['Mac PPC'] = 'Mac PPC';

    $mclcagent['Internet Explorer'] = 'IE;';
    $mclcagent['Netscape']          = 'NS;';
    $mclcagent['Opera']             = 'OP;';

    $mclcother_agt['Lynx']      = 'Lynx - Linux';
    $mclcother_agt['WWWOFFLE']  = 'WWWOFFLE - Linux';
    $mclcother_agt['Konqueror'] = 'Konqueror - Linux';

    $mclcagent_versions['IE'] = Array(
        '6.0',
        '5.5',
        '5.5b2',
        '5.5b3',
        '5.01',
        '5.0',
        '5.0b1',
        '5.0b2',
        '4.5',
        '4.01',
        '4.0',
        '3.02',
        '3.01'
    );

    $mclcagent_versions['NS'] = Array(
        '4.76',
        '4.75',
        '4.74',
        '4.73',
        '4.72',
        '4.71',
        '4.7',
        '4.61',
        '4.6',
        '4.51',
        '4.5',
        '4.08',
        '4.07',
        '4.06',
        '4.05',
        '4.04',
        '4.03'
    );

    $mclcagent_versions['OP'] = Array(
        '5.12',
        '5.11',
        '5.0',
        '4.0',
        '3.60',
        '3.62'
    );

    $mclcagent_versions['NS6'] = Array(
        '6.1',
        'm14',
        'm17',
        'm18'
    );

    // [$mclcagent_versions] replaced by [$mclcagent_versions]

    $mclcagent_versions_2['NS6'] = Array(
        '6.1',
        '6.0',
        '6.0',
        '6.0'
    );

    $mclcagent_os['IE'] = Array(
        'Windows 95'     => 'Win95',
        'Win32'          => 'Win95',
        'Win 9x 4.90'    => 'WinMe',
        'Windows 98'     => 'Win98',
        'Windows NT 5.0' => 'Win2000',
        'Windows NT 5.1' => 'WinXP',
        'Windows NT'     => 'WinNT',
        'Mac PowerPC'    => 'Mac PPC',
        'Mac PPC'        => 'Mac PPC'
    );

    $mclcagent_os['NS'] = Array(
        'Win95'          => 'Win95',
        'Win 9x 4.90'    => 'WinMe',
        'Win98'          => 'Win98',
        'WinNT'          => 'WinNT',
        'Windows NT 5.0' => 'Win2000',
        'Windows NT 5.1' => 'WinXP',
        'Windows NT'     => 'WinNT',
        'Linux'          => 'Linux',
        'SunOS'          => 'SunOS',
        'PPC'            => 'Mac PPC',
        'FreeBSD'        => 'FreeBSD',
        'AIX'            => 'AIX',
        'IRIX'           => 'IRIX',
        'HP-UX'          => 'HP-UX',
        'OS/2'           => 'OS/2',
        'NetBSD'         => 'NetBSD'
    );

    $mclcagent_os['OP'] = Array(
        'Windows 95'     => 'Win95',
        'Windows 98'     => 'Win98',
        'Windows 2000'   => 'Win2000',
        'Win 9x 4.90'    => 'WinMe',
        'Windows NT 5.0' => 'Win2000',
        'Windows NT 5.1' => 'WinXP',
        'Windows NT'     => 'WinNT',
        'Linux'          => 'Linux'
    );

// ------------------------------------------------------------------------- //
//------------------------
function analyse_agent($agt)
    {
        global $mclcagent_max_length;
        global $mclcagent_versions;
        global $mclcagent_versions_2;
        global $mclcagent_os;
        global $mclcother_agt;

        $agt = strtr($agt, '+', ' ');

        if (ereg('MSIE', $agt) && !ereg('Opera', $agt))  // Internet Explorer
        {
            $new_agt = 'Internet Explorer';
            $agt = strtr($agt, '_', ' ');

            for ($cnt = 0, $ok = false;
                 $cnt < sizeof($mclcagent_versions['IE']) && !$ok;
                 $cnt++)
            {
                if ($ok = ereg($mclcagent_versions['IE'][$cnt], $agt))
                {
                    $new_agt .= ' '.$mclcagent_versions['IE'][$cnt];

                    for (@reset($mclcagent_os['IE']), $ok = false;
                         (list($key, $value) = @each($mclcagent_os['IE'])) && !$ok;)
                    {
                        if ($ok = ereg($key, $agt))
                            $new_agt .= ' '.$value;
                    }
                }
            }

            if (!$ok) $new_agt = $agt;
        }
        elseif (ereg('Opera', $agt))  // Opera
        {
            $new_agt = 'Opera';

            for ($cnt = 0, $ok = false;
                 $cnt < sizeof($mclcagent_versions['OP']) && !$ok;
                 $cnt++)
            {
                if ($ok = ereg($mclcagent_versions['OP'][$cnt], $agt))
                {
                    $new_agt .= ' '.$mclcagent_versions['OP'][$cnt];

                    for (@reset($mclcagent_os['OP']), $ok = false;
                         (list($key, $value) = @each($mclcagent_os['OP'])) && !$ok;)
                    {
                        if ($ok = ereg($key, $agt))
                            $new_agt .= ' '.$value;
                    }
                }
            }

            if (!$ok) $new_agt = $agt;
        }
        elseif (ereg('Mozilla/4.', $agt)) // Netscape 4.x
        {
            $new_agt = 'Netscape';

            for ($cnt = 0, $ok = false;
                 $cnt < sizeof($mclcagent_versions['NS']) && !$ok;
                 $cnt++)
            {
                if ($ok = ereg($mclcagent_versions['NS'][$cnt], $agt))
                {
                    $new_agt .= ' '.$mclcagent_versions['NS'][$cnt];

                    for (@reset($mclcagent_os['NS']), $ok = false;
                         (list($key, $value) = @each($mclcagent_os['NS'])) && !$ok;)
                    {
                        if ($ok = ereg($key, $agt))
                            $new_agt .= ' '.$value;
                    }
                }
            }

            if (!$ok) $new_agt = $agt;
        }
        elseif (ereg('Mozilla/5.0', $agt) && !ereg('Konqueror', $agt)) // NS 6
        {
            $new_agt = 'Netscape';

            for ($cnt = 0, $ok = false;
                 $cnt < sizeof($mclcagent_versions['NS6']) && !$ok;
                 $cnt++)
            {
                if ($ok = ereg($mclcagent_versions['NS6'][$cnt], $agt))
                {
                    $new_agt .= ' '.$mclcagent_versions_2['NS6'][$cnt];

                    for (@reset($mclcagent_os['NS']), $ok = false;
                         (list($key, $value) = @each($mclcagent_os['NS'])) && !$ok;)
                    {
                        if ($ok = ereg($key, $agt))
                            $new_agt .= ' '.$value;
                    }
                }
            }

            if (!$ok) $new_agt = $agt;
        }
        else // others
        {
            $new_agt = $agt;

            for (@reset($mclcother_agt), $ok = false;
                 (list($key, $value) = @each($mclcother_agt)) && !$ok;)
            {
                if ($ok = ereg($key, $agt))
                    $new_agt = $value;
            }

        }

        $new_agt = strip_tags($new_agt);
         $mclcagent_max_length = 50;
        if (strlen($new_agt) > $mclcagent_max_length)
            $new_agt = substr($new_agt, 0, $mclcagent_max_length-4).' ...';

        return($new_agt);
    }

$agent = analyse_agent($HTTP_USER_AGENT);


if (isset($id))
{
$connect= mysql_connect($host,$login,$pass);
mysql_select_db($base, $connect);
$query= "update mclinkscounter set clic=clic+1 where id='$id'";
mysql_query($query, $connect);
if ($langfile=="french.php")  $date=date("d/m/Y - H:i:s");
else  $date=date("Y/m/d - H:i:s");
$query="insert into mclinkscounter_detail values ('$id', '$agent', '$REMOTE_ADDR', '$date')";
mysql_query($query, $connect);
$query= "select url from mclinkscounter where id='$id'";
$resultat=mysql_query($query, $connect);
$link= mysql_fetch_array($resultat);
header ("location: $link[url]");
}


define ('HOST', $host);
define ('LOGIN', $login);
define ('PASS', $pass);
define ('BASE', $base);

// Affichage un lien sans compteur
function mclc_nom($PHP_SELF,$nom)
{
$connect= mysql_connect(HOST,LOGIN,PASS);
mysql_select_db(BASE, $connect);

$query= "select id, target, nom from mclinkscounter where nom = '$nom'";
$resultat=mysql_query($query, $connect);
         $link=mysql_fetch_array($resultat);

         echo '<a href="'.$PHP_SELF.'?id='.$link[id].'" target="'.$link[target].'">'.$link[nom].'</a>';
}

// Affichage un lien avec compteur
function mclc_nom_clics($PHP_SELF,$nom)
{
$connect= mysql_connect(HOST,LOGIN,PASS);
mysql_select_db(BASE, $connect);
$query= "select * from mclinkscounter where nom='$nom'";
$resultat=mysql_query($query, $connect);
         while ($link=mysql_fetch_array($resultat))
         {
         echo '<a href="'.$PHP_SELF.'?id='.$link[id].'" target="'.$link[target].'">'.$link[nom].'</a> ('.$link[clic].')';
         }
}

// Affichage par catégorie (classement par nom)
function mclc_catN($PHP_SELF,$cat)
{
$connect= mysql_connect(HOST,LOGIN,PASS);
mysql_select_db(BASE, $connect);

$query= "select id, target, nom from mclinkscounter where cat = '$cat' order by nom";
$resultat=mysql_query($query, $connect);
         while ($link=mysql_fetch_array($resultat))
         {
         echo '<a href="'.$PHP_SELF.'?id='.$link[id].'" target="'.$link[target].'">'.$link[nom].'</a><br>';
         }
}

// Affichage par catégorie (classement par nombre de clics)
function mclc_catC($PHP_SELF,$cat)
{
$connect= mysql_connect(HOST,LOGIN,PASS);
mysql_select_db(BASE, $connect);

$query= "select id, target, nom from mclinkscounter where cat = '$cat' order by clic desc";
$resultat=mysql_query($query, $connect);
         while ($link=mysql_fetch_array($resultat))
         {
         echo '<a href="'.$PHP_SELF.'?id='.$link[id].'" target="'.$link[target].'">'.$link[nom].'</a><br>';
         }
}

// Affichage par catégorie avec compteur (classement par nombre de clics)
function mclc_catC_clics($PHP_SELF,$cat)
{
$connect= mysql_connect(HOST,LOGIN,PASS);
mysql_select_db(BASE, $connect);

$query= "select id, target, nom, clic from mclinkscounter where cat = '$cat' order by clic desc";
$resultat=mysql_query($query, $connect);
         while ($link=mysql_fetch_array($resultat))
         {
         echo '<a href="'.$PHP_SELF.'?id='.$link[id].'" target="'.$link[target].'">'.$link[nom].'</a> ('.$link[clic].')<br>';
         }
}

// Affichage par catégorie avec compteur (classement par nom)
function mclc_catN_clics($PHP_SELF,$cat)
{
$connect= mysql_connect(HOST,LOGIN,PASS);
mysql_select_db(BASE, $connect);

$query= "select id, target, nom, clic from mclinkscounter where cat = '$cat' order by nom";
$resultat=mysql_query($query, $connect);
         while ($link=mysql_fetch_array($resultat))
         {
         echo '<a href="'.$PHP_SELF.'?id='.$link[id].'" target="'.$link[target].'">'.$link[nom].'</a> ('.$link[clic].')<br>';
         }
}


// Affichage des x plus populaires par catégorie avec compteur (classement par nombre de clics)
function mclc_catCtop_clics($PHP_SELF,$cat,$top)
{
$connect= mysql_connect(HOST,LOGIN,PASS);
mysql_select_db(BASE, $connect);

$query= "select id, target, nom, clic from mclinkscounter where cat = '$cat' order by clic desc limit 0, $top";
$resultat=mysql_query($query, $connect);
         while ($link=mysql_fetch_array($resultat))
         {
         echo '<a href="'.$PHP_SELF.'?id='.$link[id].'" target="'.$link[target].'">'.$link[nom].'</a> ('.$link[clic].')<br>';
         }
}
