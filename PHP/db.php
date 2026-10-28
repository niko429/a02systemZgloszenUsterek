<?php
    require_once './config.php';
    // Łączenie z bazą danych
    $sql = null;
        if ($sql = mysqli_connect($host,$user,$pass,$database)){
            // echo "<p>Udało się podłączyć pod bazę danych</p>";
        } else {
            echo "<p>Nie udało się podłączyć pod bazę danych</p>";
        }
?>