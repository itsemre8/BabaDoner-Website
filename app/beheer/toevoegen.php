<?php
require '../db.php';
session_start();

if (!isset($_SESSION['ingelogd'])) {
    header('Location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $stmt = $pdo->prepare("INSERT INTO gerechten (naam, beschrijving, prijs, categorie, afbeelding) VALUES (?, ?, ?, ?, ?)");
   $stmt->execute([$_POST['naam'], $_POST['beschrijving'], $_POST['prijs'], $_POST['categorie'], '']);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Gerecht toevoegen – Baba Döner</title>
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
    .beheer-body { max-width: 600px; margin: 3rem auto; padding: 0 2rem; }
    @media (max-width: 600px) {
      .beheer-header { flex-wrap: wrap; gap: 1rem; }
      .beheer-header h1 { font-size: 1.1rem; }
    }
  </style>
</head>
<body>

  <div class="beheer-header">
    <h1>Baba <span>Döner</span> – Beheer</h1>
    <a href="index.php" class="btn-outline">← Terug</a>
  </div>

  <div class="beheer-body">
    <div class="contact-form-wrap">
      <h2 class="form-title">Gerecht toevoegen</h2>
      <form method="POST">
        <div class="form-group">
          <label>Naam</label>
          <input type="text" name="naam">
        </div>
        <div class="form-group">
          <label>Beschrijving</label>
          <textarea name="beschrijving" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label>Prijs</label>
          <input type="text" name="prijs" placeholder="bijv. 13.50">
        </div>
        <div class="form-group">
          <label>Categorie</label>
          <select name="categorie">
            <option>Döner</option>
            <option>Kebab</option>
            <option>Meze</option>
            <option>Pide</option>
            <option>Dessert</option>
            <option>Dranken</option>
          </select>
        </div>
        <button type="submit" class="btn-primary" style="width:100%">Toevoegen ✦</button>
      </form>
    </div>
  </div>

</body>
</html>