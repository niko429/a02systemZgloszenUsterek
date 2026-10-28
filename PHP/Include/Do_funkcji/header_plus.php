<?php
    function html(){
?>
    <!DOCTYPE html>
        <html lang="pl">
        <head>
            <meta charset="UTF-8">
            <meta name="Author" content="Niko">
<?php 
    }

    function uzytkownik_if(){
        if ($_SESSION['nick'] == "Niko985642" || $_SESSION['nick'] == "niko985642"){
            echo "Twórca strony: ".$_SESSION['nick'];
        } else {
            echo "Użytkownik: ".$_SESSION['nick'];
        }
    }

    function prawy_baner(){
?>
        </div>
            <div class='prawy_baner'>
                <a href='../PHP/index.php' class='guzik_banerowy_wyloguj'>Wyloguj</a>
            </div>
        </header>
<?php
    }
?>
