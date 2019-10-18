<?php 

$pdo = new PDO("mysql:host=localhost;dbname=employe","root","");
$mot = 0;
$nom = $_POST["nom"];

if (isset($_POST["submit"])) {

  if (!empty($_POST["nom"])) {
    
 
 

$requete = "SELECT * FROM employe WHERE nom like  '%$nom%' or prenom like '%$nom%' ";

$resultat = $pdo->query($requete);

 } 
 else
   {
    $msg = "<center><font color='red'><h3>Veuillez Entrer un nom OU une lettre</h3></font></center>";
   }

}







 ?>

 <!DOCTYPE html>
<html lang='en'>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    var txt = "";
    txt += "Width of div: " + $("#div1").width() + "</br>";
    txt += "Height of div: " + $("#div1").height();
    $("#div1").html(txt);
  });
});
</script>
<style>
#div1 {
  height: 100px;
  width: 300px;
  padding: 10px;
  margin: 3px;
  border: 1px solid blue;
  background-color: lightblue;
}
</style>


  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <meta charset="UTF_8">
  <title>liste produits</title>
</head>
<body>

  <center><?php require_once 'menu.php'; ?></center> 
  <div class="container" style="margin-top:70px;">
    <div class="panel-primary">
      <?php if (!empty($_POST["nom"])) {?>
       
      
      <div class="panel-heading"><center><H4>Resultat de la recherche</H4></center></div>

<?php } ?>
      <div class="panel-body">
        
        
    </div>

    <div class="panel-primary">
      
      <div class="panel-body">
         
      
<table class="table table-striped table-bordered">
<?php if (!empty($_POST["nom"])) {?>
          <thead>
            <tr>
            <th>Nom</th><th>Prenom</th><th>Email</th><th>Pays</th><th>Telephone</th><th>Salaire</th>
            <th>Modifier</th><th>Supprimer</th>
            </tr>
          </thead>
          <tbody>
           
             
           
    <?php while($employe = $resultat->fetch()){?>
    
      
            <tr>
             
               <td><?= $employe["nom"] ?> </td>
               <td><?= $employe["prenom"] ?> </td>
               <td><?= $employe["email"] ?> </td>
               <td><?= $employe["pays"] ?> </td>
               <td><?= $employe["tel"] ?> </td>
               <td><?= $employe["salaire"] ?> </td>
               <div id="div1"></div>
<br>

<button>Display dimensions of div</button>

<p>width() - returns the width of an element.</p>
<p>height() - returns the height of an element.</p>
               
               
       <td><a href="form_mod_employe.php?id=<?= $employe["id"]  ?>">
        <img src="mod.png" style="width:10%; text-align: center;">
        </a></td>
    <td><a href="deleteEmp.php?id=<?= $employe["id"] ?>"> 
        <img src="sup.png" style="width:8%"></span></a></td>
      
            </tr>
        <?php } ?>
    
          </tbody>
          <?php } ?>
</table>
      
    </div>
  </div> 
  <?php if(!empty($msg)){
    echo $msg;
  } ?>
</body>
</html>


<!DOCTYPE html>
<html>
<head>

</head>
<body>



</body>
</html>


