<?php

class Modele{
		
		public function Get_AllNews(){
			$ng= new NewsGateway(new Connexion(********));
			$Tab_News=$ng->findAll();
		}
		
		public function Insert_News($lien,$titre,$date,$description,$categorie){
			$ng= new NewsGateway(new Connexion(********));
			$Tab_News=$ng->insert($lien,$titre,$date,$description,$categorie);
		}
		
		public function Delete_date($date){
			$ng= new NewsGateway(new Connexion(********));
			/*regarder ce que retourne execute*/
			$re=$ng->deleteDate($date);
		}
				
		public function Delete_lien($lien){
			$ng= new NewsGateway(new Connexion(********));
			/*regarder ce que retourne execute*/
			$re=$ng->deleteLien($lien);
		}
	
		public function Delete_Categorie($cate){
			$ng= new NewsGateway(new Connexion(********));
			/*regarder ce que retourne execute*/
			$re=$ng->deleteCategorie($cate);
		}
		
		public function Delete_titre($titre){
			$ng= new NewsGateway(new Connexion(********));
			/*regarder ce que retourne execute*/
			$re=$ng->deleteTitre($titre);
		}
		
		public function getNews_titre($titre){
			$ng= new NewsGateway(new Connexion(********));
			$Tab_News=$ng->findTitre($titre);
		}
		
		public function getNews_Categorie($cate){
			$ng= new NewsGateway(new Connexion(********));
			$Tab_News=$ng->findCategorie($cate);
		}
		
		public function getNews_Date($date){
			$ng= new NewsGateway(new Connexion(********));
			$Tab_News=$ng->findDate($date);
		}
		

		
		
		
}

?>
