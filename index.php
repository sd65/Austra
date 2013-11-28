<?php
session_start();

include "include/db_connect.php";

if(!empty($_SESSION['prenom']) && !empty($_SESSION['nom'])  && !empty($_SESSION['filiere']) ) {
  header('Location: edt.php');
}

if(!empty($_POST)){
    if(!empty($_POST['name']) && !empty($_POST['password'])) {
        $name = $_POST['name'] ;
        $password = $_POST['password'] ;

        $password_md5 = md5($password);

        $req = $bdd->prepare('SELECT prenom, nometudiant, filiere FROM etudiant WHERE codeetudiant = :codeetudiant AND pass = :pass');
        $req->execute(array(
            'codeetudiant' => $name,
            'pass' => $password_md5));
        $resultat = $req->fetch();


        if(!empty($resultat)) {
            $_SESSION['prenom'] = $resultat['prenom'];
            $_SESSION['nom'] = $resultat['nometudiant'];
            $_SESSION['filiere'] = $resultat['filiere'];
            header('Location: edt.php');
        } else {
            $errorMessage = "Mauvais login/mot de passe !" ;
        }

    }
    else {
        $errorMessage = "Veuillez remplir tous les champs." ;
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Austra - Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="./img/favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/base.css">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<body>
    <section>
        <h1><img src="img/austra.svg" alt="Austra" /></h1>
        <?php
        if(isset($errorMessage)) {
            echo "<span style='color:white'>" . $errorMessage . "</span>";
        }
        ?>
        <form method="post" action="index.php">
            <fieldset>
                <label for="name"></label><input type="text" id="name" name="name" value="" tabindex="1" placeholder="Nom d'utilisateur"/>
                <label for="password"></label><input type="password" id="password" name="password" value="" tabindex="2" placeholder="Mot de passe" />
            </fieldset>
            <div class="submit"><input type="submit" name="submit" value="Valider" /></div>
            <span class="rememberme"><input type="checkbox" name="remember" value="remember" id="remember"/><label id="label" for="remember">Se souvenir de moi</label></span>
        </form>
    </section>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
    <script type="text/javascript">
        var img = ['china.jpg', 'punk.jpg', 'mai68.jpg', 'chile.jpg'];
        $('body').css({'background-image': ' url(img/vignetter_2x.png), url(img/login_backgrounds/' + img[Math.floor(Math.random() * img.length)] + ')'});
    </script>
</body>
</html>