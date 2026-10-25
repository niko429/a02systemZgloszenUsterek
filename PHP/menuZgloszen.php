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
        $obj = new pracownik();
        $obj->baner();
        
        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $nick = isset($_POST["nick"]) ? htmlspecialchars($_POST["nick"]) : "";
            $login = isset($_POST["login"]) ? htmlspecialchars($_POST["login"]) : "";
            $pass = isset($_POST["pass"]) ? htmlspecialchars($_POST["pass"]) : "";

            $zalogowany = true;
        } else {
            echo "<p>Nie udało się poprawnie przesłać danych, proszę spróbować ponownie</p>";
            $zalogowany = false;
        }

        require_once './Include/footer.php';
    ?>
</body>
</html>