<?php
session_start();
require 'db.php';

$error = '';
$email = isset($_GET['email']) ? trim($_GET['email']) : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $entered_code = trim($_POST['code']);
    $entered_code = str_replace('-', '', $entered_code); // Bindestriche entfernen

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        $current_time = date('Y-m-d H:i:s');
        
        if ($user['login_code'] === $entered_code && $user['code_expires_at'] > $current_time) {
            // VIP-Bändchen vergeben
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // Code löschen
            $clear_stmt = $pdo->prepare("UPDATE users SET login_code = NULL, code_expires_at = NULL WHERE id = ?");
            $clear_stmt->execute([$user['id']]);
            
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Der Code ist leider falsch oder abgelaufen.";
        }
    } else {
        $error = "Benutzer nicht gefunden.";
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abi '27 - Verifizierung</title>
    <link rel="stylesheet" href="style.css?v=5">
</head>
<body>
    <div class="ambient-glow"><div class="orb orb-1"></div><div class="orb orb-2"></div></div>
    <div class="container">
        <header>
            <div class="subtitle">Sicherheitscheck</div>
            <h1>VERIFIZIERUNG</h1>
        </header>

        <section class="glass-card auth-card">
            <?php if($error): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php else: ?>
                <div class="alert alert-success">Wir haben dir einen 6-stelligen Code an <b><?php echo htmlspecialchars($email); ?></b> gesendet. Schau auch im Spam-Ordner!</div>
            <?php endif; ?>

            <form action="verify.php" method="POST">
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
                <div class="form-group" style="text-align: center;">
                    <label>Dein Verifizierungscode</label>
                    <input type="text" name="code" class="form-control" required placeholder="z.B. 123-456" style="font-size: 1.5rem; text-align: center; letter-spacing: 5px; font-weight: bold;">
                </div>
                <button type="submit" class="buy-btn" style="width: 100%; margin-top: 10px;">Einloggen</button>
            </form>
        </section>
    </div>
    <footer><p>© 2026 Abi-Jahrgang '27</p></footer>
</body>
</html>
