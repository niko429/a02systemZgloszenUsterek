<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Niko">
    <title>Moje zgłoszenia</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <?php
        require_once './config.php';
        require_once './Klasy/header.php';
        $obj = new pracownik();
        $obj->menu_powrotu();
    ?>
    <main style="margin: 0 auto; width: 40%; text-align: center;">
        <h1  style="font-size: 250%; width: 50%; margin-bottom: 15px;" class="logowanie">Moje zgłoszenia</h1>
        <?php 
            require_once './db.php';
            $obj = new mojeZgloszenia();
            $obj->lista($sql);
        ?>
    </main>
    <?php
        require_once './Include/footer.php';
    ?>
</body>
</html>