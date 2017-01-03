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

    public function __construct(){
        session_start();

        $actionAdmin=array('deconnexion','ajouter','supprimer');

        try{
            $a= ModeleAdmin::isAdmin();

            if ($_REQUEST['action'].in_array($actionAdmin)){
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
