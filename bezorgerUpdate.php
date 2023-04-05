<?php
require 'Verkooporders.php';
$klantId = $_POST['klantId'];
$verkooporder = new Verkooporders();
$verkooporder->updateBezorger($klantId);

?>