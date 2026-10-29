<?php
    /*
        Zawartość config'a
        <?php
            define('host', 'localhost');
            define('user', 'root');
            define('pass', '');
            define('name', 'a02baza');
        ?>
    */
    require_once './config.php';
    // Łączenie z bazą danych
    $sql = null;
        if ($sql = mysqli_connect(host,user,pass,name)){
            // echo "Udało się podłączyć pod bazę danych";
        } else {
            echo "Nie udało się podłączyć pod bazę danych";
        }
?>