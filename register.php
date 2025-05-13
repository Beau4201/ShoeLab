<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <form method="post">
        <label for="username"></label><br>
        <input type="text" id="username" name="username" placeholder="Username" required>
        
        <label for="email"></label><br>
        <input type="email" id="email" name="email" placeholder="Email" required>
        
        <label for="password"></label><br>
        <input type="password" id="password" name="password" placeholder="Password" required>
        
        <label for="confirm_password"></label><br>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>

        <label for="phone"></label><br>
        <input type="password" id="phone" name="phone" placeholder="Phone number" required>

        <label for="adress"></label><br>
        <input type="text" id="adress" name="adress" placeholder="Adress" required>

        <label for="postal"></label><br>
        <input type="text" id="postal" name="postal" placeholder="Postal code" required>
        
        
        <button type="submit">Register</button>
    </form>
    <p id="terug">Heb je al een account ga terug naar <a href="test.php"> login</a></p>

<?php
// Database connection details
$host = 'localhost';
$dbname = 'shoelab';
$username = 'root';
$password = '';

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];

    // Validate passwords match
    if ($pass !== $confirm_pass) {
        die("Passwords do not match.");
    }

    // Hash the password for security
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    // Insert the data into the database
    $stmt = $pdo->prepare("INSERT INTO login (username, email, password) VALUES (:username, :email, :password)");
    $stmt->bindParam(':username', $user);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password');

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: Could not complete registration.";
    }

    function postcodecheck($postcode) {
    return preg_match('/^[1-9][0-9]{3}\s?[A-Z]{2}$/', strtoupper($postcode));
}

// Voorbeeld
if (("1234 AB")) {
    echo "Geldige postcode";
} else {
    echo "Ongeldig formaat";
}

function normalizePostcode($postcode) {
    // Maak alles hoofdletters en verwijder spaties
    $postcode = strtoupper(str_replace(' ', '', $postcode));
    
    // Voeg spatie toe tussen cijfers en letters
    $postcode = substr($postcode, 0, 4) . ' ' . substr($postcode, 4, 2);
    
    return $postcode;
}

function isValidDutchPostcode($postcode) {
    // Normaliseer eerst
    $postcode = normalizePostcode($postcode);
    
    // Regex check
    return preg_match('/^[1-9][0-9]{3}\s?[A-Z]{2}$/', $postcode);
}

// Voorbeeld
$input = "1234ab";
if (isValidDutchPostcode($input)) {
    echo normalizePostcode($input); // Output: 1234 AB
} else {
    echo "Ongeldige postcode";
}

}
?>
</body>
</html>