levUpdate.php<?php
require 'Leveranciers.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $levId = $_POST['levId'];
    $levNaam = $_POST['levNaam'];
    $levContact = $_POST['levContact'];
    $levEmail = $_POST['levEmail'];
    $levAdres = $_POST['levAdres'];
    $levPostcode = $_POST['levPostcode'];
    $levWoonplaats = $_POST['levWoonplaats'];


    $lev = new Leveranciers();
    $lev->updateLeverancier($levNaam, $levContact, $levEmail, $levAdres, $levPostcode, $levWoonplaats);
}
?>