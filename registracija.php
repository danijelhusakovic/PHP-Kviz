<?php
require 'config.php';

if ($_POST) {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];
    $lozinka = password_hash($_POST['lozinka'], PASSWORD_DEFAULT);
    
    mysqli_query($conn, "INSERT INTO ucenici (ime, prezime, email, lozinka) VALUES ('$ime', '$prezime', '$email', '$lozinka')");
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Registracija</h2>
    <form method="POST">
        Ime: <input name="ime" required><br>
        Prezime: <input name="prezime" required><br>
        Email: <input name="email" required><br>
        Lozinka: <input type="password" name="lozinka" required><br>
        <button>Registriraj se</button>
    </form>
    <a href="login.php">Prijava</a>
</body>
</html>