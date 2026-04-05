<?php
session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abi '27 - Kollerfeier</title>
    <link rel="stylesheet" href="style.css?v=14">
</head>
<body class="kollerfeier-body">
    <div class="ambient-glow"><div class="orb orb-magenta"></div><div class="orb orb-cyan"></div></div>
    
    <div class="container">
        <header>
            <div class="subtitle kollerfeier-subtitle">Q12 präsentiert</div>
            <h1 class="kollerfeier-h1">KOLLERFEIER</h1>
            
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="instagram.php">Instagram</a></li>
                    <li><a href="tiktok.php">TikTok</a></li>
                    
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <li><a href="dashboard.php" style="color: #ff00cc; font-weight: bold; border-bottom: 2px solid #ff00cc;">Stufen Dashboard</a></li>
                        <li><a href="logout.php" style="color: #ff4444;">Ausloggen</a></li>
                    <?php else: ?>
                        <li><a href="login.php" class="login-nav-btn">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>

        <section class="neon-event-section">
            
            <div class="event-headline-block">
                <h3 class="heavy-neon-cyan">📍 Partyplatz Miltenberg</h3>
                <p class="neon-date">Samstag, 30. Juli 2026 ab 20:00 Uhr</p>
            </div>

            <div class="info-layout">
                
                <div class="info-details">
                    <div class="info-panel">
                        <h4>💸 Eintritt</h4>
                        <p>5€ an der Abendkasse.<br>Die ersten Getränke inklusive!</p>
                    </div>
                    
                    <div class="info-panel">
                        <h4>What to expect</h4>
                        <p>Gute Musik, eiskalte Getränke und die beste Stimmung um den Start in die Q12 gebührend zu feiern! DJ ab 21 Uhr!</p>
                    </div>
                    
                    <div class="info-panel">
                        <h4>Location Details</h4>
                        <p>Offizieller Grillplatz / Partyplatz in Miltenberg (direkt am Main).</p>
                    </div>
                </div>

                <div class="info-map-container">
                    <iframe 
                        src="https://maps.google.com/maps?q=49.707444,9.260194&hl=de&z=16&t=&ie=UTF8&iwloc=&output=embed" 
                        class="embedded-map"
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

            </div>

            <div style="text-align: center; margin-top: 40px;">
                <button class="ticket-btn" onclick="alert('Ticketverkauf startet in Kürze!');">Tickets Kaufen</button>
            </div>
        </section>

        <div style="text-align: center; margin-bottom: 40px;">
            <a href="index.php" class="back-link">← Zurück zur Übersicht</a>
        </div>
    </div>

    <footer>
        <p>© 2026 Abi-Jahrgang '27 - Miltenberg</p>
        <div class="footer-links">
            <a href="impressum.html">Impressum</a>
            <a href="datenschutz.html">Datenschutz</a>
        </div>
    </footer>
</body>
</html>