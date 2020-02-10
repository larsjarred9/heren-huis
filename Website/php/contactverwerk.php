<?php 
require("db.php");

if(!isset($_POST["name"], $_POST["email"], $_POST["subject"], $_POST["message"]) ) {
    echo "Missing items!";
return false;
}

if($stmt = $conn->prepare("INSERT INTO Beroeps_Huis_Form (naam, email, onderwerp, bericht) VALUES (?,?,?,?)")) {

    $stmt->bind_param("ssss",  $_POST["name"], $_POST["email"], $_POST["subject"], $_POST["message"]);

    $stmt->execute();
    $stmt->close();
    header("Location: ../contact.html");
}else {
    echo "ERROR";
}
?>