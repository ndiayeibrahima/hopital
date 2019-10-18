<?php 
include_once 'manager.php';
include_once 'medecien.php';

 $pdo = new PDO("mysql:host=localhost;dbname=hopital", "root","");




$requete = "SELECT * FROM  medecien m, service s, specialite sp 

 WHERE m.idService = s.idService   AND  m.idSp = sp.idSp";

$resultat = $pdo->query($requete);





$mananger = new Manager();

$medeciens = $mananger->readAll();




 ?>

 <!DOCTYPE html>
<html lang='en'>
<head>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <meta charset="UTF_8">
  <title>liste medeciens</title>
</head>
<body>
 <center><?php require_once 'menu.php'; ?></center> 
  <div class="container" style="margin-top:70px;">
    <div class="panel-primary">
      <div class="panel-heading">Liste des Medeciens</div>
      <div class="panel-body">
        
        <form method="POST" action="rechercheEmp.php" class="form-inline">
          <div class="form-group">
            <input type="text" name="nom" placeholder="Taper Nom ou Prenom">
            <input type="submit" name="submit" value="Rechercher" class="btn btn-success">
            <a href="form_create_medecien.php">Nouveau medecien <img src="plus.png" style="width:3%"></a>
          </div>
        </form>
      </div>
    </div>

    <div class="panel-primary">
      
      <div class="panel-body">
         
      
<table class="table table-striped table-bordered">

          <thead>
            <tr>
            <th>Nom</th><th>Prenom</th><th>Email</th><th>Pays</th><th>Telephone</th>
            <th>Service</th><th>Specialite</th>

            <th>Modifier</th><th>Supprimer</th>
            </tr>
          </thead>
          <tbody>
           
    <?php foreach($medeciens as $medecien):?>
    
          
             
      
            <tr>
             
               <td><?= $medecien->getNom() ?> </td>
                <td><?= $medecien->getPrenom() ?> </td>
                <td><?= $medecien->getEmail() ?> </td>
                 <td><?= $medecien->getPays() ?> </td>
                  <td><?= $medecien->getTel() ?> </td>
                    <td><?= $medecien->getLibSer() ?> </td>
                  <td><?= $medecien->getLibSp() ?> </td>
               
               
       <td><a  href="form_mod_medecien.php?id=<?= $medecien->getId()  ?>"><img src="mod.png" style="width:20%; text-align: center;"></a></td>
    <td><a  onclick="return confirm('Voulez vous vraiement supprimer cette ligne')" href="deleteMedecien.php?id=<?= $medecien->getId() ?>"><img src="sup.png" style="width:16%; text-align: center;"></a></td>
      
            </tr>

      
        <?php endforeach; ?>
           
          </tbody>
</table>
      
    </div>
  </div> 

</body>
</html>





