<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Niko">
    <title>Moje zgłoszenia</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <?php
        require_once './config.php';
        require_once './Klasy/header.php';
        $obj = new pracownik();
        $obj->moje_zgloszenia();
    ?>
    <main style="margin: 0 auto; width: 40%; text-align: center;">
        <h1  style="font-size: 250%; width: 50%; margin-bottom: 15px;" class="logowanie">Moje zgłoszenia</h1>
        <?php 
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
                while ($wynik1 = mysqli_fetch_row($wynik)){
                    echo "<tr>";
                        echo "<td>$wynik1[0]</td>";
                        echo "<td><textarea disabled class='powieksz'>$wynik1[1]</textarea></td>";
                        echo "<td>$wynik1[2]</td>";
                        echo "<td>$wynik1[3]</td>";
                    echo "</tr>";
                }
            echo "</table>";
        ?>
    </main>
    <?php
        require_once './Include/footer.php';
    ?>
</body>
</html>