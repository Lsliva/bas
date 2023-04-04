<?php
require 'Artikel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $artId = $_POST['artId'];

    $artOmschrijving = $_POST['artOmschrijving'];
    $artInkoop = $_POST['artInkoop'];
    $artVerkoop = $_POST['artVerkoop'];
    $artVoorraad = $_POST['artVoorraad'];
    $artMinVoorraad = $_POST['artMinVoorraad'];
    $artMaxVoorraad = $_POST['artMaxVoorraad'];
    $artLocatie = $_POST['artLocatie'];
    $levId = $_POST['levId'];


    $Artikel = new Artikel();
    $Artikel->updateArt($artId, $artOmschrijving, $artInkoop, $artVerkoop, $artVoorraad, $artMinVoorraad, $artMaxVoorraad, $artLocatie, $levId);
}
?>
