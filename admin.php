<?php

$bdd = new PDO ('mysql:host=localhost;dbname=moduleconnexion', 'root', 'Bartender');


$requete = $bdd->prepare('SELECT * FROM utilisateurs');
$requete->execute();
$utilisateurs = $requete->fetchall();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Page administration</title>
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
    <div id="admin">
    <h1>Liste des utilisateurs</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Login</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Mot de Passe</th>
    <?php
    foreach ($utilisateurs as $value){ ?>
        <tr>
            <td><?php echo $value['id'] ?></td>
            <td><?php echo $value['login'] ?></td>
            <td><?php echo $value['prenom'] ?></td>
            <td><?php echo $value['nom'] ?></td>
            <td><?php echo $value['password'] ?></td>
        </tr>
    <?php } ?>
    </table>
    </div>
</section>
</div>
<body>
    
</body>
</html>