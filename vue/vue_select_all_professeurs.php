

<table class="styled-table" >
<thead>
	<tr> 
		<th class="styled-table">Nom</th>
		<th class="styled-table">Prénom</th> 
		<th class="styled-table">Matière </th>
		<th class="styled-table">Diplôme</th>
		<th class="styled-table">Classe</th>
	</tr>
</thead>
<tbody>
	<?php
	
	foreach ($lesProfs as $unProf) {
		echo " <tr> 
			<td> ".$unProf['nom_user']."</td>
			<td> ".$unProf['prenom_user']."</td>
			<td> ".$unProf['nom_matiere']."</td>
			<td> ".$unProf['diplome_user']."</td>	
			<td> ".$unProf['nom_classe']."</td>	
		</tr>";
	}
	?>
</tbody>
</table>