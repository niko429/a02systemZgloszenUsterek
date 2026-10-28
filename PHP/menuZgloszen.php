<?php
    session_start();
        require_once './config.php';
        require_once './Include/header.php';
        require_once './db.php';
        require_once './functions.php';
        gettingData($sql);
    ?>
    <main>
        <h1 class="center"><br>Aby rozpocząć cokolwiek, wybierz jedną z dwóch opcji, lub wyloguj się jeżeli to nie jest te konto</h1>
    </main>
    <?php
        require_once './Include/footer.php';
?>