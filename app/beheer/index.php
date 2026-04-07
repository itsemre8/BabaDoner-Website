<?php
require '../db.php';
session_start();

if (!isset($_SESSION['ingelogd'])) {
    header('Location: ../login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Beheerpagina – Baba Döner</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700&family=Cinzel:wght@400;600&family=Crimson+Pro:ital,wght@0,400;1,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../style.css">
  <style>
    body { background: var(--licht-zand); padding: 0; }
    .beheer-header {
      background: var(--donker);
      padding: 1.5rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid rgba(201,168,76,0.3);
    }
    .beheer-header h1 {
      font-family: 'Cinzel Decorative', cursive;
      color: var(--wit);
      font-size: 1.4rem;
    }
    .beheer-header h1 span { color: var(--goud); }
    .beheer-body { max-width: 1100px; margin: 3rem auto; padding: 0 2rem; }
    table { width: 100%; border-collapse: collapse; background: var(--wit); }
    th {
      background: var(--donker);
      color: var(--goud);
      font-family: 'Cinzel', serif;
      font-size: 0.75rem;
      letter-spacing: 0.1em;
      padding: 1rem;
      text-align: left;
    }
    td { padding: 1rem; border-bottom: 1px solid rgba(61,43,26,0.1); }
    tr:hover td { background: var(--zand); }
    .btn-bewerk {
      background: var(--goud);
      color: var(--donker);
      padding: 0.4rem 1rem;
      font-family: 'Cinzel', serif;
      font-size: 0.7rem;
      text-decoration: none;
      margin-right: 0.5rem;
    }
    .btn-verwijder {
      background: var(--terracotta);
      color: var(--wit);
      padding: 0.4rem 1rem;
      font-family: 'Cinzel', serif;
      font-size: 0.7rem;
      text-decoration: none;
    }
    .table-wrap { overflow-x: auto; }
    @media (max-width: 600px) {
      .beheer-header { flex-wrap: wrap; gap: 1rem; }
      .beheer-header h1 { font-size: 1.1rem; }
    }
  </style>
</head>
<body>

  <div class="beheer-header">
    <h1>Baba <span>Döner</span> – Beheer</h1>
    <div style="display:flex; gap:1rem; align-items:center;">
      <a href="toevoegen.php" class="btn-primary">+ Gerecht toevoegen</a>
      <a href="../logout.php" class="btn-outline">Uitloggen</a>
    </div>
  </div>

  <div class="beheer-body">
    <div class="section-label" style="margin-bottom:1rem">✦ Alle gerechten ✦</div>
    <div class="table-wrap">
    <table>
      <tr>
        <th>Naam</th>
        <th>Categorie</th>
        <th>Prijs</th>
        <th>Acties</th>
      </tr>
      <?php
      $stmt = $pdo->query("SELECT * FROM gerechten");
      $gerechten = $stmt->fetchAll();
      foreach ($gerechten as $gerecht):
      ?>
      <tr>
        <td><?php echo $gerecht['naam']; ?></td>
        <td><?php echo $gerecht['categorie']; ?></td>
        <td>€<?php echo number_format($gerecht['prijs'], 2, ',', '.'); ?></td>
        <td>
          <a class="btn-bewerk" href="bewerken.php?id=<?php echo $gerecht['id']; ?>">Bewerken</a>
          <a class="btn-verwijder" href="verwijderen.php?id=<?php echo $gerecht['id']; ?>">Verwijderen</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
    </div>
  </div>

</body>
</html>