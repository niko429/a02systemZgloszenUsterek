<?php 
    require_once './db.php';
    require_once './config.php';
    require_once 'Include/fuction_extra.php';
    require_once 'Include/header.php';

    // Plik menuZgloszen.php
    function gettingData($sql) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nick  = isset($_POST["nick"]) ? htmlspecialchars($_POST["nick"]) : "";
            $login = isset($_POST["login"]) ? htmlspecialchars($_POST["login"]) : "";
            $pass  = isset($_POST["pass"]) ? htmlspecialchars($_POST["pass"]) : "";
            $zapytanie = "SELECT u.id, u.nick, u.login, u.id_rola,up.podglad_swoje, up.podglad_wszystkie, up.dodawanie, up.edycja FROM uzytkownicy u INNER JOIN uprawnienia up ON u.id_uprawnienia = up.id WHERE u.nick = ? AND u.login = ? AND u.haslo = ?";

            if ($stmt = mysqli_prepare($sql, $zapytanie)) {
                mysqli_stmt_bind_param($stmt, 'sss', $nick, $login, $pass);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['Account_exits'] = true;
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['nick'] = $row['nick'];
                    $_SESSION['uprawnienie'] = (int)$row['id_rola'];
                    $_SESSION['uprawnienia_flagi'] = [
                        'podglad_swoje' => (int)$row['podglad_swoje'],
                        'podglad_wszystkie' => (int)$row['podglad_wszystkie'],
                        'dodawanie' => (int)$row['dodawanie'],
                        'edycja' => (int)$row['edycja']
                    ];
                } else {
                    unset($_SESSION['Account_exits']);
                    unset($_SESSION['user_id']);
                    unset($_SESSION['nick']);
                    unset($_SESSION['uprawnienie']);
                    unset($_SESSION['uprawnienia_flagi']);
                    echo "Błędne dane logowania!";
                }
            }
        }
        
        if (!empty($_SESSION['Account_exits'])) {
            $rola = $_SESSION['uprawnienie']; 

            if ($rola === 1) {
                baner_prac();
            } elseif ($rola === 2) {
                baner_tech();
            } else {
                echo "Brak przypisanego widoku.";
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