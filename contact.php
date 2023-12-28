<?php

// $servername = "sql111.infinityfree.com";
// $username = "if0_35479957";
// $password = "lkHkwZl8xNU";
// $dbname = "if0_35479957_attireavenue";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attireavenue";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $sql = "INSERT INTO contactus (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        
    }else{
        
    }
}else{
    
}

?>