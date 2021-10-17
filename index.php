<?php
	require_once("controleur/controleur.class.php"); 
	require_once("controleur/config_db.php"); 
	require_once("controleur/config_env.php"); 
	//instanciation de la classe Controleur
	$unControleur = new Controleur($serveur, $bdd, $user, $mdp);
	$unControleur->setTableOrView ("ViewInfoEta");

	// Tableau des infos de l'établissement
	$infoEta = $unControleur->selectAll("*", "id_etab=".$idEtab)[0];
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Gestion de etablishement scolarité </title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<script src="https://kit.fontawesome.com/f1f264d28e.js" crossorigin="anonymous"></script>

</head>
<body class="index-page">
	<div class="container">
		<div class="title">
			<a href="index.php?page=classe">
				<img class="logo" src="images/logo.png" width="50" height="50">
			</a>
			<a href="index.php?page=classe">
				<h1 class="title_eta"> <?php echo $infoEta["nom_etb"] ?> </h1>
			</a>
		</div>
				
		<div class="eta-info">
			<div> 
				<?php echo $infoEta["num_rue"]." ".$infoEta["adr_etb"] ?> 
			</div>
			<div> 
				Directeur : <?php echo $infoEta["prenom_user"]." ".$infoEta["nom_user"] ?> 
			</div> 
			<div> 
				Nombre total d'élève : <?php echo $infoEta["count_etudiant"] ?> 
			</div>
		</div>

		
	<?php
		if (isset($_GET['page'])) $page = $_GET['page']; 
		else $page = "classe"; 
		
		switch($page){
			case "classe" : require_once("gestion_classes.php"); 	
					 break;
			case "etudiant" : require_once("gestion_etudiants.php"); 	
					 break;
			case "professeur" : require_once("gestion_professeurs.php");
					 break;
			case "matiere" : require_once("gestion_matieres.php"); 	
					 break;
			default : require_once("erreur.php"); 	
					 break;
		}

	?>
	</div>
</body>
</html>






