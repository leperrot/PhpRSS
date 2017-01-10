<?php

include_once ('ParseModel.php');
include_once ('News.php');
include_once ('NewsGateway.php');

class ParserXml{

	private $path,$n,$title,$link,$cate,$desc,$date,$item,$res;

	public function __construct($path){
		$this->path=$path;
		//echo('parser creé <br/>');
	}

    public function getResult() {
        return $this->res;
    }

	public function parser(){
	    //echo("parse appelé");
		//ob_start();
        //echo ("parse");
		$parser = xml_parser_create();

		xml_set_object($parser, $this); // configure objet comme annalyseur XML

		xml_set_element_handler($parser, "startNews", "endNews"); // Affecte les gestionnaires de début et de fin de balise XML

		xml_set_character_data_handler($parser, 'characterData'); // Affecte les gestionnaires de texte littéral

		if (!($fi = fopen($this -> path, "r"))) { //Ouverture fichier xml
            die("Pb ouverture fichier xml"); // equivalent à un exit
        }

         while ($data = fread($fi, 4096)) //4096 = nb octet max à lire
         {
            if (!xml_parse($parser, $data, feof($fi)))//debut lecture fichier
            {
                die(sprintf("XML error: %s at line %d",
                            xml_error_string(xml_get_error_code($parser)),
                            xml_get_current_line_number($parser)));
            }
        }

        $this -> res = ob_get_contents();

        //ob_end_clean();

        fclose($fi);

        xml_parser_free($parser);
	}
	
	
	private function startNews($parser, $name, $attrs){


		if(strcmp($name,'ITEM')==0)
		{
            //echo('balise item '.$name.'<br/>'."\n");
            $this->n = new News();
            $this->item=true;
		}
        if(strcmp($name,'TITLE')==0)
        {

            //echo('balise titre '.$name.'<br/>'."\n");
            $this->title=true;
        }
        if(strcmp($name,'LINK')==0)
        {
            //echo('balise link '.$name.'<br/>'."\n");
            $this->link=true;
        }
        if(strcmp($name,'DESCRIPTION')==0)
        {
            //echo('balise descr '.$name.'<br/>'."\n");
            $this->desc=true;
        }
        if(strcmp($name,'CATEGORY')==0)
        {
            //echo('balise cate '.$name.'<br/>'."\n");
            $this->cate=true;
        }
        if(strcmp($name,'DATE')==0 || strcmp($name,'PUBDATE')==0)
        {
            //echo('balise date '.$name.'<br/>'."\n");
            $this->date=true;
        }


	}
	
	private function endNews($parser, $name){


        if(strcmp($name,'ITEM')==0)
        {
            //$this->n->ToString();
            //if(ParseModel::newsExist(($this->n->getLien()))) {
                //echo("insert");
                echo('bla');
            try {
                ParseModel::insert_News($this->n->getLien(), $this->n->getTitre(), $this->n->getDate(), $this->n->getDescription(), $this->n->getCategorie());
            }catch (Exception $e){
                echo'news existe deja';
            }


            $this->item=false;
        }
        if(strcmp($name,'TITLE')==0)
        {
            //echo('fin balise title '.$name.'<br/>'."\n");
            $this->title =false;
        }
        if(strcmp($name,'LINK')==0)
        {
            //echo('fin balise link'.$name.'<br/>'."\n");
            $this->link =false;
        }
        if(strcmp($name,'DESCRIPTION')==0)
        {
            //echo('fin balise desc'.$name.'<br/>'."\n");
            $this->desc =false;
        }
        if(strcmp($name,'CATEGORY')==0)
        {
           // echo('fin balise category '.$name.'<br/>'."\n");
            $this->cate =false;
        }
        if(strcmp($name,'DATE')==0 || strcmp($name,'PUBDATE')==0)
        {
            //echo('fin balise date'.$name.'<br/>'."\n");
            $this->date =false;
        }
		 
	}
	
	private function characterData($parser, $data){

		$data = trim($data); // supprime les espaces en début et fin de chaines

        if (strlen($data) > 0 && $this->item==true){
			if($this->title){
                //echo('titre = '.$data.'<br/>'."\n");
				$this->n->setTitre($data);
            }
			if($this->date){
                //echo('Date = '.$data.'<br/>'."\n");
				$this->n->setDate($data);
            }
			if($this->cate){
                //echo('cate = '.$data.'<br/>'."\n");
				$this->n->setCategorie($data);
            }
			if($this->desc){
                //echo('desc = '.$data.'<br/>'."\n");
				$this->n->setDescription($data);
            }
			if($this->link){
                echo('lien = '.$data.'<br/>'."\n");
				$this->n->setLien($data);
			}
			 
		 }
	}

}


?>
