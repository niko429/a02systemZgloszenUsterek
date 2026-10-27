<?php
    session_start();

    if ($_SESSION['nick'] === ""){
        die("Proszę wpisać swój nick aby móc dodawać raporty");
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Niko">
    <title>Dodawanie zgłoszeń</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <?php
        require_once './Klasy/header.php';
        $obj = new pracownik();
        $obj->dod_report();
    ?>
    <main class="logowanie">
        <form action="dodaZgloszen.php" method="POST" class="ulozenie_form">
            <label for="1">Tytuł: </label>
            <input type="text" name="title" id="1" placeholder="Tu wpisz tytuł, max 120 znaków" maxlength="120"><br>
            <label for="2">Opis problemu: </label>
            <textarea name="opis" id="2" rows="2" placeholder="Max 2000 znaków. Występuje mała przerwa w powiększaniu czy bądź zmniejszaniu" maxlength="2000"></textarea><br>
            <label for="3">Lokalizacja: </label>
            <input type="text" name="loka" id="3" placeholder="Tu wpisz loka., max 100 znaków"><br>
            <input type="submit" value="Prześlij zgłoszenie" class="guzik_submit">
            <input type="reset" value="Usuń" class="guzik_reset">
            <!-- Data również jest przesyłana ale automatycznie, -->
        </form>
    </main>
    <?php
        require_once './config.php';
        require_once './db.php';
        $obj = new dodaZgloszen();
        $obj->dodwanie($sql);
        require_once './Include/footer.php';

        // 
        // Chciałem opisać mój problem z stroną tą gdyż nie pokazuje mojego profilu, znaczy się nie ma totalnie takiej funkcji aby móc zobaczyć własny profil, a chciałbym wiedzieć co i jak mam a tak to nie wiem :/. Natomiast chciałem dodać co do zgłoszenia tego że textarea jest fajnie zrobiona, bla bla bla. Aaaa, to jest do zgłaszania usterek, no cóż leciutka pomyłka ale jak i tak zacząłem pisać to dokończę moje pisanie bezsensowne, pisze to specjalnie aby w tabelce móc określić jak duża ona musi być
    ?>
</body>
</html>