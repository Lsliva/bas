<?php
// if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['klantId'])) {
//     $klantId = $_GET['klantId'];
//     // call the deleteKlant function here with the $klantId parameter
// }
// if(isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['klantId'])) {
//     $klantId = $_GET['klantId'];
//     // display a form with the details of the selected klant
//     //
// }
require 'Klant.php';
if(isset($_GET['action']) && isset($_GET['klantId'])) {
    $klantId = $_GET['klantId'];
    if($_GET['action'] == 'delete') {
        // call the deleteKlant function here with the $klantId parameter
        $klant = new Klant();
        $klant->deleteKlant($klantId);
    } 
    // else if($_GET['action'] == 'update') {
        
    //     header("Location: klantUpdateForm.php?action=update&klantId=' . $klant['klantId'] . '");
      
    //     // call the updateKlant function here with the $klantId parameter
    //     // $klant = new Klant();
    //     // $klant->updateKlant($klantId);

    // }
}
?>