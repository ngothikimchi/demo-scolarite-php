<table class="styled-table" >
<thead>
	<tr> 
		<th class="styled-table"> Code classe </th>
		<th class="styled-table"> Nom classe </th>
		<th class="styled-table"> Gestion des professeurs</th> 
		<th class="styled-table"> Gestion des etudiants </th>  
	</tr>
</thead>
<tbody>
	<?php
	foreach ($lesClasses as $uneClasse) {
		echo " <tr> 
			<td> ".$uneClasse['code_classe']."</td>
			<td> ".$uneClasse['nom_classe']."</td>
			<td class=\"button\"> <a href=\"index.php?page=professeur&code_classe=".$uneClasse['code_classe']."\"><i class=\"fas fa-eye\"></i></a></td>
			<td class=\"button\"> <a href=\"index.php?page=etudiant&code_classe=".$uneClasse['code_classe']."\"><i class=\"fas fa-eye \"></i></a></td>
		</tr>";
	}
	?>
</tbody>
</table>