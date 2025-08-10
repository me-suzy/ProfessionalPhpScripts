<?
// mcLinksCounter 1.2 - Marc Cagninacci - marc@phpforums.net - http://www.phpforums.net

include "mclc.php";
?>
<html>
<head>
</head>
<body>

Exemple de lien vers PhpForums avec compteur invisible:
<br>Venez visiter <? mclc_nom($PHP_SELF,"PhpForums"); ?>, le site de mcLinksCounter.
<br>
Code correspondant: Venez vister <b>&lt;?($PHP_SELF, "PhpForums") ?&gt</b>, le site de mcLinksCounter.
<?

echo '<br><br><br>';
echo 'un lien vers PhpBank avec compteur visible<br>';
 mclc_nom_clics($PHP_SELF,"PhpBank");
echo '<br><br><br>';

echo 'les liens catégorie "sites" avec compteur invisible par ordre alphabétique<br>';
 mclc_catN($PHP_SELF,"sites");

 echo '<br><br><br>';

echo 'les liens catégorie "sites" avec compteur invisible par ordre de notoriété<br>';
 mclc_catC($PHP_SELF,"sites");


echo '<br><br><br>';
echo 'les liens catégorie "sites" avec compteur visible par ordre de notoriété<br>';
 mclc_catC_clics($PHP_SELF,"sites");


 echo '<br><br><br>';
echo 'les liens catégorie "sites" avec compteur visible par ordre alphabétique<br>';
 mclc_catN_clics($PHP_SELF,"sites");

 echo '<br><br><br>';

echo 'les liens catégorie "scripts" avec compteur invisible par ordre alphabétique<br>';
 mclc_catN_clics($PHP_SELF,"scripts");

 echo '<br><br><br>';

echo 'les liens catégorie "sites" TOP 10<br>';
 mclc_catCtop_clics($PHP_SELF,"sites",1);

 ?>

</body>
</html>