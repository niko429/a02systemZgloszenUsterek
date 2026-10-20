<!-- Tutaj będzie logowanie się do strony -->
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="Author" content="Niko">
    <title>Logowanie</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
<?php 
    require_once './config.php';
    require_once './Klasy/header.php';
    $obj = new logowanie();
    $obj->baner();

    // Jeżeli użytkownik z niko oraz z hasłem 123 to będzie wtedy pracownik
    // Jeżeli login = niko985642 oraz hasło 321123 to będzie technik

    require_once './Include/footer.php';
?>
</body>
</html>