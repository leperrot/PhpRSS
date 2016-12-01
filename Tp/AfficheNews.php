<?php
/**
 * Created by PhpStorm.
 * User: bagandboeu
 * Date: 29/11/16
 * Time: 15:06
 */


$page=$_GET['nbpages'];
//validation
//mySQL -> LIMIT 2 params : 1er n°id, nb lignes à  récup
//SELECT * FROM TNews LIMIT 0,10
//                    LIMIT (nbpages-1)*10,10
//script
//->recupérer le n° de page
//->          le nb de news total
//$nbpagestotales=ceil(nbnews/nbnewsparpages(10))
//->recup news de la page
//$query=select * from TNews LIMIT (nbpages-1)*10,10)
//getResult->$tab
//Affichage
//<html><body>
//<?php
//foreach($tab as $ligne){
//    echo '<p> news : '.$ligne['URL'].'</p>';
//}
?>
<a href="http://localhost/script.php?
            nbpages="
    <?php echo $nbpages+1;?>
    />next</a>
</body></html>

?>