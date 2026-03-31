<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM gebruikers WHERE gebruikersnaam = ?");
    $stmt->execute([$_POST['gebruikersnaam']]);
    $gebruiker = $stmt->fetch();

    if ($gebruiker && password_verify($_POST['wachtwoord'], $gebruiker['wachtwoord'])) {
        $_SESSION['ingelogd'] = true;
        header('Location: beheer/index.php');
        exit;
    } else {
        $fout = "Verkeerde gebruikersnaam of wachtwoord!";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Inloggen – Baba Döner</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700&family=Cinzel:wght@400;600&family=Crimson+Pro:ital,wght@0,400;1,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background: var(--donker);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .login-wrap {
      width: 420px;
      background: var(--licht-zand);
      padding: 3rem;
    }
    .login-logo {
      font-family: 'Cinzel Decorative', cursive;
      font-size: 1.6rem;
      color: var(--bruin);
      text-align: center;
      margin-bottom: 0.5rem;
    }
    .login-logo span { color: var(--goud); }
    .login-sub {
      text-align: center;
      font-family: 'Cinzel', serif;
      font-size: 0.7rem;
      letter-spacing: 0.2em;
      color: var(--goud);
      margin-bottom: 2rem;
    }
  </style>
</head>
<body>

  <div class="login-wrap">
    <div class="login-logo">Baba <span>Döner</span></div>
    <div class="login-sub">✦ Beheerpagina ✦</div>

    <?php if (isset($fout)): ?>
      <p style="color:red; text-align:center; margin-bottom:1rem"><?php echo $fout; ?></p>
    <?php endif; ?>

    <form method="POST">
      <div class="form-group">
        <label>Gebruikersnaam</label>
        <input type="text" name="gebruikersnaam">
      </div>
      <div class="form-group">
        <label>Wachtwoord</label>
        <input type="password" name="wachtwoord">
      </div>
      <button type="submit" class="btn-primary" style="width:100%">Inloggen ✦</button>
    </form>
  </div>

</body>
</html>