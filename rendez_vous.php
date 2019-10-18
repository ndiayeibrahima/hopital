<?php 
class Rendez_vous
{
	
	
/**
*  $id  l'identifient du contact il sera generé par le SGBDR 
* on aura pas de setter
*/
private $id;

/**
*  $nom  le nom  du contact 
*/
  private $jour;

 

  /**
*  $tel  le tel  du contact 
*/
  private $heur;


  /**
*  $mel  le mel  du contact 
*/
  private $duree;

  /*
  *@var  le setter du nom 
  */



 


  
  public function setJour($jour)
  {
  	$this->jour = $jour;

  	return $this;
  }

  /*
  *@var le getter de la propriété nom
  */

  public function getJour()
  {
  	return $this->jour;
  }

  public function setHeur($heur)
  {
    $this->heur = $heur;

    return $this;
  }

  /*
  *@var le getter de la propriété nom
  */

  public function getHeur()
  {
    return $this->heur;
  }



 public function setDurre($durre)
  {
    $this->durre = $durre;

    return $this;
  }

  /*
  *@var le getter de la propriété nom
  */

  public function getDurre()
  {
    return $this->durre;
  }







  
  /*
  *@var le getter de la propriété id
  */

  public function getId()
  {
  	return $this->id;
  }
}

 ?>






















 
