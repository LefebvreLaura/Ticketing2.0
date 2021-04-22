<?php $titre = 'Ticketing'; ?>
<h2><a href = "index.php?action=gestion">Gestion des états</a></h2>

<?php foreach ($tickets as $ticket): ?>
  <article>
    <header>
    <a href="<?= "index.php?action=ticket&id=" . $ticket['id'] ?>">
      <h1 class="titreTicket"><?= $ticket['titre'] ?></h1>
    </a>
    <p><?= $ticket['etat'] ?></p>
      <time><?= $ticket['date'] ?></time>
    </header>
    <p><?= $ticket['contenu'] ?></p>
  </article>
  <hr />
<?php endforeach; ?>