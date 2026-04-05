<?php
session_start();

// Anti-Cache: Verhindert, dass der Browser alte Zustände lädt
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Der Türsteher: Wenn der Nutzer schon eingeloggt ist, direkt ins Dashboard leiten!
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
require 'db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$error = '';
$master_invite_code = "ABI2027"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $invite = trim($_POST['invite_code']);
    $fname = trim($_POST['first_name']);
    $lname = trim($_POST['last_name']);
    $email = trim($_POST['email']);

    if ($invite !== $master_invite_code) {
        $error = "Der eingegebene Invite-Code ist falsch!";
    } else {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            $error = "Diese E-Mail ist bereits registriert.";
        } else {
            $username = $fname . " " . mb_substr($lname, 0, 1, "UTF-8") . ".";
            $raw_code = sprintf("%06d", mt_rand(1, 999999));
            $formatted_code = substr($raw_code, 0, 3) . '-' . substr($raw_code, 3, 3);
            $expires = date('Y-m-d H:i:s', strtotime('+15 minutes'));

            $stmt = $pdo->prepare("INSERT INTO users (email, first_name, last_name, username, login_code, code_expires_at) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$email, $fname, $lname, $username, $raw_code, $expires]);

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'mxe9dd.netcup.net'; 
                $mail->SMTPAuth = true;
                $mail->Username = 'noreply@jbg-abi27.de';
                $mail->Password = 'i9e7K3r*8';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;
                $mail->CharSet = 'UTF-8';
                $mail->setFrom('noreply@jbg-abi27.de', "Abi '27");
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = "Registrierungs-Code";
                
                // DAS NEUE E-MAIL DESIGN
                $mail_html = '
                <!DOCTYPE html>
                <html>
                <body style="margin: 0; padding: 0; background-color: #0f0f13; font-family: \'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif;">
                    <div style="background-color: #0f0f13; padding: 40px 20px; color: #ffffff; text-align: center;">
                        <div style="max-width: 500px; margin: 0 auto; background-color: #1a1a24; border: 1px solid #333344; border-radius: 16px; padding: 40px 30px; box-shadow: 0 10px 25px rgba(0,0,0,0.5);">
                            <h1 style="color: #ff00cc; margin-top: 0; margin-bottom: 20px; font-size: 26px; text-transform: uppercase; letter-spacing: 2px;">Abi \'27</h1>
                            <p style="font-size: 16px; color: #cccccc; line-height: 1.6; margin-bottom: 30px;">
                                Willkommen, ' . htmlspecialchars($username) . '! Hier ist dein Zugangscode für die Registrierung. Bitte gib ihn auf der Website ein:
                            </p>
                            <div style="margin: 30px auto; padding: 20px; background: linear-gradient(135deg, rgba(166, 0, 255, 0.2), rgba(255, 0, 234, 0.2)); border: 2px solid #a600ff; border-radius: 12px; max-width: 250px;">
                                <span style="font-size: 36px; font-weight: bold; color: #ffffff; letter-spacing: 6px;">' . $formatted_code . '</span>
                            </div>
                            <p style="font-size: 13px; color: #777777; margin-top: 30px; margin-bottom: 0;">
                                Dieser Code ist für 15 Minuten gültig.<br>Falls du ihn nicht angefordert hast, kannst du diese E-Mail ignorieren.
                            </p>
                        </div>
                    </div>
                </body>
                </html>
                ';
                
                $mail->Body = $mail_html;
                $mail->send();
                
                header("Location: verify.php?email=" . urlencode($email));
                exit();
            } catch (Exception $e) { 
                $error = "Mail-Fehler: {$mail->ErrorInfo}"; 
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abi '27 - Registrieren</title>
    <link rel="stylesheet" href="style.css?v=8">
</head>
<body>
    <div class="ambient-glow"><div class="orb orb-1"></div><div class="orb orb-2"></div></div>
    <div class="container">
        <header>
            <div class="subtitle">Backend Access</div>
            <h1>REGISTRIEREN</h1>
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login.php">Zum Login</a></li>
                </ul>
            </nav>
        </header>

        <section class="glass-card auth-card">
            <?php if($error): ?><div class="alert alert-error"><?php echo $error; ?></div><?php endif; ?>
            <form action="register.php" method="POST">
                <div class="form-group"><label>Invite-Code (Nur für unsere Stufe)</label><input type="text" name="invite_code" class="form-control" required placeholder="z.B. ABI2027"></div>
                <div style="display:flex; gap:15px;">
                    <div class="form-group" style="flex:1;"><label>Vorname</label><input type="text" name="first_name" class="form-control" required></div>
                    <div class="form-group" style="flex:1;"><label>Nachname</label><input type="text" name="last_name" class="form-control" required></div>
                </div>
                <p style="font-size: 0.8rem; color: #aaa; text-align: left; margin-top: -10px; margin-bottom: 20px;">*Dein Username wird aus Vorname + 1. Buchstabe des Nachnamens generiert.</p>
                <div class="form-group"><label>E-Mail Adresse</label><input type="email" name="email" class="form-control" required placeholder="deine@email.de"></div>
                <button type="submit" class="buy-btn" style="width:100%;">Code anfordern</button>
            </form>
            <p style="margin-top:20px;">Schon registriert? <a href="login.php" style="color:var(--glow-color-1);">Zum Login</a></p>
        </section>
    </div>
    <footer><p>© 2026 Abi-Jahrgang '27</p></footer>
</body>
</html>