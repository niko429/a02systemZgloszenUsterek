<?php
    class logowanie {

        function baner(){
            echo "<header class='logowanie' style='font-size: 300%;'>";
                echo "<h1>Zaloguj się</h1>";
            echo "</header>";
        }
    }

    class pracownik {

        function baner(){
            echo "<header>";
                // echo "<img src='../Grafiki/nazwa.png' alt='Tutaj grafika'";
                echo "<a href='../PHP/index.php'>Wyloguj</a>";
            echo "</header>";
        }

        function dod_report(){
            echo "<header>";
                echo "<a href='../PHP/index.php'>Wyloguj</a>";
                echo "<h1 class='logowanie' style='font-size: 300%;'>Dodaj zgłoszenie</h1>";
            echo "</header>";
        }
    }

    class technik {
        
        function baner(){
            echo "<header>";
                // echo "<img src='../Grafiki/nazwa.png' alt='Tutaj grafika'";
                echo "<a href='../PHP/index.php'>Wyloguj</a>";
            echo "</header>";
        }
    }

?>