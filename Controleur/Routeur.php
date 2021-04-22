<?php
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurTicket.php';
require_once 'Controleur/ControleurEtat.php';

require_once 'Vue/Vue.php';

class Routeur {

  private $ctrlAccueil;
  private $ctrlTicket;
  private $ctrlEtat;

  public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
    $this->ctrlTicket = new ControleurTicket();
    $this->ctrlEtat = new ControleurEtat();

  }

 // Route une requête entrante : exécution l'action associée
 public function routerRequete() {
  try {
      if (isset($_GET['action'])) {
          if ($_GET['action'] == 'ticket') {
              $idTicket = intval($this->getParametre($_GET, 'id'));
              if ($idTicket != 0) {
                  $this->ctrlTicket->ticket($idTicket);
              }
              else{
                  throw new Exception("Identifiant de ticket non valide");}
          }
          else if ($_GET['action'] == 'commenter') {
              $auteur = $this->getParametre($_POST, 'auteur');
              $contenu = $this->getParametre($_POST, 'contenu');
              $idTicket = $this->getParametre($_POST, 'id');
              $this->ctrlTicket->commenter($auteur, $contenu, $idTicket);
            }

            else if ($_GET['action'] == 'modifieretat'){              
                $idTicket = $this->getParametre($_POST,"id");
                $idEtat = $this->getParametre($_POST,"etats");
                $this->ctrlTicket->changeEtat($idTicket,$idEtat);    
              }


            else if ($_GET['action'] == 'gestion'){
              $this->ctrlEtat->etats();
            }

          else if ($_GET['action'] == 'ajoutEtat') {
            $nomEtat = $this->getParametre($_POST, 'nom');
            $this->ctrlEtat->etat($nomEtat);
            $this->ctrlEtat->etats();        }


          else{
              throw new Exception("Action non valide");}
      }
      else {  // aucune action définie : affichage de l'accueil
          $this->ctrlAccueil->accueil();
      }
  }
  catch (Exception $e) {
      $this->erreur($e->getMessage());
  }
}

// Affiche une erreur
private function erreur($msgErreur) {
  $vue = new Vue("Erreur");
  $vue->generer(array('msgErreur' => $msgErreur));
}

// Recherche un paramètre dans un tableau
private function getParametre($tableau, $nom) {
  if (isset($tableau[$nom])) {
      return $tableau[$nom];
  }
  else
      throw new Exception("Paramètre '$nom' absent");
}

}