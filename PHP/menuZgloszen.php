<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Niko">
    <title>Menu</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <?php
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
