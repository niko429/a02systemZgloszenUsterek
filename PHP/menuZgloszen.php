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
        require_once './db.php';
        $obj = new menuZgloszen();
        $obj->pobieranie_danych();

    ?>
    <main>
        <h1 class="center">Aby rozpocząć cokolwiek, wybierz jedną z dwóch opcji, lub wyloguj się jeżeli to nie jest te konto</h1>
    </main>
    <?php
        require_once './Include/footer.php';
    ?>
</body>
</html>