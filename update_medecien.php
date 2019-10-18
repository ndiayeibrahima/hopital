<?php 

$id = $_POST["id"];
$nom = $_POST["nom"];

$prenom = $_POST["prenom"];

$email = $_POST["email"];

$pays = $_POST["pays"];
$tel = $_POST["tel"];
$specialite = $_POST["specialite"];

$service = $_POST["service"];



$pdo = new PDO("mysql:host=localhost;dbname=hopital", "root","");



$requete = $pdo->prepare('UPDATE FROM medecien SET nom = ?,
	prenom=?, email=?, pays=?, tel=? , idService = ?, idSp = ? WHERE id=? ');

$resultat = $requete->execute(array($nom,$prenom,$email,$pays,$tel,$service,$specialite,$id));
 // liason des variables




if ($resultat) {
	
	header("location:readAll_medecien.php");
}else{

	$message = '<q>Echec de mise à jour !</q>';
}

 ?>

 <!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="utf_8">
	<title>Mise à jour d'un medecien</title>
</head>
<body>
	<center><?php require_once 'menu.php'; ?></center>
	<center>
   <H1 style="margin-top:75px;">Resultat de la mise à jour de medecien</H1>
   
     <h4><?= $message ?></h4>
</center>
</body>
</html>
