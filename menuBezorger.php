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
                        <input type="text" id ='klantId' name='klantId'>
                        <input type="submit">

                    </form>
                    <?php
                        // require 'database.php';
                        if (isset($_SESSION['result'])) {
                            $result = $_SESSION['result'];
                            echo '<div class="searchResults">';
                            echo "Klantnaam: " . $result['klantNaam'] . "<br>";
                            echo "Email: " . $result['klantEmail'] . "<br>";
                            echo "Adres: " . $result['klantAdres'] . "<br>";
                            echo "Postcode: " . $result['klantPostcode'] . "<br>";
                            echo "Woonplaats: " . $result['klantWoonplaats'] . "<br>";
                            echo '<a href="bezorgerConfirm.php?action=update&klantId=' . $result['klantId'] . '"class="updateButton">Bezorgt</a>';
                            echo '</div>';

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