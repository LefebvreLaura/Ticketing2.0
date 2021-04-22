<?php
require_once 'Modele/Modele.php';

class Commentaire extends Modele {

    public function getCommentaires($idTicket) {
        $sql = 'select com_id as id, com_date as date,
        com_auteur as auteur, com_contenu as contenu from t_commentaire
        where ref_tick_id=?';
        $commentaires = $this->executerRequete($sql, array($idTicket));
        return $commentaires;
    
      }
      public function ajouterCommentaire($auteur, $contenu, $idTicket) {
        $sql = 'insert into t_commentaire(com_date, com_auteur, com_contenu, ref_tick_id)
                values(?, ?, ?, ?)';
        $date = date("Y-m-d H:i:s");  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idTicket));
      }
}