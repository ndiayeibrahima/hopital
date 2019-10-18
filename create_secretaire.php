<?php 

include_once 'managerSp.php';
include_once 'secretaire.php';


$secretaire = new Secretaire();

  $secretaire->setNom($_POST["nom"]);
  $secretaire->setPrenom($_POST["prenom"]);

  $secretaire->setEmail($_POST["email"]);
 $secretaire->setPays($_POST["pays"]);
  $secretaire->setTel($_POST["tel"]);
 
  
 
   

     $mananger = new Manager();

    $saveIsOk =  $mananger->save($secretaire);

   if ($saveIsOk) {
   	
   	 header("location:readAll_secretaire.php");
   }else{

   	     $message = "Echec de l'insertion";
   }

 ?>

 <!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="utf-8">
	<title>ajouter un User</title>
</head>
<body>
   <H1>Ajout d'un medecien</H1>
   <?= $message; ?>
</body>
</html>