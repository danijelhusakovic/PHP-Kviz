<?php
require 'config.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Dobrodošao, <?= $_SESSION['ime'] ?>!</h2>
    <p>Ostao si ulogiran!</p>
    <a href="logout.php">Odjava</a>
</body>
</html>