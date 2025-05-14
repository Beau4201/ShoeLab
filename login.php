<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css/contact2.css">
</head>
<html>
    
<body>

<?php
if(isset($_POST["submit"])) {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoelab";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, email, password FROM login";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["email"] == $_POST["email"] && $row["password"] == $_POST["password"]) {
            echo"welkom $username";
        }else {
            echo "foute inlog";
        }
        
    }
} 
// $conn->close();
}
?>





<p id="contact"></p>
    <form method="post">      
        <input name="email" type="text" class="feedback-input" placeholder="Email" required/>
        <input type="password" name="password" class="feedback-input" placeholder="Wachtwoord" required></textarea>
        <input name="submit" type="submit" value="LOG IN">
      </form>

      <p class="reg"> nog geen account, <a href="register.php">registreer hier</a></p> 
      <p class="home"> terug naar home <a href="index.html"></a></p>

</body>
</html>
