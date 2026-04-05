<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abi '27 - Instagram</title>
    <link rel="stylesheet" href="style.css?v=15">
</head>
<body>
    <div class="ambient-glow"><div class="orb orb-1"></div><div class="orb orb-2"></div></div>
    
    <div class="container">
        <header>
            <div class="subtitle">Follow us</div>
            <h1>INSTAGRAM</h1>
            
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="instagram.php" class="active">Instagram</a></li>
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

        <section>
            <div class="social-grid">
                
                <div class="social-card">
                    <iframe class="ig-embed" src="https://www.instagram.com/p/DUxtsz2jZ6f/embed/?theme=dark" height="580" frameborder="0" scrolling="no" allowtransparency="true"></iframe>
                </div>

                <div class="social-card">
                    <iframe class="ig-embed" src="https://www.instagram.com/p/DV_IkNViN_1/embed/?theme=dark" height="580" frameborder="0" scrolling="no" allowtransparency="true"></iframe>
                </div>

                <div class="social-card">
                    <iframe class="ig-embed" src="https://www.instagram.com/p/DT-2_t-CKWk/embed/?theme=dark" height="580" frameborder="0" scrolling="no" allowtransparency="true"></iframe>
                </div>

            </div>
        </section>
    </div>

    <footer>
        <p>© 2026 Abi-Jahrgang '27 - Miltenberg</p>
    </footer>
</body>
</html>