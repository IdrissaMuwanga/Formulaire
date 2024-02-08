<?php
   try{
      $pdo=new PDO("mysql:host=localhost:3306;dbname=projetchat","root","");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>