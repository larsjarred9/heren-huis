<?php 
require("db.php");

if(!isset($_POST["voornaam"], $_POST["achternaam"], $_POST["telefoon"], $_POST["email"], $_POST["geboden"]) ) {
    echo "Missing items!";
return false;
}

if($stmt = $conn->prepare("INSERT INTO Beroeps_Huis_Biedingen (voornaam, achternaam, telefoonnummer, email, geboden) VALUES (?,?,?,?,?)")) {

    $stmt->bind_param("ssssi",  $_POST["voornaam"], $_POST["achternaam"], $_POST["telefoon"], $_POST["email"], $_POST["geboden"]);

    $stmt->execute();
    $stmt->close();
    header("Location: ../index.php");
}else {
    echo "ERROR";
}
?>