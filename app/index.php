<?php
require 'db.php';
$zoek = isset($_GET['zoek']) ? '%' . $_GET['zoek'] . '%' : '%';
$stmt = $pdo->prepare("SELECT * FROM gerechten WHERE naam LIKE ?");
$stmt->execute([$zoek]);
$gerechten = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Baba Döner – Authentiek Anatolisch Restaurant</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Cinzel:wght@400;600;700&family=Crimson+Pro:ital,wght@0,300;0,400;0,600;1,300;1,400&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <!-- ─── NAVBAR ─── -->
  <nav>
    <div class="nav-inner">
      <a class="nav-logo" href="#page-home">Baba <span>Döner</span></a>
      <ul class="nav-links">
        <li><a href="#page-home">Home</a></li>
        <li><a href="#page-menu">Menu</a></li>
        <li><a href="#page-gallery">Galerij</a></li>
        <li><a href="#page-contact">Contact</a></li>
        <li><a href="#page-reservation">Reserveren</a></li>
        <li><a href="login.php">Beheer</a></li>
      </ul>
    </div>
  </nav>


  <!-- ══════════════════════════════ HOME ══════════════════════════════ -->
  <div id="page-home">

    <section class="hero">
      <img class="hero-img" src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=1600&q=80&fit=crop"
        alt="Restaurant interieur">
      <div class="hero-pattern"></div>
      <div class="hero-content">
        <div class="hero-subtitle">✦ Authentiek Anatolisch ✦</div>
        <h1 class="hero-title">Baba <span class="accent">Döner</span></h1>
        <p class="hero-tagline">Waar elke hap een reis naar Anatolië is</p>
        <div class="hero-ctas">
          <a class="btn-primary" href="#page-menu">Bekijk Menu</a>
          <a class="btn-outline" href="#page-reservation">Reserveer Nu</a>
        </div>
      </div>
    </section>

    <section class="section section-sand">
      <div class="container">
        <div class="section-header">
          <div class="section-label">✦ Onze specialiteiten ✦</div>
          <h2 class="section-title">Signature Gerechten</h2>
        </div>
        <div class="featured-grid">
          <div class="featured-main">
            <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=900&q=80&fit=crop&crop=center"
              alt="Döner Kebab Deluxe">
            <div class="featured-overlay">
              <h3>Döner Kebab Deluxe</h3>
              <p>Het kroonstuk van Baba Döner — gegaard aan het spit gedurende 8 uur</p>
            </div>
          </div>
          <div class="featured-side">
            <img src="pictures/adanakebap.jpg" alt="Adana Kebab"
              onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
            <div class="menu-card-img-placeholder" style="display:none">🍢</div>
            <div class="featured-side-overlay">
              <h4>Adana Kebab</h4>
            </div>
          </div>
          <div class="featured-side">
            <img src="pictures/meze.png" alt="Meze"
              onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
            <div class="menu-card-img-placeholder" style="display:none">🥗</div>
            <div class="featured-side-overlay">
              <h4>Meze</h4>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="about-grid">
          <div class="about-image">
            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=700&q=80&fit=crop&crop=center"
              alt="Restaurant interieur Baba Döner">
          </div>
          <div class="about-text">
            <div class="section-label">✦ Ons verhaal ✦</div>
            <h2 class="section-title">Meer dan 20 jaar<br>smaak & traditie</h2>
            <div class="divider">❧</div>
            <p>Baba Döner begon als een droom van één familie — de authentieke smaken van Centraal-Anatolië naar
              Nederland brengen. Met recepten die van generatie op generatie zijn doorgegeven, bereiden wij elk gerecht
              met liefde en respect voor de traditie.</p>
            <p>Van de malse döner die uren aan het spit draait, tot onze huisgemaakte mezes en versgebakken pide — alles
              wordt met verse, lokale ingrediënten bereid.</p>
            <div class="about-stats">
              <div class="stat">
                <div class="stat-num">20+</div>
                <div class="stat-label">Jaren Ervaring</div>
              </div>
              <div class="stat">
                <div class="stat-num">50+</div>
                <div class="stat-label">Gerechten</div>
              </div>
              <div class="stat">
                <div class="stat-num">∞</div>
                <div class="stat-label">Passie</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="video-section">
      <div class="container">
        <div class="section-header">
          <div class="section-label" style="color:var(--goud)">✦ Behind the scenes ✦</div>
          <h2 class="section-title" style="color:var(--zand)">Beleef Baba Döner</h2>
        </div>
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:2rem; margin-top:2rem;">
          <div class="video-wrap">
            <video width="100%" height="300" controls>
              <source src="videos/video1.mp4" type="video/mp4">
            </video>
          </div>
          <div class="video-wrap">
            <video width="100%" height="300" controls>
              <source src="videos/video2.mp4" type="video/mp4">
            </video>
          </div>
        </div>
      </div>
    </div>

    <section class="section section-sand">
      <div class="container">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:start">
          <div>
            <div class="section-label">✦ Openingstijden ✦</div>
            <h2 class="section-title" style="margin-bottom:2rem">Wanneer kunt u<br>ons bezoeken</h2>
            <div class="hours-grid">
              <div>
                <div class="hour-row"><span class="hour-day">Maandag</span><span class="hour-time">11:00 – 22:00</span>
                </div>
                <div class="hour-row"><span class="hour-day">Dinsdag</span><span class="hour-time">11:00 – 22:00</span>
                </div>
                <div class="hour-row"><span class="hour-day">Woensdag</span><span class="hour-time">11:00 – 22:00</span>
                </div>
                <div class="hour-row"><span class="hour-day">Donderdag</span><span class="hour-time">11:00 –
                    23:00</span></div>
              </div>
              <div>
                <div class="hour-row"><span class="hour-day">Vrijdag</span><span class="hour-time">11:00 – 00:00</span>
                </div>
                <div class="hour-row"><span class="hour-day">Zaterdag</span><span class="hour-time">12:00 – 00:00</span>
                </div>
                <div class="hour-row"><span class="hour-day">Zondag</span><span class="hour-time">12:00 – 22:00</span>
                </div>
              </div>
            </div>
            <div style="margin-top:2rem"><a class="btn-primary" href="#page-reservation">Reserveer Een Tafel</a></div>
          </div>
          <div>
            <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?w=800&q=80&fit=crop&crop=center"
              alt="Restaurant" style="width:100%;height:350px;object-fit:cover;display:block">
            <div style="margin-top:1.5rem">
              <div class="contact-info-item">
                <div class="contact-icon">📍</div>
                <div class="contact-info-text">
                  <h4>Adres</h4>
                  <p>Anatoliastraat 42<br>1234 AB Amsterdam</p>
                </div>
              </div>
              <div class="contact-info-item">
                <div class="contact-icon">📞</div>
                <div class="contact-info-text">
                  <h4>Telefoon</h4>
                  <p>+31 20 123 4567</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="footer-grid">
        <div class="footer-brand">
          <div class="footer-logo">Baba <span>Döner</span></div>
          <p>Authentieke Anatolische smaken in het hart van Nederland. Tradities bewaard, voor elke generatie opnieuw
            beleefd.</p>
        </div>
        <div class="footer-col">
          <h4>Navigatie</h4>
          <a href="#page-home">Home</a>
          <a href="#page-menu">Menu</a>
          <a href="#page-gallery">Galerij</a>
          <a href="#page-contact">Contact</a>
        </div>
        <div class="footer-col">
          <h4>Contact</h4>
          <p>Anatoliastraat 42</p>
          <p>Amsterdam</p>
          <p>+31 20 123 4567</p>
          <p>info@babadoner.nl</p>
        </div>
        <div class="footer-col">
          <h4>Openingstijden</h4>
          <p>Ma–Do: 11:00–22:00</p>
          <p>Vr: 11:00–00:00</p>
          <p>Za: 12:00–00:00</p>
          <p>Zo: 12:00–22:00</p>
        </div>
      </div>
      <div class="footer-bottom">
        <span>© 2005 Baba Döner. Alle rechten voorbehouden.</span>
        <span>✦ Met liefde gemaakt vanuit Anatolië ✦</span>
      </div>
    </footer>
  </div>


  <!-- ══════════════════════════════ MENU ══════════════════════════════ -->
  <div id="page-menu">
    <div style="margin-top:70px">
      <div class="menu-hero">
        <div class="hero-pattern" style="opacity:0.07"></div>
        <div class="menu-hero-content">
          <div class="hero-subtitle">✦ Authentiek & Vers ✦</div>
          <h1 style="font-family:'Cinzel Decorative',cursive;font-size:clamp(2rem,5vw,4rem);color:var(--wit)">Onze
            Menukaart</h1>
        </div>
      </div>
    </div>

    <div style="text-align:center; padding: 2rem;">
      <form method="GET" action="">
        <input type="text" name="zoek" placeholder="Zoek een gerecht..."
          value="<?php echo isset($_GET['zoek']) ? htmlspecialchars($_GET['zoek']) : ''; ?>"
          style="padding:0.8rem; width:300px; font-size:1rem;">
        <button type="submit" class="btn-primary">Zoeken</button>
      </form>
    </div>

    <div class="menu-section">
      <?php
    $categorien = [
      'Döner' => '🥙',
      'Kebab' => '🍢',
      'Meze' => '🥗',
      'Pide' => '🍞',
      'Dessert' => '🍯',
      'Dranken' => '☕'
    ];

    foreach ($categorien as $cat => $emoji):
      $zoek = isset($_GET['zoek']) ? '%' . $_GET['zoek'] . '%' : '%';
      $stmt = $pdo->prepare("SELECT * FROM gerechten WHERE categorie = ? AND naam LIKE ?");
      $stmt->execute([$cat, $zoek]);
      $items = $stmt->fetchAll();
      if (count($items) > 0):
    ?>
      <div class="menu-section-title">
        <?php echo $emoji . ' ' . $cat; ?>
      </div>
      <div class="menu-grid">
        <?php foreach ($items as $gerecht): ?>
        <div class="menu-card">
          <?php if ($gerecht['afbeelding']): ?>
          <img class="menu-card-img" src="<?php echo $gerecht['afbeelding']; ?>" alt="<?php echo $gerecht['naam']; ?>">
          <?php else: ?>
          <div class="menu-card-img-placeholder">🍽️</div>
          <?php endif; ?>
          <div class="menu-card-body">
            <div class="menu-card-top">
              <div class="menu-card-name">
                <?php echo htmlspecialchars($gerecht['naam']); ?>
              </div>
              <div class="menu-card-price">€
                <?php echo number_format($gerecht['prijs'], 2, ',', '.'); ?>
              </div>
            </div>
            <p class="menu-card-desc">
              <?php echo htmlspecialchars($gerecht['beschrijving']); ?>
            </p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; endforeach; ?>
    </div>

    <footer style="background:var(--donker);">
      <div class="footer-bottom"
        style="max-width:1300px;margin:auto;padding:2rem 0;display:flex;justify-content:space-between">
        <span style="color:rgba(255,255,255,0.5);font-family:'Cinzel',serif;font-size:0.65rem;">© 2025 Baba Döner</span>
        <span style="color:rgba(255,255,255,0.5);font-family:'Cinzel',serif;font-size:0.65rem;">✦ Anatolisch Vakmanschap
          ✦</span>
      </div>
    </footer>
  </div>


  <!-- ══════════════════════════════ GALERIJ ══════════════════════════════ -->
  <div id="page-gallery">
    <div style="margin-top:70px">
      <div class="menu-hero">
        <div class="hero-pattern"></div>
        <div class="menu-hero-content">
          <div class="hero-subtitle">✦ Beelden & Sfeer ✦</div>
          <h1 style="font-family:'Cinzel Decorative',cursive;font-size:clamp(2rem,5vw,4rem);color:var(--wit)">Galerij
          </h1>
        </div>
      </div>

      <section class="section">
        <div class="container">
          <div class="section-header">
            <div class="section-label">✦ Restaurant & Gerechten ✦</div>
            <h2 class="section-title">Een Visuele Reis</h2>
          </div>
          <div class="gallery-grid">
            <div class="gallery-item">
              <img src="pictures/Doner-Kebab.jpg" alt="Döner Kebab" style="width:100%;height:100%;object-fit:cover;">
              <div class="gallery-overlay">
                <div class="gallery-overlay-text">✦ DÖNER KEBAB ✦</div>
              </div>
            </div>
            <div class="gallery-item">
              <img src="pictures/adanakebap.jpg" alt="Adana Kebab" style="width:100%;height:100%;object-fit:cover;">
              <div class="gallery-overlay">
                <div class="gallery-overlay-text">✦ ADANA KEBAB ✦</div>
              </div>
            </div>
            <div class="gallery-item">
              <img src="pictures/kunefe.jpg" alt="Künefe" style="width:100%;height:100%;object-fit:cover;">
              <div class="gallery-overlay">
                <div class="gallery-overlay-text">✦ Künefe ✦</div>
              </div>
            </div>
            <div class="gallery-item">
              <img src="pictures/kasarli-pide.jpg" alt="Kasarli pide" style="width:100%;height:100%;object-fit:cover;">
              <div class="gallery-overlay">
                <div class="gallery-overlay-text">✦ Kasarali pide ✦</div>
              </div>
            </div>
            <div class="gallery-item">
              <img src="pictures/turkse thee.jpg" alt="Turkse Thee" style="width:100%;height:100%;object-fit:cover;">
              <div class="gallery-overlay">
                <div class="gallery-overlay-text">✦ Turkse thee ✦</div>
              </div>
            </div>
            <div class="gallery-item">
              <img src="pictures/kiymali-pide.jpg.webp" alt="Pide" style="width:100%;height:100%;object-fit:cover;">
              <div class="gallery-overlay">
                <div class="gallery-overlay-text">✦ Pide ✦</div>
              </div>
            </div>
            <div class="gallery-item">
              <img src="pictures/tavuksis.jpg" alt="Onze Chef" style="width:100%;height:100%;object-fit:cover;">
              <div class="gallery-overlay">
                <div class="gallery-overlay-text">✦ Tavuk sis ✦</div>
              </div>
            </div>
            <div class="gallery-item">
              <img src="pictures/hummus.jpg" alt="Kruiden" style="width:100%;height:100%;object-fit:cover;">
              <div class="gallery-overlay">
                <div class="gallery-overlay-text">✦ KRUIDEN ✦</div>
              </div>
            </div>
            <div class="gallery-item">
              <img src="pictures/meze.png" alt="Meze" style="width:100%;height:100%;object-fit:cover;">
              <div class="gallery-overlay">
                <div class="gallery-overlay-text">✦ Meze ✦</div>
              </div>
            </div>
            <div class="gallery-item">
              <img src="pictures/Baklava(1).png" alt="Baklava" style="width:100%;height:100%;object-fit:cover;">
              <div class="gallery-overlay">
                <div class="gallery-overlay-text">✦ BAKLAVA ✦</div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="video-section">
        <div class="container">
          <div class="section-header">
            <div class="section-label" style="color:var(--goud)">✦ Video's ✦</div>
            <h2 class="section-title" style="color:var(--zand)">Beleef de Sfeer</h2>
          </div>
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:2rem;margin-top:2rem">
            <div class="video-wrap">
              <video width="100%" height="300" controls>
                <source src="videos/video1.mp4" type="video/mp4">
              </video>
            </div>
            <div class="video-wrap">
              <video width="100%" height="300" controls>
                <source src="videos/video2.mp4" type="video/mp4">
              </video>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- ══════════════════════════════ CONTACT ══════════════════════════════ -->
  <div id="page-contact">
    <div style="margin-top:70px">
      <div class="menu-hero">
        <div class="hero-pattern"></div>
        <div class="menu-hero-content">
          <div class="hero-subtitle">✦ Neem contact op ✦</div>
          <h1 style="font-family:'Cinzel Decorative',cursive;font-size:clamp(2rem,5vw,4rem);color:var(--wit)">Contact
          </h1>
        </div>
      </div>

      <section class="section">
        <div class="container">
          <div class="contact-grid">
            <div class="contact-info">
              <div class="section-label">✦ Bereik ons ✦</div>
              <h2 class="section-title" style="margin-bottom:2rem">Wij horen<br>graag van u</h2>
              <div class="contact-info-item">
                <div class="contact-icon">📍</div>
                <div class="contact-info-text">
                  <h4>Adres</h4>
                  <p>Anatoliastraat 42<br>1234 AB Amsterdam<br>Nederland</p>
                </div>
              </div>
              <div class="contact-info-item">
                <div class="contact-icon">📞</div>
                <div class="contact-info-text">
                  <h4>Telefoon</h4>
                  <p>+31 20 123 4567<br>Ma–Za: 10:00–23:00</p>
                </div>
              </div>
              <div class="contact-info-item">
                <div class="contact-icon">✉️</div>
                <div class="contact-info-text">
                  <h4>E-mail</h4>
                  <p>info@babadoner.nl<br>reserveringen@babadoner.nl</p>
                </div>
              </div>
              <div class="map-placeholder">
                <span style="font-size:2rem">🗺️</span>
                <span>KAART — Google Maps Embed</span>
              </div>
            </div>
            <div>
              <div class="contact-form-wrap">
                <h2 class="form-title">Stuur een bericht</h2>
                <p class="form-subtitle">Wij reageren binnen 24 uur op uw bericht</p>
                <form action="mailto:info@babadoner.nl" method="post" enctype="text/plain">
                  <div class="form-row">
                    <div class="form-group"><label>Voornaam</label><input type="text" name="voornaam"
                        placeholder="Ahmed"></div>
                    <div class="form-group"><label>Achternaam</label><input type="text" name="achternaam"
                        placeholder="Yilmaz"></div>
                  </div>
                  <div class="form-group"><label>E-mailadres</label><input type="email" name="email"
                      placeholder="uw@email.nl"></div>
                  <div class="form-group">
                    <label>Onderwerp</label>
                    <select name="onderwerp">
                      <option>Algemene vraag</option>
                      <option>Reservering</option>
                      <option>Catering aanvraag</option>
                      <option>Klacht/Feedback</option>
                      <option>Samenwerking</option>
                    </select>
                  </div>
                  <div class="form-group"><label>Uw bericht</label><textarea name="bericht" rows="5"
                      placeholder="Schrijf hier uw bericht..."></textarea></div>
                  <button type="submit" class="btn-primary" style="width:100%">Verstuur Bericht ✦</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>


  <!-- ══════════════════════════════ RESERVEREN ══════════════════════════════ -->
  <div id="page-reservation">
    <div class="reservation-section" style="margin-top:70px">
      <div class="reservation-image">
        <img src="https://images.unsplash.com/photo-1424847651672-bf20a4b0982b?w=900&q=80&fit=crop&crop=center"
          alt="Restaurant tafelsetting">
      </div>
      <div class="reservation-form-wrap">
        <div class="section-label" style="text-align:left">✦ Tafel reserveren ✦</div>
        <h2 class="form-title">Reserveer uw Tafel</h2>
        <p class="form-subtitle">Geniet van een onvergetelijk diner bij Baba Döner</p>
        <form action="mailto:reserveringen@babadoner.nl" method="post" enctype="text/plain">
          <div class="form-row">
            <div class="form-group"><label>Naam</label><input type="text" name="naam" placeholder="Uw naam"></div>
            <div class="form-group"><label>Telefoon</label><input type="tel" name="telefoon" placeholder="+31 6...">
            </div>
          </div>
          <div class="form-group"><label>E-mailadres</label><input type="email" name="email" placeholder="uw@email.nl">
          </div>
          <div class="form-row">
            <div class="form-group"><label>Datum</label><input type="date" name="datum"></div>
            <div class="form-group">
              <label>Tijd</label>
              <select name="tijd">
                <option>12:00</option>
                <option>12:30</option>
                <option>13:00</option>
                <option>13:30</option>
                <option>17:00</option>
                <option>17:30</option>
                <option>18:00</option>
                <option>18:30</option>
                <option>19:00</option>
                <option>19:30</option>
                <option>20:00</option>
                <option>20:30</option>
                <option>21:00</option>
                <option>21:30</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Aantal personen</label>
              <select name="personen">
                <option>1 persoon</option>
                <option>2 personen</option>
                <option>3 personen</option>
                <option>4 personen</option>
                <option>5 personen</option>
                <option>6 personen</option>
                <option>7 personen</option>
                <option>8 personen</option>
                <option>Meer dan 8</option>
              </select>
            </div>
            <div class="form-group">
              <label>Gelegenheid</label>
              <select name="gelegenheid">
                <option>Gewoon diner</option>
                <option>Verjaardag</option>
                <option>Jubileum</option>
                <option>Zakelijk diner</option>
                <option>Romantisch diner</option>
                <option>Familiebijeenkomst</option>
              </select>
            </div>
          </div>
          <div class="form-group"><label>Speciale wensen</label><textarea name="wensen" rows="3"
              placeholder="Allergieën, speciale verzoeken, dieetwensen..."></textarea></div>
          <button type="submit" class="btn-primary" style="width:100%;margin-top:0.5rem">Bevestig Reservering ✦</button>
        </form>
      </div>
    </div>
  </div>

</body>

</html>