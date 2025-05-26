<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>


    <form method="POST" action="{{route('register')}}" id="register-form">
        @csrf   
        <input type="text" id="username" name="username" placeholder="Username" required><br>
        <input type="email" id="email" name="email" placeholder="Email" required><br>
        <input type="password" id="password" name="password" placeholder="Password" required><br>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" required><br>
        <input type="text" id="phone" name="phone" placeholder="Phone number" required><br>
        <input type="text" id="adress" name="adress" placeholder="Address" required><br>
        <input type="text" id="postal" name="postal" placeholder="Postal code" required><br>

        <button type="submit">Register</button>
    </form>

    <p id="terug">Heb je al een account? Ga terug naar <a href="login">login</a></p>

<?php
// ---- DATABASE CONFIG ----
$host = 'localhost';
$dbname = 'shoelab';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database verbinding mislukt: " . $e->getMessage());
}

// ---- FUNCTIES ----
function normalizePostcode($postcode) {
    $postcode = strtoupper(str_replace(' ', '', $postcode));
    return substr($postcode, 0, 4) . ' ' . substr($postcode, 4, 2);
}

function isValidDutchPostcode($postcode) {
    $postcode = normalizePostcode($postcode);
    return preg_match('/^[1-9][0-9]{3}\s?[A-Z]{2}$/', $postcode) ? $postcode : false;
}

// ---- FORM VERWERKING ----
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['username']);
    $email = trim($_POST['email']);
    $pass = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];
    $phone = trim($_POST['phone']);
    $address = trim($_POST['adress']);
    $postal_input = trim($_POST['postal']);

    // Postcode validatie
    $normalized_postal = isValidDutchPostcode($postal_input);
    if (!$normalized_postal) {
        echo "<p style='color:red;'>Ongeldige postcode. Gebruik het formaat 1234 AB.</p>";
        return;
    }

    // Wachtwoordcontrole
    if ($pass !== $confirm_pass) {
        echo "<p style='color:red;'>Wachtwoorden komen niet overeen.</p>";
        return;
    }

    try {
        // Insert naar database
        $stmt = $pdo->prepare("INSERT INTO login (username, email, password, phone, address, postal) 
                               VALUES (:username, :email, :password, :phone, :address, :postal)");

        $stmt->bindParam(':username', $user);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $pass); // geen hashing
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':postal', $normalized_postal);

        if ($stmt->execute()) {
            echo "<p style='color:green;'>Registratie gelukt!</p>";
        } else {
            echo "<p style='color:red;'>Fout bij registratie.</p>";
        }
    } catch (PDOException $e) {
        echo "<p style='color:red;'>Database fout: " . $e->getMessage() . "</p>";
    }
}
?>
</body>
</html>
