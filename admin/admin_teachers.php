<?php
include "include/header.php" ;
?>

<body>
	<header>
		<a href=""><img src="./img/logo@2x.png" alt="Austra" width="140" height"48"/></a>
		<ul>
			<li><a class="pageactive" href="">MMI</a></li>
			<li><a href="">PUB</a></li>
			<li><a href="">MP</a></li>
		</ul>
		<input type="search" name="cours" placeholder="Rechercher un enseignant">
		<a class="boutonright" href="">Ajouter un enseignant</a> 
	</header>
	<aside>
		<ul>
			<li><a href="">Cours</a></li>  
			<li><a href="">Élèves</a></li>  
			<li><a class="pageactive" href="">Enseignants</a></li>  
			<li><a href="">Salles</a></li>  
		</ul>
	</aside>

	<table>
		<thead>
			<td>Prénom</td>
			<td>Nom</td>
			<td>Dpt Principal</td>
			<td>Statut</td>
			<td>Mail</td>
			<td class="options">Coordonnées</td>
			<td class="options">Contraintes</td>
			<td class="options">Charges</td>
		</thead>

		<tr>
			<td class="name">Martine</td>
			<td class="surname">Bornerie</td>
			<td class="department">MMI</td>
			<td class="status">Enseignant</td>
			<td class="">martine.bornerie@u.bordeaux-3.fr</td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
		</tr>

		<tr>
      <td class="name">Hélènes</td>
      <td class="surname">Desliens</td>
      <td class="department">MMI</td>
      <td class="status">Intervenant</td>
      <td class="">helenedesliens@yahoo.fr</td>
      <td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
    </tr>

		<tr>
			<td class="name">Valérie</td>
			<td class="surname">Laville-Néauport</td>
			<td class="department">PUB</td>
			<td class="status">Chef de Dpt</td>
			<td class="">vlaville@gmail.com</td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
		</tr>

		<tr>
      <td class="name">Arnaud</td>
      <td class="surname">Lévy</td>
      <td class="department">MMI</td>
      <td class="status">Intervenant</td>
      <td class="">arnaud@semiodesign.fr</td>
      <td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
    </tr>
	
		<tr>
			<td class="name">Philippe</td>
			<td class="surname">Métayer</td>
			<td class="department">MMI</td>
			<td class="status">Enseignant</td>
			<td class="">philippe.metayer@u.bordeaux-3.fr</td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
		</tr>

		<tr>
			<td class="name">Hélène</td>
			<td class="surname">Millaret</td>
			<td class="department">MMI</td>
			<td class="status">Chef de Dpt</td>
			<td class="">helene.millaret@u.bordeaux-3.fr</td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
		</tr>
			
		<tr>
			<td class="name">Delphine</td>
			<td class="surname">Reyss</td>
			<td class="department">LP MMP</td>
			<td class="status">Chef de Dpt</td>
			<td class="">delphinereyss@gmail.com</td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
		</tr>

		<tr>
			<td class="name">Jean-Pierre</td>
			<td class="surname">Salmon</td>
			<td class="department">MMI</td>
			<td class="status">Enseignant</td>
			<td class="">jp.salmon@u.bordeaux-3.fr</td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
		</tr>

	</table>
</body>
</html>
