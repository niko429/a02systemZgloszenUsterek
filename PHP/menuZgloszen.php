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
        require_once 'config.php';
        require_once './Klasy/header.php';

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
                echo "<p>Coś poszło nie tak z zatwierdzaniem danych, proszę wpisać je jeszcze raz</p>";
                $zalogowany = false;
            }
        } else {
            echo "<p>Nie udało się poprawnie przesłać danych, proszę spróbować ponownie</p>";
            $zalogowany = false;
        }
    ?>
    <main>
        <h1 class="center">Aby rozpocząć cokolwiek, wybierz jedną z dwóch opcji, lub wyloguj się jeżeli to nie jest te konto</h1>
    </main>
    <?php
        require_once './Include/footer.php';
    ?>
</body>
</html>