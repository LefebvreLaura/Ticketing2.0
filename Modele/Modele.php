<?php
abstract class Modele {
    private $bdd; // Objet PDO d'accès à la BD
    // Exécute une requête SQL éventuellement paramétrée
    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
          $resultat = $this->getBdd()->query($sql);    // exécution directe
        }
        else {
          $resultat = $this->getBdd()->prepare($sql);  // requête préparée
          $resultat->execute($params);
        }
        return $resultat;
    }

    private function getBDD(){
        if($this->bdd == null){
            $this->bdd = new PDO('mysql:host=localhost;dbname=ticket;charset=utf8','root', '', array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }
}
