<?php
    session_start();
?>
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
?>
    <main class="logowanie">
        <div>
            <form method='POST' action='zgloszenia.php'>
                <label for='1'>Wprowadź nick: </label>
                <input type='text' name='nick' id='1'><br>
                <label for='2'>Wprowadź login: </label>
                <input type='text' name='login' id='2'><br>
                <label for='3'>Wprowadź hasło: </label>
                <input type='password' name='pass' id='3'><br>
                <input type='submit' value='Zaloguj' class='guzik_submit'>
           </form>
        </div>
    </main>
<?php 
    require_once './Include/footer.php';
?>
</body>
</html>