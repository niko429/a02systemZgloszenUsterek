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
        // Dodać tutaj headera
    ?>
    <main>
        <?php
            require_once './config.php';
            require_once './db.php';
            $zapytanie = "SELECT * FROM `zglosenia`";
            $wynik = mysqli_query($sql,$zapytanie);

            echo "<table>";
                echo "<tr>";
                    echo "<th>Id.</th>";
                    echo "<th>Tytuł</th>";
                    echo "<th>Opis</th>";
                    echo "<th>Lokalizacja</th>";
                    echo "<th>Status</th>";
                    echo "<th>Data</th>";
                    echo "<th>autor</th>";
                echo "</tr>";
                while ($wynik1 = mysqli_fetch_row($wynik)){
                    echo "<tr>";
                        echo "<td>$wynik1[0]</td>";
                        echo "<td>$wynik1[1]</td>";
                        echo "<td><textarea disabled class='powieksz'>$wynik1[2]</textarea></td>";
                        echo "<td>$wynik1[3]</td>";
                        echo "<td>$wynik1[4]</td>";
                        echo "<td>$wynik1[5]</td>";
                        echo "<td>$wynik1[6]</td>";
                    echo "</tr>";
                }
            echo "</table>"
        ?>
    </main>
    <?php
        require_once './Include/footer.php';
    ?>
</body>
</html>