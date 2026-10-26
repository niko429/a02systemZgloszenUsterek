<?php
    // Plik index.php

    // Plik menuZgloszen.php
    class menuZgloszen {
        function pobieranie_danych(){
            if ($_SERVER["REQUEST_METHOD"] === "POST"){
                $nick = isset($_POST["nick"]) ? htmlspecialchars($_POST["nick"]) : "";
                $login = isset($_POST["login"]) ? htmlspecialchars($_POST["login"]) : "";
                $pass = isset($_POST["pass"]) ? htmlspecialchars($_POST["pass"]) : "";
            
                $zalogowany = true;
                if ($zalogowany = true){
                    $_SESSION['nick'] = $nick;
                    $_SESSION['login'] = $login;
                    $_SESSION['pass'] = $pass;

                    if ($_SESSION['login'] == "Pracownik" && $_SESSION['pass'] == "123"){
                        $obj = new pracownik();
                        $obj->baner();
                    }
                    if ($_SESSION['login'] == "Technik" && $_SESSION['pass'] == "321"){
                        $obj = new technik();
                        $obj->baner();
                    }
                } else {
                    echo "<p style='color: red;'>Coś poszło nie tak z zatwierdzaniem danych, proszę wpisać je jeszcze raz</p>";
                    $zalogowany = false;
                }
            } else {
                echo "<p style='color: red;'>Nie udało się poprawnie przesłać danych, proszę spróbować ponownie</p>";
                $zalogowany = false;
            }
        }
    }

//     class menuZgloszen {
//     function pobieranie_danych(){
//         // 1. Logowanie przez formularz (POST)
//         if ($_SERVER["REQUEST_METHOD"] === "POST") {
//             $nick = isset($_POST["nick"]) ? htmlspecialchars($_POST["nick"]) : "";
//             $login = isset($_POST["login"]) ? htmlspecialchars($_POST["login"]) : "";
//             $pass = isset($_POST["pass"]) ? htmlspecialchars($_POST["pass"]) : "";

//             // Weryfikacja danych logowania
//             if (($login === "Pracownik" && $pass === "123") || ($login === "Technik" && $pass === "321")) {
//                 $_SESSION['nick'] = $nick;
//                 $_SESSION['login'] = $login;
//                 $_SESSION['pass'] = $pass;
//                 $_SESSION['zalogowany'] = true;
//             } else {
//                 echo "<p style='color: red;'>Błędny login lub hasło. Spróbuj ponownie.</p>";
//                 return;
//             }
//         }

//         // 2. Wyświetlanie menu dla zalogowanego użytkownika (zarówno po POST, jak i ponownym wejściu przez GET)
//         if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] === true) {
//             if ($_SESSION['login'] === "Pracownik") {
//                 $obj = new pracownik();
//                 $obj->baner();
//             } elseif ($_SESSION['login'] === "Technik") {
//                 $obj = new technik();
//                 $obj->baner();
//             }
//         } else {
//             echo "<p style='color: red;'>Brak dostępu. Proszę się najpierw zalogować.</p>";
//         }
//     }
// }

    // Plik dodaZgloszen.php
    class dodaZgloszen{
        function dodwanie($sql){
            $date = date("Y-m-d");
            if ($_SERVER["REQUEST_METHOD"] === "POST"){
                $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : "";
                $opis = isset($_POST['opis']) ? htmlspecialchars($_POST['opis']) : "";
                $loka = isset($_POST['loka']) ? htmlspecialchars($_POST['loka']) : "";
                $autor = $_SESSION['nick']; //albo $_SESSION['login']

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

    // Plik edycjaStatusu.php
?>