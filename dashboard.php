<?php
session_start();

// Das verbietet dem Browser das Cachen der Seite (Löst den Zurück-Button Bug!)
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Wenn der Nutzer KEIN VIP-Bändchen hat, sofort zum Login kicken!
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abi '27 - Dashboard</title>
    <link rel="stylesheet" href="style.css?v=5">
</head>
<body>
    <div class="ambient-glow"><div class="orb orb-1"></div><div class="orb orb-2"></div></div>
    <div class="container">
        <header>
            <div class="subtitle">Interner Bereich</div>
            <h1>DASHBOARD</h1>
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php">Zurück zur Website</a></li>
                    <li><a href="logout.php" style="color: #ff4444;">Ausloggen</a></li>
                </ul>
            </nav>
        </header>

        <section class="glass-card">
            <h2 style="margin-bottom: 20px;">Hallo <?php echo htmlspecialchars($_SESSION['username']); ?>! 👋</h2>
            <p>Willkommen im geheimen Stufen-Bereich. Hier bauen wir später die Verwaltung für die Einnahmen und die Finanzen ein.</p>
        </section>
    </div>
    <footer><p>© 2026 Abi-Jahrgang '27</p></footer>
</body>
</html>