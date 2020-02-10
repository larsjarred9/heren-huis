<?php
include('php/db.php');

$sql = "SELECT * FROM Beroeps_Huis_Biedingen ORDER BY geboden DESC;";
$result = $conn->query($sql);

$sql = "SELECT MAX(geboden) FROM Beroeps_Huis_Biedingen";
$max = $conn->query($sql);

if ($stmt = $conn->prepare("SELECT MAX(geboden) FROM Beroeps_Huis_Biedingen")) {
    $stmt->bind_param("i", $max);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($max);
        $stmt->fetch();
    }
    $stmt->close();
}
$max++;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://kit.fontawesome.com/24c24daece.js" crossorigin="anonymous"></script>
    <title>'t Haagse Huus - Home</title>
</head>

<body>
    <style></style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img id="logo-image" src="images/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse my-2" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="allefotos.html"><i class="fas fa-camera"></i> Foto's</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="plattegrond.html"><i class="fas fa-map"></i> Plategrond</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html"><i class="fas fa-user-circle"></i> Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="p-text"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <img src="images/11.jpg" class="img-fluid img-padding img-left">
                    <img src="images/39.jpg" class="img-fluid img-padding img-right">
                    <img src="images/06.jpg" class="img-fluid img-padding img-right">
                </div>
                <div class="col-lg-3">
                    <div class="biedingen">
                        <div class="#geboden">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Naam</th>
                                        <th scope="col">Geboden</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $i = 0;
                                    foreach ($result as $item) {
                                        if ($i < 5) {
                                            echo "<td>" . $item["voornaam"] . "</td>" . "<td>€" . $item["geboden"] . "</td><tr>";
                                        }
                                        $i++;
                                    }

                                    // for ($i=0; $i < 5; $i++) { 
                                    //     echo "<td>" . $result[i]["voornaam"] . "</td>" . "<td>€" . $result[i]["geboden"] . "</td><tr>";
                                    // }
                                    ?>
                                </tbody>
                            </table>
                            <hr>
                        </div>
                        <div class="#geboden-knoppen">
                            <center><button type="button" class="btn btn-gray" data-toggle="modal" data-target="#plaatsEenBod">Plaatst een bod</button></center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="description">
                <h1 class="address">Lange Voorhout 67</h1><span class="postalcode">2354 DK Den Haag</span>
                <div class="price">Bieden vanaf € 400.000.</div>
                <a href="allefotos.html"><button type="button" class="btn btn-gray">Alle Fotos</button></a>
                <a href="plattegrond.html"><button type="button" class="btn btn-gray">Plattegrond</button></a>
                <hr>
                <p class="p-text">Unieke woonervaring midden in het hart van het historische Centrum van Den Haag.<br><br>
                    In de historische Oude Molstraat gesitueerd tussen Paleis Noordeinde en het Oude Stadhuis vinden we dit riante en zeer luxe gerenoveerde drie laags parterre appartement van maar liefst ca. 278,5 m² met grote zonnige achtertuin op Zuidwest, eigen parkeerplaats en eigen berging in de voormalige “steenkool buurt”, welke kleinschalig complex eind jaren negentig getransformeerd is tot 6 luxe appartementen.<br><br>
                    Dit bijzondere en luxe splitlevel parterre huis beschikt over een mix van originele elementen en hedendaagse luxe en is voorzien van een 4.69 meter hoge riante living van maar liefst ca. 700 m² per met vide, ruime luxe eetkeuken met alle apparatuur, 6 slaapkamers, 3 badkamers, 4 toiletten, zonnige besloten achtertuin op Zuidwest, eigen parkeerplaats en berging op achterterrein.
                </p>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <img src="images/16.jpg" class="img-fluid">
                </div>
                <div class="col-sm-3">
                    <img src="images/27.jpg" class="img-fluid">
                </div>
                <div class="col-sm-3">
                    <img src="images/32.jpg" class="img-fluid">
                </div>
                <div class="col-sm-3">
                    <img src="images/19.jpg" class="img-fluid">
                </div>
            </div>
        </div>
        <br>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="plaatsEenBod" tabindex="-1" role="dialog" aria-labelledby="plaatsEenBod" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Plaats een bod</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="php/bod.php">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="voornaam">Voornaam</label>
                                <input type="text" class="form-control" id="voornaam" name="voornaam" placeholder="Voornaam" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="achternaam">Achternaam</label>
                                <input type="text" class="form-control" id="achternaam" name="achternaam" placeholder="Achternaam" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Telefoonummer">Telefoonummer</label>
                            <input type="tel" class="form-control" id="telefoonummer" placeholder="Telefoonummer" name="telefoon" required>
                        </div>
                        <div class="form-group">
                            <label for="Email">E-Mail</label>
                            <input type="email" class="form-control" id="email" placeholder="E-Mail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="geboden">Prijs Geboden</label>
                            <?php
                            echo "<input type='number' class='form-control' value='$max' min='$max' id='geboden' name='geboden' placeholder='Min €400000' required>";
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Anuleren</button>
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>