<?php

require_once 'Modele/Modele.php';

class Ticket extends Modele {

  // Renvoie la liste des tickets du blog
  public function getTickets() {
    $sql = 'SELECT tick_id as id, tick_date as date,
          tick_titre as titre, tick_contenu as contenu, etat_nom as etat from t_tickets
          inner join t_etats ON t_tickets.ref_etat_nom = t_etats.etat_id
          order by tick_id desc';
    $tickets = $this->executerRequete($sql);
    return $tickets;
  }

  // Renvoie les informations sur un ticket
  public function getTicket($idTicket) {
    $sql = 'SELECT tick_id as id, tick_date as date,
            tick_titre as titre, tick_contenu as contenu, etat_nom as etat from t_tickets
            inner join t_etats ON t_tickets.ref_etat_nom = t_etats.etat_id
            where tick_id = ?';
    $ticket = $this->executerRequete($sql, array($idTicket));
    if ($ticket->rowCount() == 1)
      return $ticket->fetch();  // Accès à la première ligne de résultat
    else
      throw new Exception("Aucun ticket ne correspond à l'identifiant '$idTicket'");
    }


    //modifier l'état du ticket
  public function modifyEtat($idTicket,$idEtat){
    $sql = 'UPDATE t_tickets set
            ref_etat_nom = ? where tick_id = ?';
    $this->executerRequete($sql,array($idEtat,$idTicket));
  }


}