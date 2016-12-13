<?php


class CtrlUser
{
    function __construct(){

        require_once (__DIR__.'/Modele/ModeleUsr.php');

        $dataVueErreur = array();

        try
        {
            $action = $_REQUEST['action'];

            switch ($action)
            {


                case NULL:
                    $this->afficheNews();
                    break;


                case 'categorie':
                    categorie($_REQUEST['Catego']);
                    break;

                case 'titre':
                    titre();
                    break;

                default:
                    $dataVueErreur[] = 'Probleme appel php';
                    //require(__DIR__.'/Vue/erreur.php');
                    break;

            }
        }catch
        (PDOException $e){
            $dataVueErreur[] = 'erreur';
            //require(__DIR__.'/Vue/erreur.php');
        }catch (Exception $e){
            $dataVueErreur[] = 'erreur';
            //require(__DIR__.'/Vue/erreur.php');
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


    function Reinit()
    {

    }

    function afficheNews()
    {
        $model = new ModeleUsr();
        $data = $model->get_AllNews();
        //$dataVue=array('data'=>$data);
    }

}
?>