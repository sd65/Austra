<?php
session_start();

if (isset($_GET['filiere'])) {	
	$_SESSION['filiere']=$_GET['filiere'];
}

if(isset($_GET['date']){
	$_SESSION['fromDate']=$_GET['date'];
	$_SESSION['filiere']=$_GET['filiere'];
}