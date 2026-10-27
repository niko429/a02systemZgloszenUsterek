<!-- To tylko widzi Technik -->
<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Niko">
    <title>Edycja zgłoszeń</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <?php
        require_once './Klasy/header.php';
        $obj = new technik();
        $obj->edycja_zgloszen();
    ?>
    <?php
        require_once './config.php';
        require_once './db.php';

    ?>
    <?php
        require_once './Include/footer.php';
    ?>
</body>
</html>