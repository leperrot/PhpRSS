<?php
    /**
     * Created by PhpStorm.
     * User: bagandboeu
     * Date: 07/12/16
     * Time: 15:00
     */

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

                case null:
                    $this->afficheNews();
                    break;

                case 'Vajout':
                    require ('Vue/formAjout.php');
                    break;

                case 'ajouter':
                    $this->ajouter();
                    break;

                case 'supprimer':
                    //supprimer();
                    break;

                case 'deconnexion':
                    $this->deconnexion();
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

    function afficheNews()
    {
        $model = new ModeleUsr();
        $data = $model->get_AllNews();
        require("Vue/vue.php");
    }

    function ajouter()
    {
        //nettoyage
        $lien=$_POST['lien'];
        $titre=$_POST['titre'];
        $date=$_POST['date'];
        $desc=$_POST['desc'];
        $cate=$_POST['cate'];
        $model = new ModeleAdmin();
        $dataVueErreur[] = $model->insert_News($lien,$titre,$date,$desc,$cate);
        require("Vue/erreur.php");
    }

    function deconnexion()
    {
        ModeleAdmin::deconnexion();
        require ("index.php");
    }

}