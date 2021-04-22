<?php

require_once 'Modele/Etat.php';
require_once 'Vue/Vue.php';

class ControleurEtat {

    private $etat;

  public function __construct() {
    $this->etat = new Etat();
  }

  //afficher etat
  public function etats(){
      $etat = $this->etat->getEtat();
      $vue = new Vue("etat");
      $vue->generer(array('etat' => $etat));


  }

   // Ajoute un état 
   public function etat($nomEtat) {
    // Sauvegarde de l'état
    $this->etat->ajouterEtat($nomEtat); 
  }

}