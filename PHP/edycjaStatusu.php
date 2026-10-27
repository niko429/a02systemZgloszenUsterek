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
        $obj = new edycjaStatusu();
        $obj->lista($sql);
        $obj->edycja($sql);
    ?>
    </main>
    <?php
        require_once './Include/footer.php';
    ?>
