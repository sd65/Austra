<?php

if (empty($_COOKIE)) // Si on arrive pour la première fois
{
	setcookie('tp', "1", time() + 365*24*3600, '/', null,false, true);
	setcookie('td', "1", time() + 365*24*3600, '/', null,false, true);
	setcookie('ouverturemenu', "menuopen", time() + 365*24*3600, '/', null,false, true);  
	$tp = 1 ;
	$td = 1 ;
	$ouverturemenu = "menuopen" ;
}
else {
	$tp = $_COOKIE['tp'] ;
	$td = $_COOKIE['td'] ;
	$ouverturemenu = $_COOKIE['ouverturemenu'] ;
}
