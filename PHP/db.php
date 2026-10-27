<?php
    // Plik index.php

    // Plik menuZgloszen.php

    class menuZgloszen {
        function pobieranie_danych(){
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $nick = isset($_POST["nick"]) ? htmlspecialchars($_POST["nick"]) : "";
                $login = isset($_POST["login"]) ? htmlspecialchars($_POST["login"]) : "";
                $pass = isset($_POST["pass"]) ? htmlspecialchars($_POST["pass"]) : "";

                if (($nick == "Adam" && $login == "Pracownik" && $pass == "123") || ($nick == "Niko985642" && $login == "Technik" && $pass == "321")) {
                    $_SESSION['nick'] = $nick;
                    $_SESSION['login'] = $login;
                    $_SESSION['pass'] = $pass;
                    $_SESSION['konto_istnieje'] = true;
                } else {
                    echo "<p style='color: red;'>Takie konto nie istnieje, proszę wpisać poprawny login oraz haslo aby móc korzystać ze strony.<br> <a href='./index.php'>Powrót</a></p>";
                }
            }

            if (isset($_SESSION['konto_istnieje']) && $_SESSION['konto_istnieje'] === true) {
                if ($_SESSION['login'] === "Pracownik") {
                    $obj = new pracownik();
                    $obj->baner();
                } elseif ($_SESSION['login'] === "Technik") {
                    $obj = new technik();
                    $obj->baner();
                }
            } else {
                // echo "<p style='color: red;'>Konto nie istnieje, proszę wpisać poprawne dane</p>";
            }
        }
    }

    // Plik dodaZgloszen.php
    class dodaZgloszen {
        function dodwanie($sql){
            $date = date("Y-m-d");
            if ($_SERVER["REQUEST_METHOD"] === "POST"){
                $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : "";
                $opis = isset($_POST['opis']) ? htmlspecialchars($_POST['opis']) : "";
                $loka = isset($_POST['loka']) ? htmlspecialchars($_POST['loka']) : "";
                $autor = $_SESSION['nick'];

                $zapytanie = "INSERT INTO `zglosenia`(`tytul`, `opis`, `lokalizacja`, `status`, `data`, `autor`) VALUES(?, ?, ?, 'Nowe', ?, ?)";
                if ($stmt = mysqli_prepare($sql, $zapytanie)) { 
                    mysqli_stmt_bind_param($stmt, 'sssss', $title, $opis, $loka, $date, $autor);
                    if (mysqli_stmt_execute($stmt)) {
                        echo "<p>Udało się przesłać dane</p>";
                    } else {
                        echo "<p>Nie udało się przesłać danych, spróbuj ponownie</p>";
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    echo "<p>Wystąpił błąd podczas wpisywania danych, spróbuj ponownie</p>";
                }
            } else {
                // echo "<p>Dane zosały źle przesłane</p>";
            }
        }
    }

    // Plik listaZgloszen.php
    class listaZgloszen {
        function lista($sql){
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
            echo "</table>";
        }
    }

    // Plik edycjaStatusu.php
?>