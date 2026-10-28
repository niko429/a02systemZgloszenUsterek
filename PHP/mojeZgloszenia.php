<?php
    session_start();
?>

    <?php
        require_once './config.php';
        require_once './Include/header.php';
        menu_powrotu_prac();
    ?>
    <main style="margin: 0 auto; width: 40%; text-align: center;">
        <h1  style="font-size: 250%; width: 50%; margin-bottom: 15px;" class="logowanie">Moje zgłoszenia</h1>
        <?php 
            require_once './db.php';
            require_once './functions.php';
            listMyReports();
        ?>
    </main>
    <?php
        require_once './Include/footer.php';
    ?>
