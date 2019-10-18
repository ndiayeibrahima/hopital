<?php 

include_once 'managerRendez.php';
include_once 'Rendez_vous.php';


$rendez_vous = new Rendez_vous();

  $rendez_vous->setJour($_POST["jour"]);
  $rendez_vous->setHeur($_POST["heur"]);

  $rendez_vous->setDurre($_POST["durre"]);
   $_POST["idS"];
   $_POST["idP"];
 
  
 
   

     $mananger = new Manager();

    $saveIsOk =  $mananger->save($rendez_vous);

   if ($saveIsOk) {
   	
   	 header("location:readAll_rendez.php");
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