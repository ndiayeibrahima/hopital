<?php  

$pdo = new PDO("mysql:host=localhost;dbname=hopital", "root","");



$requeteS = "SELECT * FROM  secretaire ";

$resultatS = $pdo->query($requeteS);

$secretaire = $resultatS->fetch();

$idS = $secretaire["id"];


$requeteP = "SELECT * FROM  patient ";

$resultatP = $pdo->query($requeteP);


$patient = $resultatP->fetch();

$idP = $patient["idPt"];







class Manager
{




/** VARIABLE
*  son role est de permettre de connecter a la base de donnéé
*/
	private $pdo;

/**une variable
*  pdoStatement une propreite qui va stocker la requette prepare ou query
*/

private $pdoStatement;
	
function __construct()
{

$this->pdo = new PDO('mysql:host=localhost;dbname=hopital', 'root', '');

}

	/** permet d'inserer un objet a la base de donnée et met a jour l'objet passé en argument 
	* en lui specifient un id
* elle returne true si l'objet est inseré sinon elle va retouner false
*/


 private function create(Rendez_vous &$rendez_vous)
 {
 	
 	$this->pdoStatement = $this->pdo->prepare('INSERT INTO rendez_vous VALUES(NULL, :jour, :heur, :durre , :idSec , :idPt)');


 	//liaison entre l'argument et la base de donnée 

 	$this->pdoStatement->bindValue(':jour', $rendez_vous->getJour(), PDO::PARAM_STR);
 	$this->pdoStatement->bindValue(':heur', $rendez_vous->getHeur(), PDO::PARAM_STR);
 	$this->pdoStatement->bindValue(':durre', $rendez_vous->getDurre(),PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':idSec', $idS, PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':idPt', $idP, PDO::PARAM_INT);
 	//execution de la requette

 	$executeIsOk = $this->pdoStatement->execute();

 	if (!$executeIsOk) {
 		

 		  return false;
 	}else{
         
         $id = $this->pdo->lastInsertId();

         
          $rendez_vous = $this->read($id);


         return true;

 	}
 	  

 	  	

   

 }

 /** elle recupere un objet a partir de son id
 * id l'identifient du membre
 * elle retourne false si nue erreur est survenu , null si ya aucun objet si elle va retourner le mnmbre
 */
 public function read($id)
 {
 	$this->pdoStatement = $this->pdo->prepare('SELECT * FROM rendez_vous WHERE id = :id');

 	// liaison des données 

 	$this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);


 	//executio de la requette

 	$executeIsOk = $this->pdoStatement->execute();

 	if ($executeIsOk) {
 		

 		// recuperation de notre resultat

 		$rendez_vous = $this->pdoStatement->fetchObject('Rendez_vous');

 		if ($rendez_vous === false) {
 			
 			return null;
 		}
 		 else
 		 {
 		 	return $rendez_vous;
 		 }
 	}

 	  else
 	  {
 	  	return false;
 	  }
 }

 /** recuperationde tout les objets qui existe dans la base de donnée
 *  tout les  membres
 * elle retourne un tableau vide s'il ya aucun membre , ou un tab de membres rempli sinon 
 * elle va retouner false si une erreur survien
 */

public function readAll()
{
	$this->pdoStatement = $this->pdo->query('SELECT * FROM rendez_vous ');

	// tab qui contnir les membres

	$rendez_vouss = [];

	while($rendez_vous = $this->pdoStatement->fetchObject('Rendez_vous')) {

		$rendez_vouss []  = $rendez_vous;
		
	}

	return $rendez_vouss;
}

 /** mise a jour un objet stocké dans la base de donnée
 *@var  un objet de type membre
 *elle retun true en cas de succés sinon false
*/

private function update(Rendez_vous $rendez_vous)
{
	$this->pdoStatement = $this->pdo->prepare('UPDATE FROM rendez_vous SET jour=:jour,
	heur=:heur, durre=:durre WHERE id=:id LIMIT 1');

 // liason des variables

$this->pdoStatement->bindValue(':jour', $rendez_vous->getJour(), PDO::PARAM_STR);
$this->pdoStatement->bindValue(':heur', $rendez_vous->getHeur(), PDO::PARAM_STR);
$this->pdoStatement->bindValue(':durre', $rendez_vous->getDurre(), PDO::PARAM_STR);


$this->pdoStatement->bindValue(':id', $rendez_vous->getId(), PDO::PARAM_INT);

// return le resultat

 return $this->pdoStatement->execute();


}
//*
//*combinaison des deux methodes create/update , il insere l'objet s'il n'est pas dbd sinon il vas le mise a jour


 /** supprimer un objet stocké dans la base de donnée
 *@var  un objet de type membre
 *elle retun true en cas de succés sinon false
*/

public function delete(Rendez_vous $rendez_vous)
{
	$this->pdoStatement = $this->pdo->prepare('DELETE FROM rendez_vous WHERE id=:id LIMIT 1');

	// liaison des argument\base de donnése

	$this->pdoStatement->bindValue(':id', $rendez_vous->getId(), PDO::PARAM_INT);
	

	//resultat de la requette

    return $this->pdoStatement->execute();

}



public function save(Rendez_vous $rendez_vous)
{
	//si l'objet a un identifient on vas l'inserer
	//sinon on vas le mise a jour

	if (is_null($rendez_vous->getId())) {
	
	   return $this->create($rendez_vous);
	}
	else  

	  {
	  	return $this->update($rendez_vous);
	  }
}

}



 ?>