<?php
    session_start();

    if ($_SESSION['nick'] === ""){
        die("Proszę wpisać swój nick aby móc dodawać raporty");
    }

    require_once './Include/header.php';
    menu_powrotu_prac();
?>
    <main class="logowanie">
        <form action="dodaZgloszen.php" method="POST" class="ulozenie_form">
            <label for="1">Tytuł: </label>
            <input type="text" name="title" id="1" placeholder="Tu wpisz tytuł, max 120 znaków" maxlength="120" required><br>
            <label for="2">Opis problemu: </label>
            <textarea name="opis" id="2" rows="2" placeholder="Max 2000 znaków. Występuje mała przerwa w powiększaniu czy bądź zmniejszaniu" maxlength="2000" required></textarea><br>
            <label for="3">Lokalizacja: </label>
            <input type="text" name="loka" id="3" placeholder="Tu wpisz loka., max 100 znaków" required><br>
            <input type="submit" value="Prześlij zgłoszenie" class="guzik_submit">
            <input type="reset" value="Usuń" class="guzik_reset">
            <!-- Data również jest przesyłana ale automatycznie, -->
        </form>
    </main>
    <?php
        require_once './config.php';
        require_once './db.php';
        require_once './functions.php';
        addReport($sql);
        require_once './Include/footer.php';
    ?>
