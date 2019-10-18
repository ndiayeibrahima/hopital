<?php 
include_once 'managerSp.php';
include_once 'secretaire.php';

 





$mananger = new  Manager();

$secretaires = $mananger->readAll();




 ?>

 <!DOCTYPE html>
<html lang='en'>
<head>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <meta charset="UTF_8">
  <title>liste secretaires</title>
</head>
<body>
 <center><?php require_once 'menu.php'; ?></center> 
  <div class="container" style="margin-top:70px;">
    <div class="panel-primary">
      <div class="panel-heading">Liste des Secretaires</div>
      <div class="panel-body">
        
        <form method="POST" action="rechercheEmp.php" class="form-inline">
          <div class="form-group">
            <input type="text" name="nom" placeholder="Taper Nom ou Prenom">
            <input type="submit" name="submit" value="Rechercher" class="btn btn-success">
            <a href="form_create_secretaire.php">Nouveau Secretaire <img src="plus.png" style="width:3%"></a>
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
            <th>Service</th>

            <th>Modifier</th><th>Supprimer</th>
            </tr>
          </thead>
          <tbody>
           
    <?php foreach($secretaires as $secretaire){ ?>
    
           
             
      
            <tr>
             
               <td><?= $secretaire->getNom() ?> </td>
                <td><?= $secretaire->getPrenom() ?> </td>
                <td><?= $secretaire->getEmail() ?> </td>
                 <td><?= $secretaire->getPays() ?> </td>
                  <td><?= $secretaire->getTel() ?> </td>
                    <td><?= $secretaire->getService() ?> </td>
                 
               
       <td><a  href="form_mod_secretaire.php?id=<?= $secretaire->getId()  ?>"><img src="mod.png" style="width:20%; text-align: center;"></a></td>
    <td><a  onclick="return confirm('Voulez vous vraiement supprimer cette ligne')" href="deleteSecretaire.php?id=<?= $secretaire->getId() ?>"><img src="sup.png" style="width:16%; text-align: center;"></a></td>
      
            </tr>

         
        <?php } ?>
           
          </tbody>
</table>
      
    </div>
  </div> 

</body>
</html>





