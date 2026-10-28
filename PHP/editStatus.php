<!-- To tylko widzi Technik -->
<?php 
    session_start();
    require_once './Include/header.php';
    menu_powrotu_tech();
    ?>
    <main>
    <?php
        require_once './config.php';
        require_once './db.php';
        require_once './functions.php';
        listEdit($sql);
        edit($sql);
    ?>
    </main>
    <?php
        require_once './Include/footer.php';
        footer();
    ?>
