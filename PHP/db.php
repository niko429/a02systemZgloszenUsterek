<?php
    // Łączenie z bazą danych
    $sql = null;
        if ($sql = mysqli_connect("localhost","root","","a02baza")){
            // echo "<p>Udało się podłączyć pod bazę danych</p>";
        } else {
            echo "<p>Nie udało się podłączyć pod bazę danych</p>";
        }
?>