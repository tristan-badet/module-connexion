<?php
session_start();

$bdd = new PDO ('mysql:host=localhost;dbname=moduleconnexion', 'root', 'Bartender');

if(isset($_POST['bouton_deconnexion'])) {
   session_unset();
    session_destroy();
header("location:connexion.php");
exit;}
$old_login = $_SESSION["login"];

if (isset($_POST["nom_utilisateur"])){
    $new_login = $_POST["nom_utilisateur"];
    $_SESSION["login"] = $_POST["nom_utilisateur"];
} else {
    $new_login = $_SESSION["login"];
}

if (isset($_POST["prenom_profil"])){
    $new_prenom = $_POST["prenom_profil"];
    $_SESSION["prenom"] = $_POST["prenom_profil"];
} else {
    $new_prenom = $_SESSION["prenom"];
}

if (isset($_POST["nom_profil"])){
    $new_nom = $_POST["nom_profil"];
    $_SESSION["nom"] = $_POST["nom_profil"];
} else {
    $new_nom = $_SESSION["nom"];
}

if(isset($_POST["submit_bouton"])){
    $requete = $bdd->prepare('UPDATE utilisateurs SET login=?, `prenom`=?, `nom`=? WHERE login=?');
    $requete->execute([$new_login, $new_prenom, $new_nom, $old_login]);
    header("refresh:1;index.php");
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profil</title>
    <header>
        <section class="header"> 
            <div class="header-right">
            <form method="post">
            <a href="index.php" class="header-a">Accueil</a>
                <a href="profil.php" class="header-a">Profil</a>   
                <button type="submit" name="bouton_deconnexion" value="Déconnexion" class="déco">Déconnexion</button>
        </div>
        </section>
</head>
<div>
<section>
    <div id="formulaire_inscription_et_connexion">
    <form action="profil.php" method="post">
    <h1>Modification du Profil</h1>
    <div>
        Nom d'utilisateur :<br> <input type="text" name="nom_utilisateur" id="nom_utilisateur" value="<?php echo $_SESSION["login"];?>">
    </div>
    <div>
        Prénom :<br> <input type="text" name="prenom_profil" id="prenom_profil" value="<?php echo $_SESSION["prenom"];?>">
    </div>
    <div>
        Nom :<br> <input type="text" name="nom_profil" id="nom_profil" value="<?php echo $_SESSION["nom"];?>">
    </div>
    <div><?php 
        if (isset($_POST["submit_bouton"])){
        if(empty($message_confirmation)){echo "";}else{echo $message_confirmation;}}
        ?></div>
    <div>
    <button type="submit" class="bouton_confirmer" name="submit_bouton" id="submit_bouton">Confirmer</button>
    </div>
</form>
</div>
</section>
</div>
<body>
    
</body>
</html>