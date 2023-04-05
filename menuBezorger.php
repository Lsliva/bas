<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Bezorger Menu</title>
</head>
<body>
    <?php require 'nav.php'?>
    <div class="content">
    <div class="accountPage">
            <div class="basCard">
                <div class="CardContent">
        <div class="header">
            <h1>Bezorger Menu</h1>
            <p>Welkom <?php echo $_SESSION['username']; ?></p>
            <p>Zoek klant op klantID:</p>
                    <form action="bezorgerSearch.php" method='POST'>
                        <label for="klantId">klantID:</label>
                        <input type="text" id='klantId' name='klantId'>
                        <input type="submit">

                    </form>
                    <?php
                    // if (isset($_SESSION['result'])) {
                    //     $result = $_SESSION['result'];
                    //     foreach ($result as $value) {
                    //         echo '<div class="searchResults">';
                    //         echo "klantId: " . $value['klantId'] . "<br>";
                    //         echo "Klantnaam: " . $value['klantNaam'] . "<br>";
                    //         echo "Email: " . $value['klantEmail'] . "<br>";
                    //         echo "Adres: " . $value['klantAdres'] . "<br>";
                    //         echo "Postcode: " . $value['klantPostcode'] . "<br>";
                    //         echo "Woonplaats: " . $value['klantWoonplaats'] . "<br>";
                    //         echo "verkOrdId: " . $value['verkOrdId'] . "<br>";
                    //         echo "Verkoop order status: " . $value['verkOrdStatus'] . "<br>";
                    //         echo "Datum: " . $value['verkOrdDatum'] . "<br>";
                    //         echo "Artikel Id: " . $value['artId'] . "<br>";
                    //         echo '</div>';
                    //         echo '<br>';
                    //     }
                    //     // unset the session variable once it's been displayed
                    //     unset($_SESSION['result']);
                    
                    // } else if (isset($_SESSION['searchMsg'])) {
                    //     echo $_SESSION['searchMsg'];
                    //     unset($_SESSION['searchMsg']);
                    // }
                    



                    if (isset($_SESSION['result'])) {
                        $result = $_SESSION['result'];
                        echo '<div class="searchResults">';
                        // var_dump($result);
                        $id = $result['klantId'];

                        foreach ($result as $key => $value) {
                            echo ucfirst($key) . ": " . $value . "<br>";
                        }
                        // $id = $_POST['klantId'];


                        echo '<a href="bezorgerUpdate.php?action=update&klantId=' . $id . '" class="updateButton"">Update</a>';            
                        echo '</div>';
                        echo '<br>';
                        // unset the session variable once it's been displayed
                        unset($_SESSION['result']);
                    } else if (isset($_SESSION['searchMsg'])) {
                        echo $_SESSION['searchMsg'];
                        unset($_SESSION['searchMsg']);
                    }
                    
                    
                        
                  
                    ?>
        </div>
        </div>
            </div>
        </div>
    </div>


    <?php require 'footer.php'?>
    <style>

    input {
        padding: 10px;
        margin:10px;
        width: 200px;
        display: flex;
        justify-content: center;
        border-radius: 5px;

    }

    #messagePHP {
        color: white;
    }

    a {
        margin: 5px;
        padding: 5px;
        border-radius: 5px;
    }
    a:hover {
        background-color: white;
        color: black;
    }
    .CardContent {
        padding: 10px;
        margin: 10px;
    }

</style>
</body>
</html>