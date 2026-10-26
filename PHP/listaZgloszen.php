<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista zgłoszeń</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <?php
        require_once './Klasy/header.php';
    ?>
    <main>
        <?php
            require_once './config.php';
            require_once './db.php';
            $zapytanie = "SELECT tytul,opis,lokalizacja,data FROM zglosenia";
            $wynik = mysqli_query($sql,$zapytanie);
            echo "<table>";
                echo "<tr>";
                    echo "<th>Tytuł</th>";
                    echo "<th>Opis</th>";
                    echo "<th>Lokalizacja</th>";
                    echo "<th>Data</th>";
                echo "</tr>";
                while ($wynik1 = mysqli_fetch_row($zapytanie)){
                    echo "<tr>";
                        echo "<td>$wynik1[0]</td>";
                        echo "<textarea disabled>$wynik1[1]</textarea>";
                        echo $wynik1[2];
                        echo $wynik1[3];
                }
            echo "</table>";
        ?>
    </main>
    <?php
        require_once './Include/footer.php';
    ?>
</body>
</html>