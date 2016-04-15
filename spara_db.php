<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>Spara inlägg</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            // Ta emot data från formuläret
            $rubrik = $_POST['rubrik'];
            $inlagg = $_POST['inlagg'];

            // Databasuppgifter
            $host = 'localhost';
            $user = 'lindqvist_user';
            $pass = 'lindqvist_pass';
            $database = 'lindqvist_db';

            // Anslut till databasen
            $conn = new mysqli($host, $user, $pass, $database);

        // Om någonting går fel. Avsluta med ett felmeddelande
        if ($conn->connect_error)
            die("Någonting blev fel: " . $conn->connection_error);

            // Vårt SQL-kommando
            $sql = "INSERT INTO bloggen (rubrik, inlagg) VALUES ('$rubrik', '$inlagg')";

            // Kör SQL-kommandot
            $result = $conn->query($sql);

            // Gick det bra eller inte?
            if (!$result)
                die("Kunde inte spara inlägg: " . $conn->error);
            else
                echo "<h3>Ditt inlägg blev registrerat!</h3>";

            // Stäng ner databas anslutningen
            $conn->close();
            ?>
    </body>
</html>
