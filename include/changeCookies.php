<?php

if ($_GET['tp'] == (1 || 2 ||3)) {	
	$tp = $_GET['tp'] ;
	setcookie('tp', $tp, time() + 365*24*3600, '/', null,false, true); 
}
else if ($_GET['td'] == (1 || 2)) {		
	$td = $_GET['td'] ;
	setcookie('td', $td, time() + 365*24*3600, '/', null,false, true); 
}
