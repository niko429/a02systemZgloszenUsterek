<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista zgłoszeń</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <?php
        require_once './Klasy/header.php';
    ?>
    <main>
        <?php
            require_once './config.php';
            require_once './db.php';

        ?>
    </main>
    <?php
        require_once './Include/footer.php';
    ?>
</body>
</html>