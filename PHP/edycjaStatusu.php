<!-- To tylko widzi Technik -->
<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Niko">
    <title>Edycja zgłoszeń</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <?php
        require_once './Klasy/header.php';
        $obj = new technik();
        $obj->menu_powrotu();
    ?>
    <main>
    <?php
        require_once './config.php';
        require_once './db.php';
        $zapytanie = "SELECT * FROM `zglosenia`";
        $wynik = mysqli_query($sql,$zapytanie);
        echo "<div style='width: 25%; float: left;'>";
            echo "<table style='float: left;'>";
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
            echo "</table>";
        echo "</div>";

        echo "<div style='float: right; width: 30%;' class='logowanie'>";
            echo "<h1 class='logowanie' style='font-size: 250%; width: 200px; margin-bottom: 20px;'>Edycja</h1>";
            echo "<form action='edycjaStatusu.php' method='POST'>";
                echo "<label for='1'>Wprowadź id zgłoszenia </label>";
                echo "<input type='number' name='id' id='1' placeholder='Wprowadź ID:'><br>";
                echo "<label for='2'>Status: </label>";
                echo "<select id='2' name='status'>";
                    echo "<option value='Nowe'>Nowe</option>";
                    echo "<option value='W trakcie'>W trakcie</option>";
                    echo "<option value='Zakończone'>Zakończone</option>";
                echo "</select><br>";
                echo "<input type='submit' value='Zmień' class='guzik_submit'>";
            echo "</form>";

            if ($_SERVER["REQUEST_METHOD"] === "POST"){
                $id = isset($_POST['id']) ? htmlspecialchars($_POST['id']): "";
                $status = isset($_POST['status']) ? htmlspecialchars($_POST['status']): "";
            
                $zapytanie = "UPDATE zglosenia set status=? where id=?";
                if ($stmt = mysqli_prepare($sql,$zapytanie)){
                    mysqli_stmt_bind_param($stmt, 'si', $status, $id);
                    if (mysqli_stmt_execute($stmt)){
                        echo "<p>Edycja powiodłą się</p>";
                    } else {
                        echo "<p>Edycja nie powiodła się</p>";
                    }
                }
            } else {
                // echo "<p style='color: red;'>Nie udało się przesłać danych</p>";
            }

        echo "</div>";
    ?>
    </main>
    <?php
        require_once './Include/footer.php';
    ?>
</body>
</html>