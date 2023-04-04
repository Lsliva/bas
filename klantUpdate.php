<?php
require 'Klant.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $klantId = $_POST['klantId'];
    $klantNaam = $_POST['klantNaam'];
    $klantEmail = $_POST['klantEmail'];
    $klantAdres = $_POST['klantAdres'];
    $klantPostcode = $_POST['klantPostcode'];
    $klantWoonplaats = $_POST['klantWoonplaats'];


    $klant = new Klant();
    $klant->updateKlant($klantId, $klantNaam, $klantEmail, $klantAdres, $klantPostcode, $klantWoonplaats);
}
?>