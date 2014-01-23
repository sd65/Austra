<?php
ob_start();
session_start();

include "include/db_connect.php";

if(!empty($_SESSION['prenom']) && !empty($_SESSION['nom'])  && !empty($_SESSION['filiere']) ) {
    header('Location: edt.php');
} else if(!empty($_SESSION['prenomenseignant']) && !empty($_SESSION['nomenseignant'])  && !empty($_SESSION['departementenseignant']) ) {
    header('Location: edt_teacher.php');
}

if(!empty($_POST)){
    if(!empty($_POST['name']) && !empty($_POST['password'])) {
        $name = $_POST['name'] ;
        $password = $_POST['password'] ;
        $password_md5 = md5($password);
        $req = $bdd->prepare('SELECT id, prenom, nometudiant, filiere FROM etudiant WHERE codeetudiant = :codeetudiant AND pass = :pass');
        $req->execute(array(
            'codeetudiant' => $name,
            'pass' => $password_md5));
        $resultat = $req->fetch();
        if(!empty($resultat)) {
            setcookie('codeetudiant', $name, time() + 365*24*3600, '/', null,false, true);
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['prenom'] = $resultat['prenom'];
            $_SESSION['nom'] = $resultat['nometudiant'];
            $_SESSION['filiere'] = $resultat['filiere'];
            header('Location: edt.php');
        } else {
        $reqEnseignant = $bdd->prepare('SELECT enseignant.id, nomenseignant, prenomenseignant, departementenseignant 
                                        FROM enseignant INNER JOIN admin ON enseignant.codeenseignant = admin.users
                                        WHERE codeenseignant = :codeenseignant AND admin.pass = :pass');
        $reqEnseignant->execute(array(
            'codeenseignant' => $name,
            'pass' => $password_md5));
        $resultatEnseignant = $reqEnseignant->fetch();
        if(!empty($resultatEnseignant)) {
            setcookie('codeenseignant', $name, time() + 365*24*3600, '/', null,false, true);
            $_SESSION['idenseignant'] = $resultatEnseignant['id'];
            $_SESSION['prenomenseignant'] = $resultatEnseignant['prenomenseignant'];
            $_SESSION['nomenseignant'] = $resultatEnseignant['nomenseignant'];
            $_SESSION['departementenseignant'] = $resultatEnseignant['departementenseignant'];
            header('Location: edt_teacher.php');
        } else {
					$errorMessage = "Mauvais login/mot de passe !" ;
				}
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
                <?php if (!empty($_COOKIE['codeetudiant'])) {  ?>
                    <label for="name"></label>
                    <input type="text" id="name" name="name" tabindex="1" value="<?php echo $_COOKIE['codeetudiant'] ?>" placeholder="<?php echo $_COOKIE['codeetudiant'] ?>"/>
                    <label for="password"></label>
                    <input autofocus type="password" id="password" name="password" value="" tabindex="2" placeholder="Mot de passe" />
                <?php } else if (!empty($_COOKIE['codeenseignant'])) { ?>
                    <label for="name"></label>
                    <input type="text" id="name" name="name" tabindex="1" value="<?php echo $_COOKIE['codeenseignant'] ?>" placeholder="<?php echo $_COOKIE['codeenseignant'] ?>"/>
                    <label for="password"></label>
                    <input autofocus type="password" id="password" name="password" value="" tabindex="2" placeholder="Mot de passe" />
                <?php } else { ?>
                    <label for="name"></label>
                    <input autofocus type="text" id="name" name="name" value="" tabindex="1" placeholder="Nom d'utilisateur"/>
                    <label for="password"></label>
                    <input type="password" id="password" name="password" value="" tabindex="2" placeholder="Mot de passe" />
                <?php } ?>
                
            </fieldset>
            <div class="forgottenpassword"><a>Mot de passe oublié ?</a></div>
            <div class="submit"><input type="submit" name="submit" value="Valider" /></div>
        </form>
    </section>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
    <script type="text/javascript">
        var img = ['china.jpg', 'punk.jpg', 'mai68.jpg', 'chile.jpg'];
        $('body').css({'background-image': ' url(img/vignetter_2x.png), url(img/login_backgrounds/' + img[Math.floor(Math.random() * img.length)] + ')'});
    </script>
</body>
</html>