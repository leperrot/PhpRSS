<?php
    /**
     * Created by PhpStorm.
     * User: bagandboeu
     * Date: 07/12/16
     * Time: 15:00
     */

require_once('Modele/ModeleUsr.php');


class CtrlAdmin
{
    function __construct()
    {

        $dataVueErreur = array();

        try
        {
            $action = $_REQUEST['action'];

            switch ($action)
            {


                case NULL:
                    //$this->afficheNews();
                    break;

                case 'afficheNews':
                    $this->afficheNews();
                    break;

                case 'categorie':
                    categorie();
                    break;

                case 'titre':
                    titre();
                    break;

                case 'ajouter':
                    //ajouter();
                    break;

                case 'supprimer':
                    //supprimer();
                    break;

                case 'deconnexion':
                    //deconnexion()
                    break;


                default:
                    $dataVueErreur[] = 'Probleme appel php';
                    require('Vue/erreur.php');
                    break;

            }
        }catch
        (PDOException $e){
            $dataVueErreur[] = 'erreur';
            require('Vue/erreur.php');
        }catch (Exception $e){
            $dataVueErreur[] = 'erreur';
            require('Vue/erreur.php');
        }
        exit(0);
    }
    function categorie()
    {
        $cate=$_POST['catego'];
        $model = new ModeleUsr();
        $data = $model->getNews_categorie($cate);
        //$dataVue=array('data'=>$data);
    }

    function titre()
    {
        $titre=$_POST['titre'];
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

}
