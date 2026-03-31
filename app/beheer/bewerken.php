<?php
require '../db.php';
session_start();

if (!isset($_SESSION['ingelogd'])) {
    header('Location: ../login.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM gerechten WHERE id = ?");
$stmt->execute([$_GET['id']]);
$gerecht = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE gerechten SET naam=?, beschrijving=?, prijs=?, categorie=? WHERE id=?");
    $stmt->execute([$_POST['naam'], $_POST['beschrijving'], $_POST['prijs'], $_POST['categorie'], $_GET['id']]);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Gerecht bewerken</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body style="padding:2rem;">

  <h2>Gerecht bewerken</h2>
  <a href="index.php">← Terug</a>

  <form method="POST" style="margin-top:1rem;">
    <div class="form-group">
      <label>Naam</label>
      <input type="text" name="naam" value="<?php echo $gerecht['naam']; ?>">
    </div>
    <div class="form-group">
      <label>Beschrijving</label>
      <textarea name="beschrijving"><?php echo $gerecht['beschrijving']; ?></textarea>
    </div>
    <div class="form-group">
      <label>Prijs</label>
      <input type="text" name="prijs" value="<?php echo $gerecht['prijs']; ?>">
    </div>
    <div class="form-group">
      <label>Categorie</label>
      <select name="categorie">
        <?php foreach (['Döner','Kebab','Meze','Pide','Dessert','Dranken'] as $cat): ?>
          <option <?php echo $gerecht['categorie'] == $cat ? 'selected' : ''; ?>>
            <?php echo $cat; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn-primary">Opslaan</button>
  </form>

</body>
</html>