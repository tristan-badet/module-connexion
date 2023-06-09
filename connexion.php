<?php
session_start();
$bdd = new PDO ('mysql:host=localhost;dbname=moduleconnexion', 'root', 'Bartender');
$erreur = "";
if(isset($_POST["login"])){
    if(empty($_POST["login"]) || empty($_POST["password"])){
        $erreur = "Veuillez remplir les champs.";
    } else {
        $requete = $bdd->prepare('SELECT * FROM utilisateurs WHERE login = ?');
        $requete->execute(array($_POST["login"]));
        $compteur = $requete->rowCount();
        if ($compteur > 0){
            $resultat = $requete->fetchAll();
            foreach($resultat as $valeur){
                if($valeur["id"]=="1"){
                    $message = "admin trouvé, transfert vers la base de données.";
                    header("refresh:2;admin.php");
                }elseif (password_verify($_POST["password"], $valeur["password"])){
                    $message = "Connexion effectuée, veuillez patienter.";
                    $_SESSION["Connexion"] = true;
                    $_SESSION["login"] = $valeur['login'];
                    $_SESSION["prenom"] = $valeur['prenom'];
                    $_SESSION["nom"] = $valeur['nom'];
                    header("refresh:2;index.php");
                }else{
                    $erreur = "Mauvais mot de passe";
                }
            }
            }else{
                $erreur = "Mauvais identifiant";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulaire de connexion</title>
    <header>
        <section class="header"> 
            <div class="header-right">
            <a href="index.php" class="header-a">Accueil</a>
            <a href="connexion.php" class="header-a">Connexion</a>
            <a href="inscription.php" class="header-a">Inscription</a>

        </div>
        </section>
</head>
<div>
<section>
<form action="connexion.php" method="post" id="formulaire_inscription_et_connexion">
    <h1>Connexion</h1>
    <div>
        Nom d'utilisateur :<br> <input type="text" name="login" id="login">
    </div>
    <div>
        Mot de passe:<br> <input type="password" name="password" id="password">
    </div>
    <div>
    <?php 
        if (isset($_POST["login"])){
        if(empty($erreur)){echo $message;}else{echo $erreur;}}
        ?>
</div>
    <div>
    <button type="submit" class="bouton_confirmer">Confirmer</button>
    </div>
    <div>
        
    Vous n'avez pas encore de compte ?<br> <a href="inscription.php">Inscrivez-vous</a>
    </div>
</form>
</section>
</div>
<body>
    
</body>
</html>