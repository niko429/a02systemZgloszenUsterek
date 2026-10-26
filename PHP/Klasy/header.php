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
                echo "<div class='lewy_baner'>";
                    echo "Użytkownik: ".$_SESSION['nick'];
                    // echo "<img src='../Grafiki/nazwa.png' alt='Tutaj grafika'";
                    echo "<a href='dodaZgloszen.php' class='guzik_banerowy'>Dodaj nowe zgłoszenie</a>";
                    echo "<a href='mojeZgloszenia.php' class='guzik_banerowy'>Moje zgłoszenia</a>";
                echo "</div>";
                echo "<div class='prawy_baner'>";
                    echo "<a href='../PHP/index.php' class='guzik_banerowy_wyloguj'>Wyloguj</a>";
                echo "</div>";
            echo "</header>";
        }

        function dod_report(){
            echo "<header>";
                echo "<div class='lewy_baner'>";
                    echo "Użytkownik: ".$_SESSION['nick'];
                    // echo "<img src='../Grafiki/nazwa.png' alt='Tutaj grafika'";
                echo "</div>";
                echo "<div class='prawy_baner'>";
                    echo "<a href='../PHP/index.php' class='guzik_banerowy_wyloguj'>Wyloguj</a>";
                echo "</div>";
            echo "</header>";
        }
    }

    class technik {
        
        function baner(){
            echo "<header>";
                echo "<div class='lewy_baner'>";
                    echo "Użytkownik: ".$_SESSION['nick'];
                    // echo "<img src='../Grafiki/nazwa.png' alt='Tutaj grafika'";
                    echo "<a href='dodaZgloszen.php' class='guzik_banerowy'>Zgłoszenia</a>";
                    echo "<a href='mojeZgloszenia.php' class='guzik_banerowy'>Zmiana statusu zgłoszenia</a>";
                echo "</div>";
                echo "<div class='prawy_baner'>";
                    echo "<a href='../PHP/index.php' class='guzik_banerowy_wyloguj'>Wyloguj</a>";
                echo "</div>";
            echo "</header>";
        }
    }

?>