<?php
	$code_classe = "";
	// Récupérer info de la classe
	if(isset($_GET["code_classe"]))
	{	
		$code_classe = $_GET["code_classe"];
		$unControleur->setTableOrView ("classe");
		$infoClasse = $unControleur->selectAll("*", "id_etab=".$idEtab." and code_classe=\"".$code_classe."\"")[0];
	}

	$unControleur->setTableOrView ("ViewListProf");
	$chaine = "*" ; 
	$filter = "id_etab=".$idEtab;

	// Filtrer les professeurs de la classe 
	if($code_classe != "")
		$filter = "id_etab=".$idEtab." and code_classe=\"".$_GET["code_classe"]."\"";

	$lesProfs = $unControleur->selectAll($chaine, $filter); 
	$count_prof = $unControleur->count($filter);
?>

<div class="child-container">
	<div class="child-info">
		<h3 class="titre_gestion"> Gestion des professeurs <?php echo $infoClasse["nom_classe"]; ?>  </h3>
		<h4>Nombre de professeurs de la classe : <?php echo $count_prof ?> </h4>
	</div>

	<a href="index.php?page=classe"> <i class="fas fa-arrow-left"></i> Gestion des classes</a>
</div>

<?php
	require_once ("vue/vue_select_all_professeurs.php");
?>

