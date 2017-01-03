<?php


class CtrlUser
{
    function __construct(){

        //require_once ('../Modele/ModeleUsr.php');

        $dataVueErreur = array();

        try
        {
            $action = $_REQUEST['action'];

            switch ($action)
            {
                case NULL:
                    $this->afficheNews();
                    //testErreur
                    /*$dataVueErreur[] = 'Probleme appel php';
                    require('Vue/erreur.php');*/
                    break;


                case 'categorie':
                    categorie($_REQUEST['Catego']);
                    break;

                case 'titre':
                    titre();
                    break;

                case 'connexion':
                    $this->connexion();
                    break;

                case 'admin':
                    require ('Vue/adminLog.php');
                    break;

                default:
                    $dataVueErreur[] = 'Probleme appel php';
                    require('Vue/erreur.php');
                    break;

            }
        }catch
        (PDOException $e){
            $dataVueErreur[] = 'PDOException';
            require('Vue/erreur.php');
        }catch (Exception $e){
            $dataVueErreur[] = 'Exception';
            require('Vue/erreur.php');
        }

        exit(0);

    }

    function categorie($cate)
    {
        $model = new ModeleUsr();
        $data = $model->getNews_categorie($cate);
        //$dataVue=array('data'=>$data);
    }

    function titre($titre)
    {
        $model = new ModeleUsr();
        $data = $model->getNews_titre($titre);
        //$dataVue=array('data'=>$data);
    }

    function afficheNews()
    {
        $model = new ModeleUsr();
        $data = $model->get_AllNews();
        require("Vue/vue.php");
    }


    function connexion()
    {
        //Nettoyage validation POST
        $login=$_POST['log'];
        $mdp=$_POST['mdp'];
        $model = new ModeleAdmin();
        if($model->connexion($login,$mdp)) require ("index.php");
        else {
            $dataVueErreur[] = 'Pb connexion';
            require("Vue/erreur.php");
        }
    }

}
?>