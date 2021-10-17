<table class="styled-table" >
<thead>
	<tr> 
		<th class="styled-table"> Nom </th>
		<th class="styled-table"> Prénom </th> 
		<th class="styled-table"> Date de naissnace </th> 
		<th class="styled-table"> Adresse</th> 
		<th class="styled-table"> Ville</th>
		<th class="styled-table"> Classe</th>
	</tr>
</thead>
<tbody>
	<?php
	foreach ($lesEtudiants as $unEtudiant) 
	{
		echo " <tr> 
			<td> ".$unEtudiant['nom_user']."</td>
			<td> ".$unEtudiant['prenom_user']."</td>
			<td> ".$unEtudiant['date_naissance_user']."</td>
			<td> ".$unEtudiant['num_rue_user']." ".$unEtudiant['adr_user']."</td>
			<td> ".$unEtudiant['ville_user']."</td>
			<td> ".$unEtudiant['nom_classe']."</td>
		</tr>";
	}
	?>
</tbody>
</table>