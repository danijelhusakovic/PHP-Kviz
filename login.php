<?php
require 'config.php';

// Provjera cookie
if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    $result = mysqli_query($conn, "SELECT * FROM ucenici WHERE token='$token'");
    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['ime'] = $row['ime'];
        header('Location: dashboard.php');
    }
}

// Login forma
if ($_POST) {
    $email = $_POST['email'];
    $lozinka = $_POST['lozinka'];
    
    $result = mysqli_query($conn, "SELECT * FROM ucenici WHERE email='$email'");
    $row = mysqli_fetch_assoc($result);
    
    if ($row && password_verify($lozinka, $row['lozinka'])) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['ime'] = $row['ime'];
        
        // Cookie - 30 dana
        $token = bin2hex(random_bytes(32));
        mysqli_query($conn, "UPDATE ucenici SET token='$token' WHERE id={$row['id']}");
        setcookie('token', $token, time() + 2592000, '/');
        
        header('Location: dashboard.php');
    }
}
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Prijava</h2>
    <form method="POST">
        Email: <input name="email" required><br>
        Lozinka: <input type="password" name="lozinka" required><br>
        <button>Prijavi se</button>
    </form>
    <a href="registracija.php">Registracija</a>
</body>
</html>