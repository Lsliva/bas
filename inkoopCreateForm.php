<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Inkooporder Create</title>
</head>
<body>
    <?php require 'nav.php'?>
    <div class="content">
        <div class="accountPage">
            <div class="basCard">
                <div class="accountItems">
                    <h1>Create new inkooporder:</h1>
                    <div class="accountForm">
                        <form method="post" id="register" action="inkoopCreate.php" class="form">
                            <label for="levId">LevID:</label>
                            <input type="number" id="levId" name="levId" required>
                            <p id="levIdMessage"></p>

                            <label for="artId">ArtID:</label>
                            <input type="number" id="artId" name="artId" required>
                            <br>
                            <label for="inkOrdDatum">Datum:</label>
                            <input type="date" id="inkOrdDatum" name="inkOrdDatum" required>
                            <br>
                            <label for="inkOrdBestAantal">Bestel Aantal:</label>
                            <input type="number" id="inkOrdBestAantal" name="inkOrdBestAantal" required>
                            <br>
                            <!-- <label for="inkOrdStatus">Status:</label> -->
                            <input type="hidden" name="inkOrdStatus" value="false">

                            <!-- <select id="inkOrdStatus" name="inkOrdStatus" required>
                                <option value="In afwachting">In afwachting</option>
                                <option value="Verzonden">Verzonden</option>
                                <option value="Afgeleverd">Afgeleverd</option>
                            </select> -->
                            <button type="submit" name="create" class="btn">Create</button>
                    </form>
                    <div class="question">
                            <p><a href="inkoopRead.php">Inkoop Read</a> </p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>