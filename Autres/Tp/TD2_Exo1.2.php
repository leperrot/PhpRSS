<?php
/**
 * Created by PhpStorm.
 * User: bagandboeu
 * Date: 29/11/16
 * Time: 14:24
 */
$id=1;
$nom='PERRET';
$prenom='NONO';
$nbAlbum='20';

$dsn='mysql:host=localhost;dbname=TArtiste';
$con= new Connexion($dsn,'user','psw');
$query='insert into TArtiste VALUES (:id,:nom,:prenom,:nba)';
$bool=$con->executeQuery($query,array(':id'=>array($id,PDO::PARAM_STR),
                                'nom'=>array($nom,PDO::PARAM_STR),
                                ':prenom'=>array($prenom,PDO::PARAM_STR),
                                ':nba'=>array($nbAlbum,PDO::PARAM_INT)));
//test $bool
$query='Select nbAlbumFaits From TArtiste where id=:id';
$bool=$con->executeQuery($query,array(
                            ':id'=>array($id,PDO::PARAM_INT)));
//test $bool
$res=$con->getResult();
echo $res[0]['nbAlbumFaits'];
?>