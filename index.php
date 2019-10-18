<?php  ?>



 

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>
<style> 
#panel, #flip {
  padding: 5px;
  text-align: center;
  background-color: #e5eecc;
  border: solid 1px #c3c3c3;
}

#panel {
  padding: 50px;
  display: none;
}
</style>
</head>
<body>
 
<center><h2 style="background-color:green; width:70%">Bienvenu dans note page d'acceuil</h2></center>
<CENTER><div id="flip" style="margin-top:60px; width:50%" >Cliquer ici pour voir le menu</div></CENTER>
<center><div id="panel" style="width:50%"> <?php require_once 'menu.php'; ?>  </div></center>


</body>
</html>
