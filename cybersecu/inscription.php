<?php
session_start();

// Récupération des données du formulaire
@$nom = htmlspecialchars(trim($_POST["nom"]));
@$prenom = htmlspecialchars(trim($_POST["prenom"]));
@$mail = htmlspecialchars(trim($_POST['mail']));
@$login = htmlspecialchars(trim($_POST["login"]));
@$pass = htmlspecialchars(trim($_POST["pass"]));
@$repass = htmlspecialchars(trim($_POST["repass"]));
@$valider = $_POST["valider"];

$erreur = "";

if(isset($valider)){
    // Vérification de la complexité du mot de passe
    if(empty($pass)) {
        $erreur = "Mot de passe laissé vide!";
    } elseif($pass != $repass) {
        $erreur = "Les mots de passe ne sont pas identiques!";
    } elseif(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W\_])[A-Za-z\d\W\_]{10,}$/", $pass)) {
        $erreur = "Le mot de passe doit contenir au moins une minuscule, une majuscule, un chiffre, un caractère spécial et être d'une longueur d'au moins 10 caractères!";
    } elseif(empty($nom)) {
        $erreur = "Nom laissé vide!";
    } elseif(empty($prenom)) {
        $erreur = "Prénom laissé vide!";
    } elseif(empty($mail)) {
        $erreur = "Mail laissé vide";
    } elseif(empty($login)) {
        $erreur = "Login laissé vide!";
    } else {
        // Vérification si le mail ou le login existe déjà dans la base de données
        include("connexion.php");

        $reqMail = $pdo->prepare("SELECT mail FROM utilisateurs WHERE mail = ? LIMIT 1");
        $reqMail->execute(array($mail));
        $donneesMail = $reqMail->fetch();

        if($donneesMail) {
            $erreur = "Mail déjà utilisé!";
        } else {
            $reqLogin = $pdo->prepare("SELECT id FROM utilisateurs WHERE login = ? LIMIT 1");
            $reqLogin->execute(array($login));
            $donneesLogin = $reqLogin->fetch();

            if($donneesLogin) {
                $erreur = "Login déjà utilisé!";
            } else {
                // Insertion dans la base de données
                $ins = $pdo->prepare("INSERT INTO utilisateurs(nom, prenom, mail, login, pass) VALUES (?, ?, ?, ?, ?)");
                if($ins->execute(array($nom, $prenom, $mail, $login, md5($pass)))) {
                    header("location:index.php");
                } else {
                    $erreur = "Erreur lors de l'inscription!";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
   <head>
   <title>Inscription</title>
      <meta charset="utf-8" />
      <style>
         *{
            font-family:arial;
         }
         body{
            margin:20px;
         }
         input{
            border:solid 1px #2222AA;
            margin-bottom:10px;
            padding:16px;
            outline:none;
            border-radius:6px;
         }
         .erreur{
            color:#CC0000;
            margin-bottom:10px;
         }
      </style>
   </head>
   <body>
      <h1>Inscription</h1>
      <div class="erreur"><?php echo $erreur ?></div>
      <form name="fo" method="post" action="">
         <input type="text" name="nom" placeholder="Nom" value="<?php echo $nom?>" /><br />
         <input type="text" name="prenom" placeholder="Prénom" value="<?php echo $prenom?>" /><br />
         <input type="email" name="mail" placeholder="Mail" value="<?php echo $mail?>" /><br>
         <input type="text" name="login" placeholder="Login" value="<?php echo $login?>" /><br />
         <input type="password" name="pass" placeholder="Mot de passe" /><br />
         <input type="password" name="repass" placeholder="Confirmer Mot de passe" /><br />
         <input type="submit" name="valider" value="Créer son compte" /> <br/>
         <input type="reset" value="Réinitialiser" /> <br/>
          <a href="index.php">Vous avez déjà un compte?</a> 
      </form>
   </body>
</html>