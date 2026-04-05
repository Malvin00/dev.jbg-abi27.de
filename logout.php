<?php
session_start();
// Alle Session-Daten löschen
$_SESSION = array();
session_destroy();

// Zurück zur Startseite leiten
header("Location: index.php");
exit();
?>