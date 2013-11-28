<?php
session_start();

if(!empty($_SESSION['prenom']) && !empty($_SESSION['nom'])  && !empty($_SESSION['filiere']) ) {
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'] ;
    $filiere = $_SESSION['filiere'] ;
} else {
  header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Austra</title>
        <meta name="description" content="" />
        <meta charset="ISO-8859-1" />
        <link rel="icon" type="image/png" href="img/favicon.png" />
        <link rel="stylesheet" type="text/css" href="./css/base.css" />
        <link rel="stylesheet" type="text/css" href="./css/edt.css" />
        <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.0.min.js"></script> -->
        <script type="text/javascript" src="./js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="./js/frontend.js"></script>
    </head>
    <body>
          
				<?php 
					$year = 2013;
					if(isset($_GET['semaine'])) {
						$week = $_GET['semaine'] ;
					} else {
						$week = date('W');
					}
				?>
				<?php 
					include "./include/checkCookies.php";
					include "./include/menu.php"; 
					include "./include/nav.php"; 
					include "./include/edt_display.php";
				?>
         <div id="master-planning">
            <table id="planning">
              <thead>
                <tr class="hours">
                  <td class="origin"></td>
                  <td class="empty-hour">8h</td><td class="half-hour" colspan="0.5"></td>
                  <td class="hour">9h</td><td class="half-hour"></td>
                  <td class="hour">10h</td><td class="half-hour"></td>
                  <td class="hour">11h</td><td class="half-hour"></td>
                  <td class="hour">12h</td><td class="half-hour"></td>
                  <td class="hour">13h</td><td class="half-hour"></td>
                  <td class="hour">14h</td><td class="half-hour"></td>
                  <td class="hour">15h</td><td class="half-hour"></td>
                  <td class="hour">16h</td><td class="half-hour"></td>
                  <td class="hour">17h</td><td class="half-hour"></td>
                  <td class="hour">18h</td><td class="half-hour"></td>
                  <td class="hour">19h</td><td class="half-hour"></td>
                  <td class="hour">20h</td><td class="half-hour"></td>
                </tr>
              </thead>
              <tbody>
                <?php 
                if($vue_globale == 1) {
					       edt_display_all($year, $week, $filiere, $tp, $td); 
                } else {
					       edt_display($year, $week, $filiere, $tp, $td);
				}
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <?php include("./include/calendriers.php"); ?>
    </body>
</html>
