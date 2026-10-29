<?php
    /*
        Zawartość config'a
        <?php
            define('DB_Host', 'localhost');
            define('DB_User', 'root');
            define('DB_Pass', '');
            define('DB_Name', 'a02baza');
        ?>
    */
    require_once './config.php';
    // Łączenie z bazą danych
    $sql = null;
        if ($sql = mysqli_connect(DB_Host,DB_User,DB_Pass,DB_Name)){
            // echo "Udało się podłączyć pod bazę danych";
        } else {
            echo "Nie udało się podłączyć pod bazę danych";
        }
?>