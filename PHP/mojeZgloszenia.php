<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zgłoszenia</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <?php
    // Tutaj zrobić tak że jak ten się zaloguje to będzie tego wyświetlało się dla tego odpowiednie rzeczy, a dla tego drugiego będzie co innego pokazane.
    // Natomiast nie wiem jak to zrobić, zakładam że muszę jakoś zastosować session ale nie wiem zbytnio jak.
        require_once './config.php';
        require_once './Klasy/header.php';
        $obj = new pracownik();
        $obj->moje_zgloszenia();
    ?>
    <main>
        <h1 class="logowanie" style="font-size: 250%;">Moje zgłoszenia</h1>
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
                }
            echo "</table>";
        ?>
    </main>
    <?php
        require_once './Include/footer.php';
    ?>
</body>
</html>