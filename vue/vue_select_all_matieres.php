<table class="styled-table" >
<thead>
	<tr> 
		<th class="styled-table" > Id Matiere </th>
		<th class="styled-table" > Nom matiere </th> 		
	</tr>
</thead>
<tbody>
	<?php
	foreach ($lesMatieres as $uneMatiere) {
		echo " <tr> 
			<td> ".$uneMatiere['id_matiere']."</td>
			<td> ".$uneMatiere['nom_matiere']."</td>
		</tr>";
	}
	?>
</tbody>
</table>