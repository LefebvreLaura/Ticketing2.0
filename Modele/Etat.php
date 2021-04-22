<?php
require_once 'Modele/Modele.php';

class Etat extends Modele {

    public function ajouterEtat($nomEtat){
        $sql = 'insert into t_etats(etat_nom)
            values(?)';
        $this->executerRequete($sql, array($nomEtat));
    }

    public function getEtat(){
        $sql = 'SELECT * from t_etats
                order by etat_id desc';
        $etats = $this->executerRequete($sql);
        return $etats;
                
    }


}