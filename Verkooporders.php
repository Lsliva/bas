<?php
class Verkooporders {
    //properties
    protected $klantId;
    protected $artId;
    protected $verkOrdDatum;
    protected $verkOrdBestAantal;
    protected $verkOrdStatus;

    //methoden -functies
    // constructor
    function __construct($klantId=NULL, $artId=NULL, $verkOrdDatum=NULL, $verkOrdBestAantal=NULL, $verkOrdStatus=NULL) {
        $this->klantId = $klantId;
        $this->artId = $artId;
        $this->verkOrdDatum = $verkOrdDatum;
        $this->verkOrdBestAantal = $verkOrdBestAantal;
        $this->verkOrdStatus = $verkOrdStatus;
    }

    // setters
    function set_klantId($klantId) {
        $this->klantId = $klantId;
    }
    function set_artId($artId) {
        $this->artId = $artId;
    }
    function set_verkOrdDatum($verkOrdDatum) {
        $this->verkOrdDatum = $verkOrdDatum;
    }
    function set_verkOrdBestAantal($verkOrdBestAantal) {
        $this->verkOrdBestAantal = $verkOrdBestAantal;
    }
    function set_verkOrdStatus($verkOrdStatus) {
        $this->verkOrdStatus = $verkOrdStatus;
    }
    // getter
    function get_klantId() {
        return $this->klantId;
    }
    function get_artId() {
        return $this->artId;
    }
    function get_verkOrdDatum() {
        return $this->verkOrdDatum;
    }
    function get_verkOrdBestAantal() {
        return $this->verkOrdBestAantal;
    }
    function get_verkOrdStatus() {
        return $this->verkOrdStatus;
    }


    //CRUD functions
    public function createVerkooporder() {
        require 'database.php';
        $klantId = $this->get_klantId();
        $artId = $this->get_artId();
        $verkOrdDatum = $this->get_verkOrdDatum();
        $verkOrdBestAantal = $this->get_verkOrdBestAantal();
        $verkOrdStatus = $this->get_verkOrdStatus();

        //statement maken voor invoer in de tabel
        $sql = $conn->prepare('INSERT INTO verkooporders (klantId, artId, verkOrdDatum, verkOrdBestAantal, verkOrdStatus) VALUES (:klantId, :artId, :verkOrdDatum, :verkOrdBestAantal, :verkOrdStatus)');

        //Variabelen in de statement zetten
        $sql->bindParam(':klantId', $klantId);
        $sql->bindParam(':artId', $artId);
        $sql->bindParam(':verkOrdDatum', $verkOrdDatum);
        $sql->bindParam(':verkOrdBestAantal', $verkOrdBestAantal);
        $sql->bindParam(':verkOrdStatus', $verkOrdStatus);

        $sql->execute();

        //melding
        $_SESSION['message'] = "Verkooporder " . $verkOrdId . " is toegevoegd! <br>";
        header("Location: verkooporderRead.php");
    }
    public function readVerkooporders() {
        require 'pureConnect.php';
        $sql = $conn->prepare('SELECT * FROM verkooporders');
        $sql->execute();
    
        foreach($sql as $order) {
            $orderObject = new Verkooporders($order['klantId'], $order['artId'], $order['verkOrdDatum'], $order['verkOrdBestAantal'], $order['verkOrdStatus']);
            echo '<br>';
            echo '<div class="readList">';
            echo '<a href="orderDelete.php?action=delete&orderId=' . $order['orderId'] . '" class="deleteButton" onclick="return confirm("Are you sure you want to delete this order?")">Delete</a>';
            echo '<a href="orderUpdateForm.php?action=update&orderId=' . $order['orderId'] . '"class="updateButton">Update</a>';
    
            echo $orderObject->klantId . ' - ';
            echo $orderObject->artId . ' - ';
            echo $orderObject->verkOrdDatum . ' - ';
            echo $orderObject->verkOrdBestAantal . ' - ';
            echo $orderObject->verkOrdStatus . ' - ';
            echo '</div>';
            echo '<br>';
        }
    }
    public function deleteVerkooporder($orderId) {
        require 'database.php';
        $sql = $conn->prepare('DELETE FROM verkooporders WHERE orderId = :orderId');
        $sql->bindParam(':orderId', $orderId);
        $sql->execute();
    
        //melding
        $_SESSION['message'] = 'Order ' . $orderId . ' is verwijderd. <br>';
        header("Location: orderRead.php");
    }
    public function findVerkooporder($orderId) {
        require 'pureConnect.php';
        $sql = $conn->prepare('SELECT * FROM verkooporders WHERE orderId = :orderId');
        $sql->bindParam(':orderId', $orderId);
        $sql->execute();
    
        $order = $sql->fetch();
        return $order;
    }
    public function searchKlant($klantPostcode) {
        require 'database.php';
        $sql = $conn->prepare('SELECT * FROM verkooporders WHERE klantPostcode = :klantPostcode');
        $sql->bindParam(':klantPostcode', $klantPostcode);
        $sql->execute();
    
        $verkooporder = $sql->fetch();
        if ($verkooporder) {
            $result = array();
            $result['klantNaam'] = $verkooporder['klantNaam'];
            $result['klantEmail'] = $verkooporder['klantEmail'];
            $result['klantAdres'] = $verkooporder['klantAdres'];
            $result['klantPostcode'] = $verkooporder['klantPostcode'];
            $result['klantWoonplaats'] = $verkooporder['klantWoonplaats'];
            $_SESSION['result'] = $result;
            header("Location: klantRead.php");
            exit;
    
        } else {
            header("Location: klantRead.php");
            $_SESSION['searchMsg'] = "No result found for this Postcode.";
    
        }
    }
    
    public function updateKlant($verkOrdId, $klantId, $artId, $verkOrdDatum, $verkOrdBestAantal, $verkOrdStatus) {
        require 'database.php';
        $sql = $conn->prepare('UPDATE verkooporders SET klantId = :klantId, artId = :artId, verkOrdDatum = :verkOrdDatum, verkOrdBestAantal = :verkOrdBestAantal, verkOrdStatus = :verkOrdStatus WHERE verkOrdId = :verkOrdId');
        $sql->bindParam(':verkOrdId', $verkOrdId);
        $sql->bindParam(':klantId', $klantId);
        $sql->bindParam(':artId', $artId);
        $sql->bindParam(':verkOrdDatum', $verkOrdDatum);
        $sql->bindParam(':verkOrdBestAantal', $verkOrdBestAantal);
        $sql->bindParam(':verkOrdStatus', $verkOrdStatus);
    
        $sql->execute();
    
        $_SESSION['message'] = 'Verkooporder ' . $verkOrdId . ' is bijgewerkt <br>';
        header("Location: verkooporderRead.php");
    }
}

?>