<?php

include_once ('ParseModel.php');
include_once ('News.php');
include_once ('NewsGateway.php');

class ParserXml{

	private $path,$n,$title,$link,$cate,$desc,$date,$item,$res;
	
	public function __construct($path){
		$this->path=$path;
	}

    public function getResult() {
        return $this->res;
    }

	public function parser(){
		ob_start();

		$parser = xml_parser_create();

		xml_set_object($parser, $this); // configure objet comme annalyseur XML

		xml_set_element_handler($parser, "startNews", "endNews"); // Affecte les gestionnaires de début et de fin de balise XML

		xml_set_character_data_handler($parser, 'characterData'); // Affecte les gestionnaires de texte littéral

		if (!($fichier = fopen($this -> path, "r"))) { //Ouverture fichier xml
            die("Pb ouverture fichier xml"); // equivalent à un exit
        }

         while ($data = fread($fichier, 4096)) //4096 = nb octet max à lire
         {
            if (!xml_parse($parser, $data, feof($fichier)))//debut lecture fichier
            {
                die(sprintf("XML error: %s at line %d",
                            xml_error_string(xml_get_error_code($parser)),
                            xml_get_current_line_number($parser)));
            }
        }

        $this -> res = ob_get_contents();
/*
        ob_end_clean();

        fclose($fichier);

        xml_parser_free($parser);
*/
	}
	
	
	private function startNews($parser, $name, $attrs){

		/*switch($name){
			case 'item':
                echo('startNews '.$name."\r\n");
				$this->n=new News(null,null,null,null,null);
				$this->item=true;
				break;
			
			case 'title':
                echo('startNews '.$name."\r\n");
				$this->title =true;
				break;
				
			case 'url' :
                echo('startNews '.$name."\r\n");
				$this->url = true;
				break;
				
			case 'link' :
                echo('startNews '.$name."\r\n");
				$this->url= true;
				break;
			
			case 'catégorie':
                echo('startNews '.$name."\r\n");
				$this->cate=true;
				break;
			
			case 'category':
                echo('startNews '.$name."\r\n");
				$this->cate=true;
				break;
				
			case 'description':
                echo('startNews '.$name."\r\n");
				$this->desc=true;
				break;
			
			case 'date':
                echo('startNews '.$name."\r\n");
				$this->date=true;
				break;
		
		}*/
		if(strcmp($name,'item'))
		{
            echo('startNews '.$name.'<br/>'."\n");
            $this->item=true;
		}
        if(strcmp($name,'title'))
        {
            echo('startNews '.$name.'<br/>'."\n");
            $this->title=true;
        }
        if(strcmp($name,'link'))
        {
            echo('startNews '.$name.'<br/>'."\n");
            $this->item=true;
        }
        if(strcmp($name,'description'))
        {
            echo('startNews '.$name.'<br/>'."\n");
            $this->item=true;
        }
        if(strcmp($name,'category'))
        {
            echo('startNews '.$name.'<br/>'."\n");
            $this->item=true;
        }
        if(strcmp($name,'date'))
        {
            echo('startNews '.$name.'<br/>'."\n");
            $this->item=true;
        }


	}
	
	private function endNews($parser, $name){

		 /*switch($name){
			case 'item':
                echo('endNews '.$name."\r\n");
				if(!ParseModel::newsExist(($this->n->getLien()))){
					insert($this->n->getLien(),$this->n->getTitre(),$this->n->getDate(),$this->n->getDescription(),$this->n->getCategorie());
				}
				
				$this->item=false;
				break;
			
			case 'title':
                echo('endNews '.$name."\r\n");
				$this->title =false;
				break;
				
			case 'url' :
                echo('endNews '.$name."\r\n");
				$this->url = false;
				break;
				
			case 'link' :
                echo('endNews '.$name."\r\n");
				$this->url= false;
				break;
			
			case 'categorie':
                echo('endNews '.$name."\r\n");
				$this->cate=false;
				break;
			
			case 'category':
                echo('endNews '.$name."\r\n");
				$this->cate=false;
				break;
				
			case 'description':
                echo('endNews '.$name."\r\n");
				$this->desc=false;
				break;
			
			case 'date':
                echo('endNews '.$name."\r\n");
				$this->date=false;
				break;
			}*/

        if(strcmp($name,'item'))
        {
            echo('endNews '.$name.'<br/>'."\n");
            if(!ParseModel::newsExist(($this->n->getLien()))){
            	echo("insert");
                insert($this->n->getLien(),$this->n->getTitre(),$this->n->getDate(),$this->n->getDescription(),$this->n->getCategorie());
            }

            $this->item=false;
        }
        if(strcmp($name,'title'))
        {
            echo('endNews '.$name.'<br/>'."\n");
            $this->title =false;
        }
        if(strcmp($name,'link'))
        {
            echo('endNews '.$name.'<br/>'."\n");
            $this->link =false;
        }
        if(strcmp($name,'description'))
        {
            echo('endNews '.$name.'<br/>'."\n");
            $this->desc =false;
        }
        if(strcmp($name,'category'))
        {
            echo('endNews '.$name.'<br/>'."\n");
            $this->cate =false;
        }
        if(strcmp($name,'date'))
        {
            echo('endNews '.$name.'<br/>'."\n");
            $this->date =false;
        }
		 
	}
	
	private function characterData($parser, $data){

		$data = trim($data); // supprime les espaces en début et fin de chaines

        if (strlen($data) > 0){
        	if($this->item){
                $this->n = new News();
                echo('Ne'.'<br/>'."\n");
            }
			if($this->title){
                echo('Data '.$data.'<br/>'."\n");
				$this->n->setTitre($data);
			}
			if($this->date){
                echo('Data '.$data.'<br/>'."\n");
				$this->n->setDate($data);
			}
			if($this->cate){
                echo('Data '.$data.'<br/>'."\n");
				$this->n->setCategorie($data);
			}
			if($this->desc){
                echo('Data '.$data.'<br/>'."\n");
				$this->n->setDescription($data);
			}
			if($this->link){
                echo('Data '.$data.'<br/>'."\n");
				$this->n->setLien($data);
			}
			 
		 }
	}

}


?>
