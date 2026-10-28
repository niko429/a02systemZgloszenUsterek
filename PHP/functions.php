<?php 
    require_once './db.php';
    require_once './config.php';
    require_once 'Include/fuction_extra.php';

    // Plik menuZgloszen.php
    function gettingData($sql){
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nick = isset($_POST["nick"]) ? htmlspecialchars($_POST["nick"]) : "";
            $login = isset($_POST["login"]) ? htmlspecialchars($_POST["login"]) : "";
            $pass = isset($_POST["pass"]) ? htmlspecialchars($_POST["pass"]) : "";

            $zapytanie = "SELECT nick, login, haslo FROM uzytkownicy WHERE nick=? AND login=? AND haslo=?";
            if ($stmt = mysqli_prepare($sql, $zapytanie)){
                mysqli_stmt_bind_param($stmt, 'sss', $nick, $login, $pass);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['nick'] = $row['nick'];
                    $_SESSION['login'] = $row['login'];
                    $_SESSION['pass'] = $row['haslo'];
                    $_SESSION['Account_exits'] = true;
                } else {
                    unset($_SESSION['Account_exits']);
                    unset($_SESSION['login']);
                    unset($_SESSION['nick']);
                    if (empty($nick)) {
                        echo "Proszę dopisać nick";
                    } else {
                        echo 'Takie konto nie istnieje, proszę skontaktować się z technikiem lub wpisać hasło oraz login ponownie.';
                    }
                }
        }
    }

    // Wyświetlanie banneru po zalogowaniu
    if (isset($_SESSION['Account_exits']) && $_SESSION['Account_exits'] === true) {
        if ($_SESSION['login'] === "Pracownik") {
            baner_prac();
            echo 'Udało się zalogować!';
        } elseif ($_SESSION['login'] === "Technik") {
            baner_tech();
            echo 'Udało się zalogować!';
        }
    }
}
    // Plik dodaZgloszen.php
    function addReport($sql){
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
                    echo "Udało się przesłać dane";
                } else {
                    echo "Nie udało się przesłać danych, spróbuj ponowie";
                }
            } else {
                echo "Wystąpił błąd podczas wpisywania danych, spróbuj ponownie";
            }
        } else {
            // echo "Dane zosały źle przesłane";
        }
    }
    
    // Plik listaZgloszen.php
    function listReport($sql){
        $zapytanie = "SELECT * FROM `zglosenia`";
        $wynik = mysqli_query($sql,$zapytanie);

        table_add($wynik);
    }

    // Plik edycjaStatusu.php
    function listEdit($sql){
        $zapytanie = "SELECT * FROM `zglosenia`";
        $wynik = mysqli_query($sql,$zapytanie);
        
        tableEdit($wynik);
    }

    function edit($sql){
        editVisuals($sql);
    }

    // Plik mojeZgloszenia.php
    function listMyReports($sql){
        $zapytanie = "SELECT tytul,opis,lokalizacja,data FROM zglosenia";
        $wynik = mysqli_query($sql,$zapytanie);

        tableMyReports($wynik);
    }
?>