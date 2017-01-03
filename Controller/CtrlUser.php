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
		    connexion();

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

	function connexion(){
		//Nettoyage validation POST
		$model = new ModeleAdmin();
		if($model->connexion($login,$mdp)) require("Vue/vue.php");
		else {
			$dataVueErreur[] = 'Pb connexion';
			require("Vue/erreur.php");
		}
	}

}
?>
