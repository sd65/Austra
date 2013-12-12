<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Austra _ Inte _ Vue admin</title>
	<meta name="description" content="" />
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="./css/base.css" />
	<link rel="stylesheet" type="text/css" href="./css/admin.css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="./js/admin.js"></script>
</head>
<body>
	<header>
		<a href=""><img src="./img/logo@2x.png" alt="Austra" width="140" height"48"/></a>
		<ul>
			<li><a class="pageactive" href="">MMI</a></li>
			<li><a href="">PUB</a></li>
			<li><a href="">MP</a></li>
		</ul>
		<input type="search" name="cours" placeholder="Rechercher une salle">
		<a class="boutonright" href="">Ajouter</a> 
	</header>
	<aside>
		<ul>
			<li><a href="">Cours</a></li>  
			<li><a href="">Élèves</a></li>  
			<li><a href="">Enseignants</a></li>  
			<li><a class="pageactive">Salles</a></li>  
		</ul>
	</aside>

	<table>
		<thead>
			<tr>
				<td>Code</td>
				<td>Salle</td>
				<td>Capacité</td>
				<td>Dpt Principal</td>
				<td class="options">Disponibilité</td>
				<td class="options">Mémo</td>
				<td class="options">Contraintes</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="code">221</td>
				<td class="name">221</td>
				<td class="name">40</td>
				<td class="department">MMI</td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			</tr>

			<tr>
				<td class="code">224</td>
				<td class="name">224</td>
				<td class="name">30</td>
				<td class="department">PUB</td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			</tr>
			
			<tr>
				<td class="code">227</td>
				<td class="name">227</td>
				<td class="name">30</td>
				<td class="department">MMI</td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			</tr>

			<tr>
				<td class="code">229</td>
				<td class="name">229</td>
				<td class="name">25</td>
				<td class="department">MP</td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			</tr>

			<tr>
				<td class="code">230</td>
				<td class="name">230</td>
				<td class="name">10</td>
				<td class="department"></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			</tr>

			<tr>
				<td class="code">231</td>
				<td class="name">231</td>
				<td class="name">10</td>
				<td class="department"></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			</tr>


			<tr>
				<td class="code">232</td>
				<td class="name">232</td>
				<td class="name">25</td>
				<td class="department"></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			</tr>

			<tr>
				<td class="code">255</td>
				<td class="name">255</td>
				<td class="name">60</td>
				<td class="department">MMI</td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			</tr>

			<tr>
				<td class="code">251</td>
				<td class="name">251 - Salle TP</td>
				<td class="name">20</td>
				<td class="department">MMI</td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			</tr>

			<tr>
				<td class="code">252</td>
				<td class="name">252 - Salle TP</td>
				<td class="name">20</td>
				<td class="department">MMI</td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			</tr>

			<tr>
				<td class="code">253</td>
				<td class="name">253 - Salle TP</td>
				<td class="name">20</td>
				<td class="department">MMI</td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			</tr>

			<tr>
				<td class="code">Plateau_TV</td>
				<td class="name">Plateau TV</td>
				<td class="name">300</td>
				<td class="department"></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			</tr>

			<tr>
				<td class="code">Studio_ITW</td>
				<td class="name">Studio Interview</td>
				<td class="name">22x</td>
				<td class="department"></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			</tr>

			<tr>
				<td class="code">Studio_Rad</td>
				<td class="name">Studio Radio</td>
				<td class="name">22x</td>
				<td class="department"></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			</tr>
		</tbody>
	</table>
</body>
</html>