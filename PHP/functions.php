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

            $zapytanie = "SELECT nick, login, haslo, id_rola FROM uzytkownicy WHERE nick=? AND login=? AND haslo=?";
            if ($stmt = mysqli_prepare($sql, $zapytanie)){
                mysqli_stmt_bind_param($stmt, 'sss', $nick, $login, $pass);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['nick'] = $row['nick'];
                    $_SESSION['login'] = $row['login'];
                    $_SESSION['pass'] = $row['haslo'];
                    $_SESSION['id_rola'] = $row['id_rola'];
                    $_SESSION['Account_exits'] = true;
                } else {
                    unset($_SESSION['Account_exits']);
                    unset($_SESSION['login']);
                    unset($_SESSION['nick']);
                }
            }
        }

        if (isset($_SESSION['Account_exits']) && $_SESSION['Account_exits'] === true) {
            if ($_SESSION['id_rola'] === 1) {
                baner_prac();
                echo 'Udało się zalogować!';
            } elseif ($_SESSION['id_rola'] === 2) {
                baner_tech();
                echo 'Udało się zalogować!';
            }
        }
    }

    // Plik dodaZgloszen.php
    function addReport($sql){
        $date = date("Y-m-d");
        $id_status = 1;
        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : "";
            $opis = isset($_POST['opis']) ? htmlspecialchars($_POST['opis']) : "";
            $loka = isset($_POST['loka']) ? htmlspecialchars($_POST['loka']) : "";
            $autor = $_SESSION['nick'];

            $zapytanie = "INSERT INTO `zglosenia`(`tytul`, `opis`, `lokalizacja`, `id_status`, `data`, `autor`) VALUES(?, ?, ?, ?, ?, ?)";
            if ($stmt = mysqli_prepare($sql, $zapytanie)) { 
                mysqli_stmt_bind_param($stmt, 'sssiss', $title, $opis, $loka, $id_status, $date, $autor);
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
        $zapytanie = "SELECT zglosenia.*, uzytkownicy.nick FROM zglosenia INNER JOIN uzytkownicy ON zglosenia.autor = uzytkownicy.nick;";
        $wynik = mysqli_query($sql,$zapytanie);

        tableEdit($wynik);
    }

    // Plik edycjaStatusu.php
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