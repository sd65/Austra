<?php
session_start();

if (isset($_GET['filiere'])) {	
	$_SESSION['filiere'] = $_GET['filiere'];
}