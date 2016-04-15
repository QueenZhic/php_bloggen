<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>Visa inlägg</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php

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
            $sql = "SELECT * FROM bloggen";

            // Kör SQL-kommandot
            $result = $conn->query($sql);

            // Gick det bra eller inte?
            if (!$result)
                die("Kunde inte hämta inlägg: " . $conn->error);

                echo "<h2>Alla inlägg i bloggen</h2>";

            // Berätta hur många inlägg vi har
            echo "<p>Hittat " . $result->num_rows . " inlägg.";

        // Vi skriver ut alla inlägg
        while ($row = $result->fetch_assoc()) {
            echo "<article>";
            echo "<h3>" . $row['rubrik'] . "</h3>";
            echo "<h4>" . $row['tidstampel'] . "</h4>";
            echo "<p>" . $row['inlagg'] . "</p>";
            echo "</article>";
        }

            // Stäng ner databas anslutningen
            $result->free();
            $conn->close();
            ?>
    </body>
</html>
