<?php

/**
 * Created by PhpStorm.
 * User: BASTIEN
 * Date: 13/12/2016
 * Time: 17:00
 */
class FrontController
{
    private $vueErreur=array();
    private $adm;

    public function __construct(){

        $actionAdmin=array('deconnexion','ajouter','supprimer','Vajout');

        try{
            $a= ModeleAdmin::isAdmin();

            if (in_array($_REQUEST['action'],$actionAdmin)){
                if($a==NULL){
                    require ('Vue/adminLog.php');
                }else{
                    new CtrlAdmin();
                }
            }else{
                new CtrlUser();
            }
        }catch(Exception $exception){
            require('Vue/erreur.php');
        }

    }
}

?>