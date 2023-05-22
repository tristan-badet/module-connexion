<?php

$bdd = new PDO ('mysql:host=localhost;dbname=moduleconnexion', 'root', 'Bartender');

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
            <a href="profil.php" class="header-a">Profil</a>
        </div>
        </section>
</head>
<div>
<section>
<form action="inscription.php" method="post" id="formulaire_inscription_et_connexion">
    <h1>Connexion</h1>
    <div>
        Nom d'utilisateur :<br> <input type="text" name="nom_utilisateur" id="nom_utilisateur">
    </div>
    <div>
        Mot de passe:<br> <input type="text" name="prenom" id="prenom">
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