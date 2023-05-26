<?php
session_start();
if(isset($_POST['bouton_deconnexion'])) {
session_unset();
session_destroy();
header("location:connexion.php");
exit;
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
    <header>
        <section class="header"> 
            <div class="header-right">
            <form method="post" action="index.php">
            <a href="index.php" class="header-a">Accueil</a>
            
            <?php
            
            
            
            if (isset($_SESSION["Connexion"]) && $_SESSION["Connexion"] == true) {?>
                
                <a href="profil.php" class="header-a">Profil</a>
                <button type="submit" name="bouton_deconnexion" value="Déconnexion" class="déco">Déconnexion</button>
            <?php   }else{  ?>
                <a href="connexion.php" class="header-a">Connexion</a>
                <a href="inscription.php" class="header-a">Inscription</a>
            <?php   }   ?></form>
        </div>
        </section>
</head>
<div>
<section class="cadre_informations">
    <h1>Bienvenue !</h1>
    <br>
    <p>Heureux de vous accueillir sur le site L'Historicon, lieu où l'on partage l'actualité historique peu importe l'époque et le lieu.
        Intégrez vous à cette communauté qui partage photos, articles et vidéos sur le sujet.
    </p>
    <br>
    <p>
        N'hésitez pas à nous rejoindre sur les réseaux afin d'être au courant des dernières nouveautés !
    </p>
    <br>      
        <img src="assets/facebook.png" alt="logo facebook"> 
        <img src="assets/instagram.png" alt="logo instagram">  
        <img src="assets/linkedin.png" alt="logo linkedin"> 
        <img src="assets/twitter.png" alt="logo twitter">  
        <img src="assets/youtube.png" alt="logo youtube">
</section>
</div>
<body>
    
</body>
</html>