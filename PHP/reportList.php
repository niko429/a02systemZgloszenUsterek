<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Niko">
    <title>Lista zgłoszeń</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <?php
        require_once './Include/header.php';
        menu_powrotu_tech();
    ?>
    <main style="margin: 0 auto; width: 50%;">
        <h1 class="logowanie" style="font-size: 300%; margin-bottom: 10px; width: 350px;">Lista zgłoszeń</h1>
        <?php
            require_once './config.php';
            require_once './db.php';
            require_once './functions.php';
            listReport($sql);
        ?>
    </main>
    <?php
        require_once './Include/footer.php';
        footer();
    ?>
