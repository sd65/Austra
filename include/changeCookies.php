<?php
if (isset($_GET['tp']) && $_GET['tp'] == (1 || 2 || 3)) {	
	$tp = $_GET['tp'];
	setcookie('tp', $tp, time() + 365*24*3600, '/', null,false, true); 
}
else if (isset($_GET['td']) && $_GET['td'] == (1 || 2)) {		
	$td = $_GET['td'];
	setcookie('td', $td, time() + 365*24*3600, '/', null,false, true); 
}
else if (isset($_GET['ouverturemenu']) && $_GET['ouverturemenu'] == ('menuopen' || 'menuclose')) {		
	$ouverturemenu = $_GET['ouverturemenu'];
	setcookie('ouverturemenu', $ouverturemenu, time() + 365*24*3600, '/', null,false, true); 
}
else if (isset($_GET['vue_globale'])) {		
	$vue_globale = $_GET['vue_globale'];
	setcookie('vue_globale', $vue_globale, time() + 365*24*3600, '/', null,false, true); 
}
