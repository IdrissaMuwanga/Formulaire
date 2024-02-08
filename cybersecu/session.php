<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:index.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue, ".
      $_SESSION["prenomNom"].
      " vous avez reussi a vous connecter ! ";
   else
      $bienvenue="Bonsoir et bienvenue, ".
      $_SESSION["prenomNom"].
      " vous avez reussi a vous connecter ! ";


      $bdd= new PDO("mysql:host=localhost:3306;dbname=projetchat;charset=utf8","root","");
      if (isset($_POST['login']) AND isset($_POST['message']) AND !empty($_POST['login']) AND !empty($_POST['message'])) 
      {
      $login = $_SESSION["prenomNom"];
      $message = htmlspecialchars($_POST['message']);
      $insertmsg = $bdd->prepare('INSERT INTO chat(login,message,date_time) VALUES(?,?,NOW())');
      $insertmsg -> execute(array($login,$message)); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bravo ! vous êtes connectés</title>
</head>
<body>
    <h2><?php echo $bienvenue?></h2>

    <?php
    // Chemin vers votre GIF
    $cheminGIF = "brain.gif";
    ?>

    <!-- Utilisation de la balise img pour afficher le GIF -->
    <img src="<?php echo $cheminGIF; ?>" alt="GIF">

</body>
</html>
