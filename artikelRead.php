<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Artikel Create</title>
</head>
<body>
    <?php require 'nav.php'?>
    <div class="content">
        <div class="accountPage">
            <div class="basCard">
                <div class="CardContent">
                    <h1>Read Artikel</h1>
                    <p>Dit zijn alle artikel gegevens uit de database:</p>
                   
                    <form action="artikelSearch.php" method='POST'>
                        <label for="artId">artId:</label>
                        <input type="text" id ='artId' name='artId'>
                        <input type="submit">

                    </form>
                    <?php
                        // require 'database.php';
                        if (isset($_SESSION['result'])) {
                            $result = $_SESSION['result'];
                            echo "artOmschrijving: " . $result['artOmschrijving'] . "<br>";
                            echo "artInkoop: " . $result['artInkoop'] . "<br>";
                            echo "artVerkoop: " . $result['artVerkoop'] . "<br>";
                            echo "artVoorraad: " . $result['artVoorraad'] . "<br>";
                            echo "artMinVoorraad: " . $result['artMinVoorraad'] . "<br>";
                            echo "artMaxVoorraad: " . $result['artMaxVoorraad'] . "<br>";
                            echo "artLocatie: " . $result['artLocatie'] . "<br>";
                            echo "levId: " . $result['levId'] . "<br>";
                            // unset the session variable once it's been displayed
                            unset($_SESSION['result']);
                        } else {
                            echo "No result found";
                        }
                    ?>
                     <div class="read">
                        <?php 
                            require 'Artikel.php';
                            $artikel1 = new Artikel();
                            $artikel1->readArt();
                        ?>
                        <div class="redirect">
                            <a href="ArtikelCreateForm.php">Create Artikel</a>
                        </div>
                        </div>

                    <div id="messagePHP"><?php
                        if (isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php require 'footer.php'?>
</body>
<style>
    
input {
    margin-bottom: 5px;
    width: 200px;
    padding: 10px 15px;
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
    /* overflow: hidden; */
    /* overflow-x: scroll; */
}

</style>

<script>
</script>
</html>