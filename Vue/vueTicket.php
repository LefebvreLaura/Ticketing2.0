<?php $titre = "Ticketing - " . $ticket['titre']; ?>
<article>
  <header>
    <h1 class="titreTicket"><?= $ticket['titre'] ?></h1>
    <p><?= $ticket['etat'] ?></p>
    <time><?= $ticket['date'] ?></time>
  </header>
  <p><?= $ticket['contenu'] ?></p>
</article>

  <p>Mettre à jour l'état du ticket</p>
  <form method="post" action="index.php?action=modifieretat">
                <select name="etats" class="form-control">
                    <?php foreach($etats as $etat): ?>
                        <option value="<?= $etat['etat_id'] ?>"><?= $etat['etat_nom'] ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="hidden" name="id" value="<?= $ticket['id'] ?>" />
                <input type="submit" class="btn btn-info" name="modifier_etat">
            </form>
<hr />
<header>
  <h1 id="titreReponses">Réponses à <?= $ticket['titre'] ?></h1>
</header>
<?php foreach ($commentaires as $commentaire): ?>
  <p><?= $commentaire['auteur'] ?> dit :</p>
  <p><?= $commentaire['contenu'] ?></p>
<?php endforeach; ?>

<form method="post" action="index.php?action=commenter">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" 
           required /><br />
    <textarea id="txtCommentaire" name="contenu" rows="4" 
              placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $ticket['id'] ?>" />
    <input type="submit" value="Commenter" />
</form>