<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abi '27 - TikTok</title>
    <link rel="stylesheet" href="style.css?v=15">
</head>
<body>
    <div class="ambient-glow"><div class="orb orb-1"></div><div class="orb orb-2"></div></div>
    
    <div class="container">
        <header>
            <div class="subtitle">For You Page</div>
            <h1>TIKTOK</h1>
            
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="instagram.php">Instagram</a></li>
                    <li><a href="tiktok.php" class="active">TikTok</a></li>
                    
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
                    <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@jbgmil_abi27/video/7584744393345649942" data-video-id="7584744393345649942" style="max-width: 605px;min-width: 325px;" > <section> <a target="_blank" title="@jbgmil_abi27" href="https://www.tiktok.com/@jbgmil_abi27?refer=embed">@jbgmil_abi27</a> </section> </blockquote>
                </div>

                <div class="social-card">
                    <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@jbgmil_abi27/video/7568991499522673942" data-video-id="7568991499522673942" style="max-width: 605px;min-width: 325px;" > <section> <a target="_blank" title="@jbgmil_abi27" href="https://www.tiktok.com/@jbgmil_abi27?refer=embed">@jbgmil_abi27</a> </section> </blockquote>
                </div>

                <div class="social-card">
                    <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@jbgmil_abi27/video/7579258984314490134" data-video-id="7579258984314490134" style="max-width: 605px;min-width: 325px;" > <section> <a target="_blank" title="@jbgmil_abi27" href="https://www.tiktok.com/@jbgmil_abi27?refer=embed">@jbgmil_abi27</a> </section> </blockquote>
                </div>

            </div>
        </section>
    </div>

    <script async src="https://www.tiktok.com/embed.js"></script>

    <footer>
        <p>© 2026 Abi-Jahrgang '27 - Miltenberg</p>
    </footer>
</body>
</html>