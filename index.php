<?php
session_start();

// Zwingt den Browser, die Startseite immer frisch zu laden (wegen des Login-Status in der Navi)
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abi '27 - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="ambient-glow"><div class="orb orb-1"></div><div class="orb orb-2"></div></div>

    <div class="container">
        <header>
            <div class="subtitle">Gymnasium Miltenberg</div>
            <h1>ABIJAHRGANG '27</h1>
            
           <nav class="main-nav">
                <ul>
                    <li><a href="index.php" class="active">Home</a></li>
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

        <div class="grid-layout">
            <section class="glass-card">
                <h2>📅 Kalender</h2>
                
                <a href="kollerfeier.php" class="event-link" title="Mehr Infos zur Kollerfeier">
                    <div class="event-item">
                        <div class="date-box">
                            <span class="day">30</span>
                            <span class="month">JUL</span>
                        </div>
                        <div class="event-info">
                            <h3>Kollerfeier</h3>
                            <p>Bürgstadt (Klick für Details) 📍</p>
                        </div>
                    </div>
                </a>
            </section>

            <section class="glass-card">
                <h2>💸 Abikasse</h2>
                <p>Ziel: 15.000€</p>
                <div style="height: 10px; background: rgba(255,255,255,0.1); border-radius: 5px; margin-top: 10px; overflow: hidden;">
                    <div style="width: 45%; height: 100%; background: linear-gradient(90deg, var(--glow-color-1), var(--glow-color-2));"></div>
                </div>
                <p style="margin-top: 5px; font-size: 0.8rem; color: rgba(255,255,255,0.6);">45% erreicht</p>
            </section>
        </div>
    </div>

    <footer>
        <p>© 2026 Abi-Jahrgang '27 - Gymnasium Miltenberg</p>
        <div class="footer-links">
            <a href="impressum.html">Impressum</a>
            <a href="datenschutz.html">Datenschutz</a>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>