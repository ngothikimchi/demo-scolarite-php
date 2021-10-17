<?php
	$unControleur->setTableOrView ("classe");
	$chaine = "*" ; 
	$lesClasses = $unControleur->selectAll($chaine); 
	
?>

<div class="child-container">
	<div class="child-info">
		<h3 class="titre_gestion"> Gestion des classes  </h3>
	</div>
</div>

<?php
	require_once ("vue/vue_select_all_classes.php"); 
?>