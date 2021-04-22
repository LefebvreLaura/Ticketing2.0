<?php $titre = 'Ticketing'; ?>

<h2> Liste des etats </h2>
<?php foreach ($etat as $etat): ?>
  <p><?= $etat['etat_nom'] ?> </p>
<?php endforeach; ?>

<h2> Ajouter des etats </h2>

<form method="post" action="index.php?action=ajoutEtat">
    <textarea id="nom" name="nom" rows="1" 
              placeholder="ajouter un etat" required></textarea><br />
    <input type="submit" value="Ajouter" />
</form>