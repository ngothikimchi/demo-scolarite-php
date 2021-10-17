<h3 class="titre_gestion"> Gestion des matières  </h3>
<br/>
<?php
	$unControleur->setTableOrView ("matiere");

	$chaine = "id_matiere, nom_matiere" ; 
	$lesMatieres = $unControleur->selectAll($chaine); 
	require_once ("vue/vue_select_all_matieres.php"); 
?>