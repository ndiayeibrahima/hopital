<!DOCTYPE html>
<html lang="en">
<head>
   <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <meta name="viewport" content="width-device-width, initial-scale=1">
 <meta charset="UTF_8">
</head>
<body>
  <center><?php require_once 'menu.php'; ?></center> 
   <div class="container"  >
  <div class="panel panel-primary " style="margin-top: 60px;">
    <div class="panel-heading">Entregistrement d'un Medecien</div>
    <div class="panel-body">
    <form method="post" action="create_medecien.php" class="form" style="height:90%" >
      

      
      <div class="form-group">
      <label for="nom">nom:</label>
      <input type="text" name="nom" placeholder="nom Utilisateur" class="form-control" required="required" max-length="20">
      <span id="login_manquant"></span>
      </div>

  <div class="form-group">
    <label for="prenom">Prenom:</label>
    <input type="text" name="prenom" placeholder="Prenom" class="form-control" required="required">
  </div>

  <div class="form-group">
    <label for="motdapasse">Email:</label>
    <input type="text" name="email" placeholder="Email" class="form-control" required="required">
  </div>   


<div class="form-group">
    <label for="pays">Pays:</label>
    <input type="text" name="pays" placeholder="Pays" class="form-control" required="required">
  </div>   

<div class="form-group">
    <label for="tel">Telephone:</label>
    <input type="text" name="tel" placeholder="Telephone" class="form-control" required="required">
  </div>   

  


  
 

    <button type="submit" class="btn btn-success" id="btn_envoi">
   <span class="btn btn-save">Enregistrer</span></button>
     

  </form> 
  <script type="text/javascript">
   var valid=document.getElementById("btn_envoi");
   var login=getElementById("login");
   var login_m=getElementById("login_manquant");
   var login_v =/^[a-zA-Zééîï][a-zèéêàçîï]+([-'\s][a-zA-Zééîï][a-zèéêàçîï]+)?/;
   valid.addEvenetListener('click',f_valid);

   function f_valid(e) {

  if(login.validity.valueMissing){
    e.preventDefault();
    login_m.textContent="login manquant";
    login_m.style.color="red";
  

    else if(login_v.test(login.value)==false){
      evenr.preventDefault();
      login_m.textContent="Format incorrect";
      login_m.style.color="orange";
    }else{

    }

    }
   }


  </script>
  </div>
  </div>
 </div>

</body>
</html>
