<?php

if (!isset($_COOKIE['tp']) || !isset($_COOKIE['td']) || !isset($_COOKIE['vue_globale']) || !isset($_COOKIE['ouverturemenu'])) // Si on arrive pour la première fois
{
	setcookie('tp', "1", time() + 365*24*3600, '/', null,false, true);
	setcookie('td', "1", time() + 365*24*3600, '/', null,false, true);
	setcookie('vue_globale', "1", time() + 365*24*3600, '/', null,false, true);  
	setcookie('ouverturemenu', "menuopen", time() + 365*24*3600, '/', null,false, true);  
	$tp = 1 ;
	$td = 1 ;
	$vue_globale = 1 ;
	$ouverturemenu = "menuopen" ;
}
else {
	$tp = $_COOKIE['tp'] ;
	$td = $_COOKIE['td'] ;
	$vue_globale = $_COOKIE['vue_globale'] ;
	$ouverturemenu = $_COOKIE['ouverturemenu'] ;
}
