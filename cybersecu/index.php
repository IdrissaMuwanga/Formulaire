<?php
   session_start();
   @$login=htmlspecialchars(trim($_POST["login"]));
   @$pass=htmlspecialchars(trim(md5($_POST["pass"])));
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){

      include("connexion.php");
      $sel=$pdo->prepare("select * from utilisateurs where login=? and pass=? limit 1");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".strtoupper($tab[0]["nom"]);
         $_SESSION["autoriser"]="oui";
         header("location:session.php");
      }
      else
         $erreur="Mauvais login ou mot de passe!";
   }
 /*else {
   //si les champs sont vides
   echo $erreur = "Veuillez remplir tous les champs !";
}*/
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />

      <style>
         * {
            font-family: arial;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
         }
         body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
         }
         .container {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            max-width: 400px;
            width: 100%;
         }
         input {
            border: solid 1px #2222AA;
            margin-bottom: 10px;
            padding: 16px;
            outline: none;
            border-radius: 6px;
            width: 100%;
            box-sizing: border-box;
         }
         .erreur {
            color: #CC0000;
            margin-bottom: 10px;
         }
         a {
            font-size: 12pt;
            color: #EE6600;
            text-decoration: none;
            font-weight: normal;
         }
         a:hover {
            text-decoration: underline;
         }
         .links {
            display: flex;
            justify-content: center;
            margin-top: 10px;
         }
         .links a {
            margin: 0 10px;
         }
      </style>
   </head>
   <title>Authentification </title>
   <body>
      <div class="container">
         <img src="hakari.jpg" alt="Logo" style="width: 100px; height: 100px;">
         <h1>Authentification</h1>
         <div class="links">
            <a href="inscription.php">[Pas de compte?]</a>
         </div>
         <div class="erreur"><?php echo $erreur ?></div>
         <form name="fo" method="post" action="">
            <input type="text" name="login" placeholder="Login" /><br />
            <input type="password" name="pass" placeholder="Mot de passe" /><br />
            <input type="submit" name="valider" value="S'authentifier" />
            <input type="reset" value="Réinitialiser" />
         </form>
      </div>
   </body>
</html>
