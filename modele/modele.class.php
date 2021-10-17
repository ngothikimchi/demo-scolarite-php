<?php
	class Modele 
	{
		private $pdo; 
		private $uneTable ; 

		public function    __construct ($serveur, $bdd, $user, $mdp){
			$this->pdo = null; 
			try{
$this->pdo = new PDO("mysql:host=".$serveur.";dbname=".$bdd,$user, $mdp); 
			}
			catch (PDOException $exp)
			{
				echo "Erreur de connexion au SGBD"; 
			}
		}

		public function setTableOrView ($uneTable)
		{
			$this->uneTable =$uneTable; 
		}

		// Retourne un tableau du résultat d'une requête
		public function selectAll ($chaine, $filtre = "")
		{
			$where = "";
			if($filtre != "")
				$where = " where ".$filtre;

			$requete = "select ".$chaine." from  ".$this->uneTable.$where;

			$select = $this->pdo->prepare ($requete); 
			$select->execute(); 
			return $select->fetchAll ();
		}


		// Retourne le nombre de résultat d'une requête
		public function count($filtre = "")
		{
			$where = "";
			if($filtre != "")
				$where = " where ".$filtre;

			$requete = "select count(*) as count from  ".$this->uneTable.$where;

			$select = $this->pdo->prepare ($requete); 
			$select->execute(); 
			$result =  $select->fetchAll ();

			return strval($result[0]["count"]);
		}
	}
?>







