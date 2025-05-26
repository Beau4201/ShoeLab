<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['text'];


    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
   
    echo"Je vraag/advies is verstuurd!";
}

else{
    echo"uw email is niet geldig!";
}
}





?>