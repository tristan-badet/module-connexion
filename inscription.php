<?php

$bdd = new PDO ('mysql:host=localhost;dbname=moduleconnexion', 'root', 'Bartender');

if (isset($_POST["login"])){
    $login = $_POST["login"];
}

if (isset($_POST["prenom"])){
    $prenom = $_POST["prenom"];
};

if (isset($_POST["nom"])){
    $nom = $_POST["nom"];
};

if (isset($_POST["password"])){
    $password = $_POST["password"];
}

if(isset($_POST["confirmation_password"])){
    $confirmation_password = $_POST["confirmation_password"];
}



if (isset($_POST["password"]) && isset($_POST["confirmation_password"])){
    if ($_POST["password"] === $_POST["confirmation_password"]){
        $password = $_POST["password"];
        
        $majuscule = preg_match('@[A-Z]@', $password);
        $minuscule = preg_match('@[a-z]@', $password);
        $nombre    = preg_match('@[0-9]@', $password);
        $caractère_spécial = preg_match('@[^\w]@', $password);
            if (!$majuscule || !$minuscule || !$nombre || !$caractère_spécial ||strlen($password) < 8){
                $erreur = "Votre mot de passe ne correspond pas aux mesures de sécurité";
            }else{
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            }
     } else {
        $erreur = "Vos mots de passes ne correspondent pas";
     }
    }



if (isset($_POST["login"])){
$requete = $bdd->prepare('SELECT * FROM utilisateurs WHERE login = ?');
$requete->execute([$login]);
$resultat = $requete->rowCount();
if($resultat > 0){
    $erreur = "Ce compte existe déjà";
} 

if(empty($erreur)){
    $requete = $bdd->prepare("INSERT INTO utilisateurs(login, prenom, nom, password) VALUES(:login, :prenom, :nom, :password)");
    $requete->bindParam(':login', $login, PDO::PARAM_STR,255);
    $requete->bindParam(':prenom', $prenom, PDO::PARAM_STR,255);
    $requete->bindParam(':nom', $nom, PDO::PARAM_STR, 255);
    $requete->bindParam(':password', $password, PDO::PARAM_STR, 255);
    $requete->execute();
    $message = "Votre compte a bien été créé";
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
    <title>Formulaire d'inscription</title>
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
<section>
<form action="inscription.php" method="post" id="formulaire_inscription_et_connexion">
    <h1>Inscription</h1>
    <div>
        Nom d'utilisateur :<br> <input type="text" name="login" id="login">
    </div>
    <div>
        Prénom :<br> <input type="text" name="prenom" id="prenom">
    </div>
    <div>
        Nom :<br> <input type="text" name="nom" id="nom">
    </div>
    <div>
        Mot de passe :<br> <input type="password" name="password" id="password">
    </div>
    <div>
        Confirmation du mot de passe :<br> <input type="password" name="confirmation_password" id="confirmation_password">
    </div>
    <div>
    <button type="submit" class="bouton_confirmer">Confirmer</button>
    </div>
    <div>
        <p><?php 
        if (isset($_POST["login"])){
        if(empty($erreur)){echo $message; header( "refresh:5;url=connexion.php" );}else{echo $erreur;}}
        ?></p>
</div>
    <div>
    Êtes-vous déjà inscrit ?<br> <a href="connexion.php">Connectez-vous</a>
    </div>
</form>
</section>
<?php 

?>
<body>
    
</body>
</html>