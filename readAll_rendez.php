<?php 
include_once 'managerRendez.php';
include_once 'rendez_vous.php';



 $pdo = new PDO("mysql:host=localhost;dbname=hopital", "root","");




$requete = "SELECT * FROM  rendez_vous r, secretaire s, patient p 

 WHERE  r.idSec = s.id AND r.idPt = p.idPt";

$resultat = $pdo->query($requete);





$mananger = new Manager();

$rendez_vouss = $mananger->readAll();




 ?>

 <!DOCTYPE html>
<html lang='en'>
<head>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <meta charset="UTF_8">
  <title>liste rendez_vous</title>
</head>
<body>
 <center><?php require_once 'menu.php'; ?></center> 
  <div class="container" style="margin-top:70px;">
    <div class="panel-primary">
      <div class="panel-heading">Liste des rendez_vous</div>
      <div class="panel-body">
        
        <form method="POST" action="rechercheEmp.php" class="form-inline">
          <div class="form-group">
            <input type="text" name="nom" placeholder="Taper Nom ou Prenom">
            <input type="submit" name="submit" value="Rechercher" class="btn btn-success">
            <a href="form_create_rendez.php">Nouveau rendez_vous <img src="plus.png" style="width:3%"></a>
          </div>
        </form>
      </div>
    </div>

    <div class="panel-primary">
      
      <div class="panel-body">
         
      
<table class="table table-striped table-bordered">

          <thead>
            <tr>
            <th>jour</th><th>heur</th>
            <th>durre</th>

            <th>Modifier</th><th>Supprimer</th>
            </tr>
          </thead>
          <tbody>
           
    <?php foreach($rendez_vouss as $rendez_vous):?>
    
           
             
      
            <tr>
             
               <td><?= $rendez_vous->getJour() ?> </td>
                <td><?= $rendez_vous->getHeur() ?> </td>
                <td><?= $rendez_vous->getDurre() ?> </td>
                 
               
               
       <td><a  href="form_mod_rendez_vous.php?id=<?= $rendez_vous->getId()  ?>"><img src="mod.png" style="width:15%; text-align: center;"></a></td>
    <td><a  onclick="return confirm('Voulez vous vraiement supprimer cette ligne')" href="deleteRendez_vous.php?id=<?= $rendez_vous->getId() ?>"><img src="sup.png" style="width:12%; text-align: center;"></a></td>
      
            </tr>

         
        <?php endforeach; ?>
           
          </tbody>
</table>
      
    </div>
  </div> 

</body>
</html>





