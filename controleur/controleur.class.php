<?php
	require_once ("modele/modele.class.php"); 
	class Controleur 
	{
		private $unModele ; 

		public function __construct ($serveur, $bdd, $user, $mdp){
			$this->unModele= new Modele($serveur, $bdd, $user, $mdp);
		}

		public function selectAll ($chaine = "*", $filtre = "")
		{
			return $this->unModele->selectAll($chaine, $filtre);
		}
		
		public function setTableOrView ($uneTable)
		{
			$this->unModele->setTableOrView ($uneTable); 
		}

		public function count($filtre = "")
		{
			return $this->unModele->count ($filtre); 
		}
	}
?>