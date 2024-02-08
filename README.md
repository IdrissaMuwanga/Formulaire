
# Readme

Ce Readme va servir a présenter la partie technique de mon projet.

Quelques précisions qui permet d'éviter la confusion:

ce formulaire ce base sur un ancien projet réalisé en L3 qui se basait sur un chat avec un système d'inscription et de connexion en plus de la possibiltié de pouvoir parler a plusieurs autres utilisateurs connectés. Cela explique le nom de la base de donnée "projetchat".




#### Je vais vous présenter ce que fait les différents fichiers du projet

### Connexion.php

Permet d'établir la connexion à la base de donnée "projetchat" 



### Deconnexion.php

Détruit la session en cours pour l'utilisateur actuel.

### Index.php

Page permettant de se connecter:

La ligne session_start() démarre une session PHP. Cela permet de stocker des informations de session pour l'utilisateur.

Les lignes suivantes récupèrent les données soumises via la méthode POST depuis un formulaire HTML :

$login=htmlspecialchars(trim([$_POST["login"])]); récupère le login soumis, en le nettoyant avec trim() pour supprimer les espaces inutiles et en le convertissant en HTML avec htmlspecialchars() pour éviter les attaques XSS.
$pass=htmlspecialchars(trim(md5($_POST["pass"]))); récupère le mot de passe soumis, effectue les mêmes opérations que pour login, de plus, le chiffre avec l'algorithme MD5 qui permet d'obtenir le hachage du mdp.
$valider=$_POST["valider"]; récupère la valeur du bouton de soumission du formulaire.

Le bloc de code d'après est responsable de l'authentification de l'utilisateur en vérifiant les informations d'identification soumises par rapport à celles stockées dans la base de données, et en stockant les informations de session appropriées en conséquence.


Cette page présente également un bouton " pas de compte?" pour créer un compte, un bouton réinitialiser pour remettre les champs a 0 et enfin un bouton s'authentifier pour valdier le formulaire


### Inscription.php

Page permettant de s'inscrire

Il présente les champs :

-nom
-prénom
-mail
-login
-mot de passe
-confirmer le mot de passe

le bouton créer son compte pour valider l'inscription et le même bouton reinitialiser que lors de la connexion.

 Les données soumises via le formulaire sont récupérées et nettoyées de la même façon que celles pour la connexion

  Les adresses e-mail et les noms d'utilisateur (logins) soumis sont vérifiés pour s'assurer qu'ils ne sont pas déjà enregistrés dans la base de données.

  Le mot de passe est vérifié pour s'assurer qu'il respecte certaines règles de complexité, telles que la longueur minimale, la présence de minuscules, de majuscules, de chiffres et de caractères spéciaux

   Si toutes les vérifications précédentes réussissent, les données du formulaire sont insérées dans la base de données après avoir été hachées (MD5) pour des raisons de sécurité.

   : Si une erreur survient à l'une des étapes, un message d'erreur approprié est affiché pour informer l'utilisateur de ce qui ne va pas.



### session.php

Page permettant simplement d'afficher le fait que l'utilisateur s'est connecté avec la présence d'un gif 
