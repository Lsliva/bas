<?php
require 'Inkooporders.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inkOrdId = $_POST['inkOrdId'];
    $levId = $_POST['levId'];
    $artId = $_POST['artId'];
    $inkOrdDatum = $_POST['inkOrdDatum'];
    $inkOrdBestAantal = $_POST['inkOrdBestAantal'];
    $inkOrdStatus = $_POST['inkOrdStatus'];

    $inkooporder = new Inkooporder();
    $inkooporder->updateInkooporder($inkOrdId, $levId, $artId, $inkOrdDatum, $inkOrdBestAantal, $inkOrdStatus);
}
?>