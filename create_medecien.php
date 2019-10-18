<?php 

include_once 'manager.php';
include_once 'medecien.php';


$medecien = new Medecien();

  $medecien->setNom($_POST["nom"]);
  $medecien->setPrenom($_POST["prenom"]);

  $medecien->setEmail($_POST["email"]);
 $medecien->setPays($_POST["pays"]);
  $medecien->setTel($_POST["tel"]);
 
  
 
   

     $mananger = new Manager();

    $saveIsOk =  $mananger->save($medecien);

   if ($saveIsOk) {
   	
   	 header("location:readAll_medecien.php");
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