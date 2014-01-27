<?php
session_start();

if (isset($_GET['filiere'])) {	
	$_SESSION['filiere']=$_GET['filiere'];
}

if(isset($_GET['fromDate'])){
	$_SESSION['fromDate']=$_GET['fromDate'];
	$_SESSION['filiere']=$_GET['filiere'];
}