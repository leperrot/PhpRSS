<html>
<body>

<?php

/**
 * Created by PhpStorm.
 * User: bagandboeu
 * Date: 30/11/16
 * Time: 13:56
 */

require 'Connexion.php';

$login='bagandboeu';
$psw='1996B13g';

$con=new Connexion('mysql:host=hina;dbname=dbbagandboeu',$login,$psw);
/*
$query='INSERT INTO TNews VALUES(:titre,:lien,:d,:des,:categorie)';
return $con->executeQuery($query,array(
    ':titre'=>array('tp1',PDO::PARAM_STR),
    ':lien'=>array('http://hina/~progweb/tp/1/tp-1.html',PDO::PARAM_STR),
    ':d'=>array('2016-11-29',PDO::PARAM_STR),
    ':des'=>array('Le tp1 était trop génial.',PDO::PARAM_STR),
    ':categorie'=>array('Informatique',PDO::PARAM_STR)));
*/
/*
$query='SELECT * FROM TNews';
$res=$con->executeQuery($query);

$res=$con->getResults();
foreach ($res as $r){
    echo '<p>'.$r['Titre'].'<BR>'.$r['Lien'].'<BR>'.$r['Date'].'<BR>'.$r['Description'].'<BR>'.$r['Categorie'].'<BR></p>';
}
*/
/*
$query='SELECT * FROM TNews LIMIT 0,1';
$res=$con->executeQuery($query);

$res=$con->getResults();
foreach ($res as $r){
    echo '<p>'.$r['Titre'].'<BR>'.$r['Lien'].'<BR>'.$r['Date'].'<BR>'.$r['Description'].'<BR>'.$r['Categorie'].'<BR></p>';
}
*/
/*
$query='UPDATE TNews SET Titre=:titre WHERE Titre=:titre1';
$res=$con->executeQuery($query,array(
    ':titre'=>array('Travaux Pratiques 1',PDO::PARAM_STR),
    ':titre1'=>array('tp1',PDO::PARAM_STR)));
*/
$query='SELECT * FROM TNews WHERE Titre=:titre';
$res=$con->executeQuery($query,array(
    ':titre'=>array('Travaux Pratiques 1',PDO::PARAM_STR)));

$res=$con->getResults();
foreach ($res as $r){
    echo '<p>'.$r['Titre'].'<BR>'.$r['Lien'].'<BR>'.$r['Date'].'<BR>'.$r['Description'].'<BR>'.$r['Categorie'].'<BR></p>';
}

?>


</body>
</html>
