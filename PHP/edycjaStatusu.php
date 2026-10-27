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
        $obj->menu_powrotu();
    ?>
    <main>
    <?php
        require_once './config.php';
        require_once './db.php';
        $obj = new edycjaStatusu();
        $obj->lista($sql);
        $obj->edycja($sql);
    ?>
    </main>
    <?php
        require_once './Include/footer.php';
    ?>
</body>
</html>