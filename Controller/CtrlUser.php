<?php


class CtrlUser
{
    function __construct(){

        $dataVueErreur = array();

        try
        {
            $action = $_REQUEST['action'];

            switch ($action)
            {
                case null:
                    $this->afficheNews();
                    break;


                case 'categorie':
                    $this->categorie();
                    break;


                case 'titre':
                    $this->titre();
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

    function categorie()
    {
        //nettoyage
        $cate=$_GET['cate'];
        $model = new ModeleUsr();
        $data = $model->getNews_categorie($cate);
        if(isset($data)&&$data!=null) require ("Vue/vue.php");
        else {
            $dataVueErreur[] = 'Pas de news de cette catégorie';
            require("Vue/erreur.php");
        }
    }

    function titre()
    {
        //nettoyage
        $rech=$_POST['recherche'];
        //$rech='%'.$rech.'%';
        $model = new ModeleUsr();
        $data = $model->getNews_titre($rech);
        if(isset($data)&&$data!=null) require ("Vue/vue.php");
        else {
            $dataVueErreur[] = 'Pas de news de ce nom';
            require("Vue/erreur.php");
        }
    }

    function afficheNews()
    {
        $model = new ModeleUsr();
        $data = $model->get_AllNews();
        require("Vue/vue.php");
    }


    function connexion()
    {
        global $adm;
        //Nettoyage validation POST
        $login=$_POST['log'];
        $mdp=$_POST['mdp'];
        $model = new ModeleAdmin();
        if($model->connexion($login,$mdp))
        {
            $adm=true;
            $this->afficheNews();
        }
        else {
            $dataVueErreur[] = 'Pb connexion';
            require("Vue/erreur.php");
        }
    }

}
?>